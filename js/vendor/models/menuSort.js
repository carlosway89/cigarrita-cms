define([],function () {
    return Backbone.Model.extend({
        defaults: {
        },
        modelo:'',
        urlRoot: function(){
        	return 'api/menuSort/';
        },
        initialize: function (options) {      	
        }
    });
});