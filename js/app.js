'use strict';

/* App Module */

var cigarritaApp = angular.module('cigarritaApp', [
  'ngRoute',
  'cigarritaControllers',
  'cigarritaAnimations',
  'phonecatFilters',
  'cigarritaServices',
  'cigarritaDirective',
  'facebook'
]);

var beans=new Beans();

beans.createCookie('language.initial','es',10);


/* Controllers */

var cigarritaControllers = angular.module('cigarritaControllers', []);

