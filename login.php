<!DOCTYPE html>

<?php
include("settings.php");
session_start();


if($_SERVER["REQUEST_METHOD"] == "POST") {
    $myusername = $_POST['Username'];
    $mypassword = $_POST['Password'];
    $hashpw = sha1($mypassword);
    $query = "SELECT * FROM $table WHERE Username = '$myusername' and Password = '$hashpw'";
    $result = mysqli_query($db,$query);
    //Check number of rows that match the query
    $count = mysqli_num_rows($result);
    //If matched row, then login the user and changed logged_in to true
    
    if($count == 1) {
      $_SESSION['Username'] = $myusername;
      $_SESSION['logged_in'] = 1;
      //Update database logged_in to 1
      $sql = "UPDATE Admin SET logged_in = 1 WHERE Username = '$myusername'";
      mysqli_query($db, $sql);
      //echo "<p>Success</p>";
      header("location:admin.php");
    }
    else {  
      header("location:login.php");
      session_unset();
      session_destroy();
    }
  }
?>

<html>
   
   <head>
    
      <title>Login Page</title>
      
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         
         .box {
            border:#666666 solid 1px;
         }
      </style>
      
   </head>

   <br>
   <body>
   
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
            
            <div style = "margin:30px">
               
               <form action = "login.php"  id="loginform" method = "post">
                  <div class ="container">
                  <label>UserName:</label><input type = "text" name = "Username" class = "box" required><br /><br />
                  <label>Password:</label><input type = "password" name = "Password" class = "box" required/><br/><br />
                  <input type = "submit" value = " Submit " class = "btn btn-primary btn-lg"/><br />
                  </div>
               </form>

               <button><a href="register.php" class="button">Register Here</a></button> 
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
               
            </div>
            
         </div>
         
      </div>
  
</html>

 


