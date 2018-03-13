
	<?php
 if(!isset($_SESSION))
   {
   session_start();
   }

  ?>
  <html>
	<body> 
     <div align = "center"> 
      <div style = "width:300px; border: solid 1px #333333; " align = "left">
         <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Registration Form</b></div> 
            <div style = "margin:30px"> 
         <form action = "regaction.php" method = "post"> 
                  <label>Name:</label> <input type="text" name="Name" class = "box" required placeholder = "Enter a Name"/><br /> <br />
                  <label>Email:</label> <input type="email" value = "
                  <?php
                    if (isset($_SESSION['LoggedOn']) && $_SESSION['LoggedOn'] == 1)
                    {
                      include('settings.php');
                      $username = $_SESSION['login_user'];
                      $resultmode = MYSQLI_USE_RESULT;
                      $select = "SELECT UserEmail FROM users WHERE UserName='$username'";
                      $result = mysqli_query($db, $select, $resultmode);
                      $data = mysqli_fetch_row($result);
                      $email = $data[0];
                      echo $email;
                    }
                    ?>
                  " name="UserEmail" class = "box" required/><br /> <br />
                  <label>UserName:</label> <input type="text" name="UserName" class = "box"required placeholder = "UserName"/><br /> <br />
                  <label>Password:</label> <input type="password" name="UserPass" class = "box" required placeholder = " Enter Password"/><br /> <br />
                  <label>Confirm Password:</label> <input type="password" name="PassConfirm" class = "box" required placeholder= "Reconfirm Password"/><br /> <br />
                  <input type="submit" value="Submit"class="btn btn-primary btn-lg"></input> 
        </form> 
        <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>  
     </div> 
  </div> 
</div> 

   </body>
   </html>