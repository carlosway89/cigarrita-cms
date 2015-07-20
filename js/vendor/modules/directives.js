'use strict';

/* Directives */

var cigarritaDirective = angular.module('cigarritaDirective', ['ngResource']);


cigarritaDirective.directive('languageSelect',function($parse){ //Step 1

    return {
          // require : 'ngModel',            //Step 2
          link: function (scope, element, attrs, ngModel) {

              var collection = attrs.languageSelect;

                $(element).dropdown();

                // $(element).change(function(){                //Step 1
                //     var col = scope[collection],
                //         val = $(element).val();              //Step 2

                //     for(var i=0,len=col.length;i<len;i++){
                //         if(val == col[i][valueProperty]){    //Step 3
                //             setter(scope,col[i]);            //Step 4
                //             break;
                //         }
                //     }
                // });

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
});
