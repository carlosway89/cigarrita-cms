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
.directive('elementBlock', function ($compile) {
  return {
    terminal: true, // prevent ng-repeat from compiled twice
    priority: 1002, // must higher than ng-repeat
    link: function (scope, element, attrs) {
      var repeat="block in page | filter:{category:'"+attrs.elementBlock+"'}";
      attrs.$set('ngRepeat', repeat);
      attrs.$set('elementBlock', null);

      // $(element).find('#subheader,#header').attr("contenteditable",true);
      $compile(element)(scope);
      

    }
  };
})
.directive('elementPost', function ($compile,$rootScope) {
  return {
    terminal: true, // prevent ng-repeat from compiled twice
    priority: 1001, // must higher than ng-repeat
    link: function (scope, element, attrs) {
      var repeat="post in block.posts";
      attrs.$set('ngRepeat', repeat);
      attrs.$set('elementPost', null);
      
      var classes=$(element).attr('class');
      $('<div class="'+classes+' text-center inline-add"><a id="new" data-category="'+scope.block.category+'" href="javascript:;;" class="plus-gray" ><span>+</span><label>Add New</label></a></div>').insertAfter(element);

      
      $compile(element)(scope);
      
      $('a#new').on('click',function(event){
          event.stopImmediatePropagation();
          var category=$(event.currentTarget).attr('data-category');

          var model={
            category:category,
            language:beans.readCookie('language.initial')
          }

          $rootScope.$broadcast('show.modal',model);
      });

      
      

    }
  };
})
.directive('elementObject', function ($compile,$rootScope) {
  return {
    link: function (scope, element, attrs) {
      
      // console.log(element);
      var $data_model=[];
      scope.$watch(attrs.elementObject,function(data){
        if(angular.isObject(data)){ 
          $data_model=data;
        }
      });

      element.hover(
        function() {

          element.append("<div id='inline-editors'><span class='tooling tooling-top editing-inline' data-tool='edit inline'>&#9997;</span><span class='tooling tooling-top editing-external' data-tool='edit details'>&#8599;</span></div>");
          
          // $compile(document.getElementById('inline-editors'))(scope);

          // setTimeout(function(){
              
              element.find(".editing-inline").on('click',function(event){

                event.stopImmediatePropagation();

                $('#inline-saver').remove();
                element.addClass('editable-mode');
                element.find('[contenteditable]').attr('contenteditable','true');
                // element.find('[contenteditable]:last-child').focus();
                  
                element.append("<div id='inline-saver'><span class='inline-saving'>Save</span><span class='inline-closing'>x</span></div>");
                
                $compile(document.getElementById('inline-saver'))(scope);

                // console.log(element.height());

                var plus=element.height() - 200;

                if (attrs.elementObject=="block") {
                  var new_position=element.offset().top - 100;
                }else{
                  var new_position=element.offset().top + plus;
                }

                

                $('html, body').animate({
                    scrollTop: new_position
                }, 1500);
                
              });

              element.find(".editing-external").on('click',function(event){

                  $rootScope.$broadcast('show.modal',$data_model);

              });

              element.find(".inline-closing").on('click',function(event){

                event.stopImmediatePropagation();

                element.removeClass('editable-mode');

                element.find('[contenteditable]').attr('contenteditable','false');
                                               

                $('#inline-saver').remove();

              });

              element.find(".inline-saving").on('click',function(event){

                event.stopImmediatePropagation();

                var type=attrs.elementObject;
                $rootScope.$broadcast('inline.saving.'+type,$data_model);                

                $(".inline-saving").addClass('success').html('&#x2713;');
                $(".inline-closing").remove();

                setTimeout(function(){
                  element.removeClass('editable-mode');
                  
                  element.find('[contenteditable]').attr('contenteditable','false');
                  

                  $('#inline-saver').remove();

                },2000);                
              });
          // },100);

      }, function() {
          element.find( "div#inline-editors" ).remove();
        }
      );

      



    }
  };
})
.directive('contenteditable', function() {
  return {
    require: 'ngModel',
    restrict: 'E',
    link: function(scope, element, attrs, ctrl) {
      // view -> model

      if (ctrl) {
        element.bind('blur', function() {
          // console.log(ctrl,element.html());
          scope.$apply(function() {
            var value=element.html();
            value=value.replace("<div id='inline-saver'><span class='inline-saving'>Save</span><span class='inline-closing'>x</span></div>", ""); 
            value=value.replace("<div id='inline-editors'><span class='tooling tooling-top editing-inline' data-tool='edit inline'>&#9997;</span><span class='tooling tooling-top editing-external' data-tool='edit details'>&#8599;</span></div>","");
            ctrl.$setViewValue(value);
          });
        });
      };

      // model -> view
      // ctrl.$render = function() {
      //   element.html(ctrl.$viewValue);
      // };

      // load init value from DOM
      // ctrl.$render();
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

                  $('.header-options a').removeClass('active');
                  
                  $(element).addClass('active');

                });

              }

              

            }

            

        }
    };
})
// .directive('bootstrapSummer',function($parse){ //Step 1

