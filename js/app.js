/**
 * 
 */

var app = angular.module('FruitsGuide', ['ngRoute']);

app.config(function ($routeProvider) { 
  $routeProvider 
    .when('/', { 
      controller: 'HomeController', 
      templateUrl: 'views/home.html' 
    }) 
  	.when('/guides/:id',{
  		controller: 'GuideController',
    	templateUrl: 'views/guide.html'
  	})
    .otherwise({ 
      redirectTo: '/' 
    }); 
});