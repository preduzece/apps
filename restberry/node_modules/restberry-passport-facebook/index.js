var errors = require('restberry-errors');
var FacebookStrategy = require('passport-facebook').Strategy;
var logger = require('restberry-logger');

var CALLBACK_PATH = '/login/facebook/callback';
var DEFAULT_CALLBACK_HOST = 'http://localhost';
var DEFAULT_RETURN_URL = '/';
var DEFAULT_SCHEMA = {
    email: {type: String, required: true, unique: true, lowercase: true},
    ids: {
        facebook: {type: String},
    },
    name: {
        full: {type: String},
        first: {type: String},
        last: {type: String},
    },
};
var DEFAULT_SCOPE = ['public_profile', 'email'];
var LOGIN_PATH = '/login/facebook';

function RestberryPassportFacebook() {
    this._configured = false;
    this.schema = DEFAULT_SCHEMA;
    this.callbackHost = DEFAULT_CALLBACK_HOST;
    this.clientID = undefined;
    this.clientSecret = undefined;
    this.returnURL = DEFAULT_RETURN_URL;
    this.scope = DEFAULT_SCOPE;
};

RestberryPassportFacebook.prototype.callbackURL = function() {
    var apiPath = this.restberry.waf.apiPath;
    return this.callbackHost + apiPath + CALLBACK_PATH;
};

RestberryPassportFacebook.prototype.config = function(config) {
    if (!this._configured) {
        this._configured = true;
        config = config || {};
        if (config.callbackHost)  this.callbackHost = config.callbackHost;
        if (config.returnURL)  this.returnURL = config.returnURL;
        if (config.scope)  this.scope = config.scope;
        this.clientID = config.clientID;
        this.clientSecret = config.clientSecret;
    }
    return this;
};

RestberryPassportFacebook.prototype.enable = function(next) {
    var self = this;
    if (!self.clientID || !self.clientSecret) {
        throw new Error('Need to provide clientID and clientSecret for ' +
                        'Facebook authentication');
    }
    self.passport.use(new FacebookStrategy({
        callbackURL: self.callbackURL(),
        clientID: self.clientID,
        clientSecret: self.clientSecret,
        enableProof: false,
    }, function(_, _, profile, next) {
        logger.info('SESSION', 'facebook authenticate', profile.id);
        self.findOrCreateUser(profile._json, next);
    }));
    next(self.schema);
};

RestberryPassportFacebook.prototype.findOrCreateUser = function(profile, next) {
    var data = {
        email: profile.email,
        ids: {
            facebook: profile.id,
        },
        name: {
            full: profile.name,
            first: profile.first_name,
            last: profile.last_name,
        },
    };
    var query = {
        $or: [
            {'ids.facebook': profile.id},
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

RestberryPassportFacebook.prototype.setupRoutes = function() {
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
            preAction: self.passport.authenticate('facebook', {
                scope: self.scope,
            }),
        })
        .addCustomRoute({
            _controller: function() {
                return function(req, res, next) {
                    logger.info('SESSION', 'facebook login', req.user.id);
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
                self.passport.authenticate('facebook')(req, res, function(err) {
                    if (err) {
                        self.restberry.onError(errors.BadRequest, err);
                    } else {
                        next();
                    }
                });
            },
        });
};

RestberryPassportFacebook.prototype.setupUser = function(User) {
    return User;
};

module.exports = exports = new RestberryPassportFacebook;
