define(
['text!/templates/content-item.php','beans','channel'],function(tmpl,Beans,Channel) {
return Backbone.View.extend({
	template: Handlebars.compile(tmpl),
	beans: new Beans,
	debug: true,
	tagName:'tr',
	events: {
		'click .delete':'delete'
	},
	delete:function(e){
		var that = this;
        e=e?e:window.event;
        e.preventDefault();
        // check with user
        var result = confirm('Delete Item?');
            if (result){
             	that.model.set({id:that.model.attributes.});
                that.model.destroy({
                    success: function(model,response,options){
                        that.remove();
                    },
                    error: function(model,response,options){
                    	console.log(response);
                    }
                });
            }
        
        return false;
	},
	initialize: function(){},
	render: function() {
		this.$el.html( Handlebars.compile( tmpl)(this));
		return this;
	}
});
});