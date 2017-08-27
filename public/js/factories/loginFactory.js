app.factory('loginFactory', ['$http', function($http) {

	var baseUrl = 'http://127.0.0.1:5000/';
	//var baseUrl = 'https://lnm-feedback-portal.herokuapp.com/';
	var token;
	var user_id;

	return {
		register: function(data, callback) {
			$http.post(baseUrl + 'users/register', data)
				.then(function(success) {
					callback(success);
				}, function(error) {
					callback(error);
				});
		},
		login: function(data, callback) {
			$http.post(baseUrl + 'users/login', data)
				.then(function(success) {
					token = success.data.token;
					user_id = success.data.user._id;
					console.log(token);
					console.log(user_id);
					callback(success);
				}, function(error) {
					callback(error);
				});
		},
		getToken: function() {

			return token;
		},
		getUserId: function() {
			return user_id;
		}

	};

}]);
