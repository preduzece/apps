var mongoose = require('mongoose');
var express = require('express');
var router = express.Router();

/* GET korisnicki listing. */
router.get('/', function(req, res) {

	if (req.session.admin)
		mongoose.model('porudzba').find(

			function (error, porudzbe){
				res.send(porudzbe);	
			}
		);
	else
		res.redirect('/autosalon/panel');
});

/* POST porudzba create. */
router.post('/create', function(req, res) {

	var Porudzba = mongoose.model('porudzba');

	var porudzbaModel = {
		korisnik: req.session.user,
		automobil: req.param('automobil'),
		kreirana: new Date()
	}

	Porudzba.create(porudzbaModel, 
		function (err, small) {
	  	if (err) return handleError(err);

	  	res.send('OK');
	});

});

/* POST porudzba delete. */
router.post('/delete', function(req, res) {

	var Porudzba = mongoose.model('porudzba');

	Porudzba.remove({_id: req.param('porudzba')}, 
		function (err, small) {
	  		if (err) return handleError(err);

	  	res.send('OK');
	});

});

module.exports = router;