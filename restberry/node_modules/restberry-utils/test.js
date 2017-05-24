var assert = require('assert');
var utils = require('./index');

describe('utils', function() {

    it('base64encode', function(callback) {
        var m = utils.base64encode;
        assert.equal(m('jlpicard:Changeme1'), 'amxwaWNhcmQ6Q2hhbmdlbWUx');
        assert.equal(m('materik:asdf'), 'bWF0ZXJpazphc2Rm');
        callback();
    });

    it('camelCaseStr', function(callback) {
        var m = utils.camelCaseStr;
        assert.equal(m('hej du'), 'hejDu');
        assert.equal(m('model name'), 'modelName');
        assert.equal(m('MODEL'), 'model');
        assert.equal(m('MODEL NAME'), 'modelName');
        assert.equal(m('hej pa dig din dumbom'), 'hejPaDigDinDumbom');
        assert.equal(m('hej_DA'), 'hejDa');
        callback();
    });

    it('censorPassword', function(callback) {
        var m = utils.censorPassword;
        assert.equal(m(undefined), undefined);
        assert.equal(m('asdf1234'), '**********');
        assert.deepEqual(m({password: 'asdf1234'}),
                         {password: '**********'});
        assert.deepEqual(m({name: 'myname', password: 'asdf1234'}),
                         {name: 'myname', password: '**********'});
        assert.deepEqual(m({nested: {password: 'asdf1234'}}),
                         {nested: {password: '**********'}});
        assert.deepEqual(m({nested: [{password: 'asdf1234'}, 1]}),
                         {nested: [{password: '**********'}, 1]});
        assert.deepEqual(m({nested: {password: {encrypt: 'asdf1234'}}}),
                         {nested: {password: '**********'}});
        callback();
    });

    it('dotGet', function(callback) {
        var m = utils.dotGet;
        var a = {a: 1};
        var x = m(a, 'a');
        var expected = 1;
        assert.deepEqual(x, expected);
        a = {a: {b: 1}};
        x = m(a, 'a.b');
        expected = 1;
        assert.deepEqual(x, expected);
        a = {a: {b: 1}};
        x = m(a, 'a.c');
        expected = undefined;
        assert.deepEqual(x, expected);
        a = {a: {b: 1, c: {d: 3}}};
        x = m(a, 'a.c.d');
        expected = 3;
        assert.deepEqual(x, expected);
        callback();
    });

    it('dotSet', function(callback) {
        var m = utils.dotSet;
        var a = {a: 1};
        a = m(a, 'a', 2);
        var expected = {a: 2};
        assert.deepEqual(a, expected);
        a = {a: 1};
        a = m(a, 'b', 2);
        expected = {a: 1, b: 2};
        assert.deepEqual(a, expected);
        a = {a: {b: 1}};
        a = m(a, 'a.b', 2);
        expected = {a: {b: 2}};
        assert.deepEqual(a, expected);
        a = {a: {b: 1}};
        a = m(a, 'a.c', 2);
        expected = {a: {b: 1, c: 2}};
        assert.deepEqual(a, expected);
        a = {a: {b: 1}};
        a = m(a, 'a.c.d', 2);
        expected = {a: {b: 1, c: {d: 2}}};
        assert.deepEqual(a, expected);
        a = {a: '123'};
        a = m(a, 'a.b', 1);
        expected = {a: {b: 1}};
        assert.deepEqual(a, expected);
        callback();
    });

    it('getPaths', function(callback) {
        var m = utils.getPaths;
        var x = {'x': 1, 'y': 2};
        assert.deepEqual(m(x), ['x', 'y']);
        x = {'x': 1, 'y': 2, 'z': 3};
        assert.deepEqual(m(x), ['x', 'y', 'z']);
        x = {'x': 1, 'y': {'x': 2, 'z': 3}};
        assert.deepEqual(m(x), ['x', 'y.x', 'y.z']);
        x = {'x': 1, 'y': {'x': {'z': 3}}};
        assert.deepEqual(m(x), ['x', 'y.x.z']);
        x = {'x': 1, 'y': {}};
        assert.deepEqual(m(x), ['x']);
        x = {'x': 1, 'y': [{'z': 1}]};
        assert.deepEqual(m(x), ['x', 'y.0.z']);
        x = {'x': 1, 'y': [{'z': 1}, {'z': 2}]};
        assert.deepEqual(m(x), ['x', 'y.0.z']);
        x = {'x': 1, 'y': [{'z': 1}, {'o': 2}]};
        assert.deepEqual(m(x), ['x', 'y.0.z', 'y.0.o']);
        x = {'x': 1, 'y': []};
        assert.deepEqual(m(x), ['x', 'y.0']);
        x = {'x': 1, 'y': ['a', 'b', 'c']};
        assert.deepEqual(m(x), ['x', 'y.0']);
        callback();
    });

    it('isValidMonth', function(callback) {
        var m = utils.isValidMonth;
        for (i = 1; i < 13; i++) {
            if (i < 10) {
                assert(m('2013-0' + i));
            } else {
                assert(m('2013-' + i));
            }
        }
        assert(m('2013-03'));
        assert(m('2013-11'));
        assert(m('2015-12'));
        assert(!m('0'));
        assert(!m('2-00'));
        assert(!m('2000-0'));
        assert(!m('2015-00'));
        assert(!m('2015-13'));
        assert(!m('2015-17'));
        assert(!m('2115-12'));
        assert(!m('2115-22'));
        assert(!m('3333-01'));
        callback();
    });

    it('isValidEmail', function(callback) {
        var m = utils.isValidEmail;
        assert(!m(null));
        assert(m('thematerik@gmail.com'));
        assert(m('materik@student.chalmers.se'));
        assert(m('erixs_21@hotmail.com'));
        assert(m('a@b.c'));
        assert(!m('a@b'));
        assert(!m('@b'));
        assert(!m('ab'));
        callback();
    });

    it('isValidURL', function(callback) {
        var m = utils.isValidURL;
        assert(!m(null));
        assert(m('http://materik.com'));
        assert(m('https://materik.com'));
        assert(m('http://www.materik.com'));
        assert(m('http://www.materik.com/hej'));
        assert(m('http://www.materik.com/#/projects'));
        assert(m('http://www.materik.com?a=b&c=d'));
        assert(!m('materik.com'));
        assert(!m('www.materik.com'));
        assert(!m('httpx://materik.com'));
        assert(!m('http:/materik.com'));
        assert(!m('http://www'));
        assert(!m('http://www.'));
        callback();
    });

    it('prependZeros', function(callback) {
        var m = utils.prependZeros;
        assert.equal(m(0, 1), '0');
        assert.equal(m(0, 2), '00');
        assert.equal(m(1 + 1, 2), '02');
        assert.equal(m('1', 1), '1');
        assert.equal(m('1', 2), '01');
        assert.equal(m('123', 2), '123');
        assert.equal(m('123', 3), '123');
        assert.equal(m('123', 4), '0123');
        assert.equal(m('123', 5), '00123');
        callback();
    });

    it('merge', function(callback) {
        var a = {a: 1};
        var b = {b: 2};
        var c = {c: 3, b: 3};
        var merger = {a: 1, b: 2, c: 3};
        assert.deepEqual(utils.merge(a, b, c), merger);
        a = {a: {a: 1}};
        b = {a: {b: 2}};
        merger = {a: {a: 1, b: 2}};
        assert.deepEqual(utils.merge(a, b), merger);
        a = {ids: {google: '321'}, email: '321'};
        b = {ids: {github: '123'}, email: '123'};
        merger = {ids: {github: '123', google: '321'}, email: '321'};
        assert.deepEqual(utils.merge(a, b), merger);
        callback();
    });

});
