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

http://localhost/feedbackportal/public/api/form/info/year_faculty/{department}/{year}

=========================================================================

Faculty Course Retriever API :[GET]

http://localhost/feedbackportal/public/api/form/info/faculty_course/{department}/{year}/{Faculty_name}

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
    ack_no

```
## Built With


## Authors

* **Dhruvraj Singh Rawat** - *Initial work* - [LinkedIn](https://www.linkedin.com/in/dhruvrajrawat/)
* **Shree Ram Bansal** - *Initial work* - [LinkedIn](https://www.linkedin.com/in/shree-ram-b-a48786104/)



## License

This project is licensed under the MIT License 


