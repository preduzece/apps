var mongoose = require('mongoose');
var Schema = mongoose.Schema;

var tipSchema = new Schema ({
	naziv: String, opis: String
	}, 
	{ collection : 'tipovi' }
);

mongoose.model('tip', tipSchema);