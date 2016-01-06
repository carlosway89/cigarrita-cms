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

      var type=attrs.elementContenido;

      

        var temp=element[0].innerHTML;

        var model= temp.replace('{{','');
        model=model.replace('}}','');
        if (type=="non-editor") {
          temp="<span element-editable  class='fr-view' ng-model='"+model+"' ng-bind-html='"+model+" | sanitize' >"+temp+"</span>";
        
        }else{
          temp="<textarea element-editable  class='fr-view' froala ng-model='"+model+"' ng-bind-html='"+model+" | sanitize' >"+temp+"</textarea>";
        
        }

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
      // scope.counter = scope.block.length; 
      $compile(element)(scope);


      

    }
  };
})
.directive('elementPost', function ($compile,$rootScope) {
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

      var repeat="post in block.posts"+ ording +limiting;
      
      attrs.$set('ngRepeat', repeat);
      attrs.$set('elementPost', null);
      
      var classes=$(element).attr('class');

      var show=element.attr('data-add-hide');

      if (!show) {
        $('<div class="'+classes+' text-center inline-add"><a id="new" data-category="'+scope.block.category+'" href="javascript:;;" class="plus-gray" ><span>+</span><label>Agregar Nuevo</label></a></div>').insertAfter(element);
      }
      
      $compile(element)(scope);
      
      $('a#new').on('click',function(event){
          event.stopImmediatePropagation();
          var category=$(event.currentTarget).attr('data-category');

          // var model={
          //   category:category,
          //   language:beans.readCookie('language.initial')
          // }

          if (category=="slider") {
            var source=$base_url+"/assets/editor/images/default-image.jpg";
          }else{
            var source="<img src='"+$base_url+"/assets/editor/images/default-image.jpg' alt='default image' />";
          }
          var model={
            category:category,
            header:"[Texto Cabecera]",
            subheader:"[Texto Parrafo]",
            source:source,
            language:beans.readCookie('language.initial')
          }

          $rootScope.$broadcast('inline.saving.post',model);
          // $rootScope.$broadcast('show.modal',model);
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
      var type=element.attr('data-type');

      // console.log(scope);
        
        
        
      element.find('a[href="https://froala.com/wysiwyg-editor"]').remove();

      element.hover(
        function() {

          if (type=='slider') {
            element.append("<div id='inline-editors'><span class='tooling tooling-top editing-external' data-tool='editar detalles'><i class='fa fa-external-link'></i></span><span class='tooling tooling-top deleting-item' data-tool='Eliminar item'><i class='fa fa-trash-o'></i></span></div>");
          
          }else{
            if (type!="none-editor") {

              if (attrs.elementObject=="block") {
                element.append("<div id='inline-editors'><span class='tooling tooling-top editing-inline' data-tool='editar'><i class='fa fa-pencil'></i></span></div>");
            
              }else{
                element.append("<div id='inline-editors'><span class='tooling tooling-top editing-inline' data-tool='editar'><i class='fa fa-pencil'></i></span><span class='tooling tooling-top deleting-item' data-tool='Eliminar item'><i class='fa fa-trash-o'></i></span></div>");
            
              }
            }
            
          }
          
          // $compile(document.getElementById('inline-editors'))(scope);

          // setTimeout(function(){
              
              element.find(".editing-inline").on('click',function(event){

                event.stopImmediatePropagation();

                $('#inline-saver').remove();
                element.addClass('editable-mode');
                // element.find('[element-editable]').attr('contenteditable','true');
                // element.find('[element-editable]:last-child').focus();
                  
                element.append("<div id='inline-saver'><span class='inline-saving'>Guardar</span><span class='inline-closing'>x</span></div>");
                
                $compile(document.getElementById('inline-saver'))(scope);

                // console.log(element.height());

                var plus=element.height() - 200;

                if (attrs.elementObject=="block") {
                  var new_position=element.offset().top - 100;
                }else{
                  var new_position=element.offset().top + plus;
                }


                $rootScope.$broadcast('init.editor.inline',element);

                $('html, body').animate({
                    scrollTop: new_position
                }, 1500);
                
              });
              
              element.find(".deleting-item").on('click',function(event){

                  if (confirm('Esta seguro que desea eliminar este item?')) {
                     $rootScope.$broadcast('delete.item',$data_model,element);
                  }else{
                    return false;
                  }
                 

              });

              element.find(".editing-external").on('click',function(event){

                  $rootScope.$broadcast('show.modal',$data_model);

              });

              element.find(".inline-closing").on('click',function(event){

                event.stopImmediatePropagation();

                element.removeClass('editable-mode');

                element.find('[element-editable]').attr('contenteditable','false');
                                               

                $('#inline-saver').remove();

                element.find('[element-editable]').froalaEditor('edit.off');

              });

              element.find(".inline-saving").on('click',function(event){

                event.stopImmediatePropagation();

                var type=attrs.elementObject;
                $rootScope.$broadcast('inline.saving.'+type,$data_model);                

                $(".inline-saving").addClass('success').html('&#x2713;');
                $(".inline-closing").remove();

                element.find('[element-editable]').froalaEditor('edit.off');

                setTimeout(function(){
                  element.removeClass('editable-mode');
                  
                  element.find('[element-editable]').attr('contenteditable','false');
                  

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
.directive('elementEditable', function() {
  return {
    restrict: 'EA',
    require: '^?ngModel',
    link: function(scope, element, attrs, ctrl) {
      // view -> model

      // if (ctrl) {
      //   element.bind('blur', function() {
          
      //     // console.log(ctrl,element.html());

      //     scope.$apply(function() {
      //       var value=element.html();
      //       value=value.replace("<div id='inline-saver'><span class='inline-saving'>Save</span><span class='inline-closing'>x</span></div>", ""); 
      //       value=value.replace("<div id='inline-editors'><span class='tooling tooling-top editing-inline' data-tool='edit inline'>&#9997;</span><span class='tooling tooling-top editing-external' data-tool='edit details'>&#8599;</span></div>","");
      //       ctrl.$setViewValue(value);
            
      //     });
      //   });
      // };
     
      // element.find('[element-editable]').froalaEditor('edit.off')
      scope.$on('init.editor.inline',function(event,elem){


      //   elem.find('[element-editable]').froalaEditor({
      //     toolbarInline: true,
      //     charCounterCount: false,
      //   });

        elem.find('[element-editable]').froalaEditor('edit.on');
        elem.find('[element-editable]').froalaEditor('events.focus');
      //   element.on('froalaEditor.blur', function (e, editor) {
          
      //     var value=editor.$el[0].innerHTML;
      //     //element.froalaEditor('html.get');
      //     // editor.$el[0].innerHTML;
          
      //     scope.$apply(function() {
      //         // ctrl.$modelValue=value;
      //         ctrl.$setViewValue(value); 
      //     }); 

      //     element.froalaEditor('destroy');
      //     setTimeout(function(){
      //       element.froalaEditor({
      //         toolbarInline: true,
      //         charCounterCount: false,
      //       });
      //       element.find('a[href="https://froala.com/wysiwyg-editor"]').remove();
      //     },300);
          

      //   });

        
      //   elem.find('a[href="https://froala.com/wysiwyg-editor"]').remove();

      });
     
      
      setTimeout(function(){
        element.froalaEditor('edit.off');
        element.find('a[href="https://froala.com/wysiwyg-editor"]').remove();
      });
      

      // scope.$watch(attrs.ngModel, function(newValue) {

      //     // necessary to prevent thrashing
      //     console.log(newValue);

      //     if (newValue && (newValue !== element.html()) ) {

      //       console.log(newValue);

      //     }

      // });

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
})
.directive('elementForm', function ($compile) {
  return {
    link: function (scope, element, attrs) {
      
      setTimeout(function(){

        element.find('form').submit(function(event){
          event.preventDefault();
        });

      });


    }
  };
})
.directive('imageUpload',function($parse){ //Step 1

    return {
          // require : 'ngModel',            //Step 2
          link: function (scope, element, attrs, ngModel) {

              var collection = attrs.imageUpload,
                    model = attrs.selectModel,
                    getter= $parse(model),
                    setter= getter.assign;

            $(element).fileinput();
            

            $(element).find('#input').on('change',function(event){
                  
                event.stopImmediatePropagation();
                var files = event.target.files || event.dataTransfer.files;
              
                var img=files[0];
                
                var data = new FormData();

                data.append('images',img);

                // var serverUrl = 'https://api.parse.com/1/files/' + img.name;
                var serverUrl = 'api/upload'; 
                var imagen=$(element).find('.fileinput-new.thumbnail');

                 // scope.$parent[attrs.ngModel] = 'prueba'; 
                 // $scope.$parent.$eval(attr.ngModel)
                 // scope.$parent.$apply();

                // console.debug(scope.attrs.ngModel);
                    $.ajax({
                      type: "POST",
                      beforeSend: function(request) {
                        imagen.addClass('ui btn loading');
                      },
                      url: serverUrl,
                      data: data,
                      processData: false,
                      contentType: false,
                      xhr: function(){
                        // get the native XmlHttpRequest object
                        var xhr = $.ajaxSettings.xhr() ;
                        // set the onprogress event handler
                        xhr.upload.onprogress = function(evt){ 
                          
                          if (imagen.find('#counter_loader').length) {
                            imagen.find('#counter_loader').empty();
                            imagen.find('#counter_loader').html(evt.loaded/evt.total*100+'%');
                          }else{
                            imagen.append('<span id="counter_loader" style="position: absolute;font-weight: bold;color:#337AB7;top: 67px;right: 106px;font-size: 17px;">'+evt.loaded/evt.total*100+'%</span>');
                          }        

                          console.log('progress:', evt.loaded/evt.total*100) 
                        } ;
                        // set the onload event handler
                        xhr.upload.onload = function(){ 
                          setTimeout(function(){
                            imagen.find('#counter_loader').remove();
                          });                          
                          console.log('DONE!');
                        } ;
                        // return the customized object
                        return xhr ;
                      },
                      success: function(data) { 
                        if (data.error) {
                          if (!imagen.find('#alert_error_upload').length) {
                            imagen.append('<span id="alert_error_upload" class="alert alert-danger" style="top: 0px;position: absolute;">'+data.error+'</span>');
                          }
                        }else{
                          imagen.find('#alert_error_upload').remove();
                          scope['posting']['source'] = data.url;                 
                          // scope.$parent[attrs.ngModel] = data.url; 
                          // scope.$parent.$apply();
                          $(element).find('img').attr('src',data.url);
                          $(element).find('img').removeClass('ng-hide');
                        }    
                        
                        imagen.removeClass('ui btn loading');           
                      }
                    });


          });


              
          }
    }
})
.directive('wysiwyg', function($document) {

    return {
      restrict: 'EA',
      transclude: true,
      // restrict: "A",

      require: "ngModel",

      template: "<textarea class='form-control' style='width: 100%;height:200px' placeholder='Enter your text ...'></textarea>",

      replace: true,

      link: function (scope, element, attrs, controller) {

        var styleSheets,

            synchronize, editor,

            wysihtml5ParserRules = {

              tags: {

                strong: {}, b: {}, i: 1, em: 1, br: {}, p: 1,
                form:1, input:{} , textarea:{}, button:1,
                div: 1, span: 1, ul: 1, ol: 1, li: 1,
                table:1,td:1,tr:1,th:1, tbody:1,thead:1,
                h1: {}, h2: {}, h3: {}, 

                a: {

                  set_attributes: {
                    target: "_blank",

                    rel:    "nofollow"

                  },

                  check_attributes: {

                    href:   "url" // important to avoid XSS

                  }

                }

              }

            };


        styleSheets = _($document[0].styleSheets)

          .filter(function(ss) { return ss.href; })

          .pluck('href').value();


        editor = new wysihtml5.Editor(element[0], {

          toolbar: attrs.wysiwygToolbar, // id of toolbar element

          parserRules: wysihtml5ParserRules, // defined in parser rules set

          useLineBreaks: false,

          stylesheets: styleSheets

        });


        synchronize = function() {

          controller.$setViewValue(editor.getValue());

          scope.$apply();

        };


        editor.on('redo:composer', synchronize);

        editor.on('undo:composer', synchronize);

        editor.on('paste', synchronize);

        editor.on('aftercommand:composer', synchronize);

        editor.on('change', synchronize);


        // the secret sauce to update every keystroke, may be cheating but it works

        editor.on('load', function() {

          wysihtml5.dom.observe(

            editor.currentView.iframe.contentDocument.body, 

            ['keyup'], synchronize);

        });


        // handle changes to model from outside the editor

        scope.$watch(attrs.ngModel, function(newValue) {

                editor.clear();
                // necessary to prevent thrashing

                if (newValue && (newValue !== editor.getValue())) {

                  element.html(newValue);

                  editor.setValue(newValue);

                }

            });

      }

    };

});