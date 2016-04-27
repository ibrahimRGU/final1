<?php
	session_start();
	include("connection.php"); //Establishing connection with our database
	
	$error = ""; //Variable for storing our errors.
	//new lockout code
	$bad_login_limit = 3;
	$lockout_time = 600;
	$first_failed_login, failed_login_count; // retrieve from DB
	if(
		 ($failed_login_count >= $bad_login_limit)
    		&&
    		(time() - $first_failed_login < $lockout_time)
		) {
	 	echo "You are currently locked out.";
  		exit; // or return, or whatever.
		} else if( /* login is invalid */ ) {
		 if( time() - $first_failed_login > $lockout_time ) {
	 // first unsuccessful login since $lockout_time on the last one expired
	  $first_failed_login = time(); // commit to DB
	  $failed_login_count = 1; // commit to db
	 } else {
	  $failed_login_count++; // commit to db.
	  }
	  exit; // or return, or whatever.
	} else 
	 // user is not currently locked out, and the login is valid.
	 // do stuff
	


?>
