<?php

    class DBConnection
    {
        private $connect;
        private static $instance;
        private $host = "localhost";
        private $username = "root";
        private $password = "";
        private $database = "library";

        public static function getInstance(){
            if(!self::$instance){
                self::$instance = new self(); //or new DBConnection
            }
            return self::$instance;
        }

        private function __construct(){
            $this->connect = mysqli_connect($this->host, $this->username, $this->password, $this->database);

            if(mysqli_connect_error()){ //error handling
                trigger_error("Failed to connect to Database: ".mysqli_connect_error(), E_USER_ERROR);
            }
        }

        private function __clone(){} // Preventing of clone/duplication of connection

        public function getConnection(){
            return $this->connect;
        }

        private function __wakeup() {} // Stopping unserialize of object
        
        
        public function regist($fname, $lname, $email, $pass){
            $query = "INSERT INTO users(name, lastname, email, password) VALUES ('$fname','$lname','$email','$pass')";
            
            if (!$result = mysqli_query($this->connect, $query)){
                    $desc = "Error: " . mysqli_error($this->connect);
                    return $desc;
                    
            } else 
                    return $result;
            }

        public function insertBook($query){
            if (!$result = mysqli_query($this->connect, $query)){
                $desc = "Error: " . mysqli_error($this->connect);
                return $desc;
                
            }
        }

    }

    

    
?>