//     return {
//           // require : 'ngModel',            //Step 2
//           link: function (scope, element, attrs) {


//               // $(element).summernote({
//               //   height: 100,
//               //     toolbar: [
//               //       //[groupname, [button list]]
//               //       ['inser',['link']],
//               //       ['style', ['bold', 'italic', 'underline', 'clear']],
//               //       ['font', ['strikethrough', 'superscript', 'subscript']],
//               //       ['fontsize', ['fontsize']],
//               //       ['color', ['color']],
//               //       ['para', ['ul', 'ol', 'paragraph']],
//               //       ['height', ['height']],
//               //       ['misc',['codeview']]
//               //     ]
//               // });

//               // $(element).code('somevalue');

              
//              // $('#summernote').summernote({
//              //      height: 200,
//              //      onImageUpload: function(files, editor, welEditable) {
//              //          sendFile(files[0], editor, welEditable);
//              //      }
//              //  });
//              //  function sendFile(file, editor, welEditable) {
//              //      data = new FormData();
//              //      data.append("file", file);
//              //      $.ajax({
//              //          data: data,
//              //          type: "POST",
//              //          url: "Your URL POST (php)",
//              //          cache: false,
//              //          contentType: false,
//              //          processData: false,
//              //          success: function(url) {
//              //              editor.insertImage(welEditable, url);
//              //          }
//              //      });
//              //  }



              
//           }
//     }
// })
.directive('imageUpload',function($parse){ //Step 1

    return {
          // require : 'ngModel',            //Step 2
          link: function (scope, element, attrs, ngModel) {

              var collection = attrs.imageUpload,
                    model = attrs.selectModel,
                    getter= $parse(model),
                    setter= getter.assign;

            $(element).fileinput();
            

          //   $(element).find('#input').on('change',function(event){
                  
          //       event.stopImmediatePropagation();
          //       var files = event.target.files || event.dataTransfer.files;
              
          //       var img=files[0];
                
          //       var data = new FormData();

          //       data.append('images',img);

          //       // var serverUrl = 'https://api.parse.com/1/files/' + img.name;
          //       var serverUrl = 'api/upload'; 
          //       var imagen=$(element).find('.fileinput-preview.thumbnail');

          //        // scope.$parent[attrs.ngModel] = 'prueba'; 
          //        // $scope.$parent.$eval(attr.ngModel)
          //        // scope.$parent.$apply();

          //       // console.debug(scope.attrs.ngModel);
          //           $.ajax({
          //             type: "POST",
          //             beforeSend: function(request) {
          //               imagen.addClass('ui button loading');
          //             },
          //             url: serverUrl,
          //             data: data,
          //             processData: false,
          //             contentType: false,
          //             xhr: function(){
          //               // get the native XmlHttpRequest object
          //               var xhr = $.ajaxSettings.xhr() ;
          //               // set the onprogress event handler
          //               xhr.upload.onprogress = function(evt){ console.log('progress:', evt.loaded/evt.total*100) } ;
          //               // set the onload event handler
          //               xhr.upload.onload = function(){ console.log('DONE!') } ;
          //               // return the customized object
          //               return xhr ;
          //             },
          //             success: function(data) {     

          //               scope[attrs.imageModel][attrs.imageAttribute] = data.url;                 
          //               // scope.$parent[attrs.ngModel] = data.url; 
          //               // scope.$parent.$apply();
          //               $(element).find('img').attr('src',data.url);
          //               imagen.removeClass('ui button loading');           
          //             }
          //           });


          // });


              
          }
    }
});