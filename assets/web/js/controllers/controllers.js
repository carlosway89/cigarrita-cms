cigarritaControllers.controller('indexCtrl',['$scope','Language','Links','Model',function($scope,Language,Links,Model){



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
    document.title=seo.title;
    $('meta[property="og:title"]').attr("content",seo.keywords);
  }

  var handle_error_page=0;
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
        
        setTimeout(function(){
          $('.loading-container').hide();
          $('.preloader').hide();
        },500);
        
      },300);
      

    },
    function(err){
        handle_error_page=handle_error_page+1;
        if (handle_error_page>3) {
            setTimeout(function(){
              alert("Error conection or offline!!");
            },2000);
        }else{
          page();
        }
                  
    });

  }

  page();


  $scope.$on('language.changed', function() {
      page();
  });


}]);

cigarritaControllers.controller('pageCtrl',['$scope','$rootScope','Content','Language','$route','$location',function($scope,$rootScope,Content,Language,$route,$location){

  var pageid = $route.current.$$route.pageid;

  var seo = {
    title:$route.current.$$route.seo_title,
    description:$route.current.$$route.seo_description,
    keywords:$route.current.$$route.seo_keywords
  };

  if (seo.title!="") {
    $("title").html(seo.title);
    document.title=seo.title;
    $('meta[property="og:title"]').attr("content",seo.title);
  }
  if (seo.description!="") {
    $("meta[name='description']").attr("content",seo.description);
    $('meta[property="og:description"]').attr("content",seo.description);
  }
  if (seo.keywords!="") {
    $("meta[name='keywords']").attr("content",seo.keywords);
  }

  var handle_error_page=0;

  var page=function(){

    $("#wrapper-pre-loader").show();
    $('.preloader').show();

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
        

        setTimeout(function(){
          $('.loading-container').hide();
          $('.preloader').hide();
        },500);
    },
    function(err){
        handle_error_page=handle_error_page+1;
        if (handle_error_page>3) {
            setTimeout(function(){
              alert("Error conection or offline!!");
            },2000);
        }else{
          page();
        }
                  
    });
    
  }

  page();
  
  $scope.$on('language.changed', function() {
      page();
  });


}]);
cigarritaControllers.controller('singleCtrl',['$scope','$rootScope','Content','Post','Language','$route','$location',function($scope,$rootScope,Content,Post,Language,$route,$location){

  var pageid = $route.current.$$route.pageid;

  var post_page=function(){
    
    // console.log($route.current.params);

    $("#wrapper-pre-loader").show();
    $('.preloader').show();
    
    $scope.post = Post.get({
      id:$route.current.params.id
    },function(data){
      console.log(data);
      $scope.post=data;
      setTimeout(function(){

        // if (!$('script[src="/themes/design/js/script.js"]').length) {
          var js = document.createElement("script");

          js.type = "text/javascript";
          js.src = '/themes/design/js/script.js';

          document.body.appendChild(js);
        // }        
        

        setTimeout(function(){
          $('.loading-container').hide();
          $('.preloader').hide();
        },500);
      },300);
      

    }).$promise.then(function(data) {
          // console.log(data);
    }, function(error) {
        window.location.href="/home";
    });

  }

  var handle_error_page=0;
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

    },
    function(err){
        handle_error_page=handle_error_page+1;
        if (handle_error_page>3) {
            setTimeout(function(){
              alert("Error conection or offline!!");
            },2000);
        }else{
          page();
        }
                  
    });

  }

  page();

  post_page();


  $scope.$on('language.changed', function() {
      page();
      post_page();
  });

}]);


