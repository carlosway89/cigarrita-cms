'use strict';

/* Directives */

var cigarritaDirective = angular.module('cigarritaDirective', ['ngResource']);


cigarritaDirective
.directive('elementContenido', function ($compile) {
  return {
    terminal: true, // prevent ng-repeat from compiled twice
    priority: 1003, // must higher than ng-repeat
    link: function (scope, element, attrs) {

      var type=attrs.elementContenido;
      var temp=element[0].innerHTML;

      if (type!="source") {          
        var model= temp.replace('{{','');
        model=model.replace('}}','');
        temp="<span ng-model='"+model+"' ng-bind-html='"+model+" | sanitize' >"+temp+"</span>";
        $(element).html(temp);
      }
      
      
      
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
});