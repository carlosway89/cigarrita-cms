var modal_options=function($scope,$http,$compile,$rootScope){



  

  $scope.save_external=function(model,$event){

    $event.stopImmediatePropagation();

    if (model.idblock) {
      var type="block";  
    }else{
      var type="post"; 
    }

    // model.subheader=$scope.editable[0].innerHTML;

    $rootScope.$broadcast('inline.saving.'+type,model); 
  }

  $scope.set_external_model=function(model){
    // $event.stopImmediatePropagation();
    //$scope.editable[0].innerHTML=model.subheader;
    $scope.posting=model;

  }

  $scope.new_external=function(category){
    var model={
            notclose:true,
            category:category,
            header:"[Texto Cabecera]",
            subheader:"[Texto Parrafo]",
            source:$base_url+"/assets/editor/images/default-image.jpg",
            language:beans.readCookie('language.initial')
          }
    //$scope.editable[0].innerHTML="[Texto Parrafo]";
    $rootScope.$broadcast('inline.saving.post',model);
    $scope.set_external_model(model);
  }

    $http.get($base_url+'/api/template/modal/cms').then(function(response) {
          var elemento=$('[ng-view]');
          // $(response.data).insertAfter(elemento);
          elemento.append(response.data);

          
    });
  

 

  $scope.$on('show.modal', function(event,data,data_scope) {

      $('#modal_post').find(".ul-sortable").sortable({
          //containment: "parent",
          items: "li:not(.new-external-modal)",
          cursor: "move",
          start:function(event, ui){
                startPosition = ui.item.prevAll().length;
          },
          update: function(event, ui) {
                  endPosition = ui.item.prevAll().length;
                  var json={};

                  console.log(event,ui,this);

                  $(event.target).find("[data-item-sortable]").each(function(index){
                    json[index+1]=$(this).attr('data-item-sortable');        
                  });

                  var serverUrl=$base_url+"/api/postSort";

                  json=JSON.stringify(json);

                  $.ajax({
                      type: "POST",
                      url: serverUrl,
                      data: json,
                      contentType: 'application/json; charset=utf-8',  
                      dataType: "json",              
                      success: function(data) {

                      }
                  });
                
            }
          });

      $scope.posting={
        state:1,
        source:''
      };
      
      var imagen=$('#modal_post').find('.fileinput-new.thumbnail');
      imagen.find('#counter_loader').remove();
      imagen.find('#alert_error_upload').remove();
      imagen.removeClass('ui btn loading');

      $(".selector-list-images").empty();
      $(".selector-list-images").html('<li class="sort-li-item" data-item-sortable="{{list_post.idpost}}" ng-repeat="list_post in block_posts.posts"><a ng-click="set_external_model(list_post,$event)" ng-class="list_post.idpost==posting.idpost?\'active\':\'\'"><img ng-src="{{list_post.source}}" /></a></li><li class="new-external-modal"><a ng-click="new_external(posting.category)"><i class="fa fa-plus"></i></a></li>');
  
      setTimeout(function(){
        $scope.block_posts=data_scope.block;        
        $scope.posting=data;
        $('#modal_post').find('img').attr('src',data.source);
        $scope.text_subheader=data.subheader;
        $compile(document.getElementById('modal_post'))($scope);
        // console.log($scope.posting);
        

        $('#modal_post')
        .modal_cw('show');  

        $('#modal_post').find('a[href="https://froala.com/wysiwyg-editor"]').remove();         

      },100);

      

  });

  $scope.$on('close.modal',function(){    

    $('#modal_post').modal_cw('hide');
  
  });

}

