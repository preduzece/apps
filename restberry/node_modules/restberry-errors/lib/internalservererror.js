var httpStatus = require('http-status');
var RestberryError = require('./error');
var util = require('util');
var utils = require('./utils');

function InternalServerError(err, next) {
    err.statusCode = httpStatus.INTERNAL_SERVER_ERROR;
    err.title = err.title || httpStatus[err.statusCode];
    err.message = err.message || 'We\'re run into an unexpected problem, ' +
                                 'please contact support!';
    next(utils.error(err));
}

util.inherits(InternalServerError, RestberryError);

module.exports = InternalServerError;
