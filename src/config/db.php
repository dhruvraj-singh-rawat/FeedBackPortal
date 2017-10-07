<?php
    class db{

        private $dbhost = 'us-cdbr-iron-east-05.cleardb.net';
        private $dbuser = 'b0add291dd276a';
        private $dbpass = '6215fe5e';
        private $dbname = 'heroku_0e916141f296b59';

      //  private $dbhost = 'localhost';
      //  private $dbuser = 'root';
      //  private $dbpass = 'prabhat123';
  	   // private $dbname = 'master';

        public function connect(){
            $mysql_connect_str = "mysql:host=$this->dbhost;dbname=$this->dbname";
            $dbConnection = new PDO($mysql_connect_str, $this->dbuser, $this->dbpass);
            $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $dbConnection;
        }
    }
