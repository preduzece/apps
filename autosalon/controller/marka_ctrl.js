var mongoose = require('mongoose');
var express = require('express');
var router = express.Router();

/* GET marke listing. */
router.get('/', function(req, res) {

	mongoose.model('marka').find( 
		function(err, marke){
			if (err) return handleError(err);
		res.send(marke); 
	});
});

/* GET marka by _id. */
router.get('/find', function(req, res) {
	mongoose.model('marka').findById(
		req.param('id'), function(error, marka){
		 	res.send(marka); 
	});
});

/* POST marka create. */
router.post('/create', function(req, res) {

	var Marka = mongoose.model('marka');

		var markaModel = {
			naziv: req.param('naziv'),
			opis: req.param('opis')
		}

		Marka.create(markaModel, function (err, small) {
		  	if (err) return handleError(err);

		  	res.redirect('/autosalon/panel');
		});

});

/* POST marka delete. */
router.post('/delete', function(req, res) {

	var Marka = mongoose.model('marka');

	Marka.remove({_id: req.param('id')}, 
		function (err, small) {
	  		if (err) return handleError(err);

	  	res.send('OK');
	});

});

module.exports = router;