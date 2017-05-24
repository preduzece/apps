var mongoose = require('mongoose');
var express = require('express');
var router = express.Router();

/* GET tipovi listing. */
router.get('/tipovi', function(req, res) {

	mongoose.model('tip').find( 
		function(err, tipovi){
			if (err) return handleError(err);

		res.send(tipovi); 
	});
});

/* GET marke listing. */
router.get('/marke', function(req, res) {

	mongoose.model('marka').find( 
		function(err, marke){
			if (err) return handleError(err);

		res.send(marke); 
	});
});

/* GET stats listing. */
router.get('/stats', function(req, res) {

	mongoose.model('automobil').aggregate([

        { $project: { _id: 1, marka: 1}},
        {
            $group: {
                _id: '$marka', 
                count: {$sum: 1}
            }
        }
    ], function (err, auti) {
        if (err) {
            throw err;
        } else {
            res.send(auti);
        }
    });
});

/* GET automobili listing. */
router.get('/auti', function(req, res) {
	mongoose.model('automobil').find({}, '-_id', function(error, auti){

		mongoose.model('tip').populate(auti, {path: 'tip'}, 
			function (error, auti){ 

			mongoose.model('marka').populate(auti, {path: 'marka'},
				function (error, auti){ 
					
					if (typeof req.param('tip') != 'undefined') {

						switch(req.param('tip')){
							case 'json':
								res.send(auti); 
								break;

							case 'xml':
								res.format({
								  	'text/xml': function(){
								  		var data = '<rss><title>Autosalon</title><items>';

								  		auti.forEach(function(auto, index){
								  			data += '<item><model>'+auto.model+'</model>';
								  			data += '<price>'+auto.cena+'</price>';
								  			data += '<descript>'+auto.opis+'</descript>';
								  			data += '<mark>'+auto.marka.naziv+'</mark></item>';
								  		});

								  		data += '</items></rss>';

								    	res.send(data);
								  	}
								});
								break;

							default:
								res.status(406).send('Unknown data format!');
								break;
						}

					} else res.send(auti); 
			});
		});	
	});
});

module.exports = router;