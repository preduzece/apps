var mongoose = require('mongoose');
var express = require('express');
var router = express.Router();

/* GET korisnik. */
router.get('/', function(req, res) {

	if (req.session.admin)
		mongoose.model('korisnik').find(
			function (error, useri){
				res.send(useri);	
			}
		);
	else
		res.redirect('/autosalon/panel');
});

/* GET korisnik by _id. */
router.get('/find', function(req, res) {
	mongoose.model('korisnik').findById(
		req.param('id'), function(error, useri){
		 	res.send(useri); 
	});
});

/* POST korisnik create. */
router.post('/create', function(req, res) {

	var Korisnik = mongoose.model('korisnik');

	if (req.param('idUsera') != '') {
		Korisnik.findById(req.param('idUsera'), 
			function (err, korisnik){

		  	korisnik.ime = req.param('ime');
			korisnik.przme = req.param('przme');
			korisnik.email = req.param('email');
			korisnik.lozinka = req.param('pswd');

		  	korisnik.save();

		  	if (err) 
		  		return handleError(err);

		  	res.redirect('/autosalon/');
		});
	} else {

		var korisnikModel = {
			ime: req.param('ime'),
			przme: req.param('przme'),
			email: req.param('email'),
			lozinka: req.param('pswd'),
			dodat: new Date(),
			role: 'user'
		}

		Korisnik.create(korisnikModel, function (err, small) {
		  	if (err) return handleError(err);

		  	res.redirect('/autosalon/');
		});
	}

});

/* POST korisnik delete. */
router.post('/delete', function(req, res) {

	var Korisnik = mongoose.model('korisnik');

	Korisnik.remove({_id: req.param('korisnik')}, 
		function (err, small) {
	  		if (err) return handleError(err);

	  	res.send('OK');
	});

});

module.exports = router;