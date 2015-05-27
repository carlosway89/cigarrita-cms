define(
[
'models/model',
'collections/collection',
'beans',
'channel'],
function(Model,Collection,Beans,Channel) {
return Backbone.View.extend({
	// template: Handlebars.compile(tmpl),
	beans: new Beans,
	debug: true,
	tagName:'div',
	className: '',
	single_post:[],
	link:'',
	events: {
		'submit #save_post':'posting',
		'submit #save_language':'language',
		'click #selector_modal_media':'selector_media',
		'click #new_modal_uploading':'new_uploading',
		'click #close_modal':'close_modal'
	},
	initialize: function(options){
		this.single_post=options.post;
	},
	close_modal:function(){

		this.$el.find('#modal_post').modal('hide');

	},
	posting:function(event){
		
		event.preventDefault();
		event.stopImmediatePropagation();
		this.save_post('post');

	},
	language:function(event){
		event.preventDefault();
		event.stopImmediatePropagation();
		this.save_post('language');

	},
	new_uploading:function(){

		var that=this;

		$('#buttons_image_selector').hide();
		$('.selector_modal_media').hide();
		var upload=$('.new_modal_uploading');

		upload.show();
	},
	selector_media:function(){
		var that=this;
		$('#buttons_image_selector').hide();
		$('.new_modal_uploading').hide();
		var media=$('.selector_modal_media');
		media.show();
	},
	call_collection:function(modelo){

		var modelo=modelo;
		var that=this;

		var collection = new Collection({
				modelo:modelo
			});

			collection.fetch({
				success: function(model,result,options){
					
					setTimeout(function(){
						
						var options=$('.'+modelo+'-modal-select-panel');

						$.each(model.models,function(item,model){

							var link=model.attributes.link;
							var name=model.attributes.name;

							if (link) {
								var string='<div class="item text-center" data-value="'+link+'"><img src="'+link+'" style="height:70px" /></div>';
							}else{
								var string='<div class="item" data-value="'+name+'">'+name+'</div>';
							}							
							
							options.append(string);

						});	

						setTimeout(function(){
							$('#'+modelo+"-modal-dropdown")
							.dropdown({
								onChange:function(value, text, $choice){
			                        $('#modal_post').find('#background_file').attr('src',value);
			                        $('#modal_post').find('#image').val(value);

								}
							});
							
							$('#fileinput_modal_media')
							.fileinput()
							.on('change.bs.fileinput',function(event){
								event.stopImmediatePropagation();
							});

							$('#background_modal_input').on('change',function(event){

								event.stopImmediatePropagation();
								var files = event.target.files || event.dataTransfer.files;
							
								var img=files[0];
								
								var data = new FormData();

								data.append('images',img);

								// var serverUrl = 'https://api.parse.com/1/files/' + img.name;
								var serverUrl = 'api/upload'; 
								var imagen=that.$el.find('.fileinput-preview.thumbnail');
			                      $.ajax({
			                        type: "POST",
			                        beforeSend: function(request) {
			                          // request.setRequestHeader("X-Parse-Application-Id", 'PudrdGU0QlTFG1zsyMuFD3pYRAZncLN8Nw7wbRK2');
			                          // request.setRequestHeader("X-Parse-REST-API-Key", 'jbibmnMWYKrbymZhK3dW2PhvltsH5X89DKJDkAXg');
			                          // request.setRequestHeader("Content-Type", img.type);
			                          imagen.addClass('ui button loading');
			                        },
			                        url: serverUrl,
			                        data: data,
			                        processData: false,
			                        contentType: false,
			                        success: function(data) {
			                        	that.$el.find('#background_file').attr('src',data.url);
			                        	that.$el.find('#image').val(data.url);
			                        	var data=data;

			                        	require(['models/model'],function(Model){

			                        		var model=new Model({
			                        			modelo:'media'
			                        		});

			                        		model.save({
			                        			link:data.url,
			                        			name:data.name
			                        		},{
			                        			success:function(){
			                        				imagen.removeClass('ui button loading');
			                        			}
			                        		});

			                        	});

			                        }
			                      });

								


							});

						},200);

	 				},200);


				},
				error: function(model,xhr,options){
					console.log(xhr);
					that.call_collection(modelo);
				}
			});

	},
	save_post:function(type){


		var that=this;

		var button=$('.'+type+'.btn-primary');

		button.addClass('ui basic loading button');

		require(['models/model'],function(Model){

			var data=that.get_data(type);
			console.log(data);
			
			if (data['id'+type]!="") {
        		var post=new Model({
					id:data['id'+type],
					modelo:type
				});
        	}else{
        		var post=new Model({
            		modelo:type
            	});
        	}
        	
			post.save(data,{
                success: function(model,result,options){
					
            		button.removeClass('ui basic loading button');

            		Channel.trigger('load.new.'+type,data['idmenu']);
            		$('#modal_'+type).modal('hide');
            		$('#modal_'+type).find('#subheader').destroy();
            		setTimeout(function(){						
						$('#modal_'+type).remove();
					},100);	
            		

            	
                },
                error:function(result){
                	var alert=that.$el.find('.alert');
                	alert.removeClass('alert-success').addClass('alert-warning');
                	alert.html('Error: try again please!!!');
                	setTimeout(function(){
        				that.$el.find('.alert').fadeIn();
        			},300);   

                	button.removeClass('ui basic loading button')
                }
            });	

		});

	},
	get_data:function(type){
		
		var that=this;

        data = {};

        $('.form-values.'+type).each(function(){

            data[ $(this).attr('id')] = $(this).val();
            // $(this).val('');

        });
        data['image']=data['image']==""?this.$el.find('#background_image').val():data['image'];
        
        data['subheader']=data['subheader']?data['subheader']:that.$el.find('#subheader').code();
        data['language']=this.beans.readCookie('language.choice.panel');
        data['min']=data['flag'];
        data['idmenu']=$('#save_form').find('#idmenu').val();

        return data;
    },
	show_modal: function() {
		var that=this;

		require(['text!templates/cms/modal-post.php'],function(tmpl){

			if (that.single_post==undefined) {
				that.single_post={
					estado:1,
					idcontent:$('#save_form').find('input#idcontent').val()
				}
				// that.single_post.estado=0;
			};
			// console.log(that.single_post);
			that.$el.html( Handlebars.compile(tmpl)(that));

			that.call_collection('media');

			that.$el.find('#post_togle').checkbox(that.single_post.estado==1?'check':'uncheck');
			that.$el.find('#post_togle').checkbox({
			    onChecked: function() {
			    	that.$el.find('#post_togle').find('input#estado').val(1);
			    },
			    onUnchecked: function() {
			    	that.$el.find('#post_togle').find('input#estado').val(0);
			    }
			});
			that.$el.find('#subheader').summernote({height: 200});
			
			setTimeout(function(){
				$('.list-post').removeClass('ui button loading');
				that.$el.find('#modal_post')
				.modal({detachable:false,closable:false,transition:'scale'})
		  		.modal('show');		
			},100);
		});
	},
	show_modal_language: function() {
		var that=this;

		require(['text!templates/cms/modal-language.php'],function(tmplLng){

			that.$el.html( Handlebars.compile(tmplLng)(that));	
			that.$el.find('#flag_selector').dropdown();	

			setTimeout(function(){
				that.$el.find('#modal_language')
				.modal({detachable:false,closable:false,transition:'scale'})
		  		.modal('show');

			},100);
		});
	},
	render: function() {
		this.$el.html( Handlebars.compile( tmpl)(this));
		
		return this;
	}
});
});