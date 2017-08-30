var app = angular.module('lnmApp', []);

app.controller('loginApp', ['$scope', '$http','$location','sessionService', function($scope, $http,$location,sessionService) {
	
	// var baseUrl = 'http://127.0.0.1:5000/';
	//var baseUrl = 'http://localhost/FeedBackPortal/public/';
	$scope.sendOtp = function() {
			console.log("hello ram");
			var email = $scope.sendEmail;
			 var indata = {'pos':1,'email':email};
			$http.post('api/login/' , indata)
		    .then(function(response) {
		    	console.log(response.data.msg);
		    	console.log(response.data.status);
		        $scope.responsemsg = response.data.msg;
		    });

			// $scope.responsemsg = loginService.register(indata);    
		

		// console.log($scope.register);

		// loginFactory.register($scope.register, function(response) {
		// 	console.log(response);
		// });
		
		
	};

	$scope.submit = function() {

		$scope.type = $('input:radio:checked').attr('value');
		var indata = {'pos':2,'email':$scope.sendEmail,'otp':$scope.typeOtp};
		 $http.post('api/login/' , indata)
		    .then(function(response) {
		    	console.log(response.data);
		    	//console.log(response.data.status);

		    	if(response.data.status == 4){
		        $scope.responsemsg1 = response.data.msg;
		    	}
		    	else if(response.data.status == 3){
		    		console.log("student login");
		    		sessionService.set('email',$scope.sendEmail);
		    		sessionService.set('token',response.data.token	);
		    		//$location.href(baseUrl+'realform.php?type=student&brach=CSE')
		    		window.location.href= "realform.php?type=student&dept=CSE";

		    	}
		    	else if(response.data.status == 5){
		    		console.log("faculty login");
		    		sessionService.set('email',$scope.sendEmail);
		    		sessionService.set('token',response.data.token);

		    		window.location.href="admindash.php?fname="+response.data.name;
		    	}
		    	else{
		    		console.log("other login");
		    	}
		    });    



		// $scope.submitOtp = {
		// 	username: $scope.sendEmail,
		// 	password: $scope.typeOtp,
		// 	type: $scope.type
		// };
		// console.log($scope.submitOtp);


		// loginFactory.login($scope.submitOtp, function(response) {
		// 	// console.log(response);

		// 	if (response.data.user.type == 'student') {
		// 		window.location.href = baseUrl + 'realForm.html';
		// 	} else if (response.data.user.type == 'faculty') {
		// 		window.location.href = baseUrl + 'adminDash.html';
		// 	}


		// });



	};

	// $scope.logout = function(){
	// 	console.log("user log out");
	// 	sessionService.destroy('email');
	// 	sessionService.destroy('token');
	// 	window.location.href= baseUrl+"login.php";
	// };	
}]);
