<<<<<<< HEAD
var app = angular.module('my-app',[]).constant('API', 'http://localhost:8080/usertest/public/');

app.config(function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

=======
var app = angular.module('my-app',[]).constant('API', 'http://localhost:8080/usertest/public/');

app.config(function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

>>>>>>> 10a31137d7d0dec143811ab24505d984ef067ea3
