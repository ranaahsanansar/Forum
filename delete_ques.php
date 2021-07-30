<?php
unset($_POST);
session_start();
require 'components/__dbconnect.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    $question_id = $_GET['delete_q'];
    $category_id = $_GET['cate_id'];

    // fetching the question with same question Number to Authenticate that user is Same
    
    $sql = "SELECT * FROM `questions` WHERE `ques_id` = $question_id ";
    $result = mysqli_query($conn , $sql);
    $numOfRows = mysqli_num_rows($result);
    if ($numOfRows == 1)
    while($rows = mysqli_fetch_assoc($result)){
        $author_email = $rows['author'];
    }
     
    // cehck if User id is same with session_Id then Delete OtherWise no 
    if ($author_email == $_SESSION['userEmail']){
        $sql = "DELETE FROM `questions` WHERE `ques_id` = $question_id";
        $result = mysqli_query($conn , $sql);
        // reditecting to questions page  
        header('location: questions.php?cate_id='. $category_id. '');
        exit();

    }
    else{
        header("location: error.php?error=Authentication Error! Sorry you can not delete this!");
        exit();
    }
}

?>