<?php
    class db{

//        private $dbhost = 'us-cdbr-iron-east-05.cleardb.net';
//        private $dbuser = 'b25c39f6c59271';
//        private $dbpass = '1ad38918';
//        private $dbname = 'heroku_106ec35fb167ea2';
//=======
//         private $dbhost = 'localhost';
//         private $dbuser = 'root';
//         private $dbpass = 'prabhat123';
//         private $dbname = 'master';
// >>>>>>> 861df1b33102e80c263abc7310fc131397c6a28d
//=======
        private $dbhost = 'localhost';
        private $dbuser = 'root';
        private $dbpass = '';
        private $dbname = 'master';
//>>>>>>> e27cbdb0ee43498657b16c1a370461d744f9d367
        // Connect
        public function connect(){
            $mysql_connect_str = "mysql:host=$this->dbhost;dbname=$this->dbname";
            $dbConnection = new PDO($mysql_connect_str, $this->dbuser, $this->dbpass);
            $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $dbConnection;
        }
    }
