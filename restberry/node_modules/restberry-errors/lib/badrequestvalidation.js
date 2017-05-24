var httpStatus = require('http-status');
var RestberryError = require('./error');
var util = require('util');
var utils = require('./utils');

function BadRequestValidation(err, next) {
    err.property = utils.property(err);
    err.statusCode = httpStatus.BAD_REQUEST;
    err.title = 'Validation Error';
    err.message = BadRequestValidation.message(err);
    next(utils.error(err));
}

util.inherits(BadRequestValidation, RestberryError);

BadRequestValidation.message = function(err) {
    var showProperty = err.property && err.property !== err.modelName;
    var msg = 'Wasn\'t able to validate';
    if (showProperty) {
        msg += ' the \'' + err.property + '\'';
    } else {
        msg += ' the input';
    }
    if (err.modelName) {
        msg += ' of \'' + err.modelName + '\'';
    }
    msg += '.';
    return msg;
};

module.exports = BadRequestValidation;
