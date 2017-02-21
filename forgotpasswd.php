<!DOCTYPE html>

<!-- NB: add comments, sort formatting! -->

<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Password reset</title>
        <link rel="stylesheet" type="text/css" href="assets/style.css">
    </head>

    <body>
        <div class="container">
            <h3>Request a new password here</h3>
            <h4>Fill in your details</h4>
            <form method="post" action="resetmessage.php">
                <input type="text" name="username" placeholder="Username" required><br>
                <input type="email" name="email" placeholder="abc@xyz.com" required><br>
                <button type="submit">Submit</button>
            </form>
            <br>
            <h4>Alternatively, click here to <a href="index.php">login</a>.</h4>
        </div>
    </body>

    <footer>
        <div class="container">
            <p>&copy; 2017 textbookexchange.com</p>
        </div>
    </footer>

</html>