cigarritaControllers.controller('indexCtrl',['$rootScope','$scope','$compile','$http','Model',function($rootScope,$scope,$compile,$http,Model){


    // var obj_lang={
    //   estado:1,
    //   is_deleted:0
    // };

    // Model.query({
    //   model:'language',
    //   id:'query',
    //   query:JSON.stringify(obj_lang)
    // },function(data){
    //   $scope.current=beans.readCookie('language.initial');
    //   $scope.language=data;
    // });

    
    var links=function(){
      var obj_link={
        state:1,
        is_deleted:0,
        language:beans.readCookie('language.initial')
      };

      $scope.links=Model.query({
          model:'menu',
          id:'query',
          query:JSON.stringify(obj_link)
      });
    }
    
    //links();

    $scope.$on('language.changed', function() {
        links();
    });

    $scope.handle_saving=function(action){
      var btn=$('#save_external');
      var btn_close=$('#close_modal');
      
      if (action=="click") {
        btn_close.attr('disabled','disabled').hide();
        btn.attr('disabled','disabled').addClass('ui loading');
      }else{
        if (action=="saved") {
          var text=btn.html();
          btn.removeClass('ui loading').addClass('ui success').html('&#x2713;');
          setTimeout(function(){
              $rootScope.$broadcast('close.modal'); 
              btn.html(text);
              btn_close.removeAttr('disabled').show();
              btn.removeAttr('disabled').removeClass('ui success');
          },1000);          
        }else{
          if (action=="new") {
            var text=btn.html();
            btn.removeClass('ui loading').addClass('ui success').html('&#x2713;');
            setTimeout(function(){
                btn.html(text);
                btn_close.removeAttr('disabled').show();
                btn.removeAttr('disabled').removeClass('ui success');
            },1000); 
          }else{
            $rootScope.$broadcast('close.modal'); 
            btn_close.removeAttr('disabled').show();
            btn.removeAttr('disabled').removeClass('ui loading');
          }
          
        }
      }

    }

    var listener_block=$scope.$on('inline.saving.block', function(event,data) {
      
      $scope.save_block(data);
      $scope.handle_saving('click');
        
        
    });
    
    var listener_post=$scope.$on('inline.saving.post', function(event,data) {

      
      $scope.save_post(data);
      $scope.handle_saving('click');

        
    });

    $scope.$on('delete.item',function(event,data,element){
      $scope.delete_post(data,element);
    });


    var handle_error_post=0;
    var handle_error_block=0;
    
    $scope.save_post = function(post){

        if(!post.idpost){
            var record = new Model({
              model:'post'
            });

            record = $.extend(record, post);
            record.$save(
              function(record){
                if ($scope.$$childTail.page!="undefined") {
                  for (var i =$scope.$$childTail.page.length- 1; i >= 0; i--) {
                    if ($scope.$$childTail.page[i].category==record.category) {
                      $scope.$$childTail.page[i].posts.push(record);
                      break;
                      // var data={};
                      // data[record.position]=record;
                      // $scope.$$childTail.page[i].posts=$.extend($scope.$$childTail.page[i].posts, data);
                    }                
                  }
                }else{
                  for (var i =$scope.$$childHead.page.length- 1; i >= 0; i--) {
                    if ($scope.$$childHead.page[i].category==record.category) {
                      $scope.$$childHead.page[i].posts.push(record);
                      break;
                      // var data={};
                      // data[record.position]=record;
                      // $scope.$$childHead.page[i].posts=$.extend($scope.$$childHead.page[i].posts, data);
                    }                
                  }
                }

                if (post.notclose) {
                  $scope.handle_saving('new');
                }else{
                  $scope.handle_saving('saved');
                }
                
                handle_error_post=0;
              },
              function(err){
                setTimeout(function(){
                  handle_error_post=handle_error_post+1;
                  if (handle_error_post>3) {
                    alert('Error de Conección!!');
                    setTimeout(function(){
                      window.top.location.reload();
                    },2000);
                    
                  }else{
                    $scope.save_post(post);
                  }
                  
                },3000);
              }
            );

        }else{
            // var record = new Post({id:post.idpost});
            var record = new Model({
              model:'post',
              id:post.idpost
            });

            record = $.extend(record, post);
            record.$update(
              function(){
                $scope.handle_saving('saved');
                handle_error_post=0;
              },
              function(err){
                setTimeout(function(){
                  handle_error_post=handle_error_post+1;
                  if (handle_error_post>3) {
                    alert('Error de Conección!!');
                    setTimeout(function(){
                      window.top.location.reload();
                    },2000);
                  }else{
                    $scope.save_post(post);
                  }
                },3000);
                
              }
            );
        }
    }

    $scope.delete_post=function(post,element){

     var _post = new Model({
              model:'post',
              query:post.idpost,
              id:'safe'
      });
     
      element.fadeOut();

      _post.$remove(function(){    
            if ($scope.$$childTail.page!="undefined") {
              for (var i =$scope.$$childTail.page.length- 1; i >= 0; i--) {
                  if ($scope.$$childTail.page[i].category==_post.category) {
                    for (var j = $scope.$$childTail.page[i].posts.length - 1; j >= 0; j--) {
                       if ($scope.$$childTail.page[i].posts[j].idpost==_post.idpost) {                        
                        $scope.$$childTail.page[i].posts.splice(j,1);                        
                        break;
                       }
                    }

                  }               
              }
            }else{
              for (var i =$scope.$$childHead.page.length- 1; i >= 0; i--) {
                  if ($scope.$$childHead.page[i].category==_post.category) {
                    for (var j = $scope.$$childHead.page[i].posts.length - 1; j >= 0; j--) {
                       if ($scope.$$childHead.page[i].posts[j].idpost==_post.idpost) {
                        $scope.$$childHead.page[i].posts.splice(j,1);                        
                        break;
                       }
                    }

                  }               
              }
            }

            
        });
      
    }

    $scope.save_block = function(block){

      if(!block.idblock){
          var rec_block = new Model({
              model:'block'
          });

          rec_block = $.extend(rec_block, block);

          rec_block.$save(
            function(data){
              $scope.handle_saving('saved');
              handle_error_block=0;
            },
            function(err){
              setTimeout(function(){
                  handle_error_block=handle_error_block+1;
                  if (handle_error_block>3) {
                    alert('Error de Conección!!');
                    setTimeout(function(){
                      window.top.location.reload();
                    },2000);
                  }else{
                    $scope.save_block(block);
                  }
              },3000);
                           
            }
          );
          

      }else{

          var rec_block = new Model({
              model:'block',
              id:block.idblock
            });

          rec_block = $.extend(rec_block, block);
          rec_block.$update(
            function(){
              $scope.handle_saving('saved');
              handle_error_block=0;
            },
            function(err){
              setTimeout(function(){
                handle_error_block=handle_error_block+1;
                if (handle_error_block>3) {
                  alert('Error de Conección!!');
                  setTimeout(function(){
                    window.top.location.reload();
                  },2000);
                }else{
                  $scope.save_block(block);
                }
              },3000);  
            }
          );
          
      }
    }

    $scope.check_status=function(){
      

     $.addBeat('transmition-check',function(){
      
          $.ajax({
              type: 'GET',
              url: $base_url+'/api/checkStatus',
              success: function (data) {
                  if (data.status=="logout") {
                    window.top.location.reload();
                  }        
              }
          });

      },60000);
    }

    $scope.check_status();

    $('.selection.dropdown').dropdown();
    

}]);
cigarritaControllers.controller('homeCtrl',['$scope','Content','$route','$rootScope','$compile','$http','Model',function($scope,Content,$route,$rootScope,$compile,$http,Model){



  var pageid = $route.current.$$route.pageid;


  var page=function(){
    
    var obj={
      language:beans.readCookie('language.initial'),
      state:1,
      idpage:pageid,
      is_deleted:0
    };

    $scope.page = Content.query({
      query:JSON.stringify(obj)
    },function(data){
      setTimeout(function(){
         // if (!$('script[src="/themes/design/js/script.js"]').length) {
          var js = document.createElement("script");

          js.type = "text/javascript";
          js.src = '/themes/design/js/script.js';

          document.body.appendChild(js);
        // }        
        

        $('.loading-container').hide();
        $('.preloader').hide();

        $(".element-sortable").sortable({
          //containment: "parent",
          //items: ">div:not(.inline-add)",
          cursor: "move",
          handle:".sort-item",
          start:function(event, ui){
                startPosition = ui.item.prevAll().length;
          },
          update: function(event, ui) {
                  endPosition = ui.item.prevAll().length;
                  var json={};

                  //console.log(event,ui,this);

                  $($(event.target).find("[data-item-sortable]").get().reverse()).each(function(index){
                    json[index+1]=$(this).attr('data-item-sortable');        
                  });

                  var serverUrl=$base_url+"/api/postSort";

                  json=JSON.stringify(json);

                  $.ajax({
                      type: "POST",
                      url: serverUrl,
                      data: json,
                      contentType: 'application/json; charset=utf-8',  
                      dataType: "json",              
                      success: function(data) {

                      }
                  });
                
            }
          });

      },1000);

    });

  }

  page();

  $scope.$on('language.changed', function() {
      page();
  });

  
  modal_options($scope,$http,$compile,$rootScope);



}]);

