websiteApp.controller('LikesController', ['$rootScope','$scope','Likes', function($rootScope,$scope, Likes) {
    
    Likes.userLikes(function(response) {
        $scope.users = response; 
    });

}]);
