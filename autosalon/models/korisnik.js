var mongoose = require('mongoose');
var Schema = mongoose.Schema;

var korisnikSchema = new Schema ({
	ime: String, przme: String,
	email: String, lozinka: String,
	role: String, dodat: Date
	}, 
	{ collection : 'korisnici' }
);

mongoose.model('korisnik', korisnikSchema);