'use strict';

/* Filters */

angular.module('cigarritaFilters', []).filter("sanitize", ['$sce', function($sce) {
  return function(htmlCode){
    return $sce.trustAsHtml(htmlCode);
  }
}]);
