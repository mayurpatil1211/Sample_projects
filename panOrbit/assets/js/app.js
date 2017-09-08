var app = angular.module('mainApp',[]);

app.controller('app', function($scope, $http,$sce){
	$http.get('http://127.0.0.1:8080/displayData').then(function(res){
		console.log(res.data);
		// console.log(res[0].groups[0].name)
		// $scope.details = res.data;
		// var data = res;	
		// $scope.vd= 'assets/img/baby.3gp';
		// $scope.videoUrl =  $sce.trustAsResourceUrl($scope.vd);	
	
	})

})