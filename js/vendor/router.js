cigarritaApp.run(function($rootScope,$window) {

  $rootScope.$on( "$routeChangeStart", function(event, next, current) {
    // preloading site launch
  });

  $rootScope.$on( "$routeChangeSuccess", function(event, next, current) {
    // preloading site remove

    // if (next.originalPath=="/home") {
      console.log('scroll',next.originalPath);
    // };

  });
});

cigarritaApp.config(['$routeProvider','$locationProvider',
  function($routeProvider,$locationProvider) {


    $locationProvider.html5Mode({
      enabled: true,
      requireBase: false
    });
    
    $routeProvider.
      when('/home', {
        templateUrl: 'templates/website/ng-view.html',
        controller: 'homeCtrl'
      }).
      when('/edit', {
        templateUrl: 'templates/website/ng-view.html',
        controller: 'homeCtrl'
      }).
      when('/blog', {
        templateUrl: 'templates/website/blog.php',
        controller: 'blogCtrl'
      }).
      otherwise({
        redirectTo: '/home'
      });

  }]);



