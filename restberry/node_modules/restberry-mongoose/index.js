var _ = require('underscore');
var mongoose = require('mongoose');

function RestberryMongoose() {
    this._configured = false;
    this.mongoose = mongoose;
    this.ObjectId = mongoose.Schema.Types.ObjectId;
};

// TODO(materik): make nicer...
RestberryMongoose.prototype._getFieldNamesAll = function(schema) {
    var fields = [];
    var paths = Object.keys(schema.paths);
    for (i in paths) {
        var path = paths[i];
        var nestedSchema = schema.paths[path].schema;
        if (nestedSchema) {
            var nestedFields = this._getFieldNamesAll(nestedSchema);
            for (i in nestedFields) {
                fields.push(path + '.0.' + nestedFields[i]);
            }
        } else if (schema.paths[path].caster) {
            fields.push(path + '.0');
        } else {
            fields.push(path);
        }
    }
    var virtuals = Object.keys(schema.virtuals);
    fields = _.union(fields, virtuals);
    return _.without(fields, '_id', '__v');
};

RestberryMongoose.prototype._toObject = function(obj) {
    var self = this;
    obj = _.omit(obj, '_id', '__v');
    _.each(obj, function(val, key) {
        if (_.isArray(val)) {
            obj[key] = _.map(val, self._toObject);
        }
    });
    return obj;
};

RestberryMongoose.prototype.config = function(next) {
    if (!this._configured) {
        this._configured = true;
        if (next) {
            next(this);
        }
    }
    return this;
};

RestberryMongoose.prototype.connect = function(dbname) {
    mongoose.connect(dbname);
};

RestberryMongoose.prototype.find = function(model, query, options, next) {
    var _options = {
        skip: options.offset,
        limit: options.limit,
        sort: options.sort,
    };
    model.find(query, null, _options, next);
};

RestberryMongoose.prototype.findById = function(model, id, next) {
    model.findById(id, next);
};

RestberryMongoose.prototype.findOne = function(model, query, next) {
    model.findOne(query, next);
};

RestberryMongoose.prototype.get = function(name) {
    try {
        return mongoose.model(name);
    } catch (e) {
        // Do nothing...
    }
    return null;
};

RestberryMongoose.prototype.getFieldNamesAll = function(model) {
    return this._getFieldNamesAll(model.schema);
};

// TODO(materik): make nicer...
RestberryMongoose.prototype.getFieldNamesEditable = function(model) {
    var schema = model.schema;
    var fields = this.getFieldNamesAll(model);
    var editableFields = [];
    _.each(fields, function(fieldName) {
        if (_.contains(['id', '_id'], fieldName))  return;
        var field = schema.paths[fieldName];
        if (!field || !field.options.uneditable) {
            editableFields.push(fieldName);
        }
    });
    return editableFields;
};

// TODO(materik): make nicer...
RestberryMongoose.prototype.getFieldNamesHidden = function(model) {
    var schema = model.schema;
    var fields = this.getFieldNamesAll(model);
    var hiddenFields = ['password'];
    _.each(fields, function(fieldName) {
        var field = schema.paths[fieldName];
        if (!field || field.options.hidden) {
            hiddenFields.push(fieldName);
        }
    });
    return hiddenFields;
};

RestberryMongoose.prototype.getFieldsOfModels = function(model, next) {
    self = this;
    var fields = [];
    var paths = model.schema.paths;
    for (var fieldName in paths) {
        var isArray, ref;
        var field = paths[fieldName];
        if (field.options.ref) {
            ref = field.options.ref;
            isArray = false;
        } else if (field.caster && field.caster.options &&
                   field.caster.options.ref) {
            ref = field.caster.options.ref;
            isArray = true;
        } else {
            ref = null;
        }
        if (ref) {
            fields.push({
                fieldName: fieldName,
                model: self.restberry.model(ref),
                isArray: isArray,
            });
        }
    }
    next(fields);
},

RestberryMongoose.prototype.isConflictError = function(err) {
    return err.message && err.message.indexOf('E11000') > -1;
};

RestberryMongoose.prototype.isNotFoundError = function(err) {
    return err.message && err.message.indexOf('Cast to ObjectId') > -1;
};

RestberryMongoose.prototype.pluralName = function(model) {
    return model.collection.name;
};

// need interface
RestberryMongoose.prototype.getQueryIdInList = function(ids) {
    return {_id: {$in: ids}};
};

RestberryMongoose.prototype.remove = function(obj, next) {
    obj.remove(next);
};

RestberryMongoose.prototype.schema = function(schema) {
    return new mongoose.Schema(schema);
};

RestberryMongoose.prototype.save = function(obj, next) {
    obj.save(next);
};

RestberryMongoose.prototype.set = function(name, schema) {
    return mongoose.model(name, schema);
};

RestberryMongoose.prototype.singularName = function(model) {
    return model.modelName.toLowerCase();
};

RestberryMongoose.prototype.toObject = function(obj) {
    return this._toObject(obj.toObject());
};

module.exports = exports = new RestberryMongoose;
