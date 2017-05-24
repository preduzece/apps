var httpStatus = require('http-status');
var RestberryError = require('./error');
var util = require('util');
var utils = require('./utils');

function Conflict(err, next) {
    err.property = utils.property(err);
    err.statusCode = httpStatus.CONFLICT;
    err.title = err.title || httpStatus[err.statusCode];
    err.message = Conflict.message(err);
    next(utils.error(err));
}

util.inherits(Conflict, RestberryError);

Conflict.message = function(err) {
    var msg = 'There aleady exists';
    if (err.property) {
        msg += ' a \'' + err.property + '\'';
    } else {
        msg += ' an object';
    }
    msg += ' like this.';
    return msg;
};

module.exports = Conflict;
