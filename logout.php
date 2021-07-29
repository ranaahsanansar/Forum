<?php

// logout and Session Destroy 
session_start();
session_unset();
session_destroy();
// redirection on index Page 

// header('location: index.php');
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>

