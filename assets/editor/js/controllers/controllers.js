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
            header:"[Texto header]",
            subheader:"[Texto subheader]",
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

    $("#wrapper-pre-loader").show();
    $('.preloader').show();

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

    $("#wrapper-pre-loader").show();
    $('.preloader').show();

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

cigarritaControllers.controller('singleCtrl',['$scope','Post','Language','$route',function($scope,Post,Language,$route){

  var post_page=function(){
    
    // console.log($route.current.params);

    $("#wrapper-pre-loader").show();
    $('.preloader').show();
    
    $scope.post = Post.get({
      id:$route.current.params.id
    },function(data){
      console.log(data);
      setTimeout(function(){

        // if (!$('script[src="/themes/design/js/script.js"]').length) {
          var js = document.createElement("script");

          js.type = "text/javascript";
          js.src = '/themes/design/js/script.js';

          document.body.appendChild(js);
        // }        
        

        $('.loading-container').hide();
        $('.preloader').hide();
      },300);
      

    }).$promise.then(function(data) {
          // console.log(data);
    }, function(error) {
        window.location.href="/home";
    });

  }

  post_page();


  $scope.$on('language.changed', function() {
      post_page();
  });

}]);