<?php

// NB: add comments throughout!
// encode error msg when invalid account details are received
include('validate.php'); //include validation script.
if(!isset($_SESSION["username"])) {
    header("location: index.php");
    exit();
}
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

        <form method="post" action="home.php" >
        <div class="container">
            <h2>Welcome to TextBookExchange!!!</h2>
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <button type="submit">Login</button>
            <input type="checkbox" checked="checked">Keep me logged in
        </div>

        <div class="container">
            <button type="button" class="cancelbutton">Cancel</button><br>
            <span>Click here if you've forgotten your <a href="forgotpasswd.php">password</a></span>
            <br><br>
            <span>Don't have an account? Click <a href="register.php">here</a> to register</span>
            
        </div>
		<!-- <div class="error"><?php echo $error;?>here</div> -->
        </form>


    </body>

    <footer>
        <div class="container">
            <p>&copy; 2017 textbookexchange.com</p>
        </div>
    </footer>

</html>