cigarritaControllers.controller('pageCtrl',['$scope','Content','Language','$route','$http','$compile','$rootScope',function($scope,Content,Language,$route,$http,$compile,$rootScope){

  var pageid = $route.current.$$route.pageid;

  var page=function(){

    var obj={
      language:beans.readCookie('language.initial'),
      state:1,
      idpage:pageid,
      is_deleted:0
    };

    $scope.page = Content.query({
      query:JSON.stringify(obj)
    },function(data){
      // if (!$('script[src="/themes/design/js/script.js"]').length) {
          var js = document.createElement("script");

          js.type = "text/javascript";
          js.src = '/themes/design/js/script.js';

          document.body.appendChild(js);
        // }        
        

        $('.loading-container').hide();
        $('.preloader').hide();
    });
    
  }

  page();
  
  $scope.$on('language.changed', function() {
      page();
  });

  modal_options($scope,$http,$compile,$rootScope);


}]);



cigarritaControllers.controller('contentCtrl', ['$scope','Model','Post','Menu','Block','Sort','Language','RunFile','Template', 'MultiLanguage',
  function($scope, Model, Post, Menu, Block, Sort, Language, RunFile, Template, MultiLanguage) {


    $(document).on('launch.edition', function(event,model) {
          console.log('external llamda del post',model);
          event.stopImmediatePropagation();
          $(document).off('launch.edition');


    });

    $('#website_frame').load(function(){

      var frame=$('#website_frame').contents().find("#external_links").hide();

      // frame.append("<link>");
      // var css = frame.children(":last");
      // css.attr({
      //       rel:  "stylesheet",
      //       type: "text/css",
      //       href: "/css/style_edit.css"
      // });




    });

  var contenidos=function(){

      var obj_lang={
        language:beans.readCookie('language.initial')
      };

    $scope.menu = Model.query({
      model:'content',
      // id:'query',
      query:JSON.stringify(obj_lang)
    },function(data){

        if (!data[0]) {
          $scope.webmaster=true;
          // $scope.current_lang=beans.readCookie('language.initial');
        }else{
          $scope.webmaster=data[0].user_admin;
          // $scope.current_lang=data[0].language;
        }
        
        console.log($scope.menu);
      });
      

      $('.content-details').fadeOut();
    };

    contenidos();

    $scope.current_lang=beans.readCookie('language.initial');

    $scope.language=Language.query({
      condition:'estado',
      attr:1
    },function(data){
        $('#language_panel_option').on('change',function(event){
          var value=$(this).val();
          beans.createCookie('language.initial',value,10);
          contenidos();
        });
    });

    // console.log(angular.fromJson(language));

    $("#sortable_menu").sortable({
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
              $("#sortable_menu li.ui-state-default").each(function(index){
                json[index+1]=$(this).find('a').attr('id');          
              });                

              var sort=new Sort();
              sort = $.extend(sort, json);
              sort.$save();
        }
      });


    $scope.save_post = function(post,block){
        // if($scope.bookmarkForm.$valid){

          $("#save_post").addClass('actived ui primary loading button');

            if(!post.idpost){
                var record = new Post();
                
                record.idcontent=block.idcontent;

                // post.subheader=$('#modal_post').find('#subheader').code();
                record = $.extend(record, post);
                // record.subheader=$('#modal_post').find('#subheader').code();
                
                record.$save(function(){
                    $scope.block.post.push(record);
                    $("#save_post").removeClass('actived ui primary loading button');
                   
                    beans.user_alert('post');
                });
            }else{
                var record = new Post({id:post.idpost});

                // post.subheader=$('#modal_post').find('#subheader').code();

                record = $.extend(record, post);
                // record.subheader=$('#modal_post').find('#subheader').code();
                

                record.$update(function(){
                  $("#save_post").removeClass('actived ui primary loading button');
                  
                  beans.user_alert('post');
                });
            }
        // }
    }



    $scope.save_content = function(menu,block){
        // if($scope.bookmarkForm.$valid){

          $("#save_content").addClass('actived ui primary loading button');

            if(!menu.idmenu){
                var rec_menu = new Menu();
                var rec_block = new Block();


                
                rec_menu = $.extend(rec_menu, menu);
                rec_menu.language=beans.readCookie('language.initial');
                
                // block.subheader=$('#save_form_content').find('#subheader').code();
                rec_block = $.extend(rec_block, block);

                rec_menu.imagen=block.background;

                rec_menu.$save(function(data){
                    // $scope.content=$.extend($scope.content,rec_menu);
                    
                    rec_block.idmenu=rec_menu.idmenu;

                    rec_block.$save(function(){
                      var objt={
                        content:[],
                        user_admin:$scope.webmaster
                      }

                      rec_menu=$.extend(rec_menu,objt);
                         
                      rec_menu.content[0]=rec_block; 

                      $scope.menu.push(rec_menu);
                      beans.user_alert('block');
                      RunFile.getAll();
                      // $scope.block=$.extend($scope.block,rec_block);
                      $("#save_content").removeClass('actived ui primary loading button');
                    });
                });
                

            }else{
                var rec_menu = new Menu({id:menu.idmenu});

                var rec_block = new Block({id:block.idcontent});
                

                rec_menu = $.extend(rec_menu, menu);

                // block.subheader=$('#save_form_content').find('#subheader').code();
                rec_block = $.extend(rec_block, block);

                rec_menu.imagen=block.background;

                rec_menu.$update(function(){
                  RunFile.getAll();
                });

                rec_block.$update(function(){
                  $("#save_content").removeClass('actived ui primary loading button');
                  beans.user_alert('block');
                });
                
            }
        // }
    }

    $scope.remove_content = function(menu){ 

        var rec_menu = new Menu({id:menu.idmenu});

        var rec_block = new Block({id:menu.content[0].idcontent})
        // rec_menu = $.extend(rec_menu, menu);
        rec_menu.$remove(function(){    
          rec_block.$remove();
          $('.content-details').fadeOut();

            for(var i=0,len=$scope.menu.length;i<len;i++){
                if($scope.menu[i].idmenu === menu.idmenu){ //Step 3
                    $scope.menu.splice(i,1);
                    break;
                }
            }
        });
    }
    
    $scope.isActive = function(estado){
        return estado=="1"?true:false;
    }

    $scope.open_content=function(menu){

      
      console.log(menu);
      $scope.content=menu;

      if (!menu) {
        $scope.content={
          user_admin:true,
          estado:0,
          minimal:0,
          template:'',
          background:''
        };
        $scope.block=false;

        $('#save_form_content').find('#subheader').code('');

      }else{

        $scope.block=menu.content[0];
        if (!$scope.block) {
          $scope.block={
            subheader:""
          }
        };

        $('#save_form_content').find('#subheader').code($scope.block.subheader);
      }

      $('.content-details').fadeIn(function(){

          $('#main').animate({  
              scrollTop: ($('.content-details').offset().top+100)
          }, 1000);

      });

     

      
    }
    $scope.close_content=function(){
      $('.content-details').slideUp();
    }


    $scope.remove_image=function(type){
      if (!type.image) {
        type.background=''; 
      }else{
        type.image=''; 
      }
       
    }

    $scope.open_post=function(post){
      

      if (!post) {
        var post={
          estado:0,
          image:''
        }
        $('#modal_post').find('#subheader').code('');

      }else{
        $('#modal_post').find('#subheader').code(post.subheader);
      }

      $scope.post=post;

      $('#modal_post')
        .modal_cw({
          closable:false,
          transition:'scale',
          selector: { 
            close: '.closing'
          }
        })
        .modal_cw('show'); 



    }

    $scope.has_image=function(image){

      return image==""?false:true;
    }

  
  }]);


