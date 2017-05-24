var mongoose = require('mongoose');
var express = require('express');
var router = express.Router();

/* GET automobil by _id. */
router.get('/find', function(req, res) {
	mongoose.model('automobil').findById(
		req.param('id'), function(error, auti){
		 	res.send(auti); 
	});
});

/* GET automobil by model. */
router.get('/search', function(req, res) {

	var term = new RegExp(req.param('model'), 'i');

	if (req.session.user) {

		mongoose.model('automobil').find( {model: term},
			function(error, auti){

				mongoose.model('tip').populate(auti, {path: 'tip'}, 
				function (error, auti){ 

				mongoose.model('marka').populate(auti, {path: 'marka'},
					function (error, auti){ 
						res.send(auti); 
					});
			});	
		});
	} else {
		mongoose.model('automobil').find( {model: term}, '-_id',
			function(error, auti){

				mongoose.model('tip').populate(auti, {path: 'tip'}, 
				function (error, auti){ 

				mongoose.model('marka').populate(auti, {path: 'marka'},
					function (error, auti){ 
						res.send(auti); 
					});
			});	
		});
	}
});

/* GET automobil by marka. */
router.get('/sort', function(req, res) {

	if (req.session.user) {

		mongoose.model('automobil').find( {marka: req.param('marka')},
			function(error, auti){

				mongoose.model('tip').populate(auti, {path: 'tip'}, 
				function (error, auti){ 

				mongoose.model('marka').populate(auti, {path: 'marka'},
					function (error, auti){ 
						res.send(auti); 
					});
			});	
		});
	} else {
		mongoose.model('automobil').find( {marka: req.param('marka')}, 
			'-_id', function(error, auti){

				mongoose.model('tip').populate(auti, {path: 'tip'}, 
				function (error, auti){ 

				mongoose.model('marka').populate(auti, {path: 'marka'},
					function (error, auti){ 
						res.send(auti); 
					});
			});	
		});
	}
});

/* GET automobili listing. */
router.get('/', function(req, res) {
	mongoose.model('automobil').find( function (error, auti){
		
		mongoose.model('tip').populate(auti, {path: 'tip'}, 
			function (error, auti){ 

			mongoose.model('marka').populate(auti, {path: 'marka'},
				function (error, auti){ 
					res.send(auti); 
				});
		});	
	});
});

/* POST automobil create. */
router.post('/create', function(req, res) {

	var Auto = mongoose.model('automobil');

	if (req.param('idAuta') != '') {
		Auto.findById(req.param('idAuta'), 
			function (err, auto){

			  	auto.model = req.param('model');
				auto.tip = req.param('tip');
				auto.marka = req.param('marka');
				auto.cena = req.param('cena');
				auto.stanje = req.param('stanje');
				auto.opis = req.param('opis');

			  	auto.save();

			  	if (err) 
			  		return handleError(err);

			  	res.redirect('/autosalon/panel');
			}
		);
	} else {

		var autoModel = {
			model: req.param('model'),
			tip: req.param('tip'),
			marka: req.param('marka'),
			cena: req.param('cena'),
			stanje: req.param('stanje'),
			opis: req.param('opis'),
			dodat: new Date()
		}

		Auto.create(autoModel, function (err, small) {
		  	if (err) return handleError(err);

		  	res.redirect('/autosalon/panel');
		});
	}

});

/* POST automobil delete. */
router.post('/delete', function(req, res) {

	var Auto = mongoose.model('automobil');

	Auto.remove({_id: req.param('id')}, 
		function (err, small) {
	  		if (err) return handleError(err);

	  	res.send('OK');
	});

});

module.exports = router;