'use strict';

/* Directives */

var cigarritaDirective = angular.module('cigarritaDirective', ['ngResource']);

cigarritaDirective.directive('bootstrapSummer',function($parse){ //Step 1

    return {
          // require : 'ngModel',            //Step 2
          link: function (scope, element, attrs, ngModel) {

              $(element).summernote({
                height: 200,
                  toolbar: [
                    //[groupname, [button list]]
                    ['inser',['link']],
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['misc',['codeview']]
                  ]
              });

              
             // $('#summernote').summernote({
             //      height: 200,
             //      onImageUpload: function(files, editor, welEditable) {
             //          sendFile(files[0], editor, welEditable);
             //      }
             //  });
             //  function sendFile(file, editor, welEditable) {
             //      data = new FormData();
             //      data.append("file", file);
             //      $.ajax({
             //          data: data,
             //          type: "POST",
             //          url: "Your URL POST (php)",
             //          cache: false,
             //          contentType: false,
             //          processData: false,
             //          success: function(url) {
             //              editor.insertImage(welEditable, url);
             //          }
             //      });
             //  }



              
          }
    }
});

cigarritaDirective.directive('languageSelect',function($parse){ //Step 1

    return {
          // require : 'ngModel',            //Step 2
          link: function (scope, element, attrs, ngModel) {

              var collection = attrs.languageSelect,
                    model = attrs.selectModel,
                    getter= $parse(model),
                    setter= getter.assign;

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
                
                scope.$watch(model,function(data){
                    
                    if(angular.isObject(data)){      
                        
                        $(element).dropdown().dropdown('setting', {
                            onChange: function (value) {
                                scope.$parent[attrs.ngModel] = value;
                                scope.$parent.$apply();
                            }
                        });

                      setTimeout(function(){
                        $(element).dropdown();
                      },100);

                    }
                });

                 scope.$watch(collection,function(data){
                   
                   if (data) {
                    console.log(data,attrs.ngModel);
                   };

                 });
              
          }
    }
});
cigarritaDirective.directive('checkSelect',function($parse){ //Step 1

    return {
          // require : 'ngModel',            //Step 2
          link: function (scope, element, attrs, ngModel) {

              var collection = attrs.checkSelect,
                    model = attrs.selectModel,
                    getter= $parse(model),
                    setter= getter.assign;

                    
                $(element).checkbox();
                  

                scope.$watch(model,function(data){
                    
                    if(angular.isObject(data)){      
                        $(element).checkbox(scope[attrs.checkModel][attrs.checkAttribute]==1?'check':'uncheck');

                        $(element).checkbox({
                              onChecked: function() {
                                scope[attrs.checkModel][attrs.checkAttribute]=1;
                              },
                              onUnchecked: function() {
                                scope[attrs.checkModel][attrs.checkAttribute]=0;
                              }
                          });

                    }
                });

                

              
          }
    }
});
cigarritaDirective.directive('imageUpload',function($parse){ //Step 1

    return {
          // require : 'ngModel',            //Step 2
          link: function (scope, element, attrs, ngModel) {

              var collection = attrs.imageUpload,
                    model = attrs.selectModel,
                    getter= $parse(model),
                    setter= getter.assign;

            $(element)
            .fileinput();
            

            $(element).find('#input').on('change',function(event){
                  
                event.stopImmediatePropagation();
                var files = event.target.files || event.dataTransfer.files;
              
                var img=files[0];
                
                var data = new FormData();

                data.append('images',img);

                // var serverUrl = 'https://api.parse.com/1/files/' + img.name;
                var serverUrl = 'api/upload'; 
                var imagen=$(element).find('.fileinput-preview.thumbnail');

                 // scope.$parent[attrs.ngModel] = 'prueba'; 
                 // $scope.$parent.$eval(attr.ngModel)
                 // scope.$parent.$apply();

                // console.debug(scope.attrs.ngModel);
                    $.ajax({
                      type: "POST",
                      beforeSend: function(request) {
                        imagen.addClass('ui button loading');
                      },
                      url: serverUrl,
                      data: data,
                      processData: false,
                      contentType: false,
                      xhr: function(){
                        // get the native XmlHttpRequest object
                        var xhr = $.ajaxSettings.xhr() ;
                        // set the onprogress event handler
                        xhr.upload.onprogress = function(evt){ console.log('progress:', evt.loaded/evt.total*100) } ;
                        // set the onload event handler
                        xhr.upload.onload = function(){ console.log('DONE!') } ;
                        // return the customized object
                        return xhr ;
                      },
                      success: function(data) {     

                        scope[attrs.imageModel][attrs.imageAttribute] = data.url;                 
                        // scope.$parent[attrs.ngModel] = data.url; 
                        // scope.$parent.$apply();
                        $(element).find('img').attr('src',data.url);
                        imagen.removeClass('ui button loading');           
                      }
                    });


          });


              
          }
    }
});