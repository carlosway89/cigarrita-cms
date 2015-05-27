define(
['text!templates/website/menu.php',
// 'views/menu-item',
'models/model',
'collections/collection',
'beans',
'channel'],
function(tmpl,menuModel,menuCollection,Beans,Channel) {
return Backbone.View.extend({
	template: Handlebars.compile(tmpl),
	beans: new Beans,
	debug: true,
	tagName:'div',
	className: '',
	menu_list:[],
	events: {},
	initialize: function(){},
	show_menu: function() {
		var that=this;
		var div=that.$el.find('#menu');
		that.beans.preloader(div);
		that.collection = new menuCollection({
			modelo:'menu'
		});
		that.collection.fetch({
			success: function(model,result,options){
				setTimeout(function(){
					$.each(model.models,function(item,model){
						var view = new menuItem({model:model});
						div.append( view.render().el );
					});
					that.beans.generate_data_table('Listmenu');
					div.parent().find('.preloader-div').remove();
 				},200);
			},
			error: function(model,xhr,options){
				console.log(xhr);
			}
		});
	},
	menu_site:function(){
 
		var that=this;
		
		that.menu_list=[];
		$.each(that.model.models,function(item,model){
			that.menu_list.push(model.attributes);													
		});
		Channel.trigger('menu.list.loaded');
		// that.render();
		that.$el.html( Handlebars.compile( tmpl)(that));


	},
	render: function() {
		this.$el.html( Handlebars.compile( tmpl)(this));
		return this;
	}
});
});