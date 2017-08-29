# FeedBackPortal

This is a Feedback Portal of LNMIIT .

## Getting Started



### Prerequisites

Things to install 

```
PHP 5.5
ANGULAR
MariaDB
PHPMailer
```

## Deployment

=========================================================================

Login API format: [POST Request]

http://localhost/feedbackportal/public/api/login/

Parameters Required are:
```
pos
email
otp
```

=========================================================================

Faculy name for Particular Year and Department: [GET Request]

http://localhost/feedbackportal/public/api/form/info/year_faculty/{department}/{year}/{token}/{email}

=========================================================================

Faculty Course Retriever API :[GET]

http://localhost/feedbackportal/public/api/form/info/faculty_course/{department}/{year}/{name_faculty}/{token}/{email}

=========================================================================

FeedBack API: [POST Request]
http://localhost/feedbackportal/public/api/form/feedback

Parameters Required are:
```
    faculty
    course_name
    email
    subject
    feedback
    year
    token
    
```
=========================================================================

Particular Faculty Feedback Retriever: [GET METHOD]
http://localhost/feedbackportal/public/api/faculty/feedbacks/{faculty_name}/{token}/{email}

Return of the API is as follows:-
```
[{"subject":"Poor Teaching Skills","feedback":"felt bored in class","course_name":"CP Programming","ack_no":"cp59a2be626dbaa"}]
```
=========================================================================

LOGOUT API: [GET METHOD]

http://localhost/feedbackportal/public/api/logout/{token}/{email}


## Built With


## Authors

* **Dhruvraj Singh Rawat** - *Initial work* - [LinkedIn](https://www.linkedin.com/in/dhruvrajrawat/)
* **Shree Ram Bansal** - *Initial work* - [LinkedIn](https://www.linkedin.com/in/shree-ram-b-a48786104/)
* **Prabhat Tripathi** - *Initial work* - [LinkedIn]()



## License

This project is licensed under the MIT License 


