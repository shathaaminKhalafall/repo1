websiteApp.config(['$middlewareProvider',
    function middlewareProviderConfig($middlewareProvider) {
      
      $middlewareProvider.map({
            'is-complete':function isComplete($rootScope,$q,$state) {
                $rootScope.message_error = "";
                if(!$rootScope.logged_user.is_complete){
                    this.redirectTo('register');
                }
                return this.next();
            }  ,
            'is-complete-reg':function isCompleteReg($rootScope,$q,$state) {
                if($rootScope.logged_user.is_complete){
                    this.redirectTo('home');
                }
                return this.next();
            }    
      });
      
    }
]);

/* Setup Rounting For All Pages */
websiteApp.config(['$stateProvider', '$urlRouterProvider', function($stateProvider, $urlRouterProvider) {
    // Redirect any unmatched url

    
    $urlRouterProvider.otherwise("/home");
    
    $stateProvider
        .state('home', {
            url: "/home",
            templateUrl: 'views/home.html',
            data: {pageTitle: 'Home'},
            controller: "HomeController",
        })
        .state('likes', {
            url: "/likes",
            templateUrl: 'views/likes.html',
            data: {pageTitle: 'Likes'},
            controller: "LikesController",
            middleware:['is-complete'],
            resolve: {
                authenticated: authentic
            }
        })
        .state('profile', {
            url: "/profile",
            templateUrl: 'views/profile.html',
            data: {pageTitle: 'My Profile'},
            controller: "ProfileController",
            // middleware:['is-complete'],
            resolve: {
                authenticated: authentic
            } 
        })
        .state('chat', {
            url: "/chat/:reciver_id",
            templateUrl: 'views/chats.html',
            data: {pageTitle: 'Chat'},
            controller: "ChatController",
            middleware:['is-complete'],
            resolve: {
                authenticated: authentic
            } 
        })
        .state('chats', {
            url: "/chats",
            templateUrl: 'views/usersChats.html',
            data: {pageTitle: 'Chat'},
            controller: "ChatsController",
            middleware:['is-complete'],
            resolve: {
                authenticated: authentic
            } 
        })
        .state('discover', {
            url: "/discover",
            templateUrl: 'views/discover.html',
            data: {pageTitle: 'Discover'},
            params: {filters: null},
            controller: "DiscoverController", 
            middleware:['is-complete'],
            resolve: {
                authenticated: authentic
            }
        })  
        .state('forget', {
            url: "/forget",
            templateUrl: 'views/forget.html',
            data: {pageTitle: 'Forgot Password'},
            controller: "ForgetController", 
        })
        .state('resetPassword', {
            url: "/resetPassword",
            templateUrl: 'views/resetPassword.html',
            data: {pageTitle: 'Reset Password'},
            controller: "ResetPasswordController",
        })

        .state('contactUs', {
            url: "/contactUs",
            templateUrl: 'views/contactUs.html',
            data: {pageTitle: 'Contact Us'},
            controller: "ContactUsController", 
        })
        .state('search', {
            url: "/search",
            templateUrl: 'views/search.html',
            data: {pageTitle: 'Search'},
            controller: "SearchController", 
            middleware:['is-complete'],
            resolve: {
                authenticated: authentic
            }  
        })
        .state('details', {
            url: "/details/:title",
            templateUrl: 'views/details.html',
            data: {pageTitle: 'Details'},
            controller: "DetailsController", 
            middleware:['is-complete'],
            resolve: {
                authenticated: authentic
            }  
        })
        .state('register', {
            url: "/register",
            templateUrl: 'views/register.html',
            data: {pageTitle: 'Register'},
            controller: "RegisterController",
            middleware:['is-complete-reg'],
            resolve: {
                authenticated: authentic
            }         
        })
        .state('editProfile', {
            url: "/editProfile",
            templateUrl: "views/editProfile.html",
            data: {pageTitle: 'Edit Profile'},
            controller: "EditProfileController",
            middleware:['is-complete'],
            resolve: {
                authenticated: authentic,
            } 
        })

        function authentic($rootScope,Website,$q) {
            var deferred = $q.defer();

            Website.isAuthenticate(function(response) {
              if(response.status){
                localStorage.setItem("logged_user", JSON.stringify(response.user));
                $rootScope.logged_user = JSON.parse(localStorage.getItem("logged_user"));
                $rootScope.authorization =localStorage.getItem("authorization");
                deferred.resolve();
              }else{
                $rootScope.authorization = false;
                $rootScope.logged_user = null;
                window.location ="#/home";
              }
            });
            return deferred.promise;
        };

        // function authentic($rootScope,Website,$q) {
        //     var deferred = $q.defer();
        //     if(localStorage.getItem("authorization")){
        //         deferred.resolve();
        //     }else{
        //         window.location ="#/home";
        //     }
        //     return deferred.promise;
        // };

}]);


