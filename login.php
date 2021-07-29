<?php

$email = $_POST['email'];
$password_u = $_POST['password'];
// If email  already exits then this Exits equal to True 
$exits = false;
// connection with  Database 
$servername = "localhost";
$username = "root";
$password = "";
$database = "asndiscuss";

$conn = mysqli_connect($servername , $username , $password , $database);

$sql = "SELECT * FROM `users` WHERE `email` = '$email' and `password` like '$password_u'";
$result = mysqli_query($conn , $sql);
// Total Number of rows with Same Email 
$numOfRows = mysqli_num_rows($result);
// if Number of row is equal to one then go back 
if ($numOfRows == 1 || $numOfRows > 1){
        while ($row = mysqli_fetch_assoc($result)) { 
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['userName'] = $row['name'];
            $_SESSION['userEmail'] = $row['email'];
        }
}else{
    header("location: error.php?error=Your Email or Password is Wrong");
    exit();
}

header( 'location: index.php' );

?>