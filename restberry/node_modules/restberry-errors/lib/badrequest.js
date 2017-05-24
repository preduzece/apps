var httpStatus = require('http-status');
var RestberryError = require('./error');
var util = require('util');
var utils = require('./utils');

function BadRequest(err, next) {
    err.statusCode = httpStatus.BAD_REQUEST;
    err.title = err.title || httpStatus[err.statusCode];
    err.message = err.message || 'There was an issue with the request.';
    next(utils.error(err));
}

util.inherits(BadRequest, RestberryError);

module.exports = BadRequest;
