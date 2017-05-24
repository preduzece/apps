var _ = require('underscore');
var colors = require('colors');
var utils = require('restberry-utils');

var LOG_SEP = '|';
var STATUS_SUCCESS_MIN = 200;
var STATUS_SUCCESS_MAX = 300;
var WARN_PREFIX = 'WARN';

var date = function() {
    return colors.grey(new Date().toISOString());
};

var methodHasBody = function(method) {
    return method === utils.httpMethod.POST || method === utils.httpMethod.PUT;
};

var isResSuccessful = function(code) {
    return code >= STATUS_SUCCESS_MIN && code < STATUS_SUCCESS_MAX;
};

var methodColor = function(method) {
    switch (method) {
        case utils.httpMethod.DELETE:
            return colors.cyan;
        case utils.httpMethod.GET:
            return colors.blue;
        case utils.httpMethod.POST:
            return colors.magenta;
        case utils.httpMethod.PUT:
            return colors.yellow;
        default:
            return colors.grey;
    }
};

var remoteAddressOfReq = function(req) {
    if (req.connection && req.connection.remoteAddress) {
        return req.connection.remoteAddress;
    }
    return undefined;
};

module.exports = {

    error: function() {
        var args = _.toArray(arguments);
        args.unshift(colors.red);
        this.log.apply(this, args);
    },

    info: function(part1, part2, msg) {
        var args = _.toArray(arguments);
        args.unshift(colors.white.bold);
        this.log.apply(this, args);
    },

    log: function(color) {
        var args = _.rest(_.toArray(arguments));
        var msg = args.pop();
        if (_.isObject(msg)) {
            msg = _.clone(msg);
            msg = utils.censorPassword(msg);
            msg = JSON.stringify(msg, undefined, 2);
        }
        var logs = _.map(args, function(arg) {
            return arg && color(arg);
        });
        logs.unshift(date());
        logs.push(msg);
        logs = _.filter(logs, function(log) {
            return log !== undefined && log !== null && log !== '';
        });
        var log = logs.join(colors.white(LOG_SEP));
        console.log(log);
    },

    req: function(req, json) {
        json = json || req.body || {};
        var method = req.method;
        if (!methodHasBody(method) && !_.size(json)) {
            json = undefined;
        }
        var address = remoteAddressOfReq(req);
        var color = methodColor(method);
        var url = utils.getReqPath(req);
        this.log(color, address, method, url, json);
    },

    res: function(res, json) {
        json = json || res._body;
        var code = res.statusCode;
        var address = remoteAddressOfReq(res.req);
        if (isResSuccessful(code)) {
            this.success(address, code, json);
        } else {
            this.error(address, code, json);
        }
    },

    success: function(address, code, msg) {
        var args = _.toArray(arguments);
        args.unshift(colors.green);
        this.log.apply(this, args);
    },

    warn: function(msg, prefix) {
        prefix = colors.yellow((prefix || WARN_PREFIX) + ':');
        console.log(prefix, msg);
    },

};
