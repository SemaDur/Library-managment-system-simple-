<?php

include('classes\connect.php');
include ('classes\user.php');
session_start();
$error='';
$db = DBConnection::getInstance();
$connect = $db->getConnection();
$user = new User($connect);


if($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        if (empty($_POST['email']) || empty($_POST['password'])) {
            $error = "Email or Password is invalid";
        } else {
            $email = mysqli_real_escape_string($connect,$_POST['email']);
            $password = mysqli_real_escape_string($connect,$_POST['password']); 

            $result = $user->getRole($email, $password);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

            $count = mysqli_num_rows($result);

            if($count == 1 && $row['role'] == "Admin") {
        
                $_SESSION['login_user'] = $email;
                $_SESSION['role'] = "Admin";
                $_SESSION['user'] = $row['name'];

                header("location: mainpage.php");

            } elseif ($count == 1 && $row['role'] == "User") {
                $_SESSION['login_user'] = $email;
                $_SESSION['role'] = "User";
                $_SESSION['user'] = $row['name'];
                $_SESSION['id'] = $row['id'];
    
                header("location: userprofile.php");

            } else {
                $error = "Your email or Password is invalid";
                }
        
        }   
    }
} 

?>
