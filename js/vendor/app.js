'use strict';

/* App Module */

var cigarritaApp = angular.module('cigarritaWeb', [
  'ngRoute',
  'cigarritaControllers',
  'cigarritaAnimations',
  'cigarritaFilters',
  'cigarritaServices'
]);

var beans=new Beans();

beans.createCookie('language.initial','es',10);


/* Controllers */

var cigarritaControllers = angular.module('cigarritaControllers', []);

