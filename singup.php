<?php

$name = $_POST['name'];
$email = $_POST['email'];
$password_u = $_POST['password'];

$servername = "localhost";
$username = "root";
$password = "";
$database = "asndiscuss";

$conn = mysqli_connect($servername , $username , $password , $database);
$sql = "INSERT INTO `users` (`sr.`, `name`, `email`, `password`, `created_date`) VALUES (NULL, '$name', '$email', '$password_u', current_timestamp())";
$result = mysqli_query($conn , $sql);

if ($result){
    session_start();
    $_SESSION['loggedin'] = true;
}

header( 'location: index.php' );


?>