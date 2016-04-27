<?php
	session_start();
	include("connection.php"); //Establishing connection with our database
	
	
	$error = ""; //Variable for storing our errors.
	$bad_login_limit = 3;
	$lockout_time = 600;
	$first_failed_login, failed_login_count; // retrieve from DB
	if(
	  ($failed_login_count >= $bad_login_limit)
	 &&
    	(time() - $first_failed_login < $lockout_time)
	)
	{
  	echo "You are currently locked out.";
	 exit; // or return, or whatever.
	
	
	 if(isset($_POST["submit"]))
	{
		if(empty($_POST["username"]) || empty($_POST["password"]))
		{
			$error = "Both fields are required.";
		}else
		{
			// Define $username and $password
			$username=$_POST['username'];
			$password=$_POST['password'];
			
			//Check username and password from database
			$sql="SELECT userID FROM users WHERE username='$username' and password='$password'";
			$result=mysqli_query($db,$sql);
			$row=mysqli_fetch_array($result,MYSQLI_ASSOC) ;
			
			//If username and password exist in our database then create a session.
			//Otherwise echo error.
			
			if(mysqli_num_rows($result) == 1)
			{
				$_SESSION['username'] = $username; // Initializing Session
				header("location: photos.php"); // Redirecting To Other Page
			}else
			{
				$error = "Incorrect username or password.";
			}
		}
	} }

	


?>
