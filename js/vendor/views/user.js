define(
['text!/templates/user.php',
'views/user-item',
'models/user',
'collections/user',
'beans',
'channel'],
function(tmpl,userItem,userModel,userCollection,Beans,Channel) {
return Backbone.View.extend({
	template: Handlebars.compile(tmpl),
	beans: new Beans,
	debug: true,
	tagName:'div',
	className: '',
	events: {},
	initialize: function(){},
	show_user: function() {
		var that=this;
		var div=that.$el.find('#user');
		that.beans.preloader(div);
		that.collection = new userCollection();
		that.collection.fetch({
			success: function(model,result,options){
				setTimeout(function(){
					$.each(model.models,function(item,model){
						var view = new userItem({model:model});
						div.append( view.render().el );
					});
					that.beans.generate_data_table('Listuser');
					div.parent().find('.preloader-div').remove();
 				},200);
			},
			error: function(model,xhr,options){
				console.log(xhr);
			}
		});
	},
	render: function() {
		this.$el.html( Handlebars.compile( tmpl)(this));
		this.show_user();
		return this;
	}
});
});