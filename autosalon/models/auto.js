var mongoose = require('mongoose');
var Schema = mongoose.Schema;

var autoSchema = new Schema ({
		model: String, opis: String,
		cena: Number, stanje: Number,
		tip: {
			type: Schema.ObjectId,
			ref: 'tip'
		},
		marka: {
			type: Schema.ObjectId,
			ref: 'marka'
		},
		dodat: Date
	}, 
	{ collection : 'automobili' }
);

mongoose.model('automobil', autoSchema);