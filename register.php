<?php
	include("connection.php");
	include("submitregistration.php");
?>


<!DOCTYPE html>

<!-- NB: add comments, sort formatting! -->

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Login Page</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>

        <div class="container">
            <h2>Fill in your details to create an account.</h2>
            <form action="newaccountmsg.php" method="post" autocomplete="off">
                <input type="text" name="username" placeholder="Username" required/>
                <input type="email" name="email" placeholder="Email Address" required/>
                <input type="password"name="password" placeholder="Password" required/>
                <input type="tel" name="phonenumber" placeholder="Mobile Number" required/>
                <br><br>
                <input type="submit" name="submit" value="register"/>
                <input type="reset" name="reset" value="Reset"/>
            </form>

            <h4>Already have an account? <a href="index.php">Click here</a> to login</h4>
        </div>

    </body>

    <footer>
        <div class="container">
            <p>&copy; 2017 textbookexchange.com</p>
        </div>
    </footer>

</html>
