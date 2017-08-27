<!DOCTYPE html>
<html lang="en">
<head>
<title>Matrix Admin</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="css/uniform.css" />
<link rel="stylesheet" href="css/select2.css" />
<link rel="stylesheet" href="css/matrix-style.css" />
<link rel="stylesheet" href="css/matrix-media.css" />
<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

<!-- <link rel="stylesheet" type="text/css" href="stylesheet.css"> -->
<link rel="stylesheet" href="css/formstyle.css">
</head>
<body ng-app="formApp" ng-controller="formCtrl" ng-cloak>

<!--Header-part-->
<div id="header">
  <h1><a href="dashboard.html">Admin</a></h1>
</div>
<!--close-Header-part-->

<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li class=""><a title="" href="login.html"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
  </ul>
</div>

<!--start-top-serch-->
<!--close-top-serch-->

<!--sidebar-menu-->

<div id="sidebar">
  <a href="#" class="visible-phone"><i class="icon icon-file"></i>Menu</a>
  <ul>
    <li><a href="#" class=""><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
     <li class="submenu active"> <a href="#"><i class="icon icon-th-list"></i> <span>Select Department</span> <span class="label label-important">5</span></a>
      <ul>
        <li ng-repeat="dept in Department"><a id="branch-{{dept.id}}" href="#" ng-click="changedept(dept.id,dept.name)">
        {{dept.name}}</a></li>
      </ul>
    </li>
    <li><a href="chat.html"><i class="icon icon-tint"></i> <span>Chat</span></a></li>
    <li><a href="login.html"><i class="icon icon-tint"></i> <span>LogOut</span></a></li>
    <li><a href="interface.html"><i class="icon icon-pencil"></i> <span>About-us</span></a></li>
  </ul>
