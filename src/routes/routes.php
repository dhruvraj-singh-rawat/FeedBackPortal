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

	        		$stmt = $db->query($sql);
        			$responser = $stmt->fetch(PDO::FETCH_ASSOC);

	        		if ($count){

	        					@$myObj->status = 5;
	        					$myObj->name= $responser['name'];
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

// Retrieving Faculty Information of Particular Year ! 

$app->get('/api/form/info/year_faculty/{department}/{year}', function(Request $request, Response $response){

    $year = $request->getAttribute('year');
    $department = $request->getAttribute('department');

    $sql = "SELECT * FROM faculty WHERE year = '".$year."' AND department = '".$department."'";
    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();
        $stmt = $db->query($sql);

        $json = array();
        

		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			$faculty = array(
		        'name' => $row['name'],
		        'year' => $row['year'],
		        
		    );
		    array_push($json, $faculty);
   
		}
		$db = null;

		$jsonstring = json_encode($json);
		echo $jsonstring; 

        

    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});

$app->get('/api/form/info/faculty_course/{department}/{year}/{name_faculty}', function(Request $request, Response $response){

    $year = $request->getAttribute('year');
    $department = $request->getAttribute('department');
    $name_faculty = $request->getAttribute('name_faculty');
    
    $sql = "SELECT * FROM courses WHERE year = '".$year."' AND department = '".$department."' AND faculty= '".$name_faculty."'";
    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();
        $stmt = $db->query($sql);

        $json = array();
        

		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			$courses = array(
		        'faculty' => $row['faculty'],
		        'year' => $row['year'],
		        'course_name' => $row['course_name'],

		        
		    );
		    array_push($json, $courses);
   
		}
		$db = null;

		$jsonstring = json_encode($json);
		echo $jsonstring; 

        

    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});

// Implementing the course feedback API 

$app->post('/api/form/feedback', function(Request $request, Response $response){

    $faculty = $request->getParam('faculty');
    $course_name = $request->getParam('course_name');
    $from_who = $request->getParam('email');
    $subject = $request->getParam('subject');
    $feedback = $request->getParam('feedback');
    $year = $request->getParam('year');

    $ack_no = $reference=uniqid();;
    
    $sql = "INSERT INTO feedback (faculty,course_name,from_who,subject,feedback,ack_no,year) VALUES
    (:faculty,:course_name,:from_who,:subject,:feedback,:ack_no,:year)";
    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':faculty', $faculty);
        $stmt->bindParam(':course_name',  $course_name);
        $stmt->bindParam(':from_who',      $from_who);
        $stmt->bindParam(':subject',      $subject);
        $stmt->bindParam(':feedback',    $feedback);
        $stmt->bindParam(':ack_no',       $ack_no);
        $stmt->bindParam(':year',       $year);
        
        $stmt->execute();
        $json = array();

			$feedback = array(
		        'status' => 1,
		        'msg' => 'Successfully Submitted your Feedback :) ',
		        		        
		    );

		    array_push($json, $feedback);
		    $jsonstring = json_encode($json);
			echo $jsonstring; 

    } catch(PDOException $e){

    			$json = array();
        		$feedback = array(
		        'status' => 0,
		        'msg' => 'Something Went Wrong! Please Try again later :( ',
		        		        
		    );

		    array_push($json, $feedback);
		    $jsonstring = json_encode($json);
			echo $jsonstring; 
    }
});

// Retrieve Faculty Feedbacks

$app->get('/api/faculty/feedbacks/{faculty_name}', function(Request $request, Response $response){

    $faculty_name = $request->getAttribute('faculty_name');
    

    $sql = "SELECT * FROM feedback WHERE faculty = '".$faculty_name."'";
    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();
        $stmt = $db->query($sql);

        $json = array();
        

		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			$feedbacks = array(

				'subject' => $row['subject'],
		        'feedback' => $row['feedback'],
		        'course_name' => $row['course_name'],
		        'ack_no' => $row['ack_no'],
		        
		    );
		    array_push($json, $feedbacks);
   
		}
		$db = null;

		$jsonstring = json_encode($json);
		echo $jsonstring; 

        

    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});

// Get all Customers
$app->get('/api/customers',function(Request $request, Response $response){

	echo 'Customers';

});
