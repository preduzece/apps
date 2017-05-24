Restberry-Logger
================

[![](https://img.shields.io/npm/v/restberry-logger.svg)](https://www.npmjs.com/package/restberry-logger) [![](https://img.shields.io/npm/dm/restberry-logger.svg)](https://www.npmjs.com/package/restberry-logger)

Restberry HTTP logger.

## Install

```
npm install restberry-logger
```

## Usage

Log requests and responses from common NodeJS Web Application Frameworks like
Express and Restify.

```
var logger = require('restberry-logger');

var req = ... // request object from express (for example)
logger.req(req);
// 2014-05-09T19:58:41.726Z|172.16.122.129|POST|/api/v1/foo|<{
//     "name": "bar"
// }>

var res = ... // response object from express (for example)
var json = ... // the json object to return
logger.res(req, json);
// 2014-05-09T19:58:41.732Z|172.16.122.129|201|<{
//   "foo": {
//     "href": "/api/v1/teams/536d3371f927a55164ba1911",
//     "id": "536d3371f927a55164ba1911",
//     "name": "bar",
//   }
// }>
```

You May also use it to log info.

```
logger.info('RESTBERRY', 'this is my message');
// 2014-05-09T19:58:41.732Z|RESTBERRY|this is my message
```
