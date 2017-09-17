'use strict';
app.factory('sessionService',[function(){
	return {
		set:function(key,value){
			console.log("Session key set");
			return sessionStorage.setItem(key,value);
			
		},
		get:function(key){
			console.log("Session key get");
			return sessionStorage.getItem(key);
			
		},
		destroy:function(key){
			console.log("Session key Destroy");
			return sessionStorage.removeItem(key);
			
		}
	};

}])


