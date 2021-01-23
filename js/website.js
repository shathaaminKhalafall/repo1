var websiteApp = angular.module('websiteApp', [
    'ui.router',
    'ui.router.middleware',
    'socialLogin',
    'ngResource',
    'ui.bootstrap',
    'ngCookies',
    // 'duScroll',
    'pascalprecht.translate',
    'countTo',
    'oc.lazyLoad',
    'satellizer',
    'firebase'
    ]);

websiteApp.constant("CSRF_TOKEN", 'csrf_token()');
websiteApp.config(function($authProvider) {

    // Optional: For client-side use (Implicit Grant), set responseType to 'token' (default: 'code')
    $authProvider.facebook({
      clientId: '201882868073055'
    }); 

    $authProvider.google({
      clientId: '427824158929-4cp8390as87u8bag8ume860ja3pi3vng.apps.googleusercontent.com'
    });

});

// websiteApp.config(function(socialProvider){
//     socialProvider.setGoogleKey("427824158929-4cp8390as87u8bag8ume860ja3pi3vng.apps.googleusercontent.com");
//     socialProvider.setFbKey({appId: "784906185700949", apiVersion: "v9.0"});
// });

websiteApp.config([ '$translateProvider', function ($translateProvider) {
    var $cookieStore;
    angular.injector(['ngCookies']).invoke(['$cookieStore', function (_$cookieStore) {
            $cookieStore = _$cookieStore;
        }]);

    $translateProvider.translations('en', translationsEN);
    $translateProvider.translations('ar', translationsAR);
    $translateProvider.translations('es', translationsES);
    $translateProvider.preferredLanguage($cookieStore.get('lang') ? $cookieStore.get('lang') : "en");
    $translateProvider.fallbackLanguage($cookieStore.get('lang') ? $cookieStore.get('lang') : "en");
    
}]);

websiteApp.factory('Authenticate', ['$resource', function ($resource,CSRF_TOKEN) {
    return $resource('../auth/' + ':operation/:provider', {id: '@id',provider:'@provider'}, {
        login: {method: 'POST', params: {operation: 'login',csrf_token: CSRF_TOKEN}},
        logout: {method: 'GET', params: {operation: 'logout',csrf_token: CSRF_TOKEN}},
        sign_up: {method: 'POST', params: {operation: 'sign_up',csrf_token: CSRF_TOKEN}},
        social_login: {method: 'GET', params: {operation: 'redirect',csrf_token: CSRF_TOKEN}},
    });
}]);

