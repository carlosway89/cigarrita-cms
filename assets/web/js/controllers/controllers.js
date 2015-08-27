cigarritaControllers.controller('indexCtrl',['$scope','Language','Links','Model',function($scope,Language,Links,Model){


    var obj_lang={
      state:1
    };

    Model.query({
      model:'language',
      id:'query',
      query:JSON.stringify(obj_lang)
    },function(data){
      $scope.current=beans.readCookie('language.initial');
      $scope.language=data;
    });

    
    var links=function(){
      var obj_link={
        state:1,
        language:beans.readCookie('language.initial')
      };

      $scope.links=Model.query({
          model:'menu',
          id:'query',
          query:JSON.stringify(obj_link)
      });
    }
    
    links();

    $scope.$on('language.changed', function() {
        links();
    });

    

}]);
cigarritaControllers.controller('homeCtrl',['$scope','Content','$route','$rootScope',function($scope,Content,$route,$rootScope){


  
  var pageid = $route.current.$$route.pageid;

  var fadeDuration=1000;
  var fadeDuration1=1000;
  var slideDuration=7000;
  var currentIndex=1;
  var nextIndex=1;



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
          $('#home .transito').css({opacity: 0.0});
          $('#home .transito:nth-child('+nextIndex+')').show().animate({opacity: 1.0}, fadeDuration1);
          $('#home .transito:nth-child('+nextIndex+') h1').transition('bounce');
          $('#home .transito:nth-child('+nextIndex+') img').transition('pulse');
          var timer = setInterval(nextSlide,slideDuration);
      },2000);

    });

  }

  page();


  $scope.$on('language.changed', function() {
      page();
  });


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

    // console.log(model);

    // parent.$(parent.document).trigger('launch.edition',model);

  }

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
    });
    
  }

  page();
  
  $scope.$on('language.changed', function() {
      page();
  });


}]);


