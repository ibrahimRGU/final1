<?php
session_start();
//include ("secureSessionID.php");//verify user session
//include ("inactiveTimeOut.php");//check user idle time
?>
<?php
$name = $_SESSION["username"];
$userID=$_SESSION["userid"];
$ip=$_SESSION["ip"];

?>
<?php
include("connection.php"); //Establishing connection with our database


//check session highjacking
if (!($ip==$_SERVER['REMOTE_ADDR'])){
    header("location: logout.php"); // Redirecting To logout
}

//check logut/idle time
if($_SESSION ["timeout"]+60 < time()){

    //session timed out
    header("location: logout.php"); // Redirecting logout
}else{
    //reset session time
    $_SESSION['timeout']=time();
}
$msg = ""; //Variable for storing our errors.

if(isset($_POST["submit"]))
{

    $title = $_POST["title"];
    $desc = $_POST["desc"];
    $url = "test";
    //Input sanitization
    $title = stripslashes( $title );
    $title=mysqli_real_escape_string($db,$title);
    $title = htmlspecialchars( $title );

    $desc = stripslashes( $desc );
    $desc=mysqli_real_escape_string($db,$desc);
    $desc = htmlspecialchars( $desc );


    //check for file upload error
    if($_FILES['fileToUpload']['error'] == 0) {

        // Specifying file upload diretory
        $target_dir = "uploads/";
        $target_file = basename($_FILES['fileToUpload']['name']);

        // File information
        $uploaded_name = $_FILES['fileToUpload']['name'];
        $uploaded_ext = substr($uploaded_name, strrpos($uploaded_name, '.') + 1);
        $uploaded_size = $_FILES['fileToUpload']['size'];
        $uploaded_tmp = $_FILES['fileToUpload']['tmp_name'];
        $uploadOk = 1;
    }

    if($userID >0) {

        //file size and format restriction
        if( ( strtolower( $uploaded_ext ) == "jpg" || strtolower( $uploaded_ext ) == "jpeg" || strtolower( $uploaded_ext ) == "png" ) &&
            ( $uploaded_size < 10000 ) &&
            getimagesize( $uploaded_tmp ) ) {

            // Move picture to Uploads directory
            if (move_uploaded_file($uploaded_tmp, $target_file)) {
                //connecting to database
                $mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
                //if(!$mysqli) die('Could not connect$: ' . mysqli_error());

                //test connection
                if ($mysqli->connect_errno) {
                    echo "Connection Fail:Check network connection";//: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
                }

                //call procedure
                if (!$mysqli->query("CALL sp_photos('$title','$desc','$target_file','$userID')")) {

                } else {

                    $msg = "Thank You! The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded. click <a href='photos.php'>here</a> to go back";

                }
            }
            else{
                $msg = "Your image was not uploaded";
            }
        }else{
            $msg = "Image not uploaded. Try JPEG , JPG or PNG ";
        }

    }
    else{
        $msg = "You need to login first";
    }
}

?>
