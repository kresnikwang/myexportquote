/**
 * 
 */

app.controller('HomeController', ['$scope', 'guides', function($scope, guides) {
  guides.success(function(data) {
    $scope.guides = data;
  });
}]);