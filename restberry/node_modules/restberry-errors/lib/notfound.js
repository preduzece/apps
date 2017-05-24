var httpStatus = require('http-status');
var RestberryError = require('./error');
var util = require('util');
var utils = require('./utils');

function NotFound(err, next) {
    err.property = utils.property(err);
    err.statusCode = httpStatus.NOT_FOUND;
    err.title = err.title || httpStatus[err.statusCode];
    err.message = NotFound.message(err);
    next(utils.error(err));
}

util.inherits(NotFound, RestberryError);

NotFound.message = function(err) {
    var msg = 'Couldn\'t find any';
    if (err.property) {
        msg += ' \'' + err.property + '\'';
    }
    msg += ' object.';
    return msg;
};

module.exports = NotFound;
