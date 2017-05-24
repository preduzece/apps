Restberry-Passport-Twitter
=========================

[![](https://img.shields.io/npm/v/restberry-passport-twitter.svg)](https://www.npmjs.com/package/restberry-passport-twitter) [![](https://img.shields.io/npm/dm/restberry-passport-twitter.svg)](https://www.npmjs.com/package/restberry-passport-twitter)

Restberry Passport wrapper for passport-twitter.

## Install

```
npm install restberry-passport-twitter
```

## Usage

```
var restberryPassport = require('restberry-passport');

var auth = restberryPassport.config(function(auth) {
    ...
})
.use('twitter', {
    consumerKey: ...,
    consumerSecret: ...,
    callbackHost: ...,
    returnURL: ...,
});

restberry.use(auth);
```

Two new routes have been created to the User:
- GET /login/twitter
- GET /login/twitter/callback

## Known issues

You can't retrieve the email address from the Twitter API so right now it can't
be matched with an already existing account. Since the email is a required field
the email is set to the twitter username + '@restberry.com'.

## Run the tests

The tests require you to have the node test app running on port 6000 and
the the index.html test file accessable at port 6001 on your localhost.
There is an nginx-conf file that is setup for this in the test directory.
Then simply run:

```
npm test
```
