define(
[
// 'text!templates/post.php',
// 'views/post-item',
'collections/collection',
'beans',
'channel'],
function(postCollection,Beans,Channel) {
return Backbone.View.extend({
	beans: new Beans,
	debug: true,
	tagName:'div',
	className: '',
	post_list:[],
	post_index:[],
	content_list:[],
	events: {
		'submit .form_contact':'save_post'
	},
	initialize: function(){},
	save_post: function(event) {

		event.preventDefault();

		var that=this;

		var button=that.$el.find('button');

		button.addClass('ui basic loading ');

		require(['models/form'],function(formModel){

			var model=new formModel();

			model.save( that.get_data(),{
                success: function(model,result,options){

                	that.$el.find('.alert').fadeIn();

                	button.removeClass('ui basic loading ');
                },
                error:function(result){
                	var alert=that.$el.find('.alert');
                	alert.removeClass('alert-success').addClass('alert-warning');
                	alert.html('Error: try again please!!!');
                	alert.fadeIn();

                	button.removeClass('ui basic loading ');
                }
            });	

		});
	},
	get_data: function(){

        data = {};

        this.$el.find('.form-values').each(function(){

            data[ $(this).attr('id')] = $(this).val();
            $(this).val('');

        });
        return data;
    },
	call_post:function(model){

		var that=this;

		var model_attr={
			header:model.header,
			subheader:model.subheader,
			background:model.background,
			template:model.template
		};
		
		that.$el.html('<img class="block-center" src="images/paragraph.png">');

		require(['text!templates/website/'+model_attr.template+'.php'],function(Principal){

			// that.collection = new postCollection({
			// 	where:[
			// 		'idcontent',
			// 		'language',
			// 		'estado'
			// 	],
			// 	attribute:[
			// 		model.idcontent,
			// 		that.beans.readCookie('language.choice')?that.beans.readCookie('language.choice'):that.beans.readCookie('language.initial'),
			// 		1
			// 	],
			// 	modelo:'post'
			// });

			// that.collection.fetch({
			// 	success: function(model,result,options){
			// 		setTimeout(function(){
						that.post_list=[];
						that.count=12/model.post.length;
						
						$.each(model.post,function(item,model){
								var index={
									'index':item,
									'count':that.count,
									'active':item==0?'active':''
								};
								// that.post_index.push(index);
								var object = $.extend(index, model);

								that.post_list.push(object);	
						});
						that.$el.html( Handlebars.compile( Principal)(that));

						// if (!result.length) {
						// 	that.$el.append('<img class="block-center" src="images/paragraph.png">');
						// }

						Channel.trigger(model_attr.template+'.loaded');

						// setTimeout(function(){
							that.$el.find('#header').html(model_attr.header);
        					that.$el.find('#subheader small').html(model_attr.subheader);
        					that.$el.find('#background').attr('src',model_attr.background);
        					that.$el.find('#principal_background').attr('style',model_attr.subheader);
						// },200);

						

	 	// 			},200);
			// 	},
			// 	error: function(model,xhr,options){
			// 		console.log(xhr);
			// 	}
			// });

		});

	},
	render: function() {
		this.$el.html( Handlebars.compile( tmpl)(this));
		this.show_post();
		return this;
	}
});
});