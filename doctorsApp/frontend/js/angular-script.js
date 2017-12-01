var crudApp = angular.module('crudApp',[]);
crudApp.controller("DbController",['$scope','$http', '$filter', function($scope,$http,$filter){
var string = "qwertyuiopoiu"
	$filter('limitTo')(string, 11, 0)

$scope.patient = {date:''};


$('#list').css('display', 'none');
getInfo();

function getInfo(){
	$('#list').css('display', 'none');
$http.get('http://0.0.0.0:5000/patients').success(function(data){
	console.log(data.data)
$scope.details = data.data;
// $('#list').css('display', 'none');
});
}


$scope.show_form = true;
$scope.formToggle =function(){
$('#empForm').slideToggle();
$('#list').css('display', 'none');
}

$scope.insertInfo = function(info){
	// console.log(info)
today= $('#datepicker').val();
console.log(today)
$http.post('http://0.0.0.0:5000/add_pateint',{"name":info.name,"phone":info.phone,"time_slot":info.time_slot,"a_date":today}).success(function(data){
$('#empForm').css('display', 'none');
$scope.patient={};
if (data.success == true) {
 this.patient = ''
console.log('success')
}
}).error(function(err){
	console.log(err)
});
}

$scope.viewDoctor = function(){
	$('#list').slideToggle();
	$('#empForm').css('display', 'none');
}




}]);