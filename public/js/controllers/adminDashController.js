var app = angular.module('adminApp', []);

app.controller('adminDash', ['$scope', '$http','$window','sessionService', function($scope, $http,$window,sessionService) {

	//var baseUrl = 'api/faculty/feedbacks/';

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

	$http.get('api/faculty/feedbacks/'+fname+'/'+token+'/'+email)
        .then(function(response) {

            $scope.feedbacks = response.data;
            console.log($scope.feedbacks);
            console.log("hello from feedback");
        });

	// $scope.replyFeedback = function(id){
	// 		$window.location.href = 'chat.html?facultuId='+id; 
	// };

	$scope.logout = function(){
    console.log("user log out");
    var email = sessionService.get('email');
    var token = sessionService.get('token');
    $http.get('api/logout/'+token+'/'+email)
        .then(function(response) {
          console.log(response.data.msg);
          console.log(response.data.status);
        });
    sessionService.destroy('email');
    sessionService.destroy('token');

    window.location.href= "login.php";
  };

  $scope.submit_response=function(response_id){
  		var ack_no=sessionService.get('ack_no');
  		var email=sessionService.get('email');
  		var token=sessionService.get('token');
  		var msg;
  		var action = '1';
  	if(response_id==1){	//submiting response
  		msg = $scope.response_msg;
  		console.log(msg);
  	}
  	else if(response_id==2){	//submiting response
  		msg = "Reported"
  	}
  	else if(response_id==3){	//submiting response
  		msg = "Ignored"
  	}
  	var indata = {'ack_no':ack_no,'email':email,'token':token,'responce':msg,'action':action};
  	console.log(indata);
  	$http.post('api/faculty/feedbacks/action',indata)
        .then(function(response) {
            console.log("Response Submitted");
            console.log(response.data);
            if (response.data[0].status == 1) {
            console.log("successfully submitted");
            
          } else {
            if (response.data[0].status == 0) {
              console.log("error submitted");
            }
          }

        });


  };
  $scope.set_response = function(ack_no){
  		sessionService.set('ack_no',ack_no);
  		console.log("dev babu");
  	
    };
}]);
