var httpStatus = require('http-status');
var RestberryError = require('./error');
var util = require('util');
var utils = require('./utils');

function Forbidden(err, next) {
    err.statusCode = httpStatus.FORBIDDEN;
    err.title = err.title || httpStatus[err.statusCode];
    err.message = 'You are not authorized to perform this action.';
    next(utils.error(err));
}

util.inherits(Forbidden, RestberryError);

module.exports = Forbidden;
