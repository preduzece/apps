var errors = require('restberry-errors');
var GoogleStrategy = require('passport-google-oauth').OAuth2Strategy;
var logger = require('restberry-logger');

var CALLBACK_PATH = '/login/google/callback';
var DEFAULT_CALLBACK_HOST = 'http://localhost';
var DEFAULT_RETURN_URL = '/';
var DEFAULT_SCHEMA = {
    email: {type: String, required: true, unique: true, lowercase: true},
    ids: {
        google: {type: String},
    },
    image: {type: String},
    name: {
        full: {type: String},
        first: {type: String},
        last: {type: String},
    },
};
var DEFAULT_SCOPE = 'email';
var LOGIN_PATH = '/login/google';

function RestberryPassportGoogle() {
    this._configured = false;
    this.schema = DEFAULT_SCHEMA;
    this.callbackHost = DEFAULT_CALLBACK_HOST;
    this.clientID = undefined;
    this.clientSecret = undefined;
    this.returnURL = DEFAULT_RETURN_URL;
    this.scope = DEFAULT_SCOPE;
};

RestberryPassportGoogle.prototype.callbackURL = function() {
    var apiPath = this.restberry.waf.apiPath;
    return this.callbackHost + apiPath + CALLBACK_PATH;
};

RestberryPassportGoogle.prototype.config = function(config) {
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

RestberryPassportGoogle.prototype.enable = function(next) {
    var self = this;
    if (!self.clientID || !self.clientSecret) {
        throw new Error('Need to provide clientID and clientSecret for ' +
                        'Google authentication');
    }
    self.passport.use(new GoogleStrategy({
        callbackURL: self.callbackURL(),
        clientID: self.clientID,
        clientSecret: self.clientSecret,
    }, function(_, _, profile, next) {
        logger.info('SESSION', 'google authenticate', profile.id);
        self.findOrCreateUser(profile._json, next);
    }));
    next(self.schema);
};

RestberryPassportGoogle.prototype.findOrCreateUser = function(profile, next) {
    var data = {
        email: profile.email,
        ids: {
            google: profile.id,
        },
        image: profile.picture,
        name: {
            full: profile.name,
            first: profile.given_name,
            last: profile.family_name,
        },
    };
    var query = {
        $or: [
            {'ids.google': profile.id},
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

RestberryPassportGoogle.prototype.setupRoutes = function() {
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
            preAction: self.passport.authenticate('google', {
                scope: self.scope,
            }),
        })
        .addCustomRoute({
            _controller: function() {
                return function(req, res, next) {
                    logger.info('SESSION', 'google login', req.user.id);
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
                self.passport.authenticate('google')(req, res, function(err) {
                    if (err) {
                        self.restberry.onError(errors.BadRequest, err);
                    } else {
                        next();
                    }
                });
            },
        });
};

RestberryPassportGoogle.prototype.setupUser = function(User) {
    return User;
};

module.exports = exports = new RestberryPassportGoogle;
