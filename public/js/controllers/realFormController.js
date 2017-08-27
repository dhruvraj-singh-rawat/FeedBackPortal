var app = angular.module('lnmApp', []);

app.controller('app', ['$scope', '$http', 'loginFactory', function($scope, $http, loginFactory) {
	var baseUrl = 'https://lnm-feedback-portal.herokuapp.com/';
	$scope.facultySelect = 0;

	$scope.formToggle = true;

	$scope.goNext = function() {

		$scope.year = $('input:radio:checked').attr('value');
		console.log($scope.year);
		$scope.formToggle = false;
		var token = loginFactory.getToken();
		$http.get(baseUrl + 'faculty/' + $scope.year, {
				headers: {
					"x-access-token": token
				}
			})
			.success(function(response) {
				console.log(response);
				$scope.faculties = response;
			});
	};

	$scope.save = function() {

		var id = $('select#facultyDropdown option:selected').val();
		console.log(id);
		console.log($scope.facultySelect);

		var userId = loginFactory.getUserId();
		console.log(userId);
		$scope.sendFeedback = {
			faculty_id: id,
			faculty_name: $scope.facultySelect,
			subject: $scope.subjectSelect,
			title: $scope.title,
			message: $scope.feedback,
			student_id: userId
		};

		$http.post(baseUrl + 'feedback', $scope.sendFeedback)
			.success(function(response) {
				console.log(response);
			});
	};

	$scope.branches = [{
		id: '1',
		name: 'CSE'
	}, {
		id: '2',
		name: 'CCE'
	}, {
		id: '3',
		name: 'ECE'
	}, {
		id: '4',
		name: 'MME'
	}, {
		id: '5',
		name: 'ME'
	}];
	/*$scope.faculties = [{
		index: 0,
		name: 'Faculty1',
		subject: ['Dummy1', 'Dummy2', 'Dummy3']
	}, {
		index: 1,
		name: 'Faculty2',
		subject: ['Dummy1', 'Dummy2']
	}];*/

}]);