websiteApp.controller('HeaderController', ['$rootScope','$translate','$scope','Authenticate','$uibModal','$auth','Website','$window','$cookieStore','$state', function($rootScope,$translate,$scope, Authenticate,$uibModal, $auth,Website, $window,$cookieStore,$state) {
    
    Website.langData(function(response) {
        $rootScope.lang = response.current_lang; 
        $rootScope.languages = response.languages; 

    }); 
    $scope.changeLang = function (lang) {
        $rootScope.message_error = "";
        Website.lang({'lang':lang},function(response) {
            $translate.use(lang);
            $rootScope.lang = $translate.use();
            $cookieStore.put('lang', $translate.use());
            $state.reload();
        });
    } 

    $scope.hrefDropdown = function (state) {
        window.location = state;
    }


    $scope.SignUp = function () {
        $uibModal.open({
            templateUrl: 'tpl/modals/signUp.html',
            keyboard  : false,
            windowClass: 'modal',
            windowClass: 'show', 
            backdropClass: 'show',
            size: 'sm',
            animation: true,
            controller: function ($rootScope,$scope,$window,$uibModalInstance,Authenticate ,$log,$filter) {
                $scope.row={};
                $scope.error_msg = null;
                $scope.cancel = function () {
                    $uibModalInstance.dismiss('cancel');
                };
                $scope.signUp_ = function (row) {                    
                    Authenticate.sign_up(row,function (data) {
                        if(data.status){
                            Authenticate.login(row ,function (data) {
                                if(data.status){
                                    localStorage.setItem("logged_user", JSON.stringify(data.user));
                                    $rootScope.logged_user = JSON.parse(localStorage.getItem("logged_user"));
                                    localStorage.setItem("authorization", true);
                                    $rootScope.authorization = localStorage.getItem("authorization");
                                    $window.location = "#/register";
                                }else{
                                    $scope.error_msg = data.msg;
                                }
                            });
                            $uibModalInstance.dismiss('cancel');
                        }else{
                            $scope.error_msg = data.message;                                    
                        }
                    }, function (error) {
                        if (error.status == 422){ 
                            if(error.data.errors)
                                $scope.validate_errors = error.data.errors;
                            else
                                $scope.error_msg = error.data.message;
                        }else{
                            $scope.showError = true;
                            $scope.error_msg = 'Error';
                        }

                    });
                        
                };

                $scope.SocialLogin = function(provider) {
                    
                    // Authenticate.social_login({'provider':provider}, function (data) {
                    //     if(data.status){
                    //         if(data.user.is_active == 1){
                    //             localStorage.setItem("logged_user", JSON.stringify(data.user));
                    //             $rootScope.logged_user = JSON.parse(localStorage.getItem("logged_user"));
                    //             localStorage.setItem("authorization", true);
                    //             $rootScope.authorization = localStorage.getItem("authorization");
                    //             if($rootScope.logged_user.is_complete == 1)
                    //                 $window.location = "#/home";
                    //             else
                    //                 $window.location = "#/register";

                    //             $uibModalInstance.dismiss('cancel');

                    //         }else{
                    //             $uibModalInstance.dismiss('cancel');
                    //             $rootScope.Logout( $filter('translate')('error_activation'));
                    //         }
                            

                    //       }else{
                    //         $scope.error_msg = data.msg;
                    //       }
                    // });
                    $auth.authenticate(provider)
                      .then(function(response) {
                        console.log($auth.authenticate(provider).then(successCallback));
                      })
                      .catch(function(response) {
                        console.log("dfgdfg");
                      });

                };
            }
        });
      };

    $rootScope.Login = function () {
        $uibModal.open({
            animation: true,
            templateUrl: 'tpl/modals/login.html',
            keyboard  : false,
            windowClass: 'modal',
            windowClass: 'show', 
            backdropClass: 'show',
            size: 'sm',
            controller: function ($rootScope,$filter,$scope, $auth,$uibModalInstance,Authenticate , $log,$window) {
                $scope.row ={};
                $scope.error_msg = null;
                $scope.cancel = function () {
                    $uibModalInstance.dismiss('cancel');
                };

                $scope.SocialLogin = function(provider) {
                    
                    Authenticate.social_login({'provider':provider}, function (data) {
                        if(data.status){
                            if(data.user.is_active == 1){
                                localStorage.setItem("logged_user", JSON.stringify(data.user));
                                $rootScope.logged_user = JSON.parse(localStorage.getItem("logged_user"));
                                localStorage.setItem("authorization", true);
                                $rootScope.authorization = localStorage.getItem("authorization");
                                if($rootScope.logged_user.is_complete == 1)
                                    $window.location = "#/home";
                                else
                                    $window.location = "#/register";

                                $uibModalInstance.dismiss('cancel');

                            }else{
                                $uibModalInstance.dismiss('cancel');
                                $rootScope.Logout( $filter('translate')('error_activation'));
                            }
                            

                          }else{
                            $scope.error_msg = data.msg;
                          }
                    });
                    // $auth.authenticate(provider)
                    //   .then(function(response) {
                    //     console.log($auth.authenticate(provider).then(successCallback));
                    //   })
                    //   .catch(function(response) {
                    //     console.log("dfgdfg");
                    //   });

                };

          
                $scope.forget = function () {
                    $uibModalInstance.dismiss('cancel');
                    $window.location = "#/forget";
                };
                $scope.login = function (row) {
                    Authenticate.login(row ,function (data) {
                        if(data.status){
                            if(data.user.is_active == 1){
                                localStorage.setItem("logged_user", JSON.stringify(data.user));
                                $rootScope.logged_user = JSON.parse(localStorage.getItem("logged_user"));
                                localStorage.setItem("authorization", true);
                                $rootScope.authorization = localStorage.getItem("authorization");
                                if($rootScope.logged_user.is_complete == 1)
                                    $window.location = "#/home";
                                else
                                    $window.location = "#/register";

                                $uibModalInstance.dismiss('cancel');

                            }else{
                                $uibModalInstance.dismiss('cancel');
                                $rootScope.Logout( $filter('translate')('error_activation'));
                            }
                            

                          }else{
                            $scope.error_msg = data.msg;
                          }
                    });
                }

            }
        });
      };


    $rootScope.Logout = function (error='') {

        Authenticate.logout(function () {
          $auth.logout().then(function () {
              $rootScope.authorization = false;
              $rootScope.logged_user = null;
              window.location ="#/home";
              localStorage.removeItem("logged_user");
              localStorage.removeItem("authorization");
                $rootScope.message_error = error;

          });
        });
    };

}]);


