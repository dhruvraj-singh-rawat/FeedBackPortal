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
</head>
<body ng-app="lnmApp" ng-controller="adminDash">

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
    <li><a href="#"><i class="icon icon-tint"></i> <span>Chats</span></a></li>
    <li><a href="#"><i class="icon icon-tint"></i> <span>LogOut</span></a></li>
    <li><a href="#"><i class="icon icon-pencil"></i> <span>About-us</span></a></li>
  </ul>
</div>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Tables</a> </div><input type="hidden" 
    value="<?php echo $_GET['fname'];?>">
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Feedbacks</h5>
          </div>  
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Title</th>
                  <th>FeedBack</th>
                  <th>acknowledgement</th>
                  <th>Course</th>
                  <th>status</th>
                </tr>
              </thead>
              <tbody>
                <tr ng-click="replyFeedback()" style="cursor: pointer;" 
                  ng-repeat="feedback in feedbacks" class="gradeX">
                  <td>{{feedback.subject}}</td>
                  <td>{{feedback.feedback}}</td>
                  <td>{{feedback.ack_no}}</td>
                  <td>{{feedback.course_name}}</td>
                  <td>complete</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--Footer-part-->
<div class="row-fluid">
  <div id="footer" class="span12"> 2017 &copy; Created By <a href="http://themedesigner.in"></a> </div>
</div>
<!--end-Footer-part-->
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
<script src="js/scripts/jquery.min.js"></script>
<script src="js/scripts/jquery.ui.custom.js"></script>
<script src="js/scripts/bootstrap.min.js"></script>
<script src="js/scripts/jquery.uniform.js"></script>
<!-- <script src="js/select2.min.js"></script> -->
<script src="js/scripts/jquery.dataTables.min.js"></script>
<script src="js/scripts/matrix.js"></script>
<!-- <script src="js/scripts/matrix.tables.js"></script> -->
<script src="js/controllers/adminDashController.js"></script>
<script src="js/factories/loginFactory.js"></script>
</body>
</html>
