
websiteApp.factory('Website', function ($resource) {
    return $resource('../:operation/:id/:lang', {},{
        homeData:{method:'GET'  , params: {operation:'home-data'}, isArray: false},
        langData:{method:'GET'  , params: {operation:'lang-data'}, isArray: false},
        lang:{method:'GET'  , params: {operation:'lang'}, isArray: false},
        isAuthenticate: {method: 'GET', params: {operation: 'authenticate'}},
        resetPassword: {method: 'POST', params: {operation: 'resetPassword'}},
        forgetPassword: {method: 'POST', params: {operation: 'forgetPassword'}},

    })
});


websiteApp.factory('Profile', function ($resource) {
    return $resource('../:operation/:id', {},{
       profileData:{method:'GET'  , params: {operation:'profile-data'}, isArray: false},
       editprofile:{method:'GET'  , params: {operation:'edit-profile'}, isArray: false},
       addGalleryPhoto:{method:'POST'  , params: {operation:'add-gallery-photo'}, isArray: false},
    })
});

websiteApp.factory('Register', function ($resource) {
    return $resource('../:operation/:id', {},{
       getOptions:{method:'GET'  , params: {operation:'get-options'}, isArray: false},
       getCountryCode:{method:'GET'  , params: {operation:'country'}, isArray: false},
       completeProfile:{method:'POST', params: {operation:'complete-profile'}, isArray: false},
       editProfile:{method:'PUT', params: {operation:'edit-profile'}, isArray: false},
    })
});

websiteApp.factory('Search', function ($resource) {
    return $resource('../:operation/:id', {},{
      getOptions:{method:'GET'  , params: {operation:'get-options'}, isArray: false},
      filterData:{method:'POST'  , params: {operation:'filter-data'}, isArray: true},
    })
});

websiteApp.factory('Likes', function ($resource) {
    return $resource('../:operation/:id', {},{
      userLikes:{method:'GET'  , params: {operation:'user-likes'}, isArray: true},
      likeUser:{method:'POST'  , params: {operation:'like-user'}, isArray: false},
    })
});

websiteApp.factory('Discover', function ($resource) {
    return $resource('../:operation/:id', {},{
      getOptions:{method:'GET'  , params: {operation:'get-options'}, isArray: false},
      filterDiscover:{method:'POST'  , params: {operation:'filter-discover'}, isArray: false},
    })
});

websiteApp.factory('Chat', function ($resource) {
    return $resource('../:operation/:reciver_id', {},{
      addChannel:{method:'POST'  , params: {operation:'add-channel'}, isArray: false},
      getChannel:{method:'GET'  , params: {operation:'get-channel'}, isArray: false},
      chats:{method:'GET'  , params: {operation:'chats'}, isArray: true},
    })
});

websiteApp.factory('Subscriptions', function ($resource) {
    return $resource('../:operation', {},{
      subscriptions:{method:'GET'  , params: {operation:'subscriptions'}, isArray: true},
    })
});