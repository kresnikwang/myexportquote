/**
 * 
 */

app.factory('guides', ['$http', function($http) {
  return $http.get('js/services/guide.json')
         .success(function(data) {
           return data;
         })
         .error(function(data) {
           return data;
         });
}]);