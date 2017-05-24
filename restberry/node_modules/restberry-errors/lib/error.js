var util = require('util');

function RestberryError() {
    this.name = 'RestberryError';
}

util.inherits(RestberryError, Error);

module.exports = RestberryError;
