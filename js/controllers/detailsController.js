websiteApp.controller('DetailsController', ['$rootScope','$scope','Discover','$stateParams', function($rootScope,$scope, Discover,$stateParams) {
  
    $scope.pageTilte = $stateParams.title;
  	$scope.filters = {'sortby':'Name',details:$stateParams.title}; 
  	
  	Discover.getOptions(function(response) {
        $scope.options = response; 
    });
    
    $scope.searchBy = function (filters) {
      var text = filters.sortByText;
       if(text.length>=3)
          $scope.search(filters);
    }

  	$scope.search = function (filters) {

	  	Discover.filterDiscover(filters,function(response) {
        console.log(response);
	        $scope.users = response.data; 
	    }); 
	  };

	$scope.search($scope.filters);


}]);
