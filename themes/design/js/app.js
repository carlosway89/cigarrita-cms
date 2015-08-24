'use strict';

/* App Module */

var cigarritaApp = angular.module('cigarritaWeb', [
  'ngRoute',
  'cigarritaControllers',
  'cigarritaAnimations',
  'cigarritaFilters',
  'cigarritaDirective',
  'cigarritaServices'
  // 'summernote'
]);

var beans=new Beans();

beans.createCookie('language.initial','es',10);

// document.desingMode="on";

/* Controllers */

var cigarritaControllers = angular.module('cigarritaControllers', []);

