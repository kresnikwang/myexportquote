/**
 * 
 */


app.controller('GuideController', ['$scope', '$routeParams', '$http', function($scope, $routeParams, $http) {
  $http.get('js/services/'+$routeParams.id+'.json').success(function(data){
    $scope.detail = data;
  });
}]);