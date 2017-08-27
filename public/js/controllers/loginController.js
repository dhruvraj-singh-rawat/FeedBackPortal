var app = angular.module('lnmApp', []);

app.controller('loginApp', ['$scope', '$http', function($scope, $http) {
	
	// var baseUrl = 'http://127.0.0.1:5000/';
	// var baseUrl = 'https://lnm-feedback-portal.herokuapp.com/';
	$scope.sendOtp = function() {
			console.log("hello ram");
			// $scope.register = {
			// username: $scope.sendEmail
			// };
			var email = $scope.sendEmail
			var indata = {'pos':1,'email':email};
			$http.post('http://localhost/FeedBackPortal/public/api/login/' , indata)
		    .then(function(response) {
		    	console.log(response.data.msg);
		    	console.log(response.data.status);
		        $scope.responsemsg = response.data.msg;
		    });
		    
		

		// console.log($scope.register);

		// loginFactory.register($scope.register, function(response) {
		// 	console.log(response);
		// });
	};

	$scope.submit = function() {
		$scope.type = $('input:radio:checked').attr('value');
		$scope.submitOtp = {
			username: $scope.sendEmail,
			password: $scope.typeOtp,
			type: $scope.type
		};
		console.log($scope.submitOtp);

		loginFactory.login($scope.submitOtp, function(response) {
			// console.log(response);

			if (response.data.user.type == 'student') {
				window.location.href = baseUrl + 'realForm.html';
			} else if (response.data.user.type == 'faculty') {
				window.location.href = baseUrl + 'adminDash.html';
			}


		});



	};
}]);
