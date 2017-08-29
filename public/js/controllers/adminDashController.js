var app = angular.module('adminApp', []);

app.controller('adminDash', ['$scope', '$http','$window','sessionService', function($scope, $http,$window,sessionService) {

	var baseUrl = 'http://localhost/FeedBackPortal/public/api/faculty/feedbacks/';

	// $http.get(baseUrl)
	// .success

	// $scope.feedbacks = [{
	// 	id: '1',
	// 	title: 'Title 1',
	// 	feedback: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
	// 	status: 'Complete'
	// }, {
	// 	id: '2',
	// 	title: 'Title 2',
	// 	feedback: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
	// 	status: 'Incomplete'
	// }, {
	// 	id: '3',
	// 	title: 'Title 3',
	// 	feedback: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
	// 	status: 'Complete'
	// }];

	var fname = $('input:hidden').attr('value');
	var email = sessionService.get('email');
	var token = sessionService.get('token');

	$http.get(baseUrl+fname+'/'+token+'/'+email)
        .then(function(response) {

            $scope.feedbacks = response.data;
            console.log($scope.feedbacks);
            console.log("hello from feedback");
        });

	$scope.replyFeedback = function(id){
			$window.location.href = baseUrl+'chat.html?facultuId='+id; 
	};

	$scope.logout = function(){
    console.log("user log out");
    var email = sessionService.get('email');
    var token = sessionService.get('token');
    $http.get(baseUrl+'api/logout/'+token+'/'+email)
        .then(function(response) {
          console.log(response.data.msg);
          console.log(response.data.status);
        });
    sessionService.destroy('email');
    sessionService.destroy('token');

    window.location.href= "http://localhost/FeedBackPortal/public/login.php";
  };

}]);
