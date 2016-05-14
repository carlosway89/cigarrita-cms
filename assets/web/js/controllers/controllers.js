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

    
    // var links=function(){
    //   var obj_link={
    //     state:1,
    //     is_deleted:0,
    //     language:beans.readCookie('language.initial')
    //   };

    //   $scope.links=Model.query({
    //       model:'menu',
    //       id:'query',
    //       query:JSON.stringify(obj_link)
    //   });
    // }
    
    // links();

    // $scope.$on('language.changed', function() {
    //     links();
    // });

    // $('.selection.dropdown').dropdown();

    

}]);
cigarritaControllers.controller('homeCtrl',['$scope','Content','$route','$rootScope',function($scope,Content,$route,$rootScope){


  
  var pageid = $route.current.$$route.pageid;
  
  var seo = {
    title:$route.current.$$route.seo_title,
    description:$route.current.$$route.seo_description,
    keywords:$route.current.$$route.seo_keywords
  };

  if (seo.title!="") {
    $("title").html(seo.title);
  }
  if (seo.description!="") {
    $("meta[name='description']").attr("content",seo.description);
  }
  if (seo.keywords!="") {
    $("meta[name='keywords']").attr("content",seo.keywords);
  }

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

  var seo = {
    title:$route.current.$$route.seo_title,
    description:$route.current.$$route.seo_description,
    keywords:$route.current.$$route.seo_keywords
  };

  if (seo.title!="") {
    $("title").html(seo.title);
  }
  if (seo.description!="") {
    $("meta[name='description']").attr("content",seo.description);
  }
  if (seo.keywords!="") {
    $("meta[name='keywords']").attr("content",seo.keywords);
  }
  
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