cigarritaControllers.controller('languageCtrl', ['$scope', 'Model','MultiLanguage',
  function($scope, Model, MultiLanguage) {

    var obj_lang={
        get:'all'
      };

    $scope.language = Model.query({
      model:'language',
      id:'query',
      query:JSON.stringify(obj_lang)
    });

    $scope.isActive = function(estado){
        return estado=="1"?true:false;
    }

    $scope.show_modal=function(){

      $scope.lang=new Language();

      $('#modal_language')
        .modal_cw({
          closable:false,
          transition:'scale',
          selector: { 
            close: '.closing'
          }
        })
        .modal_cw('show'); 

      $('#flag_selector').dropdown();
    }


    $scope.save_lang=function(lang){

      

      if (!lang.idlanguage) {
        $("#save_lang").addClass('actived ui primary loading button');
        var rec = new Language();
        rec.estado=1;
        rec.flag=$('#flag').val();
        rec.min=$('#flag').val();
        rec = $.extend(rec, lang);
        rec.$save(function(){
          var lang= new MultiLanguage({attr:rec.flag});
          lang.$save();

          $scope.language.push(rec);
          $("#save_lang").removeClass('actived ui primary loading button');

          beans.user_alert('lang.new');
        });         

      }else{
        var rec = new Language({condition:lang.idlanguage});       

        if (lang.estado==1) {
          rec.estado=0;
          lang.estado=0;
        }else{
          rec.estado=1;
          lang.estado=1;
        }

        rec.$update(function(){
          beans.user_alert('lang.update');
        });


      }

    }



  }]);

