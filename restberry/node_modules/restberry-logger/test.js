var assert = require('assert');
var logger = require('./index');

describe('logger', function() {

    describe('error', function() {
        logger.error('127.0.0.1', '401', 'Unauthorized');
        logger.error('127.0.0.1', '401', {error: '401'});
    });

    describe('info', function() {
        logger.info('SESSION');
        logger.info('SESSION', 'login');
        logger.info('SESSION', 'login', '556c861906d05a29abe45130');
    });

    describe('success', function() {
        logger.success('127.0.0.1', '201', 0);
        logger.success('127.0.0.1', '201', 'Created');
        logger.success('127.0.0.1', '201', {id: '123'});
    });

    describe('req', function() {
        var req = {
            body: {
                email: 'test@restberry.com',
                password: 'asdf1234',
            },
            method: 'POST',
            connection: {
                remoteAddress: '192.168.0.1',
            },
            path: '/login',
        };
        logger.req(req);
        assert.equal(req.body.password, 'asdf1234');
        req = {
            method: 'GET',
            connection: {
                remoteAddress: '192.168.0.1',
            },
            params: {
                id: '123',
            },
            path: '/users/:id/foos',
        };
        logger.req(req);
        req = {
            body: {
                email: 'test@restberry.com',
            },
            method: 'PUT',
            connection: {
                remoteAddress: '192.168.0.1',
            },
            params: {
                id: '123',
            },
            path: '/users/:id/foos',
        };
        logger.req(req);
        req = {
            body: {},
            method: 'DELETE',
            connection: {
                remoteAddress: '192.168.0.1',
            },
            params: {
                id: '123',
            },
            path: '/users/:id',
        };
        logger.req(req);
    });

    describe('res', function() {
        var res = {
            req: {
                connection: {
                    remoteAddress: '192.168.0.1',
                },
            },
            statusCode: '201',
        };
        logger.res(res, {
            user: {
                email: 'test@restberry.com',
                password: 'asdf1234',
            },
        });
        res = {
            req: {
                connection: {
                    remoteAddress: '192.168.0.1',
                },
            },
            statusCode: '401',
        };
        logger.res(res, {
            error: {
                message: 'Unauthorized',
            },
        });
        res = {
            req: {
                connection: {
                    remoteAddress: '192.168.0.1',
                },
            },
            statusCode: '204',
        };
        logger.res(res);
        res = {
            req: {
                connection: {
                    remoteAddress: '192.168.0.1',
                },
            },
            statusCode: '200',
        };
        logger.res(res, {
            user: {
                email: 'test@restberry.com',
                nested: {
                    list: [
                        {
                            password: 'asdf1234'
                        },
                        {
                            nested: {
                                password: 'asdf1234'
                            },
                        },
                    ],
                },
            },
        });
    });

});
