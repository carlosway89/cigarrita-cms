define(['models/form'],function (Model) {
  				    return Backbone.Collection.extend({
  				        url: function(){
  				            return 'api/form';
  				        },
  				        limit: 0,
  				        model: Model,
  				        defaults: {
  				            id: 1
  				        },
  				        initialize: function(){
  		
  				        }
  				    });
  				});