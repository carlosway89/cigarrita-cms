define([],function () {
        return Backbone.Model.extend({
            _session_token: '',
            defaults: {

            },
            urlRoot: '/rest/name',
            initialize: function (options) {
                this._where = options&&options.where?options.where:null;
                this._parse_class_name = options.name;
                if ( options.session_token )
                    this._session_token = options.session_token;
            }
        });
});