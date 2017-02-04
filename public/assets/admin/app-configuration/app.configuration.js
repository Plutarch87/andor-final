'use strict';

var app = angular.module('admin', [
    'ngRoute',
]);

app.config(function($routeProvider) {
    $routeProvider
    .when("/", {
        controller: 'PanelController',
        templateUrl : "/assets/admin/views/panel.html"
    })
    $routeProvider
    .when("/edit/:id", {
    	controller: 'EditController',
    	templateUrl: "/assets/admin/views/edit.html"
    })
    .otherwise({
        redirectTo: '/'
    });
});