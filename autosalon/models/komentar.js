var mongoose = require('mongoose');
var Schema = mongoose.Schema;

var komentarSchema = new Schema ({
		nadimak: String, sadrzaj: String,
		korisnik: {
			type: Schema.ObjectId,
			ref: 'korisnik'
		},
		automobil: {
			type: Schema.ObjectId,
			ref: 'automobil'
		},
		dodat: Date
	}, 
	{ collection : 'komentari' }
);

mongoose.model('komentar', komentarSchema);