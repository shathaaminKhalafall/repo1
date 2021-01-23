
websiteApp.controller('HomeController', ['$cookieStore','$scope','$rootScope','$http','Website','$uibModal', '$location','$anchorScroll','$state','$timeout','$document', function($cookieStore,$scope,$rootScope, $http, Website,$uibModal, $location,$anchorScroll,$state,$timeout, $document) {
    $scope.duration =2;
   	if ($cookieStore.get('lang') == 'ar'){
   		$scope.owl_options1 ={rtl:true, autoplay: true, loop: true, margin: 18, responsive: { 0: { items: 1,  margin:0 }, 600: { items: 2, }, 1000: { items: 3, } } };
   		$scope.owl_options2 = { rtl:true,autoplay: true, loop: true, margin: 20, responsive: { 0: { items: 1,  margin:0 }, 600: { items: 3,  },  1000: {  items: 4, } } };
    }else{
    	$scope.owl_options1 ={autoplay: true, loop: true, margin: 18, responsive: { 0: { items: 1,  margin:0 }, 600: { items: 2, }, 1000: { items: 3, } } };
   		$scope.owl_options2 = {autoplay: true, loop: true, margin: 20, responsive: { 0: { items: 1,  margin:0 }, 600: { items: 3,  },  1000: {  items: 4, } } };
   	}
    Website.homeData(function(response) {
    	$scope.countTo = {count_4:response.counters.men,count_3:response.counters.women,count_2:(response.counters.women+response.counters.men),count_1:(response.counters.all)};
      $scope.settings = response.settings; 
      $rootScope.countries = response.countries; 
      $scope.amazings = response.amazings; 
      $scope.stories = response.stories; 
      $scope.last_registers = response.last_reg; 
    });

    $rootScope.gotoDiscover = function (filters) {
      if(localStorage.getItem("authorization")){
          $state.go('discover',{filters: filters});
      }else{
        $rootScope.Login();
      }
    }


}]);