</div>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Feedback</a> </div>
  </div>
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
              <h5>Feedback-Form</h5>
           </div>
           <!-- <div class="widget-content nopadding"> -->

            <div class="feedback-form">

          <main>
              <div class="container">
                <div class="row">
                  <div class="col-md-12">&nbsp;</div>
                </div>
                <div class="row">
                </div>
                <form name="multiStepForm" class="form-validation" role="form" novalidate>
                  <div class="animate-switch-container" ng-switch on="stage" ng-class="{forward: direction, backward:!direction}">
                    <div class="animate-switch" ng-switch-default>
                      <div class="row">
                        <div class="col-md-12">
                          <p>Welcome to the form.</p>
                          <h1>Welcome to {{deptname}} Department</h1>
                          <button type="button" class="btn btn-primary" ng-click="next('stage1')">Start</button>
                        </div>
                      </div>
                    </div>
                    <div class="animate-switch" ng-switch-when="stage1">
                      <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                          <div class="form-group">
                            <label for="tb-fname">Select Year</label><br>
                            <input type="radio" name="year" ng-model="formParams.year" value="1" required >I<br>
                            <input type="radio" name="year" ng-model="formParams.year" value="2" required>II<br>
                            <input type="radio" name="year" ng-model="formParams.year" value="3" required>III<br>
                            <input  type="radio" name="year" ng-model="formParams.year" value="4" required>IV<br>
                            <input type="radio" name="year" ng-model="formParams.year" value="5" required>PG<br>

                            <span style="color:red" ng-show="multiStepForm.year.$invalid">
                            <span ng-show="multiStepForm.year.$untouched">Year is required.</span>
                            </span>
                          </div>
                        </div>
                      </div>
                      
                      <input type="text" ng-model="formParams.dept">
                      
                      <button type="button" class="btn btn-info" ng-click="back('')">Back</button>
                      <button type="button" class="btn btn-primary" ng-click="next('stage2')">Next</button>
                    </div>

                    <div class="animate-switch" ng-switch-when="stage2">
                      <div class="form-group">
                        <label for="ta-body">Select Faculty</label>
                        <select required name="facultyname" ng-model="formParams.facultyname"
                        ng-change="changeSub()"> 
                          <option ng-repeat="faculty in facultynames" value="{{faculty.name}}">{{faculty.name}}</option>           
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="ta-body">Select Course</label>
                        <select required name="coursename" ng-model="formParams.coursename">
                            <option ng-repeat="course in coursenames">{{course.course_name}}</option>
                        </select>
                      </div>
                      <button type="button" class="btn btn-info" ng-click="back('stage1')">Back</button>
                      <button type="button" class="btn btn-primary" ng-click="next('stage3')">Next</button>
                    </div>

                    <div class="animate-switch" ng-switch-when="stage3">
                      <div class="form-group">
                        <label for="ta-body">Feedback Title</label>
                        <input class="form-control" name="title" id="ta-body" ng-model="formParams.feedbacktitle" required ng-class="{'input-error': formValidation && multiStepForm.title.$error.required}">
                      </div>
                      <div class="form-group">
                        <label for="ta-body">Comments:</label>
                        <textarea class="form-control" rows="5" name="comment" id="ta-body" ng-model="formParams.feedbackcomment" required ng-class="{'input-error': formValidation && multiStepForm.comment.$error.required}"></textarea>
                      </div>
                      <button type="button" class="btn btn-info" ng-click="back('stage2')">Back</button>
                      <button type="button" class="btn btn-primary" ng-click="next('stage4')">Next</button>
                    </div>

                    <div class="animate-switch" ng-switch-when="stage4">
                      <h3>Summary</h3>
                      <p>Faculty Name: {{formParams.facultyname}}</p>
                      <p>Course name: {{formParams.coursename}}</p>
                      <p>Feedback Title: {{formParams.feedbacktitle}}</p>
                      <p>Your Comment: {{formParams.feedbackcomment}}</p>
                      <button type="button" class="btn btn-info" ng-click="back('stage3')">Back</button>
                      <button type="button" class="btn btn-warning" ng-click="submitForm()">Submit</button>
                    </div>

                    <div class="animate-switch" ng-switch-when="success">
                      <div class="success-wrap">
                        <h2 class="confirmation-text">Thank you</h2>
                        <p>Your Feedback has been Submitted.<br>You should receive a confirmation email With Aknowledgment number.</p>
                        <div><button type="button" class="btn btn-success" ng-click="reset()" >Send Another</button></div>
                      </div>
                    </div>

                    <div class="animate-switch" ng-switch-when="error" >
                      <div class="error-wrap">
                        <h2 class="confirmation-text">Error</h2>
                        <p>There was an error when attempting to submit your request.<br>Please try again later.</p>
                        <p><strong>*This will always error until a web service URL is set.*</strong></p>
                        <div><button type="button" class="btn btn-danger" ng-click="reset()" >Try again</button></div>
                      </div>
                    </div>

                  </div>
                </form>

              </div>
            </main>

          </div> 
           </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--Footer-part-->
<div class="row-fluid">
  <div id="footer" class="span12"> 2013 &copy; Created By <a href="http://themedesigner.in">The Team</a> </div>
</div>
<!--end-Footer-part-->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular.min.js"></script> -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular-cookies.min.js"></script> -->
<script src="js/scripts/jquery.min.js"></script>
<!-- <script src="js/angular.min.js"></script> -->
<script src="js/scripts/jquery.ui.custom.js"></script>
<script src="js/scripts/bootstrap.min.js"></script>
<script src="js/scripts/jquery.uniform.js"></script>
<!-- <script src="js/select2.min.js"></script> -->
<script src="js/scripts/jquery.dataTables.min.js"></script>
<script src="js/scripts/matrix.js"></script>
<!-- <script src="js/scripts/matrix.tables.js"></script> -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.5/angular.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.5/angular-animate.min.js'></script>
<script src="js/scripts/formmain.js"></script>

<!-- <script src="js/controllers/realFormController.js"></script> -->
<!-- <script src="js/factories/loginFactory.js"></script> -->
</body>
</html>
