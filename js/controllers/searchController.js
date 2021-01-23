websiteApp.controller('SearchController', ['$rootScope','$scope','Search','$uibModal', function($rootScope,$scope, Search,$uibModal) {
  
  	$scope.filters = {'sortby':'Name'}; 
  	
  	Search.getOptions(function(response) {
        $scope.options = response; 
    });
    
    $scope.searchBy = function (filters) {
      var text = filters.sortByText;
       if(text.length>=3)
          $scope.search(filters);
    }

  	$scope.search = function (filters) {
	  	Search.filterData(filters,function(response) {
	        $scope.users = response; 
	    }); 
	  };

	$scope.search($scope.filters);


}]);
