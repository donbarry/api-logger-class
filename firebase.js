var app = angular.module("sampleApp", ["firebase"]);
app.controller("SampleCtrl", ["$scope", "$firebase",
  function($scope, $firebase) {
    var ref = new Firebase("https://dazzling-fire-6822.firebaseio.com/");

    // create an AngularFire reference to the data
    var sync = $firebase(ref);

    // download the data into a local object
    //$scope.data = sync.$asObject();

  	////var syncObject = sync.$asObject();
  	// synchronize the object with a three-way data binding
  	// click on `index.html` above to see it used in the DOM!
  	////syncObject.$bindTo($scope, "data");    

  $scope.messages = sync.$asArray();
  $scope.addMessage = function(text) {
    $scope.messages.$add({text: text});
  }  	
  }
]);