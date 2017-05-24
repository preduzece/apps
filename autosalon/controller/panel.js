var mongoose = require('mongoose');
var express = require('express');
var router = express.Router();

/* GET adminpanel. */
router.get('/', function(req, res) {

	if (req.session.admin) {

		mongoose.model('automobil').find( function (error, auti){
			mongoose.model('tip').populate(auti, {path: 'tip'}, 
				function (error, auti){ 

				mongoose.model('marka').populate(auti, {path: 'marka'},
					function (error, auti){

					var Korisnik = mongoose.model('korisnik');
					Korisnik.findById(req.session.admin, function (err, korisnik) {
					  	if (err) 
					  		return handleError(err);

					  	res.render('panel', { title: 'Adminpanel', 
	  						content: auti, admin: korisnik });
					});
	  			});
			});	
		});

	} else {

		res.render('login', { title: 'Login' });
	}
});

/* GET stats page. */
router.get('/stats', function(req, res) {

  	if (req.session.admin) {

  		var Korisnik = mongoose.model('korisnik');
		Korisnik.findById(req.session.admin, function (err, korisnik) {
		  	if (err) 
		  		return handleError(err);

		  	mongoose.model('korisnik').find(
				function (error, korisnici){

					res.render('stats', { title: 'Statistika', 
						content: korisnici, admin: korisnik });
				}
			);
		});
  	}
  	else
  		res.render('login', { title: 'Login' });
});

/* GET users page. */
router.get('/users', function(req, res) {

  	if (req.session.admin) {

  		var Korisnik = mongoose.model('korisnik');
		Korisnik.findById(req.session.admin, function (err, korisnik) {
		  	if (err) 
		  		return handleError(err);

		  	mongoose.model('korisnik').find(
				function (error, korisnici){

					res.render('users', { title: 'Korisnici', 
						content: korisnici, admin: korisnik });
				}
			);
		});
  	}
  	else
  		res.render('login', { title: 'Login' });
});

/* GET orders page. */
router.get('/orders', function(req, res) {

  	if (req.session.admin) {

  		var Korisnik = mongoose.model('korisnik');
		Korisnik.findById(req.session.admin, function (err, korisnik) {
		  	if (err) 
		  		return handleError(err);

		  	mongoose.model('porudzba').find(function (error, porudzbe){
		
				mongoose.model('korisnik').populate(porudzbe, {path: 'korisnik'}, 
					function (error, porudzbe){ 

					mongoose.model('automobil').populate(porudzbe, {path: 'automobil'},
						function (error, porudzbe){ 
							res.render('orders', { title: 'Korisnici', 
								content: porudzbe, admin: korisnik });
					});
				});	
			})
		});
  	}
  	else
  		res.render('login', { title: 'Login' });
});

/* POST admin login. */
router.post('/login', function(req, res) {

	var model = {
		email: req.param('email'),
		lozinka: req.param('pswd'),
		role: 'admin'
	}

	var Korisnik = mongoose.model('korisnik');
	Korisnik.findOne(model, function (err, user){

	  	if (err) 
	  		return handleError(err);

	  	if (user != null) {

		  	req.session.admin = user._id;
		  	req.session.cookie.maxAge  = 24*3600000;

		  	res.redirect('/autosalon/panel');
		} else {
			res.redirect('/autosalon');
		}
	});

});

/* GET admin logout. */
router.get('/logout', function(req, res) {

  	req.session.destroy(function(err) {
  		if (err) 
		  	return handleError(err);
		else
			res.redirect('/autosalon/panel');
  	});
});

module.exports = router;