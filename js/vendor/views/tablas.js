define(
[
// 'text!templates/cms/language.php',
// 'views/language-item',
'models/model',
'collections/collection',
'beans',
'channel'],
function(Model,Collection,Beans,Channel) {
return Backbone.View.extend({
	template: null,
	beans: new Beans,
	debug: true,
	tagName:'div',
	className: '',
	model:null,
	array_list:[],
	// array_menu:[],
	array_post:[],
	array_data_menu:[],
	array_content:[],
	id_menu:'',
	attr:'',
	has_content:true,
	events: {
		'click .estado-lng':'change_estado',
		'click .new-item':'new_language',
		'change #language_panel_option':'change_language',
		'click .list-content':'list_content',
		'submit #save_form':'save_form',		
		'click .list-post':'list_post',
		'click #close':'close',
		'click #selector-from-media':'selector_media',
		'click #new-uploading':'new_uploading'

	},
	initialize: function(options){
		this.beans.createCookie('language.choice.panel','es',10);
		this.attr='';
		var that=this;
		// console.log(options.id_menu);
		this.id_menu=options.id_menu;

		Channel.on('load.new.post',function(idmenu){
			that.show_content();			      

			setTimeout(function(){
				that.$el.find('a#'+idmenu+'.list-content').trigger('click');
			},1000); 

			setTimeout(function(){
				that.$el.find('.alert').fadeIn();	
			},1000);

			setTimeout(function(){
				that.$el.find('.alert').fadeOut();	
			},5000);

			Channel.off('load.new.post');

			
		});

		Channel.on('load.open.post',function(idmenu){
			// that.show_content();			      

			that.$el.find('a#'+idmenu+'.list-content').trigger('click');


			Channel.off('load.open.post');
			
		});

		Channel.on('load.new.language',function(){
			that.show_items('language');
			Channel.off('load.new.language');
		});
		
		
	},
	new_uploading:function(event){

		var that=this;

		this.$el.find('.buttons-image-selector').hide();
		this.$el.find('.selector-from-media').hide();
		var upload=this.$el.find('.new-uploading');

		upload.show();
	},
	selector_media:function(){
		var that=this;
		this.$el.find('.buttons-image-selector').hide();
		this.$el.find('.new-uploading').hide();
		var media=this.$el.find('.selector-from-media');
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
						
						var options=that.$el.find('.'+modelo+'-select-panel');

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
							that.$el.find('#'+modelo+"-dropdown")
							.dropdown({
								onChange:function(value, text, $choice){
									that.$el.find('#background_file').attr('src',value);
			                        that.$el.find('#background').val(value);

								}
							});
							
							that.$el.find('#fileinput_media')
							.fileinput()
							.on('change.bs.fileinput',function(event){
								event.stopImmediatePropagation();								
							});

							that.$el.find('#background_input').on('change',function(event){
								
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
			                        xhr: function(){
								        // get the native XmlHttpRequest object
								        var xhr = $.ajaxSettings.xhr() ;
								        // set the onprogress event handler
								        xhr.upload.onprogress = function(evt){ console.log('progress:', evt.loaded/evt.total*100) } ;
								        // set the onload event handler
								        xhr.upload.onload = function(){ console.log('DONE!') } ;
								        // return the customized object
								        return xhr ;
								    },
			                        success: function(data) {
			                        	that.$el.find('#background_file').attr('src',data.url);
			                        	that.$el.find('#background').val(data.url);
			                        	// that.$el.find('#background.backup').val(data.url);
			                        	var data=data;
			                        	// console.log(data);
			                        	require(['models/model'],function(Model){

			                        		var model=new Model({
			                        			modelo:'media'
			                        		});

			                        		model.save({
			                        			link:data.url,
			                        			name:data.name
			                        		},{
			                        			beforeSend:function(xhr,settings){
			                        				// console.log(xhr,settings)
			                        				settings.xhr = function() { 

			                        					var xhr = $.ajaxSettings.xhr() ;
												        // set the onprogress event handler
												        xhr.upload.onprogress = function(evt){ console.log('progress:', evt.loaded/evt.total*100) } ;
												        // set the onload event handler
												        xhr.upload.onload = function(){ console.log('DONE!') } ;
												        // return the customized object
												        return xhr ;

										            }
			                        			},
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
	close:function(){
		this.$el.find('.content-details').fadeOut();
		this.$el.find('a.list-content').removeClass('actived');
	},
	new_language:function(event){

		var that=this;
		event.preventDefault();
		event.stopImmediatePropagation();

		require(['views/modal-post'],function(Modal){

			var view=new Modal({
				el:that.$el.find('#language_modal'),
				post:'language'
			});
			view.show_modal_language();		
	  	
		});

	},
	change_estado:function(event){
		event.preventDefault();

		var link=$(event.currentTarget);

		event.stopImmediatePropagation();

		
		this.set_estado(link);

	},
	save_form:function(event) {

		event.preventDefault();

		event.stopImmediatePropagation();

		var that=this;

		var button=that.$el.find('button.btn-primary');

		button.addClass('ui basic loading button');

		require(['models/model','models/url'],function(Model,URL){

			var data=that.get_data('save_form');

			

			if (data['idmenu']!="") {
        		var menu=new Model({
					id:data['idmenu'],
					modelo:'menu'
				});

        	}else{
        		
        		var menu=new Model({
            		modelo:'menu'
            	});

        	}

        	var url=new URL();
			// console.log(data);


			menu.save( {
				language:that.beans.readCookie('language.choice.panel')?that.beans.readCookie('language.choice.panel'):that.beans.readCookie('language.initial'),
				estado:data['estado'],
				name:data['name'],
				url:data['url']
			},{
                success: function(model,result,options){
                	// console.log(model,result);

                	if (data['idcontent']!="") {
                		var content=new Model({
	                		id:data['idcontent'],
	                		modelo:'content'
	                	});
                	}else{
                		data['idmenu']=model.attributes.idmenu;
                		var content=new Model({
	                		modelo:'content'
	                	});
                	}
                	

                	content.save( data,{
                		success: function(model,result,options){
                			button.removeClass('ui basic loading button');
                			Channel.trigger('load.new.post',data['idmenu']);
                			if (typeof(url) != "undefined") {
	                			setTimeout(function(){
	                				url.save(null);     
	                			},200);
	                		}
                			        			
                		},
                		error:function(){
                			var alert=that.$el.find('.alert');
		                	alert.removeClass('alert-success').addClass('alert-warning');
		                	alert.html('Error: try again please!!!');

		                	setTimeout(function(){
                				that.$el.find('.alert').fadeIn();
                			},300);   
		                	button.removeClass('ui basic loading button');

                		}

                	});
                },
                error:function(result){
                	var alert=that.$el.find('.alert');
                	alert.removeClass('alert-success').addClass('alert-warning');
                	alert.html('Error: try again please!!!');
                	setTimeout(function(){
        				that.$el.find('.alert').fadeIn();
        			},300);   
                	button.removeClass('ui basic loading button');
                }
            });	

		});
	},

	get_data: function(form){

        data = {};



        this.$el.find('#'+form).find('.form-values').each(function(){

            data[ $(this).attr('id')] = $(this).val();
            // $(this).val('');

        });

        data['background']=data['background']==""?this.$el.find('#background_image').val():data['background'];

        data['subheader']=data['subheader']?data['subheader']:this.$el.find('#subheader').code();
        data['language']=this.beans.readCookie('language.choice.panel')?this.beans.readCookie('language.choice.panel'):this.beans.readCookie('language.initial');

        return data;
    },
	change_language:function(event){

		event.preventDefault();

		var link=$(event.currentTarget);

		event.stopImmediatePropagation();

		var value=link.val();

		this.beans.createCookie('language.choice.panel',value,10);

		this.show_content();

	},
	set_estado:function(link){

		var id=link.attr('id');
		var state=link.find('label').html();
		var that=this;		
		var estado=0;
		var pos=link.attr('data-position');

		if (state=='Activate') {
			estado=1;
		}
		console.log(this.attr);

		this.model=new Model({
			id:id,
			modelo:'language'
		});
		this.model.save( {
			estado:estado
			},{
            success: function(model,result,options){
            	that.show_items('language');

            }
        });
	},
	show_items: function(attr) {
		var that=this;

		var bread=attr;
		if (attr=='form') {
			var bread='messages';
		};
		$('#bread_pos').html(bread);
		this.attr=attr;
		// var div=that.$el.find('#language');
		// that.that.beans.preloader(div);
		require(['text!templates/cms/'+attr+'.php'],function(Template){
			var collection = new Collection({
				modelo:attr
			});
			
			collection.fetch({
				success: function(model,result,options){
					that.array_list=[];
					setTimeout(function(){
						
						
						$.each(model.models,function(item,model){
							var index={
									'index':item,
									'active':model.attributes.estado==1?'active':'desactive',
									'estados':model.attributes.estado==1?'Deactivate':'Activate',
									'class':model.attributes.estado==1?'danger':'success'
								};
							var object = $.extend(index, model.attributes);

							that.array_list.push(object);

						});	
						that.template=Template;
						that.$el.html( Handlebars.compile( Template)(that));
						that.beans.generate_data_table('List'+that.attr);
						$('.panel-content').removeClass('ui button loading');
	 				},200);
				},
				error: function(model,xhr,options){
					console.log(xhr);
					that.show_items(that.attr);
				}
			});

		});

	},
	show_content:function(callback){
		var that=this;

		

		$('#bread_pos').html('pages');
		

		require(['text!templates/cms/content.php','collections/content'],function(Template,Contenido){

			var cont=new Contenido({
				where:'language',
				attribute:that.beans.readCookie('language.choice.panel')?that.beans.readCookie('language.choice.panel'):that.beans.readCookie('language.initial')
			});

			cont.fetch({
				success:function(model,result,options){
					
					that.array_menu=[];
					// that.array_content=[];
					// that.array_post=[];

					/*code optimization to array*/
					var i=0;
					var n=model.models.length;
					while (i < n)
					{
						var index={
							'active':model.models[i].attributes.estado==1?'active':'desactive',
							'estados':model.models[i].attributes.estado==1?'Deactivate':'Activate',
							'class':model.models[i].attributes.estado==1?'danger':'success',
							'webmaster_user':model.models[i].attributes.user_admin
						};
						var object = $.extend(index, model.models[i].attributes);

						that.array_menu.push(object);

						++i;
					}



					/*end optimization*/


					// $.each(model.models,function(item,model){
					// 		var index={
					// 			// 'index':item,
					// 			'active':model.attributes.estado==1?'active':'desactive',
					// 			'estados':model.attributes.estado==1?'Deactivate':'Activate',
					// 			'class':model.attributes.estado==1?'danger':'success'

					// 		};
					// 		var object = $.extend(index, model.attributes);

					// 		that.array_menu.push(object);

					// });

					that.template=Template;


					// setTimeout(function(){
						that.$el.html( Handlebars.compile( Template)(that));
						that.call_languages();
						$('.panel-content').removeClass('ui button loading');
						var startPosition,endPosition;
						$(function() {
							if (that.id_menu) {
								Channel.trigger('load.open.post',that.id_menu);
								
							};

							that.$el.find("#sortable_menu").sortable({
								items: "li:not(.enabled-sortable)",
								cursor: "move",
								handle:".text-success",
								start:function(event, ui){
							        startPosition = ui.item.prevAll().length;
							        // console.log(startPosition);
							    },
							    update: function(event, ui) {
							        endPosition = ui.item.prevAll().length;
							        var json={};
						        	that.$el.find("#sortable_menu li.ui-state-default").each(function(index){
						        		json[index+1]=$(this).find('a').attr('id');				   
							        });
							        require(['models/menuSort'],function(MenuSort){
							        
								        sort=new MenuSort();
								        sort.save({
								        	json:json
								        },{
								        	success:function(data,result){								        		
								        		if (result.success) {
								        			that.show_content();
								        		}else{
								        			that.show_content();
								        		}
								        	}
								        });
								    });
							    }
							});

							that.$el.find("#sortable_menu").disableSelection();
						});
					// },100);


				}
			})



			// collection.fetch({
			// 	success: function(model,result,options){
					
			// 		that.array_menu=[];

			// 		setTimeout(function(){
						
						
			// 			$.each(model.models,function(item,model){
			// 				var index={
			// 						'index':item,
			// 						'active':model.attributes.estado==1?'active':'desactive',
			// 						'estados':model.attributes.estado==1?'Deactivate':'Activate',
			// 						'class':model.attributes.estado==1?'danger':'success'

			// 					};

			// 				var object = $.extend(index, model.attributes);

			// 				that.array_menu.push(object);

			// 			});	
			// 			that.template=Template;


			// 			setTimeout(function(){
			// 				that.$el.html( Handlebars.compile( Template)(that));
			// 				that.call_languages();
			// 				$('.panel-content').removeClass('ui button loading');
			// 			},100);

						
	 	// 			},100);
			// 	},
			// 	error: function(model,xhr,options){
			// 		console.log(xhr);
			// 		that.show_content();
			// 		return false;
			// 	}
			// });

		});

		

	},
	list_post:function(event){
		var link =$(event.currentTarget);
		var that=this;

		event.preventDefault();
		event.stopImmediatePropagation();
	

		link.addClass('ui button loading');

		require(['views/modal-post'],function(Modal){

			var view=new Modal({
				el:$('#modales'),
				post:that.array_post[link.attr('data-position')]
				// pos:that.array_data_menu.content[0].post[link.attr('data-position')]
			});

			view.show_modal();				

	  	
		});
		

	},
	list_content:function(event){

		var that=this;
		var link =$(event.currentTarget);



		event.preventDefault();


		event.stopImmediatePropagation();
		
		var event=event;
		

		this.$el.find('a.list-content').removeClass('actived');
		link.addClass('actived ui primary loading button');
		

		require(['text!templates/cms/content-new-form.php'],function(ContentForm){


			

			if (link.attr('id')=='new') {
				
				that.array_data_menu=[];
				that.has_content=false;

				
				that.array_data_menu={
					content:{
						"index":"0"
					}
				}
				
				// setTimeout(function(){

					var div_target =that.$el.find('.content-details');		
			
		            
					that.$el.find('.content-details').html( Handlebars.compile( ContentForm)(that));
					that.$el.find('.content-details').fadeIn();

					link.removeClass('ui primary loading button');

					that.$el.find('.col-form-content').removeClass('col-md-6').addClass('col-md-8 col-md-offset-2');

					that.$el.find('.toggle.checkbox').checkbox('uncheck');
					that.$el.find('.toggle.checkbox').checkbox({
					    onChecked: function() {
					    	that.$el.find('input#estado,input#minimal').val(1);
					    },
					    onUnchecked: function() {
					    	that.$el.find('input#estado,input#minimal').val(0);
					    }
					});
					$('#main').animate({  
		                scrollTop: (div_target.offset().top+100)
		            }, 1000);

					
					that.call_collection('template');
					that.call_collection('media');
					that.$el.find('#subheader').summernote({height: 200});
					

						

				// },100);
				
			}
			else{

				// console.log(that.array_menu);

				if ($.isEmptyObject(that.array_menu)) {
					window.location.reload();
				};

				that.array_content=[];
				// that.array_post=[];
				that.array_data_menu=[];
				
				// console.log(that.array_menu[link.attr('data-position')].content[0]);
				that.array_data_menu=that.array_menu[link.attr('data-position')];
				// that.array_content=that.array_menu[link.attr('data-position')].content;
				that.array_post=that.array_data_menu.content[0].post;
				// console.log(that.array_content,that.array_data_menu);
				
				if ($.isEmptyObject(that.array_data_menu.content[0])) {					
					that.has_content=false;
				}else{
					that.has_content=true;
				}

				
					
				setTimeout(function(){
					that.$el.find('.content-details').html( Handlebars.compile( ContentForm)(that));
					
					that.$el.find('.content-details').fadeIn();
					
					var div_target =that.$el.find('.content-details');		

		            $('#main').animate({  
		                scrollTop: (div_target.offset().top+100)
		            }, 1000);

					link.removeClass('ui primary loading button');

					that.$el.find('#content_toogle_estado')
					.checkbox(that.array_data_menu.estado==1?'check':'uncheck');
					that.$el.find('#content_toogle_minimal')
					.checkbox(that.array_data_menu.minimal==1?'check':'uncheck');

					that.$el.find('.toggle.checkbox').checkbox({
					    onChecked: function() {
					    	that.$el.find('input#estado,input#minimal').val(1);
					    },
					    onUnchecked: function() {
					    	that.$el.find('input#estado,input#minimal').val(0);
					    }
					});
					// that.$el.find('#subheader').summernote({height: 200});
					that.call_collection('template');
					that.call_collection('media');

					that.$el.find('#subheader').summernote({height: 200});
					

				},100);
						
			}

			

			
		});

	},
	
	call_languages:function(){
		var that=this;
	
		var collection = new Collection({
              modelo:'language'
            });

        collection.fetch({
          success: function(model,result,options){
            setTimeout(function(){
            	// that.$el.find('.ui.dropdown #language_panel_option').val('es');
              var view=that.$el.find('.menu.laguage-select-panel');
              view.empty();
              $.each(model.models,function(item,model){
                view.append('<div class="item" data-value="'+model.attributes.min+'"><i class="flag-icon-'+model.attributes.flag+' flag-icon"></i> '+model.attributes.name+'</div>');

              }); 
              that.$el.find('#language_drop').dropdown({});


              // that.$el.find('.ui.dropdown #language_panel_option').val('es');
            },200);
          },
          error: function(model,xhr,options){
            console.log(xhr);
            that.call_languages();
          }
        });

	},
	render: function() {
		// this.$el.html( Handlebars.compile( tmpl)(this));
		
		return this;
	}
});
});