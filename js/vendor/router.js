

cigarritaApp.run(function($route, $rootScope, $location, $anchorScroll, $routeParams) {


  $rootScope.$on( "$viewContentLoaded", function(event) {
    // preloading site launch
  });

  // $rootScope.$on('$routeChangeSuccess', function(newRoute, oldRoute) {
  //   $location.hash($routeParams.scrollTo);
  //   $anchorScroll();  
  // });

   $rootScope.$on('$routeChangeSuccess', function(newRoute, oldRoute) {
    
    if($location.hash()){
      $anchorScroll.yOffset = 100;
      $anchorScroll();
    } 

  });



});

cigarritaApp.config(['$routeProvider','$locationProvider',
  function($routeProvider,$locationProvider) {


    $locationProvider.html5Mode({
      enabled: true,
      requireBase: false
    });
    
    $routeProvider.
      when('/blog', {
        templateUrl: $base_url+'/api/template/blog',
        controller: 'blogCtrl',
        reloadOnSearch: false
      }).
      when('/:link', {
        templateUrl: $base_url+'/api/template/view/site', //router template with api
        controller: 'homeCtrl'
      }).
      otherwise({
        redirectTo: '/home'
      });

  }]);



