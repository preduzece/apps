var cookieParser = require('cookie-parser');
var restberry = require('restberry');
var restberryPassport = require('restberry-passport');
var restberryPassportFacebook = require('restberry-passport-facebook');
var session = require('express-session');

var CLIENT_ID = '444105679101207';
var CLIENT_SECRET = '49678fd6af105794a5f07a5dbcafeb32';

var auth = restberryPassport
    .config(function(auth) {
        var app = restberry.waf.app;
        app.use(auth.passport.initialize());
        app.use(auth.passport.session());
    })
    .use(restberryPassportFacebook, {
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
