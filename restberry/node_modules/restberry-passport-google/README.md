Restberry-Passport-Google
=========================

[![](https://img.shields.io/npm/v/restberry-passport-google.svg)](https://www.npmjs.com/package/restberry-passport-google) [![](https://img.shields.io/npm/dm/restberry-passport-google.svg)](https://www.npmjs.com/package/restberry-passport-google)

Restberry Passport wrapper for passport-google-oauth.

## Install

```
npm install restberry-passport-google
```

## Usage

```
var restberryPassport = require('restberry-passport');

var auth = restberryPassport.config(function(auth) {
    ...
})
.use('google', {
    clientID: ...,
    clientSecret: ...,
    callbackHost: ...,
    returnURL: ...,
    scope: ...,
});

restberry.use(auth);
```

Two new routes have been created to the User:
- GET /login/google
- GET /login/google/callback

## Run the tests

The tests require you to have the node test app running on port 6000 and
the the index.html test file accessable at port 6001 on your localhost.
There is an nginx-conf file that is setup for this in the test directory.
Then simply run:

```
npm test
```

## Setup Google App

You can setup your own Google app at https://code.google.com/apis/console, under
APIs & auth and then credentials.
