<?php
 include "settings.php";
 if (!isset($_SESSION))
 {
 	session_start();
 }
 	$user = $_SESSION['login_user']; 
   $query ="UPDATE $table SET LoggedOn = 0 WHERE UserName = '$user'";  
   mysqli_query($db, $query); 
   session_unset();
   if(session_destroy()) {
      header("Location: login.php");
   }

   
?>