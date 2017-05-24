var httpStatus = require('http-status');
var RestberryError = require('./error');
var util = require('util');
var utils = require('./utils');

function BadRequestMissingField(err, next) {
    err.property = utils.property(err);
    err.statusCode = httpStatus.BAD_REQUEST;
    err.title = 'Missing Field';
    err.message = BadRequestMissingField.message(err);
    next(utils.error(err));
}

util.inherits(BadRequestMissingField, RestberryError);

BadRequestMissingField.message = function(err) {
    var showProperty = err.property && err.property !== err.modelName;
    var msg = 'Missing required field';
    if (showProperty) {
        msg += ' \'' + err.property + '\'';
    }
    if (err.modelName) {
        msg += ' of \'' + err.modelName + '\'';
    }
    msg += '.';
    return msg;
};

module.exports = BadRequestMissingField;
