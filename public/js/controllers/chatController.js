var app = angular.module('lnmApp', []);

app.controller('chatApp', ['$scope', function($scope) {

	// $('.tip-bottom').

	$scope.headers = ['Home', 'Feedbacks', 'Chat'];

	$scope.faculties = [{
		id: '1',
		name: 'Faculty1',
		image: 'img/demo/av1.jpg'
	}, {
		id: '2',
		name: 'Faculty2',
		image: 'img/demo/av4.jpg'
	}];

	$scope.chats = [{
		id: '1',
		image: 'img/demo/av1.jpg',
		name: 'You',
		time: '8:30',
		msg: 'Hey There ! How are you!'
	}, {
		id: '2',
		image: 'img/demo/av1.jpg',
		name: 'Ayush',
		time: '8:35',
		msg: 'I m fine! Thank you'
	}, {
		id: '3',
		image: 'img/demo/av1.jpg',
		name: 'You',
		time: '8:36',
		msg: 'What are your queries ?'
	}];

	$scope.sendMsg = function() {

		var chatObj = {
			id: '3',
			image: 'img/demo/av3.jpg',
			name: 'You',
			time: '8:37',
			msg: $scope.chatMsg
		};

		$scope.chats.push(chatObj);
	};

}]);
