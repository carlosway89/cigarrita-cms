define([],function () {
    return Backbone.Model.extend({
        defaults: {
        },
        modelo:'',
        urlRoot: function(){
        	return 'api/index/'+this.modelo;
        },
        initialize: function (options) {
        	this.modelo=options?(options.modelo?options.modelo:''):'';        	
        }
    });
});