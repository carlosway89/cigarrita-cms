define(['models/parse'],function (ParseModel) {
    return Backbone.Collection.extend({
        _include: '',

        /**
         * Allows me to limit the total results
         */
        _limit: 0,

        /**
         * Allows me to set a where clause
         */
        _where: null,

        /**
         * Allows me to skip items, for pagination
         */
        _skip: 0,
        /**
         * Allows me to sort results
         */
        _sort: null,

        /**
         * Similar to a MySQL LIKE operator
         */
        _startsWith:null,

        /**
         * Allows me filter out objects with a particular key-value
         */
        _notEqualTo:null,

        url: function(){
            //return '/rest/header_fields/'+ $.xo.get_kid($('.cuerpo'),'prid');
        },
        model: ParseModel,
        defaults: {
            id: 1
        },
        initialize: function(options){
            this._parse_class_name = options.name;
            this._include = options.include?options.include:'';
            // set optional limit
            this._limit = options.limit?options.limit:0;
            // set optional where
            this._where = options.where?options.where:null;
            this._skip = options && options.skip?options.skip:0;
            this._sort = options && options.sort?options.sort:null;
            this._startsWith = options.startsWith?options.startsWith:null;
            this._notEqualTo = options.notEqualTo?options.notEqualTo:null;
        }
    });
});

