var cookieParser = require('cookie-parser');
var restberry = require('restberry');
var restberryPassport = require('restberry-passport');
var restberryPassportGoogle = require('restberry-passport-google');
var session = require('express-session');

var CLIENT_ID = '189276784584-dnhd9l2t6sac2954qvbjbaj1r8h40b68.apps.googleusercontent.com';
var CLIENT_SECRET = 'C6yXezIU3DnXE4TUj6HwAoIk';

var auth = restberryPassport
    .config(function(auth) {
        var app = restberry.waf.app;
        app.use(auth.passport.initialize());
        app.use(auth.passport.session());
    })
    .use(restberryPassportGoogle, {
        clientID: CLIENT_ID,
        clientSecret: CLIENT_SECRET,
    });

restberry
    .config({
        apiPath: '/api/v1',
        port: 6000,
        verbose: true,
    })
    .use('express', function(waf) {
        var app = waf.app;
        app.use(cookieParser());
        app.use(session({
            resave: false,
            saveUninitialized: false,
            secret: 'restberry',
        }));
    })
    .use(auth)
    .listen('RESTBERRY');

restberry.model('User')
    .loginRequired()
    .routes
        .addReadManyRoute({
            actions: {
                me: function(req, res, next) {
                    var User = restberry.auth.getUser();
                    req.user.expandJSON();
                    req.user.toJSON(next);
                },
            },
        });
