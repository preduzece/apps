var logger = require('restberry-logger');
var httpStatus = require('http-status');

module.exports = {

    login: function() {
        var self = this;
        return function(req, res, next) {
            var user = req.user;
            logger.info('SESSION', 'login', user.id);
            user.timestampLastLogIn = new Date();
            user.save(function() {
                user.expandJSON();
                user.toJSON(function(json) {
                    res._body = json;
                    next(json);
                });
            });
        };
    },

};
