
<?php
// php that will login your page
   include "settings.php";
   if(!isset($_SESSION))
   {
   session_start();
   }


   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']) or die ("ERROR Failed to connect to: the database " .mysqli_error($db));
      $mypassword = mysqli_real_escape_string($db,SHA1($_POST['password'])) or die ; 
      $hashpw = sha1($mypassword); 
      $query = "SELECT * FROM $table WHERE username = '$myusername' and password = '$hashpw'";  
      $result = mysqli_query($db,$query); 
      $count = mysqli_num_rows($result);

      //this is a prepared sql statement
      $sql = "SELECT *FROM $table where username = ? and password= ?"; 
      
      
       if($count == 1) {
      $_SESSION['username'] = $myusername;
      $_SESSION['logged_in'] = 1;
      //Update database logged_in to 1
      $sql = "UPDATE admin SET logged_in = 1 WHERE username = '$myusername'";
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
     <?php
   include 'navbar.php';

   ?>
   <br>
   <body>
   
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
            
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>UserName  :</label><input type = "text" name = "UserName" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "UserPass" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit " class = "btn btn-primary btn-lg"/><br />
               </form>

               <button><a href="register.php" class="button">Register Here</a></button> 
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
               
            </div>
            
         </div>
         
      </div>
  
</html>

