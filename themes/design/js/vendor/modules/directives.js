'use strict';

/* Directives */

var cigarritaDirective = angular.module('cigarritaDirective', ['ngResource']);


cigarritaDirective
.directive('languageSelect',function($parse){ //Step 1

    return {
          // require : 'ngModel',            //Step 2
          link: function (scope, element, attrs, ngModel) {

              var collection = attrs.languageSelect;

                $(element).dropdown();


                scope.$watch(collection,function(data){
                    
                    if(angular.isObject(data)){  
                     
                      var view=$(element).find('.menu.laguage-select');
                      view.empty();
                      
                      angular.forEach(data, function(item, key) {
                        view.append('<div class="item" data-value="'+item.min+'"><i class="flag-icon-'+item.flag+' flag-icon"></i> '+item.name+'</div>');
                      });
                      setTimeout(function(){
                        $(element).dropdown();
                      },100);

                    }
                });
              
          }
    }
})
.directive('menuLinks', function ($location,$rootScope) {
    return {
        // restrict: 'E',
        link: function(scope, element, attrs) {
            
            var links=attrs.menuLinks;

            if (links=="scroll") {

              element.attr("target", "_self");

              $(element).on('click',function(event){
                
                
                event.preventDefault();

                var current_path=$location.path();
                var current_link=$('.header-options').find("[href^='"+current_path+"']");
                
                

                var is_self=current_link.attr('target');

                
                $('.header-options a').removeClass('active');

                var url=$(element).attr('href');
                
                $(element).addClass('active');


                if (!is_self) {
                  
                  $location.path(url).replace();
                  scope.$apply();

                } else{
                    url=url.replace('/','');

                    var div_target=$('#'+url);

                    $('html, body').stop().animate({
                        scrollTop: div_target.offset().top - 100
                    }, 1500);
                  
                }
                
              });
            }else{

              $(element).on('click',function(event){

                $('.header-options a').removeClass('active');
                
                $(element).addClass('active');

              });

            }

            

        }
    };
});