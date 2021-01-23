websiteApp.controller('ResetPasswordController', ['$rootScope','$filter','$scope','Website','$location', function($rootScope,$filter,$scope, Website,$location) {
    $scope.display_old = true;
    if($location.search().token)
    	$scope.display_old = false;
    
    $scope.msg = null;
    $scope._resetPassword = function (row) {
        row.token = $location.search().token;
        if(!angular.isUndefined(row.password) && !angular.isUndefined(row.password_confirmation)){
            if(row.password == row.confirm_password){
                Website.resetPassword(row, function (data) {
                    $scope.status = data.status;
                    $scope.msg = data.msg;
                });
            }else {
                $scope.status = false;
                $scope.msg = $filter('translate')('The password and confirmed are not equal');
            }
        }
    };

}]);
