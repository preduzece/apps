var _ = require('underscore');
var bodyParser = require('body-parser');
var express = require('express');

function RestberryExpress() {
    this._configured = false;
    this.express = express;
    this.app = null;
};

RestberryExpress.prototype.config = function(next) {
    if (!this._configured) {
        this._configured = true;
        var app = express();
        app.use(bodyParser.json());
        this.app = app;
        if (next) {
            next(this);
        }
    }
    return this;
};

RestberryExpress.prototype.delete = function() {
    var app = this.app;
    app.delete.apply(app, arguments);
};

RestberryExpress.prototype.get = function() {
    var app = this.app;
    app.get.apply(app, arguments);
};

RestberryExpress.prototype.listen = function(port, next) {
    this.app.listen(port, next);
};

RestberryExpress.prototype.post = function() {
    var app = this.app;
    app.post.apply(app, arguments);
};

RestberryExpress.prototype.put = function() {
    var app = this.app;
    app.put.apply(app, arguments);
};

RestberryExpress.prototype.res = function(code, data) {
    this._res.status(code).json(data);
};

module.exports = exports = new RestberryExpress;
