<?php
session_start();
if(session_destroy()) 
{
mysqli_close();
header("Location: index.php"); 
}
?>