cigarritaControllers.controller('messageCtrl', ['$scope', 'Model',
  function($scope, Model) {

    var obj_lang={
        get:'all'
      };

    $scope.message = Model.query({
      model:'form',
      id:'query',
      query:JSON.stringify(obj_lang)
    },function(data){
      setTimeout(function(){
        beans.generate_data_table('Listform');
      },200);
      
    });

    
  }]);
cigarritaControllers.controller('settingCtrl', ['$scope', 'MyUser','Model',
  function($scope, MyUser, Model) {



    $scope.user = MyUser.query(function(data){
    });

    Model.query({model:'configuration'},function(data){
      $scope.web=data[0];
    });


    $scope.save_user=function(user){

      $("#btn_save_user").addClass('actived ui primary loading button');
      if (user.new_password) {
        user.password=user.new_password;
      };
      
      user.$update(function(){
          $("#btn_save_user").removeClass('actived ui primary loading button');
          beans.user_alert('settings');

      });

    }
    $scope.save_web=function(web){
      $("#btn_save_web").addClass('actived ui primary loading button');
      
      web.$update({model:'configuration',id:web.idconfig},function(){
          $("#btn_save_web").removeClass('actived ui primary loading button');
          beans.user_alert('settings');
      });

    }

    $scope.show_account=true;

    $scope.show_panel=function(type){


      if (type=='website') {

        $scope.show_account=false;
        $scope.show_website=true;
      }else{

        $scope.show_account=true;
        $scope.show_website=false;

      }

    }

    
  }]);

