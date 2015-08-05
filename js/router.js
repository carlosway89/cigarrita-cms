cigarritaApp.run(function($rootScope,$window) {

  $rootScope.$on( "$routeChangeStart", function(event, next, current) {
    $('.panel-content').find('.view-frame').empty();
    $('.panel-content').addClass('actived ui primary loading button');
  });
  $rootScope.$on( "$routeChangeSuccess", function(event, next, current) {
    $('.panel-content').removeClass('actived ui primary loading button');
    console.log(next);

    if (next.originalPath=="/pruebas") {
      console.log('scroll');
    };

  });
});

cigarritaApp.config(['$routeProvider','$locationProvider','FacebookProvider',
  function($routeProvider,$locationProvider,FacebookProvider) {


    // $locationProvider.html5Mode({
    //   enabled: true,
    //   requireBase: false
    // });
    
    $routeProvider.
      when('/pages', {
        templateUrl: 'api/template/content/cms',
        controller: 'contentCtrl'
      }).
      when('/languages', {
        templateUrl: 'templates/cms/language.html',
        controller: 'languageCtrl'
      }).
      when('/messages', {
        templateUrl: 'templates/cms/messages.html',
        controller: 'messageCtrl'
      }).
      when('/settings', {
        templateUrl: 'templates/cms/settings.html',
        controller: 'settingCtrl'
      }).
      when('/facebook', {
        templateUrl: 'templates/cms/facebook.html',
        controller: 'facebookCtrl'
      }).
      // when('/pruebas',{
      //   controller: 'contentCtrl'
      // }).
      otherwise({
        redirectTo: '/pages'
      });

      var myAppId = '476476699176242';
   
       // You can set appId with setApp method
       // FacebookProvider.setAppId('myAppId');
       
       /**
        * After setting appId you need to initialize the module.
        * You can pass the appId on the init method as a shortcut too.
        */
       FacebookProvider.init(myAppId);

  }]);



