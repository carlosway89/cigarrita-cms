'use strict';

/* Directives */

var cigarritaDirective = angular.module('cigarritaDirective', ['ngResource']);


cigarritaDirective
.directive('languageSelect',function($parse,$rootScope){ //Step 1

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

                $(element).on('change',function(event){
                    var value=$(element).find('input').val();
                    beans.createCookie('language.initial',value,10);
                    
                    $rootScope.$broadcast('language.changed');
                    
                    
                });
              
          }
    }
})
.directive('elementContenido', function ($compile) {
  return {
    terminal: true, // prevent ng-repeat from compiled twice
    priority: 1003, // must higher than ng-repeat
    link: function (scope, element, attrs) {

      var temp=element[0].innerHTML;

      var model= temp.replace('{{','');
      model=model.replace('}}','');
      
      temp="<span element-editable ng-model='"+model+"' ng-bind-html='"+model+" | sanitize' >"+temp+"</span>";
      $(element).html(temp);
      
      attrs.$set('elementContenido', null);

      $compile(element)(scope);
      

    }
  };
})
.directive('elementBlock', function ($compile) {
  return {
    terminal: true, // prevent ng-repeat from compiled twice
    priority: 1002, // must higher than ng-repeat
    link: function (scope, element, attrs) {

      var repeat="block in page | filter:{category:'"+attrs.elementBlock+"'} as results";

      if (attrs.elementBlock!='slider') {
        element.attr('id',attrs.elementBlock);
      }

      attrs.$set('ngRepeat', repeat);
      attrs.$set('elementBlock', null);



      // $(element).find('#subheader,#header').attr("contenteditable",true);
      
      $compile(element)(scope);

     

      

    }
  };
})
.directive('elementPost', function ($compile) {
  return {
    terminal: true, // prevent ng-repeat from compiled twice
    priority: 1001, // must higher than ng-repeat
    link: function (scope, element, attrs) {

      var val_limit=element.attr('data-limit');
      var val_orderby=element.attr('data-order');
      var limiting="";
      var ording="";
      // console.log(val_limit);
      if (val_limit!=undefined) {
        limiting=" | limitTo:"+val_limit;
      }
      if (val_orderby!=undefined) {
        ording=" | orderBy: '"+val_orderby+"'";
      }

      var repeat="post in block.posts" + ording +limiting;
      attrs.$set('ngRepeat', repeat);
      attrs.$set('elementPost', null);
      
      // var classes=$(element).attr('class');
      // $('<div class="'+classes+' text-center" style="padding: 25px;width: 100%;"><a id="new" href="javascript:;;" class="block list-content plus-gray text-info" ><i class="plus icon huge"></i><br><label class="">Add New</label></a></div>').insertAfter(element);

      $compile(element)(scope);

    }
  };
})
.directive('elementForm', function ($compile,$rootScope) {
  return {
    link: function (scope, element, attrs) {
      
      setTimeout(function(){
        element.append('<div id="alert-msg" class="alert alert-success" style="display:none" >Your message has been successfully sent</div>');

        element.find('form').submit(function(event){
          event.preventDefault();
          var target=element.find('form');
          
          var data = {};
          var msg="";
          target.find('input,textarea').each(function(){

              data[ $(this).attr('id')] = $(this).val();              
              msg=msg + $(this).attr('id')+" : "+$(this).val()+"\n\n";
              $(this).val('');

          });
          console.log(data);

          var contact_model={
            email:data['email'],
            subject:msg
          }

          setTimeout(function(){
            $rootScope.$broadcast('form.contact.saving',contact_model);
          },1000);

          
        });

      });


    }
  };
})
.directive('menuLinks', function($location,$rootScope) {
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

                $('.header-options .active').removeClass('active');
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
              if (links=="new_scroll") {
                var current_path=$location.path();

              }else{

                $(element).on('click',function(event){

                  $('.header-options .active').removeClass('active');
                  $('.header-options a').removeClass('active');
                  
                  $(element).addClass('active');

                });

              }

              

            }

            

        }
    };
});