cigarritaControllers.controller('facebookCtrl', ['$scope','Facebook','ApiFace','Json','Model',
  function($scope, Facebook,ApiFace,Json, Model) {

      /*
      get all the result from a page https://graph.facebook.com/cigarritaworker
  
      reference https://developers.facebook.com/docs/graph-api/reference/page/
        
      all the pages managed  Facebook.api('/{{app-name, id or url}}/accounts');
      */

       // Define user empty data :/
      $scope.user = {};
      
      // Defining user logged status
      $scope.logged = false;
      
      // And some fancy flags to display messages upon user status change
      $scope.byebye = false;
      $scope.salutation = false;
      
      Json.query(function(data){
        console.log('Json:',data);
      });

      ApiFace.query({id:'1431968783721316'},function(data){
        console.log('ApiFace:',data);
      });
      /**
       * Watch for Facebook to be ready.
       * There's also the event that could be used
       */
      $scope.$watch(
        function() {
          return Facebook.isReady();
        },
        function(newVal) {
          if (newVal)
            $scope.facebookReady = true;
        }
      );
      
      var userIsConnected = false;
      
      Facebook.getLoginStatus(function(response) {
        if (response.status == 'connected') {
          // console.log('accessToken',response.authResponse.accessToken);
          userIsConnected = true;
          $scope.logged = true;
              Facebook.api('/me',{accessToken:response.authResponse.accessToken}, function(response) {
                /**
                 * Using $scope.$apply since this happens outside angular framework.
                 */
                console.log(response);

                // $scope.$apply(function() {
                //   $scope.user = response;
                // });
                
              });

        }
      });
      
      /**
       * IntentLogin
       */
      $scope.IntentLogin = function() {
        if(!userIsConnected) {
          $scope.login();
        }
      };
      
      /**
       * Login
       */
       $scope.login = function() {
         Facebook.login(function(response) {
          if (response.status == 'connected') {
            $scope.logged = true;
            $scope.me();
          }
        
        },{scope: 'public_profile,manage_pages'});
       };
       
       /**
        * me 
        */
        $scope.me = function() {
          Facebook.api('/170064513039636?fields=cover,about,company_overview,mission,founded,emails,location,description,phone,category,posts.limit(5),events.limit(5).fields(cover,name,description,place).since(2014),photos.fields(picture,source),albums.limit(10).fields(name,photos.limit(10).fields(picture,source))', function(response) {
            /**
             * Using $scope.$apply since this happens outside angular framework.
             */
            console.log(response);

            $scope.$apply(function() {
              $scope.user = response;
            });
            
          });
        };
      
      /**
       * Logout
       */
      $scope.logout = function() {
        Facebook.logout(function() {
          $scope.$apply(function() {
            $scope.user   = {};
            $scope.logged = false;  
          });
        });
      }
      
      /**
       * Taking approach of Events :D
       */
      $scope.$on('Facebook:statusChange', function(ev, data) {
        console.log('Status: ', data);
        if (data.status == 'connected') {
          $scope.$apply(function() {
            $scope.salutation = true;
            $scope.byebye     = false;    
          });
        } else {
          $scope.$apply(function() {
            $scope.salutation = false;
            $scope.byebye     = true;
            
            // Dismiss byebye message after two seconds
            // $timeout(function() {
            //   $scope.byebye = false;
            // }, 2000)
          });
        }
        
        
      });

    
  }]);


