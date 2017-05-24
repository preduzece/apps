var httpStatus = require('http-status');
var RestberryError = require('./error');
var util = require('util');
var utils = require('./utils');

function NotImplemented() {
    this.message = 'Not Implemented';
}

util.inherits(NotImplemented, RestberryError);

module.exports = NotImplemented;
