websiteApp.controller('RegisterController', ['$rootScope','$scope','Register','$http','$state','$window' ,function($rootScope,$scope, Register,$http,$state, $window) {
    $scope.goToTab = function(tab) {
      window.location = "#/register#"+tab;
    }
    $scope.finished = false;
    $scope.photo = "assets/images/uploadImg.png";
    $scope.cover = "assets/images/img.png";
    $scope.photo_ =true;
    $scope.cover_ =true;
    Register.getOptions(function(response) {
        $scope.options = response; 
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
        $scope.photo_ =false;
        fd.append('photo',e.files[0]);
        $scope.$apply();
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
        $scope.cover_ =false;
        $scope.$apply();
    };
  	
  	$scope.interests = [];
  	$scope.hobbies =[];
    
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
            $scope.interests.push(id);
        }else{
            var index = $scope.interests.indexOf(id);
            $scope.interests.splice(index, 1);
        }
    }


    $scope.Save = function(row){

		Object.keys(row).forEach(function(key) {
			fd.append(key,row[key]);
		 });
        
        fd.append('hobby_id', $scope.hobbies);
        fd.append('interest_id', $scope.interests);
        $scope.finished = true;
        $http({
            method: 'POST',
            url: '../complete-profile',
            data:fd,
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined},
            cache: false
        }).then(function successCallback(response) {
            if(response.status) {
                
                $window.location = "#/profile";
            } else{
    			$window.location = "#/home";
            }
        }, function (error) {
            if (error.status == 422){ 
               console.log(error.data.message)
            }
        });
    
    }


    $scope.getCode = function(country_id){
        Register.getCountryCode({id:country_id},function(response) {
            $scope.row.code = response.code;
            console.log(response.code);
        });
    }

}]);
