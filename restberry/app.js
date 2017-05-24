var restberry = require('restberry');
var restberryPassport = require('restberry-passport');
var cookieParser = require('cookie-parser');
// var session = require('express-session');
var session = require('client-sessions');

var auth = restberryPassport.config({},
        function(auth) {
          var app = restberry.waf.app;
          app.use(auth.passport.initialize());
          app.use(auth.passport.session());
        })
    .use('local', {
        passwordMinLength: 8,
    });

restberry
    .config({
        apiPath: '/api/v1',
        name: 'WEATHER APP',
        port: 5000,
    })
    .use('express', function(waf) {
        var app = waf.app;
        app.use(cookieParser());
        app.use(session({
            resave: false,
            cookieName: 'session',
            saveUninitialized: false,
            secret: 'restberry',
        }));
    })
    .use('mongoose', function(db) {
        db.connect('mongodb://localhost/weather');
    })
    .use(auth)
    .listen();

restberry
    .routes
    .addCustomRoute({
        action: function(req, res, next) {
            restberry.model('User').find({},
                function(records, next) {

                    records.toJSON(function(object) {
                        res.send(object);
                    });
                });

        },
        method: 'GET', // choices: DELETE, GET, POST, PUT
        path: '/read/users', // the path of the route, will append apiPath
    });

restberry
    .routes
    .addCustomRoute({
        action: function(req, res, next) {
            var user = {
                email: 'tester@levi9.com',
                password: 'tester123'
            };

            var status = restberry.model('User').create(user,
                function(status, next) {
                    console.log(status);
                    res.send('OK');
                });

        },
        method: 'GET', // choices: DELETE, GET, POST, PUT
        path: '/create/user', // the path of the route, will append apiPath
    });

restberry.model('City')
    .schema({
        name: {
            type: String,
            required: true
        },
        location: {
            longitude: {
                type: Number
            },
            latitude: {
                type: Number
            },
        },
    })
    .routes
    .addCreateRoute() // POST /api/v1/cities
    .addReadRoute() // GET /api/v1/cities/:id
    .addReadManyRoute() // GET /api/v1/cities
    .addPartialUpdateRoute() // POST /cities/:id
    .addUpdateRoute(); // PUT /cities/:id

restberry.model('User').routes
    .addCreateRoute() // POST /api/v1/users
    .addReadManyRoute() // GET /api/v1/users
    .addReadRoute(); // GET /api/v1/users/:id
