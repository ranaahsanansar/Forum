<?php

unset($_POST);
session_start();
require 'components/__dbconnect.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    $reply_id = $_GET['delete_r'];
    $ques_id = $_GET['ques_id'];

    // fetching the question with same question Number to Authenticate that user is Same
    
    $sql = "SELECT * FROM `replies` WHERE `reply_id` = $reply_id ";
    $result = mysqli_query($conn , $sql);
    $numOfRows = mysqli_num_rows($result);
    if ($numOfRows == 1)
    while($rows = mysqli_fetch_assoc($result)){
        $author_email = $rows['author'];
    }
     
    // cehck if User id is same with session_Id then Delete OtherWise no 
    if ($author_email == $_SESSION['userEmail']){
        $sql = "DELETE FROM `replies` WHERE `reply_id` = $reply_id";
        $result = mysqli_query($conn , $sql);
        // reditecting to questions page  
        header('location: replies.php?ques_id='. $ques_id. '');
        exit();

    }
    else{
        header("location: error.php?error=Author Different! Sorry you can not delete this!");
        exit();
    }
}

echo $reply_id . $ques_id;
?>