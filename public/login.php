<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Feedback Form</title>
		<meta name="description" content="A sidebar menu as seen on the Google Nexus 7 website" />
		<meta name="keywords" content="google nexus 7 menu, css transitions, sidebar, side menu, slide out menu" />
		<meta name="author" content="Codrops" />
		<!-- <link rel="shortcut icon" href="../favicon.ico"> -->
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<!-- <script src="js/modernizr.custom.js"></script> -->
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
	</head>
	<body style="font-family: 'Raleway', sans-serif;" ng-app="lnmApp" ng-controller="loginApp">
		<div class="container">
			<ul id="gn-menu" class="gn-menu-main">
				<header>
					 <img src="img/logo.png">
     				 <h1><b>LNMIIT Feedback and Complaint portal</b></h1>
				</header>

			</ul>
			<div id="student" class="tabcontent">
            <div class="form col-md-12">
              <div class="col-md-6">
                <h2><b>Login Here</b></h2>
                  <form class="login-form">
                  
                    <div class="email">
                    <input ng-model="sendEmail" type="text" name="email" class="login-email" placeholder="Type your LNMIIT Email"/>
                    

                    <button ng-click="sendOtp()" style="font-family: 'Raleway', sans-serif;background-color: rgb(52, 73, 94);" class="otp-button" type="submit">Send OTP</button>
                  </div>
                  <div class="otp-response" ng-model="responsemsg">
                  		{{responsemsg}}
                  </div>

                    <input ng-model="typeOtp" type="password" placeholder="Type Your OTP" name="otp"/>
					<!-- <div class="control-group">
              <b><label style="color: rgb(52, 73, 94);display: inline-block;class="control-label">Select Type</label></b>
              <br>&nbsp;
              <div  id="selectType" class="controls">
                <label style="display: inline-block;">
                  <input type="radio" name="radio" value="faculty"/>
                  Faculty</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label style="display: inline-block;">
                  <input type="radio" name="radio" value="student" />
                  Student</label>
              </div>
            </div> -->
                    <button ng-click="submit()" style="font-family: 'Raleway', sans-serif; background-color: rgb(52, 73, 94);"><b>Submit<b></button>
                  </form>
              </div>
              <div style="color: rgb(52, 73, 94);" class="rules-features col-md-6">
                  <h3><b>Rules</b></h3>
                    <ul>
                      <li>Only LNMIIT domain email id can be use.</li>
                      <li>You'll get an OTP on your email after click on send otp button.</li>
                      <li>OTP will expire after an hour</li>
                      <li>After Submiting your feedback you'll recieve an acknowledgement number on your email id</li>
                    </ul>
              </div>
            </div>
        </div>

		</div><!-- /container -->
		<!-- <script src="js/scripts/classie.js"></script> -->
		<!-- <script src="js/scripts/gnmenu.js"></script> -->
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular.min.js"></script>
		<!-- <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular-cookies.min.js"></script> -->
		<script src="js/scripts/jquery.min.js"></script>
		<script src="js/controllers/loginController.js"></script>
		<script src="js/factories/loginFactory.js"></script>
	</body>
</html>
