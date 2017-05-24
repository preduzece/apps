module.exports = {
    BadRequest: require('./lib/badrequest'),
    BadRequestInvalidInput: require('./lib/badrequestinvalidinput'),
    BadRequestMissingField: require('./lib/badrequestmissingfield'),
    BadRequestValidation: require('./lib/badrequestvalidation'),
    Conflict: require('./lib/conflict'),
    NotImplemented: require('./lib/notimplemented'),
    NotFound: require('./lib/notfound'),
    InternalServerError: require('./lib/internalservererror'),
    Unauthenticated: require('./lib/unauthenticated'),
    Forbidden: require('./lib/forbidden'),
};
