/**
 * 
 */
app.controller('GuideController', ['$scope', 'guides', '$routeParams', function($scope, guides, $routeParams) {
  guides.success(function(data) {
    $scope.detail = data[$routeParams.id];
  });
}]);