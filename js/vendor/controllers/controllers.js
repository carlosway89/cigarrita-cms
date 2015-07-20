cigarritaControllers.controller('indexCtrl',['$scope','Language','Links','Model',function($scope,Language,Links,Model){


    var obj_lang={
      estado:1
    };

    Model.query({
      model:'language',
      id:'query',
      query:JSON.stringify(obj_lang)
    },function(data){
        // $('#language_panel_option').on('change',function(event){
        //   var value=$(this).val();
        //   beans.createCookie('language.initial',value,10);
        //   contenidos();
        // });

      $scope.current=beans.readCookie('language.initial');
      $scope.language=data;
    });

    var obj_link={
      estado:1,
      language:beans.readCookie('language.initial')
    };

    $scope.links=Model.query({
      model:'menu',
      id:'query',
      query:JSON.stringify(obj_link)
    });

    

}]);
cigarritaControllers.controller('homeCtrl',['$scope','Content','Links','$rootScope',function($scope,Content,Links,$rootScope){


  // $scope.links=Links.query({
  //     condition:'estado,language',
  //     attr:'1,'+beans.readCookie('language.initial')
  // });
  

  var fadeDuration=1000;
  var fadeDuration1=1000;
  var slideDuration=7000;
  var currentIndex=1;
  var nextIndex=1;

  var obj={
    language:beans.readCookie('language.initial'),
    estado:1,
    minimal:1,
    is_deleted:0
  };

  $scope.menu = Content.query({
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

cigarritaControllers.controller('blogCtrl',['$scope','Content','Language',function($scope,Content,Language){


  $scope.blog = Content.query({
    language:beans.readCookie('language.initial'),
    condition:',estado,minimal',
    attr:',1,0'
  },function(data){



  });


  $scope.launchit=function(model){

    console.log(model);

    parent.$(parent.document).trigger('launch.edition',model);

  }

}]);


