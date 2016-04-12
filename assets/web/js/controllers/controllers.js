cigarritaControllers.controller('indexCtrl',['$scope','Language','Links','Model',function($scope,Language,Links,Model){


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

    $scope.$on('form.contact.saving',function(event,contact_model){

      var record = new Model({
          model:'formContact'
      });
      
      var alert=$('#alert-msg');
      // console.log(contact_model);
      record = $.extend(record, contact_model);
      record.$save(function(record){

        alert.fadeOut();
        setTimeout(function(){
            alert.fadeIn();
        },1000);

        // console.log(record);

      });

    });

    $('.selection.dropdown').dropdown();

    

}]);
cigarritaControllers.controller('homeCtrl',['$scope','Content','$route','$rootScope',function($scope,Content,$route,$rootScope){


  
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
      },300);
      

    });

  }

  page();


  $scope.$on('language.changed', function() {
      page();
  });


}]);

cigarritaControllers.controller('pageCtrl',['$scope','Content','Language','$route',function($scope,Content,Language,$route){

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
    },function(){
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


}]);
cigarritaControllers.controller('singleCtrl',['$scope','Post','Language','$route',function($scope,Post,Language,$route){

  var post_page=function(){
    
    // console.log($route.current.params);

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


