var utils = require('restberry-utils');

module.exports = {

    devMessage: function(err) {
        var devMessage = '';
        if (err.req) {
            var data = utils.censorPassword(err.req.data);
            var method = err.req.method;
            var path = err.req.path;
            try {
                data = JSON.stringify(data);
            } catch (e) {
                data = JSON.stringify(e);
            }
            devMessage = 'Requested <' + method + '> <' + path + '> ' +
                         'with data <' + data + '> ';
        }
        devMessage += '<' + JSON.stringify(err) + '>';
        return devMessage;
    },

    error: function(err) {
        return {
            error: {
                statusCode: err.statusCode,
                property: this.property(err),
                title: err.title,
                message: err.message,
                devMessage: this.devMessage(err),
            }
        };
    },

    property: function(err) {
        var property = '';
        if (err.property) {
            property = err.property;
        } else if (err.errors) {
            if (err.errors.type && err.errors.type.path) {
                property = err.errors.type.path;
            } else {
                property = Object.keys(err.errors)[0];
            }
        } else if (err.modelName) {
            property = err.modelName;
        }
        property = property.replace(/\.\d+\./, '.');
        property = property.replace(/\..*/, '');
        return property;
    },

};
