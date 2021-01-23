websiteApp.controller('ProfileController', ['$rootScope','$scope','Profile','$http', function($rootScope,$scope, Profile,$http) {
	$scope.galleryImages = [];
	Profile.profileData({id:$rootScope.logged_user.id},function(response) {
    	$scope.user = response.data;
        $scope.galleryImages = $scope.user.user_gallery;
    });

    $scope.choosePhoto = function (e) {
        var index =0;
        var fd = new FormData();
        angular.forEach(e.files, function (file) {
            if (e.files && e.files[0]) {
                var reader_ = new FileReader();
                reader_.readAsDataURL(file);
            }        
            fd.append('image'+index,file);
            index++;
        });
       
        $http({
            method: 'POST',
            url: '../add-gallery-photo',
            data:fd,
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined},
            cache: false
        }).then(function successCallback(response) {
            if(response.data.status){
                $scope.galleryImages = response.data.gallary_imgs ;
            }
        }, function (error) {
            if (error.status == 422){ 
               console.log(error.data.message)
            }
        });
    };

}]);

websiteApp.controller('EditProfileController', ['$rootScope','$scope','$http','Profile','$filter', function($rootScope,$scope,$http, Profile,$filter) {
    
    $scope.tab = 'Profile_Photo';
    $scope.interests =[];
    $scope.hobbies =[];
    $scope.social_links =[];
    $scope.selectSocials = [];
    $scope.gallary =[];

    Profile.editprofile({id:$rootScope.logged_user.id},function(response) {
    	$scope.user = response.data;
        $scope.options = response.options;
        $scope.selectSocials = response.options.social_links;
        $scope.user.dob = new Date($scope.user.dob);
        $scope.social_links = $scope.user.user_social_media;
        angular.forEach($scope.user.interests, function (item) {
            $scope.interests.push(item.interest_id) ;
        });
        angular.forEach($scope.user.hobbies, function (hobby) {
            $scope.hobbies.push(hobby.hobby_id) ;
        });

    });
    
    var fd = new FormData();

    $scope.choosePhoto = function (e) {
        var $input_ = e;
        if (e.files && e.files[0]) {
            var reader_ = new FileReader();
            reader_.onload = function (e) {
                $($input_).parent().parent().find(".photo")
                    .attr('src', e.target.result);
            };
            reader_.readAsDataURL(e.files[0]);
        }
        fd.append('photo',e.files[0]);
    };

    $scope.chooseCover = function (e) {
        var $input = e;
        if (e.files && e.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $($input).parent().parent().find(".cover")
                    .attr('src', e.target.result);
            };
            reader.readAsDataURL(e.files[0]);
        }
        fd.append('cover',e.files[0]);
    };

    $scope.itemSelect = function (selected,id) {
        if(selected){
            $scope.hobbies.push(id);
        }else{
            var index = $scope.hobbies.indexOf(id);
            $scope.hobbies.splice(index, 1);
        }
    }

    $scope.interestSelect = function (selected,id) {
        if(selected){
            if($scope.interests.indexOf(id) < 0)
                $scope.interests.push(id);
        }else{
            var index = $scope.interests.indexOf(id);
            $scope.interests.splice(index, 1);
        }
    }

    $scope.addSocialLinks = function (social_media,link) {
        var social = {'link':link,'social_id':social_media.id,'social_media':social_media}
        $scope.social_links.push(social);
        var index = $scope.selectSocials.indexOf(social_media);
        $scope.selectSocials.splice(index, 1);  
    }

    $scope.saveProfile = function (user) {
        fd.append('hobbies', $scope.hobbies);
        fd.append('interests', $scope.interests);
        console.log($scope.social_links);
        fd.append('social_links', JSON.stringify($scope.social_links));

        Object.keys(user).forEach(function(key) {
            if(key != 'photo' && key != 'cover' && key !='hobbies' && key != 'interests')
                fd.append(key,user[key]);
        });

        $http({
            method: 'POST',
            url: '../edit-profile-data',
            data:fd,
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined},
            cache: false
        }).then(function successCallback(response) {
            if(response.status)
                $rootScope.message_error = $filter('translate')('Save Successfully');
        }, function (error) {
            if (error.status == 422){ 
               console.log(error.data.message)
            }
        });
    };

}]);
