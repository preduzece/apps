var mongoose = require('mongoose');
var express = require('express');
var router = express.Router();

/* GET tipovi listing. */
router.get('/', function(req, res) {

	mongoose.model('tip').find( 
		function(err, tipovi){
			if (err) return handleError(err);
			res.send(tipovi); 
	});
});

/* POST tip create. */
router.post('/create', function(req, res) {

	var Tip = mongoose.model('tip');

		var tipModel = {
			naziv: req.param('naziv'),
			opis: req.param('opis')
		}

		Tip.create(tipModel, function (err, small) {
		  	if (err) return handleError(err);

		  	res.redirect('/autosalon/panel');
		});

});

/* POST tip delete. */
router.post('/delete', function(req, res) {

	var Tip = mongoose.model('tip');

	Tip.remove({_id: req.param('id')}, 
		function (err, small) {
	  		if (err) return handleError(err);

	  	res.send('OK');
	});

});

module.exports = router;