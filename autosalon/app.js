var express = require('express');
var path = require('path');
var favicon = require('serve-favicon');
var logger = require('morgan');
var cookieParser = require('cookie-parser');
var sessionHandler = require('express-session');
var bodyParser = require('body-parser');
var mongoose = require('mongoose');
var feed = require('feed-read');
var fs = require('fs');

var routes = require('./controller/index');
var panel = require('./controller/panel');
var service = require('./controller/service');

var tip_ctrl = require('./controller/tip_ctrl');
var auto_ctrl = require('./controller/auto_ctrl');
var marka_ctrl = require('./controller/marka_ctrl');
var order_ctrl = require('./controller/order_ctrl');
var comnt_ctrl = require('./controller/comnt_ctrl');
var user_ctrl = require('./controller/user_ctrl');

var app = express();
var session;

// database management system engine setup
mongoose.connect('mongodb://localhost/autosalon');

// model engine setup
fs.readdirSync(__dirname + '/models').forEach(
    function(filename){ if (~filename.indexOf('.js')) 
        require(__dirname + '/models/' + filename);
});

// view engine setup
app.set('views', path.join(__dirname, 'views'));
app.set('view engine', 'hjs');

// uncomment after placing your favicon in /public
//app.use(favicon(__dirname + '/public/favicon.ico'));
app.use(logger('dev'));
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: false }));
app.use(cookieParser());
app.use(express.static(path.join(__dirname, 'public')));

// session engine setup
app.use(sessionHandler(
    {
        secret: 'l1o2z3i4n5k6a', 
        saveUninitialized: true, 
        resave: true
    }
));

// route engine setup
app.use('/autosalon', routes);
app.use('/autosalon/panel', panel);

app.use('/autosalon/tip', tip_ctrl);
app.use('/autosalon/auto', auto_ctrl);
app.use('/autosalon/marka', marka_ctrl);
app.use('/autosalon/order', order_ctrl);
app.use('/autosalon/comnt', comnt_ctrl);

app.use('/autosalon/user', user_ctrl);
app.use('/autosalon/service', service);

// catch 404 and forward to error handler
app.use(function(req, res, next) {
    var err = new Error('Not Found');
    err.status = 404;
    next(err);
});

// error handlers

// development error handler
// will print stacktrace
if (app.get('env') === 'development') {
    app.use(function(err, req, res, next) {
        res.status(err.status || 500);
        res.render('error', {
            message: err.message,
            error: err
        });
    });
}

// production error handler
// no stacktraces leaked to user
app.use(function(err, req, res, next) {
    res.status(err.status || 500);
    res.render('error', {
        message: err.message,
        error: {}
    });
});


module.exports = app;