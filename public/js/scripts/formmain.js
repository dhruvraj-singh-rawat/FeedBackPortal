'use strict';

var app = angular.module('formApp', ['ngAnimate']);
app.controller('formCtrl', ['$scope', '$http', function($scope, $http) {
  $scope.formParams = {};
  $scope.stage = "";
  $scope.formValidation = false;
  $scope.toggleJSONView = false;
  $scope.toggleFormErrorsView = false;
  $scope.dept = "1";
  $scope.deptname = "CSE";

  $scope.changedept = function(dept,deptname){
    $scope.dept = dept;
    $scope.deptname = deptname;
    console.log(dept);
    console.log(deptname);
    $scope.reset();
  }

  // $scope.faculty_name = [
  //       {
  //         "name" : "ram",
  //         "age" : "18"
  //       },
  //       {
  //         "name" : "prabhat",
  //         "age" : "19"
  //       },
  //       {
  //         "name" : "dhruv",
  //         "age" : "20"
  //       }
  //   ];
  //  console.log($scope.faculty_name);

   // $scope.course_name = [
   //      {
   //        "name" : "DBMS",
   //        "code" : "18"
   //      },
   //      {
   //        "name" : "DAA",
   //        "code" : "19"
   //      },
   //      {
   //        "name" : "CP",
   //        "code" : "20"
   //      }
   //  ];

    $scope.Department = [
      {
        "name":"CSE",
        "id":"1"
      },
      {
        "name":"ECE",
        "id":"2"
      },
      {
        "name":"ME",
        "id":"3"
      },
      {
        "name":"Maths",
        "id":"4"
      },
      {
        "name":"HSS",
        "id":"5"
      },
      {
        "name":"Physics",
        "id":"6"
      }

    ];

    // $http.get("customers_mysql.php")
    // .then(function (response) {$scope.faculty_names = response.data.records;});

    // $http.get("customers_mysql.php")
    // .then(function (response) {$scope.course_name = response.data.records;});

  // Navigation functions
  $scope.next = function (stage) {
    //$scope.direction = 1;
    //$scope.stage = stage;
    //$scope.year = $('input:radio:checked').attr('value');
    var dept = $scope.dept;
    var year = $scope.formParams.year;
    $scope.formValidation = true;

    if ($scope.multiStepForm.$valid) {
      $scope.direction = 1;
      $scope.stage = stage;
      $scope.formValidation = false;
    }
    if(stage == "stage2"){
      console.log(dept);
      console.log(year);

      $http.get('http://localhost/FeedBackPortal/public/api/form/info/year_faculty/'+dept+'/'+year)
        .then(function(response) {
            $scope.facultynames = response.data;
            console.log(response.data);
        });
    }
  };
  $scope.changeSub = function(){
      var dept = $scope.dept;
      var year = $scope.formParams.year;
      var facultyname = $scope.formParams.facultyname;

      $http.get('http://localhost/FeedBackPortal/public/api/form/info/faculty_course/'+dept+'/'+year+'/'+facultyname)
        .then(function(response) {
            $scope.coursenames = response.data;
            console.log(response.data);
        });


  };





  $scope.back = function (stage) {
    $scope.direction = 0;
    $scope.stage = stage;
  };

  // Post to desired exposed web service.
  $scope.submitForm = function () {
    var wsUrl = "someURL";

    // Check form validity and submit data using $http
    if ($scope.multiStepForm.$valid) {
      $scope.formValidation = false;

      $http({
        method: 'POST',
        url: wsUrl,
        data: JSON.stringify($scope.formParams)
      }).then(function successCallback(response) {
        if (response
          && response.data
          && response.data.status
          && response.data.status === 'success') {
          $scope.stage = "success";
        } else {
          if (response
            && response.data
            && response.data.status
            && response.data.status === 'error') {
            $scope.stage = "success";
          }
        }
      }, function errorCallback(response) {
        $scope.stage = "success";
        console.log(response);
      });
    }
  };

  $scope.reset = function() {
    // Clean up scope before destorying
    $scope.formParams = {};
    $scope.stage = "";
  }
  
}]);
