Restberry-Passport-Local
========================

[![](https://img.shields.io/npm/v/restberry-passport-local.svg)](https://www.npmjs.com/package/restberry-passport-local) [![](https://img.shields.io/npm/dm/restberry-passport-local.svg)](https://www.npmjs.com/package/restberry-passport-local)

Restberry Passport wrapper for passport-local.

## Install

```
npm install restberry-passport-local
```

## Usage

```
var restberryPassport = require('restberry-passport');

var auth = restberryPassport.config(function(auth) {
    ...
})
.use('local', {
    passwordMinLength: 8,
});

restberry.use(auth);
```

This will add a email and a password field to the User and the possibility to
authenticate with those. One new routes have been created to the User:
- POST /login
