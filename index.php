<?php 
include('login.php');


if(isset($_SESSION['login_user'])){
  if($_SESSION['role'] == "Admin"){
    header("location: mainpage.php");
  } elseif ($_SESSION['role'] == "User"){
    header("location: userprofile.php");
  }
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

    <h2 class="login-header">Log in</h2>

    <form action="" method="post" class="login-container">
      <p><input name="email" type="email" placeholder="Email"></p>
      <p><input name="password" type="password" placeholder="Password"></p>
      <p><input name="submit" type="submit" value="Log in"></p>
      <a href="register.php"><p>Register</p></a>
      <span><?php echo $error; ?></span>
    </form>
    </div>
  
</body>
</html>
