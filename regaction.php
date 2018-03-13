<?php
  
  session_start();

	include "settings.php"; 

   $Name = $_POST['Name'];
   $UserEmail = $_POST['UserEmail'];
   $UserName = $_POST['UserName'];
   $UserPass = $_POST['UserPass'];
   $PassConfirm = $_POST['PassConfirm'];

   

   $HashedPassword = sha1($UserPass);
   $HashPassConf = sha1($PassConfirm);
   

   if($HashedPassword != $HashPassConf)
   {
    echo "Passwords don't match, Please try again.";
    
   }
 
else 
{

  $Login = "SELECT * FROM users WHERE UserName = '$UserName'";
  $result = mysqli_query($db, $Login); 
  if($row = mysqli_fetch_assoc($result))
  {
    echo "UserName is already taken";
  }
  else 
    {
      $sql = "INSERT INTO users (Name, UserEmail, UserName, UserPass, LoggedOn)
            Values('$Name', '$UserEmail', '$UserName', '$HashedPassword', '1')"; 
			
			mysqli_query($db, $sql);
			$_SESSION['UserName'] = $UserName; 
			$_SESSION['LoggedOn'] = '1'; 
			
           header("Location: contacts.php"); 
    }
}


?>
