var mongoose = require('mongoose');
var express = require('express');
var router = express.Router();

/* GET korisnicki listing. */
router.get('/', function(req, res) {

	mongoose.model('komentar').find(

		function (error, komentari){
			res.send(komentari);	
		}
	);
});

/* POST komentar create. */
router.post('/create', function(req, res) {

	var Komentar = mongoose.model('komentar');

	var komentarModel = {
		korisnik: req.session.user,
		automobil: req.param('automobil'),
		sadrzaj: req.param('sadrzaj'),
		nadimak: req.param('nadimak'),
		dodat: new Date()
	}

	Komentar.create(komentarModel, 
		function (err, small) {
	  	if (err) return handleError(err);

	  	res.redirect('/autosalon/');
	});

});

/* POST komentar delete. */
router.post('/delete', function(req, res) {

	var Komentar = mongoose.model('komentar');

	Komentar.remove({_id: req.param('id')}, 
		function (err, small) {
	  		if (err) return handleError(err);

	  	res.send('OK');
	});

});

module.exports = router;