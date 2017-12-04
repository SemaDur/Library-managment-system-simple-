<?php

include('connect.php');
session_start();
$error='';
$db = DBConnection::getInstance();
$connect = $db->getConnection();


if($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        if (empty($_POST['email']) || empty($_POST['password'])) {
        $error = "Email or Password is invalid";
        } else {
            $email = mysqli_real_escape_string($connect,$_POST['email']);
            $password = mysqli_real_escape_string($connect,$_POST['password']); 
    
            $sql = "SELECT role FROM users WHERE email = '$email' and password = '$password'";
            $result = mysqli_query($connect,$sql);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

            $count = mysqli_num_rows($result);

            if($count == 1 && $row['role'] == "Admin") {
        
                $_SESSION['login_user'] = $email;
                $_SESSION['role'] = "Admin";
                

                $get_name = "SELECT name FROM users WHERE email = '$email' and password = '$password'";
                $result = mysqli_query($connect,$get_name);
                $exec = mysqli_fetch_array($result,MYSQLI_ASSOC);

                $_SESSION['user'] = $exec['name'];

                header("location: mainpage.php");

                } elseif ($count == 1 && $row['role'] == "User") {

                    $_SESSION['login_user'] = $email;
                    $_SESSION['role'] = "User";
    
                    $get_name = "SELECT name FROM users WHERE email = '$email' and password = '$password'";
                    $get_id = "SELECT id FROM users WHERE email = '$email' and password = '$password'";
                    $result = mysqli_query($connect,$get_name);
                    $result2 = mysqli_query($connect,$get_id);
                    $exec = mysqli_fetch_array($result,MYSQLI_ASSOC);
                    $exec2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
                    
    
                    $_SESSION['user'] = $exec['name'];
                    $_SESSION['id'] = $exec2['id'];
    
                    header("location: userprofile.php");

                } else {
                    $error = "Your email or Password is invalid";
                    }
        
        }   
    }
} 

?>
