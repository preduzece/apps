var mongoose = require('mongoose');
var Schema = mongoose.Schema;

var markaSchema = new Schema ({
	naziv: String, opis: String
	}, 
	{ collection : 'marke' }
);

mongoose.model('marka', markaSchema);