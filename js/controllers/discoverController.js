websiteApp.controller('DiscoverController', ['$rootScope','$scope','$http','Discover','$uibModal','$stateParams', function($rootScope,$scope, $http, Discover,$uibModal,$stateParams) {
    Discover.getOptions(function(response) {
        $scope.options = response; 
    });

  	$scope.filters = {}; 
    
    if($stateParams.filters)
    	$scope.filters=$stateParams.filters;
  	

	$scope.search = function (filters) {
	  	Discover.filterDiscover(filters,function(response) {
	        $scope.suggests = response.suggests; 
	        $rootScope.random_user = response.random_user; 
	        $scope.users_Interests = response.user_Interests; 
	        $scope.users_hobbies = response.user_hobbies;
	        $scope.new_registers = response.new_registers; 
	        $rootScope.suitable_user = response.suitable_user; 
	    }); 
	};

	$scope.search($scope.filters);



}]);
