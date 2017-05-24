var httpStatus = require('http-status');
var RestberryError = require('./error');
var util = require('util');
var utils = require('./utils');

function BadRequestInvalidInput(err, next) {
    err.property = utils.property(err);
    err.statusCode = httpStatus.BAD_REQUEST;
    err.title = 'Invalid Input';
    err.message = BadRequestInvalidInput.message(err);
    next(utils.error(err));
}

util.inherits(BadRequestInvalidInput, RestberryError);

BadRequestInvalidInput.message = function(err) {
    var showProperty = err.property && err.property !== err.modelName;
    var msg = 'Recieved an invalid input field';
    if (showProperty) {
        msg += ' \'' + err.property + '\'';
    }
    if (err.modelName) {
        msg += ' of \'' + err.modelName + '\'';
    }
    msg += '.';
    return msg;
};

module.exports = BadRequestInvalidInput;
