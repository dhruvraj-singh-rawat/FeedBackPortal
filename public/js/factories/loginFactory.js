'use strict';
var app = angular.module('lnmApp',[]);
var baseUrl = 'http://localhost/FeedBackPortal/public/';
app.factory('loginService',['sessionService','$location',function(sessionService,$location){
	return {
		register:function(data){
			var msg;
			$http.post(baseUrl+'api/login/' , data)
		    .then(function(response) {
		    	console.log(response.data.msg);
		    	console.log(response.data.status);
		         msg = response.data.msg;
		    });
		    return msg;
		},
		submit:function(key){
			return sessionStorage.getItem(key);
		},
		logout1:function(key){
			return sessionStorage.removeItem(key);
		}
	};

}]);



