cigarritaControllers.controller('contentCtrl', ['$scope','Content','Post','Menu','Block','Sort','Language','RunFile','Template', 'MultiLanguage',
  function($scope, Content, Post, Menu, Block, Sort, Language, RunFile, Template, MultiLanguage) {


    $(document).on('data.object.launch', function(e) {
          console.log('external llamda del post');
    });

    var contenidos=function(){
      $scope.menu = Content.query({language:beans.readCookie('language.initial')},function(data){

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

                post.subheader=$('#modal_post').find('#subheader').code();
                record = $.extend(record, post);
                // record.subheader=$('#modal_post').find('#subheader').code();
                
                record.$save(function(){
                    $scope.block.post.push(record);
                    $("#save_post").removeClass('actived ui primary loading button');
                   
                    beans.user_alert('post');
                });
            }else{
                var record = new Post({id:post.idpost});

                post.subheader=$('#modal_post').find('#subheader').code();

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
                
                block.subheader=$('#save_form_content').find('#subheader').code();
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

                block.subheader=$('#save_form_content').find('#subheader').code();
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
        .modal({
          closable:false,
          transition:'scale',
          selector: { 
            close: '.closing'
          }
        })
        .modal('show'); 



    }

    $scope.has_image=function(image){

      return image==""?false:true;
    }

  
  }]);


cigarritaControllers.controller('homeCtrl',['$scope','Content',function($scope,Content){


  $scope.menu = Content.query({
    language:beans.readCookie('language.initial')
  },function(data){

    setTimeout(function(){
        $('#home .transito').css({opacity: 0.0});
        $('#home .transito:nth-child('+nextIndex+')').show().animate({opacity: 1.0}, fadeDuration1);
        $('#home .transito:nth-child('+nextIndex+') h1').transition('bounce');
        $('#home .transito:nth-child('+nextIndex+') img').transition('pulse');
        var timer = setInterval(nextSlide,slideDuration);
    },2000);

  });

  var fadeDuration=1000;
  var fadeDuration1=1000;
  var slideDuration=7000;
  var currentIndex=1;
  var nextIndex=1;

    var nextSlide=function(){

          nextIndex =currentIndex+1;

          if(nextIndex > $('#home .transito').length)
          {
            nextIndex =1;
          }
          $('#home .transito:nth-child('+nextIndex+')').show().animate({opacity: 1.0}, fadeDuration);
          $('#home .transito:nth-child('+nextIndex+') h1').transition('bounce');
          $('#home .transito:nth-child('+nextIndex+') img').transition('pulse');
          $('#home .transito:nth-child('+currentIndex+')').animate({opacity: 0.0}, fadeDuration).hide();
          currentIndex = nextIndex;

    };

  $scope.launchit=function(model){

    console.log(model);

    parent.$(parent.document).trigger('launch.edition',model);

  }

}]);

