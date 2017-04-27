<?php
	$error = "";

	include("../config.php");
	session_start();
	
	if($_SERVER["REQUEST_METHOD"] == "POST") {
    
		$username = $_POST['username'];
		$password = $_POST['password'];
			
		$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
	  
		$stmt = $mysqli->prepare("SELECT id, username FROM admins WHERE username = ? AND password = ? LIMIT 1");
		$stmt->bind_param('ss', $username, $password);
		$stmt->execute();
		$stmt->store_result();
	  
		// get variables from result.
		$stmt->bind_result($user_id, $username);
		$stmt->fetch();
      
		if ($stmt->num_rows == 1) {
			$_SESSION['login_user'] = $username;
			header("location:../site-management-secured.php");
		} else {
			$error = "Your Login Name or Password is invalid";
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
   
   <body bgcolor = "#FFFFFF">
	
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
            <div style = "margin:30px">
               
               <form action="" method="post">
                  <label>UserName  :</label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>