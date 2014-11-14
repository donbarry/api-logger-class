var app = angular.module("sampleApp", ["firebase"]);
app.controller("SampleCtrl", ["$scope", "$firebase",
  function($scope, $firebase) {

    $scope.register=function(){
      console.log("here");
    var ref = new Firebase("https://dazzling-fire-6822.firebaseio.com/");

        ref.createUser({
          email    : $scope.email,
          password : $scope.password
        }, function(err) {
          if (err) {
            switch (err.code) {
              case 'EMAIL_TAKEN':
                $scope.message="The new user account cannot be created because the email is already in use.";
                break;
              case 'INVALID_EMAIL':
                $scope.message="INVALID_EMAIL";
                break;
              default:
                $scope.message=err.code;
                
            }
          } else {
            // User account created successfully!
            $scope.message="User account created";
          }
          console.log($scope.message);
        });

    }

    $scope.login=function(){
      console.log("login");
    var ref = new Firebase("https://dazzling-fire-6822.firebaseio.com/");

        ref.authWithPassword({
          email    : $scope.email1,
          password : $scope.password1
        }, function(err,authData) {
          if (err) {
                $scope.message="Login failed." + err;
          } else {
            // User account created successfully!
            $scope.message="successfully logged in." + authData;
            console.log(authData);
          }
          console.log($scope.message);
        });

    }

}
]);