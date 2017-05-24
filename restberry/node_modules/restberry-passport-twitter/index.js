var errors = require('restberry-errors');
var TwitterStrategy = require('passport-twitter').Strategy;
var logger = require('restberry-logger');

var CALLBACK_PATH = '/login/twitter/callback';
var DEFAULT_CALLBACK_HOST = 'http://localhost';
var DEFAULT_RETURN_URL = '/';
var DEFAULT_SCHEMA = {
    email: {type: String, required: true, unique: true, lowercase: true},
    ids: {
        twitter: {type: String},
    },
    image: {type: String},
    name: {
        full: {type: String},
        first: {type: String},
        last: {type: String},
    },
    username: {type: String},
};
var LOGIN_PATH = '/login/twitter';

function RestberryPassportTwitter() {
    this._configured = false;
    this.schema = DEFAULT_SCHEMA;
    this.callbackHost = DEFAULT_CALLBACK_HOST;
    this.consumerKey = undefined;
    this.consumerSecret = undefined;
    this.returnURL = DEFAULT_RETURN_URL;
};

RestberryPassportTwitter.prototype.callbackURL = function() {
    var apiPath = this.restberry.waf.apiPath;
    return this.callbackHost + apiPath + CALLBACK_PATH;
};

RestberryPassportTwitter.prototype.config = function(config) {
    if (!this._configured) {
        this._configured = true;
        config = config || {};
        if (config.callbackHost)  this.callbackHost = config.callbackHost;
        if (config.returnURL)  this.returnURL = config.returnURL;
        this.consumerKey = config.consumerKey;
        this.consumerSecret = config.consumerSecret;
    }
    return this;
};

RestberryPassportTwitter.prototype.enable = function(next) {
    var self = this;
    if (!self.consumerKey || !self.consumerSecret) {
        throw new Error('Need to provide consumerKey and consumerSecret for ' +
                        'Twitter authentication');
    }
    self.passport.use(new TwitterStrategy({
        callbackURL: self.callbackURL(),
        consumerKey: self.consumerKey,
        consumerSecret: self.consumerSecret,
    }, function(_, _, profile, next) {
        logger.info('SESSION', 'twitter authenticate', profile.id);
        self.findOrCreateUser(profile._json, next);
    }));
    next(self.schema);
};

RestberryPassportTwitter.prototype.findOrCreateUser = function(profile, next) {
    // TODO(materik):
    // * temp because I can get email from the callback
    var email = profile.screen_name + '@restberry.com';
    var data = {
        email: email,
        ids: {
            twitter: profile.id_str,
        },
        image: profile.profile_image_url,
        name: {
            full: profile.name,
        },
        username: profile.screen_name,
    };
    var query = {
        $or: [
            {'ids.twitter': profile.id_str},
            {'email': profile.email},
        ],
    };
    var User = this.restberry.auth.getUser();
    User.findOne(query, function(user) {
        user.update(data, function(user) {
            next(undefined, user);
        });
    }, function() {
        User.create(data, function(user) {
            next(undefined, user);
        });
    });
};

RestberryPassportTwitter.prototype.setupRoutes = function() {
    var self = this;
    var onError = self.restberry.waf.handleRes;
    var User = self.restberry.auth.getUser();
    User.routes
        .addCustomRoute({
            _controller: function() {
                return function(req, res, next) {
                    res._body = {};
                    next({});
                };
            },
            isLoginRequired: false,
            path: LOGIN_PATH,
            preAction: self.passport.authenticate('twitter'),
        })
        .addCustomRoute({
            _controller: function() {
                return function(req, res, next) {
                    logger.info('SESSION', 'twitter login', req.user.id);
                    req.user.timestampLastLogIn = new Date();
                    req.user.save(function(user) {
                        res.redirect(self.returnURL);
                        logger.res(res, self.returnURL);
                    });
                };
            },
            isLoginRequired: false,
            path: CALLBACK_PATH,
            preAction: function(req, res, next) {
                self.passport.authenticate('twitter')(req, res, function(err) {
                    if (err) {
                        self.restberry.onError(errors.BadRequest, err);
                    } else {
                        next();
                    }
                });
            },
        });
};

RestberryPassportTwitter.prototype.setupUser = function(User) {
    return User;
};

module.exports = exports = new RestberryPassportTwitter;
