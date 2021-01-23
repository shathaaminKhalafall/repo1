websiteApp.controller('ChatController', ['$rootScope','$scope','$firebaseArray','$stateParams','$filter','Chat', function($rootScope,$scope, $firebaseArray, $stateParams,$filter,Chat) {
    
    $scope.message ="";
    $scope.chats = [];
    var ref = firebase.database().ref('chats');
    var messages ;
    var channel_ref;
    Chat.getChannel({'reciver_id':$stateParams.reciver_id} ,function (data) { 
      $scope.reciver = data.reciver;
      $rootScope.isLike = data.reciver.is_like;
      $scope.suggest_users = data.suggest_users;
      if(data.status){
        $rootScope.channel_id = data.data.id;
        ref.child(data.data.id).once('value').then((snapshot) => {
          $scope.channel = snapshot.val();
        });

        channel_ref = ref.child(data.data.id).child('messages');
        messages = $firebaseArray(channel_ref);
        $scope.chats = messages;

        ref.child(data.data.id).update({
            is_read:1,
            sender: $rootScope.logged_user,
            reciver:$stateParams.reciver_id
        });
      }else{
        Chat.addChannel({user_id_one: $rootScope.logged_user.id,user_id_two:$stateParams.reciver_id} ,function (data2) { 
      		$rootScope.channel_id = data2.id;
          ref.child(data2.id).update({
            sender: $rootScope.logged_user,
            reciver:$stateParams.reciver_id
          });

          ref.child(data2.id).once('value').then((snapshot) => {
            $scope.channel = snapshot.val();
          });

          channel_ref = ref.child(data2.id).child('messages');
          messages = $firebaseArray(channel_ref);
          $scope.chats = messages;

        });
      }
      
    });

    $scope.add = function(message){
        $scope.message ="";
        if(message != ""){
          var msg = {
            text: message,
            sentAt:$filter('date')(new Date, 'h:mma (M/d/yy)'),
          }
  	      messages.$add(msg);
          ref.child($rootScope.channel_id).update({
            last_msg: message,
            is_read:0
          });
        }
    }

    $scope.deleteChannel = function(){
        ref.child($rootScope.channel_id).remove();
    }


}]);

websiteApp.controller('ChatsController', ['$rootScope','$scope','$firebaseArray','$stateParams','$filter','Chat', function($rootScope,$scope, $firebaseArray, $stateParams,$filter,Chat) { 
    var ref =  firebase.database().ref('chats').orderByChild('reciver').equalTo($rootScope.logged_user.id+"");
    var chats = $firebaseArray(ref);
    $scope.chats = chats;
}]);
