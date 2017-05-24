var mongoose = require('mongoose');
var Schema = mongoose.Schema;

var porudzbaSchema = new Schema ({
		korisnik: {
			type: Schema.ObjectId,
			ref: 'korisnik'
		},
		automobil: {
			type: Schema.ObjectId,
			ref: 'automobil'
		},
		kreirana: Date
	}, 
	{ collection : 'porudzbe' }
);

mongoose.model('porudzba', porudzbaSchema);