var app = angular.module('lnmApp', []);

app.controller('adminDash', ['$scope', '$http', 'loginFactory','$window', function($scope, $http, loginFactory,$window) {

	var baseUrl = 'http://127.0.0.1/feedback_portal_final/';

	// $http.get(baseUrl)
	// .success

	$scope.feedbacks = [{
		id: '1',
		title: 'Title 1',
		feedback: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
		status: 'Complete'
	}, {
		id: '2',
		title: 'Title 2',
		feedback: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
		status: 'Incomplete'
	}, {
		id: '3',
		title: 'Title 3',
		feedback: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
		status: 'Complete'
	}];

	$scope.replyFeedback = function(id){
			$window.location.href = baseUrl+'chat.html?facultuId='+id; 
	};

}]);
