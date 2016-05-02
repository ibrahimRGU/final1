
<?php
session_start();
?>
<?php
include("connection.php"); // connection to database

$error = ""; //Variable for storing our errors.
if(isset($_POST["submit"]))
{
    if(empty($_POST["username"]) || empty($_POST["password"]))
    {
        $error = "Both fields are required.";
    }else
    {
        
        $username=$_POST['username'];
        $password=$_POST['password'];

        //saniting inputs
        $username = stripslashes( $username );
        $username=mysqli_real_escape_string($db,$username);
        $username = htmlspecialchars($username);
        $password=md5($password);

        $sqlcon=new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
        if (!($sqlcon->connect_errno)){
            echo"connection Failed";
        }

        //prepared statement
        if($stmt=$sqlcon->prepare("SELECT userID FROM users WHERE username=? and password=?")){
            //bind parameter
            $stmt->bind_param('ss',$username,$password);
            $stmt->execute();
            //get result
            $result = $stmt->get_result();
        }


        if( ($row=$result->fetch_row()))
        {
            $_SESSION['username'] = $username; // Initializing Session
            $_SESSION["userid"] = $row[0];//user id assigned to session global variable
            $_SESSION["timeout"] = time();//get session time: protects against session highjacking by logging off users or preventing users from access in time frame
            $_SESSION["ip"] = $_SERVER['REMOTE_ADDR'];// session highjacking:on login, the

            header("location: photos.php"); // Redirecting To Other Page
        }else
        {
            $error = "Incorrect username or password.";
        }

    }
}

?>
