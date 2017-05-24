var httpStatus = require('http-status');
var RestberryError = require('./error');
var util = require('util');
var utils = require('./utils');

function Unauthenticated(err, next) {
    err.statusCode = httpStatus.UNAUTHORIZED;
    err.title = err.title || 'Unauthenticated';
    err.message = 'You need to be logged in to perform this action.';
    next(utils.error(err));
}

util.inherits(Unauthenticated, RestberryError);

module.exports = Unauthenticated;
