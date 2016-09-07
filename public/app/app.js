var app = angular.module('my-app',[]).constant('API', 'http://localhost:8080/onepagetestapp/public/');

app.config(function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});
