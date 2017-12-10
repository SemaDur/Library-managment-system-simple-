<?php
/**
 * Created by PhpStorm.
 * User: Semir
 * Date: 10.12.2017
 * Time: 21:56
 */
    class User
    {
        private $connect;

        public function __construct($dbConnect)
        {
            $this->connect = $dbConnect;
        }

        public function regist($fname, $lname, $email, $pass){
            $query = "INSERT INTO users(name, lastname, email, password) VALUES ('$fname','$lname','$email','$pass')";

            if (!$result = mysqli_query($this->connect, $query)){
                $desc = "Error: " . mysqli_error($this->connect);
                return $desc;

            } else {
                return $result;
            }
                return $result;
        }

        public function getRole($email, $password){
            $query = "SELECT id, name, role FROM users WHERE email = '$email' and password = '$password'";
            $result = mysqli_query($this->connect,$query);

            return $result;
        }

        public function updateUser($role, $email){
            $update = "UPDATE users SET role = '$role' WHERE email = '$email'";
            $result = mysqli_query($this->connect,$update);

            return $result;
        }

        public function selectAll(){
            $query = "SELECT name, lastname, email, role FROM users";

            if (!$result = mysqli_query($this->connect, $query)){
                $desc = "Error: " . mysqli_error($this->connect);
                return $desc;
            }
            return $result;
        }
    }