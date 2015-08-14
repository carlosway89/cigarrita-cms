

cigarritaApp.run(function($route, $rootScope, $location, $anchorScroll, $routeParams) {

  // $rootScope.$on('$routeChangeSuccess', function(newRoute, oldRoute) {
  //   $location.hash($routeParams.scrollTo);
  //   $anchorScroll();  
  // });

   $rootScope.$on('$routeChangeSuccess', function(newRoute, oldRoute) {
    
    // console.log('change',newRoute, oldRoute);

    route=oldRoute.params;
    
    if (!$.isEmptyObject(route)) {
      var link="/"+route.link;
    }else{
      var link=oldRoute.originalPath;
    }

    var item=$('.header-options').find("[href^='"+link+"']");


    setTimeout(function(){
      item.trigger('click');
    },1000);    

  });

  $rootScope.$on( "$viewContentLoaded", function(event) {
    // preloading site launch
  });

});




