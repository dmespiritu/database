
<?php
// php that will login your page
   include "settings.php";
   if(!isset($_SESSION))
   {
   session_start();
   }


   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['UserName']) or die ("ERROR Failed to connect to: the database " .mysqli_error($db));
      $mypassword = mysqli_real_escape_string($db,SHA1($_POST['UserPass'])) or die ; 
   

      $sql = "SELECT UserID FROM $table WHERE UserName = '$myusername' AND UserPass = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
      
      if($count == 1) {
       
         $_SESSION['login_user'] = $myusername;
         $query = "UPDATE $table SET LoggedOn = 1 WHERE UserName = '$myusername'"; 
         mysqli_query($db, $query); 
         $_SESSION['LoggedOn'] = 1;
         $_SESSION['UserID'] = $row['UserID'];
         header("location: contacts.php");
      }
      else {
         $error = "Login or Password Invalid";
         
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