websiteApp.run(function($rootScope,$sce, $state ,$uibModal,$timeout,$cookieStore,$document,Website,Likes) {
    $rootScope.Image_Path ="assets/images";
    $rootScope.date = new Date();
    $rootScope.state = $state;
    $rootScope.message_error = '';
    
    $rootScope.isAuth = function() {
        Website.isAuthenticate(function(response) {
          if(!response.status){
                $rootScope.authorization = false;
                $rootScope.logged_user = null;
                window.location ="#/home";
              }
        });
    }
    $rootScope.isAuth();

    $rootScope.logged_user = JSON.parse(localStorage.getItem("logged_user"));
    $rootScope.authorization =localStorage.getItem("authorization");


    $rootScope.trustAsHtml = function(html) {
      return $sce.trustAsHtml(html);
    }

    $rootScope.LikeUser = function (user_like_id,type) {
        console.log(user_like_id);
        Likes.likeUser({user_like_id:user_like_id},function(response) {
            if(response.status){
                if(type == 2)
                    $rootScope.suitable_user.is_like = response.is_like;
                else if(type == 1)
                    $rootScope.random_user.is_like = response.is_like;
                else
                    $rootScope.isLike = response.is_like;
            }
        });
    };

    $rootScope.userProfile = function (id) {
       
        $uibModal.open({
            animation: true,
            templateUrl: 'tpl/modals/user-modal.html',
            keyboard  : false,
            windowClass: 'modal',
            windowClass: 'show', 
            backdropClass: 'show',
            size: 'md',
            controller: function ($scope, Profile, Likes,$uibModalInstance) {
                    
                Profile.profileData({id:id},function(response) {
                    $scope.user = response.data;
                    $scope.is_like =  $scope.user.is_like;
                });
                $scope.cancel = function () {
                    $uibModalInstance.dismiss('cancel');
                };
                $scope.likeUser = function (user_like_id) {
                    Likes.likeUser({user_like_id:user_like_id},function(response) {
                        if(response.status)
                            $scope.is_like = response.is_like;
                        // Likes.userLikes(function(response) {
                        //     $scope.users = response; 
                        // });
                    });
                };
            }
             
        });

    };

    $rootScope.membership = function () {
        $uibModal.open({
            templateUrl: 'tpl/modals/membership.html',
            keyboard  : false,
            windowClass: 'modal',
            windowClass: 'show', 
            backdropClass: 'show',
            size: 'lg',
            animation: true,
            controller: function ($rootScope,$scope,$uibModalInstance,Subscriptions) {
                Subscriptions.subscriptions(function(response) {
                    $scope.subscriptions = response;
                    console.log(response);
                });
                $scope.cancel = function () {
                    $uibModalInstance.dismiss('cancel');
                };

            }
        });
      };

});
