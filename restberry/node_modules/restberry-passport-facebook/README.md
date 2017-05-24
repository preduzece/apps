Restberry-Passport-Facebook
=========================

[![](https://img.shields.io/npm/v/restberry-passport-facebook.svg)](https://www.npmjs.com/package/restberry-passport-facebook) [![](https://img.shields.io/npm/dm/restberry-passport-facebook.svg)](https://www.npmjs.com/package/restberry-passport-facebook)

Restberry Passport wrapper for passport-facebook.

## Install

```
npm install restberry-passport-facebook
```

## Usage

```
var restberryPassport = require('restberry-passport');

var auth = restberryPassport.config(function(auth) {
    ...
})
.use('facebook', {
    clientID: ...,
    clientSecret: ...,
    callbackHost: ...,
    returnURL: ...,
    scope: ...,
});

restberry.use(auth);
```

Two new routes have been created to the User:
- GET /login/facebook
- GET /login/facebook/callback

## Run the tests

The tests require you to have the node test app running on port 6000 and
the the index.html test file accessable at port 6001 on your localhost.
There is an nginx-conf file that is setup for this in the test directory.
Then simply run:

```
npm test
```
