var _ = require('underscore');
var assert = require('assert');
var errors = require('./index')

describe('errors', function() {

    describe('BadRequest', function() {

        it('no input', function(callback) {
            var d = {};
            errors.BadRequest(d, function(err) {
                var error = err.error;
                assert(error);
                assert.equal(error.property, '');
                assert.equal(error.statusCode, 400);
                assert.equal(error.title, 'Bad Request');
                var msg = 'There was an issue with the request.';
                assert.equal(error.message, msg);
                callback()
            });
        });

        it('title message', function(callback) {
            var d = {
                title: 'bar',
                message: 'foo',
            };
            errors.BadRequest(d, function(err) {
                var error = err.error;
                assert(error);
                assert.equal(error.statusCode, 400);
                assert.equal(error.title, d.title);
                assert.equal(error.message, d.message);
                callback()
            });
        });

        it('req', function(callback) {
            var d = {
                req: {
                    path: '/api/v1/foo',
                    method: 'GET',
                    data: {
                        name: '1',
                    },
                },
            };
            errors.BadRequest(d, function(err) {
                var error = err.error;
                assert(error);
                assert.equal(error.statusCode, 400);
                assert.equal(error.title, 'Bad Request');
                assert(error.devMessage.indexOf(d.req.path) >= 0);
                assert(error.devMessage.indexOf(d.req.method) >= 0);
                var json = JSON.stringify(d.req.data);
                assert(error.devMessage.indexOf(json) >= 0);
                callback()
            });
        });

    });

    describe('BadRequestInvalidInput', function() {

        it('no input', function(callback) {
            var d = {};
            errors.BadRequestInvalidInput(d, function(err) {
                var error = err.error;
                assert(error);
                assert.equal(error.property, '');
                assert.equal(error.statusCode, 400);
                assert.equal(error.title, 'Invalid Input');
                var msg = 'Recieved an invalid input field.';
                assert.equal(error.message, msg);
                callback()
            });
        });

        it('property', function(callback) {
            var d = {
                property: 'foo',
            };
            errors.BadRequestInvalidInput(d, function(err) {
                var error = err.error;
                assert(error);
                assert.equal(error.property, 'foo');
                assert.equal(error.statusCode, 400);
                assert.equal(error.title, 'Invalid Input');
                var msg = 'Recieved an invalid input field \'foo\'.';
                assert.equal(error.message, msg);
                callback()
            });
        });

        it('modelName', function(callback) {
            var d = {
                modelName: 'User',
            };
            errors.BadRequestInvalidInput(d, function(err) {
                var error = err.error;
                assert(error);
                assert.equal(error.property, 'User');
                assert.equal(error.statusCode, 400);
                assert.equal(error.title, 'Invalid Input');
                var msg = 'Recieved an invalid input field of \'User\'.';
                assert.equal(error.message, msg);
                callback()
            });
        });

        it('property modelName', function(callback) {
            var d = {
                modelName: 'User',
                property: 'foo',
            };
            errors.BadRequestInvalidInput(d, function(err) {
                var error = err.error;
                assert(error);
                assert.equal(error.property, 'foo');
                assert.equal(error.statusCode, 400);
                assert.equal(error.title, 'Invalid Input');
                var msg = 'Recieved an invalid input field \'foo\' ' +
                          'of \'User\'.';
                assert.equal(error.message, msg);
                callback()
            });
        });

    });

    describe('BadRequestMissingField', function() {

        it('no input', function(callback) {
            var d = {};
            errors.BadRequestMissingField(d, function(err) {
                var error = err.error;
                assert(error);
                assert.equal(error.property, '');
                assert.equal(error.statusCode, 400);
                assert.equal(error.title, 'Missing Field');
                var msg = 'Missing required field.';
                assert.equal(error.message, msg);
                callback()
            });
        });

        it('property', function(callback) {
            var d = {
                property: 'email',
            };
            errors.BadRequestMissingField(d, function(err) {
                var error = err.error;
                assert(error);
                assert.equal(error.property, 'email');
                assert.equal(error.statusCode, 400);
                assert.equal(error.title, 'Missing Field');
                var msg = 'Missing required field \'email\'.';
                assert.equal(error.message, msg);
                callback()
            });
        });

        it('modelName', function(callback) {
            var d = {
                modelName: 'User',
            };
            errors.BadRequestMissingField(d, function(err) {
                var error = err.error;
                assert(error);
                assert.equal(error.property, 'User');
                assert.equal(error.statusCode, 400);
                assert.equal(error.title, 'Missing Field');
                var msg = 'Missing required field of \'User\'.';
                assert.equal(error.message, msg);
                callback()
            });
        });

        it('property modelName', function(callback) {
            var d = {
                modelName: 'User',
                property: 'email',
            };
            errors.BadRequestMissingField(d, function(err) {
                var error = err.error;
                assert(error);
                assert.equal(error.property, 'email');
                assert.equal(error.statusCode, 400);
                assert.equal(error.title, 'Missing Field');
                var msg = 'Missing required field \'email\' ' +
                          'of \'User\'.';
                assert.equal(error.message, msg);
                callback()
            });
        });

    });

    describe('BadRequestValidation', function() {

        it('no input', function(callback) {
            var d = {};
            errors.BadRequestValidation(d, function(err) {
                var error = err.error;
                assert(error);
                assert.equal(error.property, '');
                assert.equal(error.statusCode, 400);
                assert.equal(error.title, 'Validation Error');
                var msg = 'Wasn\'t able to validate the input.';
                assert.equal(error.message, msg);
                callback()
            });
        });

        it('property', function(callback) {
            var d = {
                property: 'email',
            };
            errors.BadRequestValidation(d, function(err) {
                var error = err.error;
                assert(error);
                assert.equal(error.property, 'email');
                assert.equal(error.statusCode, 400);
                assert.equal(error.title, 'Validation Error');
                var msg = 'Wasn\'t able to validate the \'email\'.';
                assert.equal(error.message, msg);
                callback()
            });
        });

        it('modelName', function(callback) {
            var d = {
                modelName: 'User',
            };
            errors.BadRequestValidation(d, function(err) {
                var error = err.error;
                assert(error);
                assert.equal(error.property, 'User');
                assert.equal(error.statusCode, 400);
                assert.equal(error.title, 'Validation Error');
                var msg = 'Wasn\'t able to validate the input of \'User\'.';
                assert.equal(error.message, msg);
                callback()
            });
        });

        it('property modelName', function(callback) {
            var d = {
                property: 'email',
                modelName: 'User',
            };
            errors.BadRequestValidation(d, function(err) {
                var error = err.error;
                assert(error);
                assert.equal(error.property, 'email');
                assert.equal(error.statusCode, 400);
                assert.equal(error.title, 'Validation Error');
                var msg = 'Wasn\'t able to validate the \'email\' of \'User\'.';
                assert.equal(error.message, msg);
                callback()
            });
        });

    });

    describe('Conflict', function() {

        it('no input', function(callback) {
            var d = {};
            errors.Conflict(d, function(err) {
                var error = err.error;
                assert(error);
                assert.equal(error.property, '');
                assert.equal(error.statusCode, 409);
                assert.equal(error.title, 'Conflict');
                var msg = 'There aleady exists an object like this.';
                assert.equal(error.message, msg);
                callback()
            });
        });

        it('modelName', function(callback) {
            var d = {
                modelName: 'User',
            };
            errors.Conflict(d, function(err) {
                var error = err.error;
                assert(error);
                assert.equal(error.property, 'User');
                assert.equal(error.statusCode, 409);
                assert.equal(error.title, 'Conflict');
                var msg = 'There aleady exists a \'User\' like this.';
                assert.equal(error.message, msg);
                callback()
            });
        });

    });

    describe('Forbidden', function() {

        it('no input', function(callback) {
            var d = {};
            errors.Forbidden(d, function(err) {
                var error = err.error;
                assert(error);
                assert.equal(error.property, '');
                assert.equal(error.statusCode, 403);
                assert.equal(error.title, 'Forbidden');
                var msg = 'You are not authorized to perform this action.';
                assert.equal(error.message, msg);
                callback()
            });
        });

    });

    describe('InternalServerError', function() {

        it('no input', function(callback) {
            var d = {};
            errors.InternalServerError(d, function(err) {
                var error = err.error;
                assert(error);
                assert.equal(error.property, '');
                assert.equal(error.statusCode, 500);
                assert.equal(error.title, 'Internal Server Error');
                var msg = 'We\'re run into an unexpected problem, ' +
                          'please contact support!';
                assert.equal(error.message, msg);
                callback()
            });
        });

    });

    describe('NotFound', function() {

        it('no input', function(callback) {
            var d = {};
            errors.NotFound(d, function(err) {
                var error = err.error;
                assert(error);
                assert.equal(error.property, '');
                assert.equal(error.statusCode, 404);
                assert.equal(error.title, 'Not Found');
                var msg = 'Couldn\'t find any object.';
                assert.equal(error.message, msg);
                callback()
            });
        });

        it('modelName', function(callback) {
            var d = {
                modelName: 'User',
            };
            errors.NotFound(d, function(err) {
                var error = err.error;
                assert(error);
                assert.equal(error.property, 'User');
                assert.equal(error.statusCode, 404);
                assert.equal(error.title, 'Not Found');
                var msg = 'Couldn\'t find any \'User\' object.';
                assert.equal(error.message, msg);
                callback()
            });
        });

    });

    describe('Unauthenticated', function() {

        it('no input', function(callback) {
            var d = {};
            errors.Unauthenticated(d, function(err) {
                var error = err.error;
                assert(error);
                assert.equal(error.property, '');
                assert.equal(error.statusCode, 401);
                assert.equal(error.title, 'Unauthenticated');
                var msg = 'You need to be logged in to perform this action.';
                assert.equal(error.message, msg);
                callback()
            });
        });

    });

});
