<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App;


 
$app->options('/{routes:.+}', function ($request, $response, $args) {
    return $response;
});

$app->add(function ($req, $res, $next) {
    $response = $next($req, $res);
    return $response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
});    

$app->post('/api/login/', function(Request $request, Response $response){

	$email = $request->getParam('email');
	$pos = $request->getParam('pos');
	$otp = $request->getParam('otp');
	$who = $request->getParam('who');
	$db = new db();

	$email = (string) $email;

    if ($pos==1){
    	// Generation of OTP

    	@list($user, $domain) = explode('@', $email);
    	if ($domain == 'lnmiit.ac.in'){


    		$sql = "SELECT otp FROM otp_temp WHERE email = '".$email."'";
    	    
	   		try{
	        // Get DB Object
	        $db = new db();
	        // Connect
	        $db = $db->connect();
	        $stmt = $db->query($sql);
	        $responce = $stmt->fetch(PDO::FETCH_OBJ);

	        $db = null;
	        $count=$stmt->rowCount();
	    	} catch(PDOException $e){
	        echo '{"error": {"text": '.$e->getMessage().'}';
	    	}

	    	if($count){

	    			@$myObj->status = 2;
					$myObj->msg = "OTP Already Generated! ";

					$myJSON = json_encode($myObj);

		    		echo $myJSON;

	    	}
	    	else{

		    	$otp_internal=rand(1000,999999);

	    		$sql = "INSERT INTO otp_temp (otp,email) VALUES(:otp_internal,:email)";
	    		$db = new db();
	    		$db = $db->connect();
	    		
	    		$stmt = $db->prepare($sql);

	    		$stmt->bindParam(':otp_internal', $otp_internal);
	    		$stmt->bindParam(':email', $email);

	    		if ($stmt->execute()){

				    @$myObj->status = 1;
					$myObj->msg = "OTP Generated Successfully";

					$myJSON = json_encode($myObj);

		    		echo $myJSON;

	    		}
	    		else{

	    			$myObj->status = 0;
					$myObj->msg = "Something Went Wrong! ";

					$myJSON = json_encode($myObj);

		    		echo $myJSON;
	    			}

		    	}


    	}
    	else{

    		@$myObj->status = 6;
    		$myObj->msg = "Only LNMIIT domain ID is acceptable! ";
    		$myJSON = json_encode($myObj);
    		echo $myJSON;

    	}


    }
    elseif ($pos==2){
    	// checking the OTP 
    		$sql = "SELECT otp FROM otp_temp WHERE email = '".$email."' AND otp= '".$otp."'";
    	    
	    try{
	        // Get DB Object
	        $db = new db();
	        // Connect
	        $db = $db->connect();
	        $stmt = $db->query($sql);
	        $count=$stmt->rowCount();
	        $db=null;

	        if($count){

	        		$sql = "DELETE FROM otp_temp WHERE email = '".$email."'";
	        		$db = new db();
	        		$db = $db->connect();
	        		$stmt = $db->query($sql);
	        		$db=null; 

	        		$sql = "SELECT * FROM accounts WHERE email = '".$email."'";
	        		$db = new db();
	        		$db = $db->connect();
	        		$stmt = $db->query($sql);
	        		$count=$stmt->rowCount();

	        		if ($count){

	        					@$myObj->status = 5;
								$myObj->msg = "Successfully Logged In! ";
								$myJSON = json_encode($myObj);
								echo $myJSON;

	        		}
	        		else{

	        				@$myObj->status = 3;
							$myObj->msg = "Successfully Logged In! ";

							$myJSON = json_encode($myObj);

				    		echo $myJSON;

	        		}




	        }
	        else{

	        		@$myObj->status = 4;
					$myObj->msg = "Invalid OTP! ";

					$myJSON = json_encode($myObj);

		    		echo $myJSON;

	        }

	        $responce = $stmt->fetch(PDO::FETCH_OBJ);

	        $db = null;
	        
	    	} catch(PDOException $e){
	        echo '{"error": {"text": '.$e->getMessage().'}';
	    	}



    }


});



$app->get('/api/login/{email}/{otp}/{pos}', function(Request $request, Response $response){





});


// Get all Customers
$app->get('/api/customers',function(Request $request, Response $response){

	echo 'Customers';

});
