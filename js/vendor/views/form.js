define(
['text!/templates/form.php',
'views/form-item',
'models/form',
'collections/form',
'beans',
'channel'],
function(tmpl,formItem,formModel,formCollection,Beans,Channel) {
return Backbone.View.extend({
	template: Handlebars.compile(tmpl),
	beans: new Beans,
	debug: true,
	tagName:'div',
	className: '',
	events: {},
	initialize: function(){},
	show_form: function() {
		var that=this;
		var div=that.$el.find('#form');
		that.beans.preloader(div);
		that.collection = new formCollection();
		that.collection.fetch({
			success: function(model,result,options){
				setTimeout(function(){
					$.each(model.models,function(item,model){
						var view = new formItem({model:model});
						div.append( view.render().el );
					});
					that.beans.generate_data_table('Listform');
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
		this.show_form();
		return this;
	}
});
});