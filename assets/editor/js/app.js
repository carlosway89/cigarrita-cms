'use strict';

/* App Module */

var cigarritaApp = angular.module('cigarritaWeb', [
  'ngRoute',
  'cigarritaControllers',
  'cigarritaAnimations',
  'cigarritaFilters',
  'cigarritaDirective',
  'cigarritaServices',
  'froala'
]);

// document.desingMode="on";

/* Controllers */

var cigarritaControllers = angular.module('cigarritaControllers', []);