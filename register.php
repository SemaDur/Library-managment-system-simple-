<?php 
include('classes\connect.php');
include('classes\user.php');


$error='';
$db = DBConnection::getInstance();
$connect = $db->getConnection();
$user = new User($connect);

if(isset($_POST['confirm']) && !(empty($_POST['name'])) && !(empty($_POST['lastname'])) && !(empty($_POST['email'])) && !(empty($_POST['password']))) {
    $fname = $_POST['name'];
    $lname = $_POST['lastname'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $res = $user->regist($fname, $lname, $email, $pass);
    if(is_string($res)){
        $error = $res;
    }
}
elseif (isset($_POST['confirm']) && ((empty($_POST['name'])) || (empty($_POST['lastname'])) || (empty($_POST['email'])) || (empty($_POST['password'])))){
    $error = 'Wrond data, please try again.';

}
    

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet prefetch" href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'/>
    <link rel="stylesheet" href='css/style.css'/>
  </head>

<body>

    <div class="login">
    <div class="login-triangle"></div>

    <h2 class="login-header">Register</h2>

    <form action="" method="post" class="login-container">
      <p><input name="name" type="text" placeholder="Name"></p>
      <p><input name="lastname" type="text" placeholder="Lastname"></p>
      <p><input name="email" type="email" placeholder="Email"></p>
      <p><input name="password" type="password" placeholder="Password"></p>
      <p><input name="confirm" type="submit" value="Confirm"></p>
      <a href="index.php"><p>Back to Login</p></a>
      <span><?php echo $error; ?></span>
    </form>
    </div>
  
</body>
</html>
