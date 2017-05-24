var mongoose = require('mongoose');
var express = require('express');
var router = express.Router();

/* GET about page. */
router.get('/about', function(req, res) {
  	res.render('about', { title: 'O nama' });
});

/* GET contact page. */
router.get('/contact', function(req, res) {
  	res.render('contact', { title: 'Kontakt' });
});

/* GET home page. */
router.get('/', function(req, res) {

	mongoose.model('automobil').find( function (error, auti){
		
		mongoose.model('tip').populate(auti, {path: 'tip'}, 
			function (error, auti){ 

			mongoose.model('marka').populate(auti, {path: 'marka'},
				function (error, auti){ 

				if (req.session.user) {

					var Korisnik = mongoose.model('korisnik');
					Korisnik.findById(req.session.user, 
						function (err, korisnik) {
						  	if (err) 
						  		return handleError(err);

						  	mongoose.model('komentar').find(
								function (error, komentari){

									mongoose.model('automobil').populate(komentari, {path: 'automobil'}, 
										function (error, komentari){

											res.render('index', { title: 'Pocetna',
						  						content: auti, comnts: komentari, user: korisnik });
										});	
								}
							).limit(5);
						}
					);
	  				
	  			} else {
	  				mongoose.model('komentar').find(
						function (error, komentari){

							mongoose.model('automobil').populate(komentari, {path: 'automobil'}, 
								function (error, komentari){

									res.render('index', { title: 'Pocetna', 
				  						content: auti, comnts: komentari, user: '' });
								});	
						}
					).limit(5);
	  			}
  			});
		});	
	});
});

/* GET contact page. */
router.get('/profile', function(req, res) {
	if (req.session.user) {

		var Korisnik = mongoose.model('korisnik');
		Korisnik.findById(req.session.user, 
			function (error, korisnik) {

			  	if (error) 
			  		return handleError(error);

			  	mongoose.model('porudzba').find({'korisnik': req.session.user }, 
			  		function (error, porudzbe){

			  		mongoose.model('automobil').populate(porudzbe, {path: 'automobil'}, 
						function (error, porudzbe){
				  			
						mongoose.model('tip').populate(porudzbe, {path: 'automobil.tip'}, 
							function (error, porudzbe){ 

							mongoose.model('marka').populate(porudzbe, {path: 'automobil.marka'},
								function (error, porudzbe){ 

									// pokupimo i parsiramo vesti iz feed-a
									var feedNews = ''; var feed = require("feed-read");

									feed("http://www.b92.net/info/rss/automobili.xml", 
										function (error, articles) {
											if (error) 
												feedNews = error;
											else
												feedNews = articles;

											res.render('profile', { title: 'Vas Profil', news: feedNews, 
												content: porudzbe, user: korisnik });
									});
				  			});
						});	
					});
				});
			}
		);
	}
  	else
  		res.redirect('/autosalon/');
});

/* POST user login. */
router.post('/login', function(req, res) {

	var model = {
		email: req.param('email'),
		lozinka: req.param('pswd')
	}

	var Korisnik = mongoose.model('korisnik');
	Korisnik.findOne(model, function (err, user){

	  	if (err) 
	  		return handleError(err);

	  	req.session.user = user._id;
	  	req.session.cookie.maxAge  = 24*3600000;

	  	res.redirect('/autosalon/');
	});
});

/* GET user logout. */
router.get('/logout', function(req, res) {

  	req.session.destroy(function(err) {
  		if (err) 
		  	return handleError(err);
		else
			res.redirect('/autosalon/');
  	});
});

module.exports = router;
