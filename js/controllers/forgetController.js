websiteApp.controller('ForgetController', ['$rootScope','$scope','Website', function($rootScope,$scope, Website) {
   	$scope.msg = null;
    $scope._forgetPassword = function (row) {
        Website.forgetPassword(row, function (data) {
            $scope.status = data.status;
            $scope.msg = data.msg;
        });
    };

}]);
