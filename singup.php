<?php
$name = $_POST['name'];
$email = $_POST['email'];
$password_u = $_POST['password'];
// If email  already exits then this Exits equal to True 
$exits = false;
// connection with  Database 
require 'components/__dbconnect.php';
$sql = "SELECT * FROM `users` WHERE `email` = '$email' ";
$result = mysqli_query($conn , $sql);
// Total Number of rows with Same Email 
$numOfRows = mysqli_num_rows($result);
// if Number of row is equal to one then go back 
if ($numOfRows == 1 || $numOfRows > 1){
    // if User with same Email Addres exit then it Redirext to Error page and Exits the Script 
    header("location: error.php?error=Email is All Ready Exits");
    exit();
}else{ 
    $exits = true;
} 
// if user is not exist then add this user in database 
if (!$exits == false){
     // Password Hashing 
    $hash = password_hash($password_u , PASSWORD_DEFAULT) ;
    $sql = "INSERT INTO `users` (`sr.`, `name`, `email`, `password`, `created_date`) VALUES (NULL, '$name', '$email', '$hash', current_timestamp())";
    $result = mysqli_query($conn , $sql);

    session_start();
    $_SESSION['loggedin'] = true;
    $_SESSION['userName'] = $name;
    $_SESSION['userEmail'] = $email;
}else{
    $_SESSION['loggedin'] = false;
    $_SESSION['userName'] = null;
    $_SESSION['userEmail'] = null ;
}
// header( 'location: index.php' );
header('Location: ' . $_SERVER['HTTP_REFERER']);


?>