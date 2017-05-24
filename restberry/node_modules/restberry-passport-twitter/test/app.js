var cookieParser = require('cookie-parser');
var restberry = require('restberry');
var restberryPassport = require('restberry-passport');
var restberryPassportTwitter = require('restberry-passport-twitter');
var session = require('express-session');

var CONSUMER_KEY = 'tjV7hrEDLvw8zMvbuzQ8Quylt';
var CONSUMER_SECRET = 'iMd2fisBG7IKiqPaU2xyhoDeWGTDT1M2gmQ8ZdB9ijatcygi7p';

var auth = restberryPassport
    .config(function(auth) {
        var app = restberry.waf.app;
        app.use(auth.passport.initialize());
        app.use(auth.passport.session());
    })
    .use(restberryPassportTwitter, {
        consumerKey: CONSUMER_KEY,
        consumerSecret: CONSUMER_SECRET,
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
