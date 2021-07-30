<?php 
// header("Refresh: 1;");
session_start();
require 'components/__dbconnect.php';
if (isset($_GET['cate_id'])){
    $category_id = $_GET['cate_id'];
}else{
    // if get methid is not set then Go Back to index page 
    header('location: index.php');
    exit();
}


if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
  // echo "false";
    $loggedin = false;
}
else{
  // echo "true";
    $loggedin = true;
}


?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <!-- custom csss styling file  -->
    <link rel="stylesheet" href="resources/css/style.css">

    <!-- fonts from Google  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@400;700&display=swap" rel="stylesheet">
    <!--***** font-family: 'Libre Baskerville', serif; ******* -->

    <title>Questions</title>
</head>

<body>
    <!-- navbar  -->
    <?php 
    require 'components/navbar.php';
    ?>

    <!-- section Question ----------------- -->
    <section class="question-section">
        <div class="container">


            <?php 
                    // fetching Title of Category from Database 
                    $sql = "SELECT * FROM `categories` Where `cate_id` = '$category_id'";
                    $result = mysqli_query($conn , $sql);

                    while($row = mysqli_fetch_assoc($result)){
                        echo '
                            <div class="Topic">
                            <h1>'. $row['title'] .'</h1>
                            </div>
                        ';
                    }


                ?>

            <!-- form ----------------------- -->
            <?php
                if ($loggedin == true){
                    echo '
                    <div class="forms">
                <form action="'.$_SERVER['REQUEST_URI'].'" method="POST" id="FORM">
                    <div class="mb-3">
                        <label for="question" class="form-label">Ask a Question related to the Topic</label>
                        <textarea name="question" id="question" class="form-control" autocomplete="off" value=" " ></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

                    ';
                }else{
                    echo '
                    <h5 >You Need to Login</h5>
                    <a href="singuppage.php" style="float: right; margin-left: 5px;" >
                        <h6 class="card-btn">Singup</h6>
                    </a>
                    <a href="loginPage.php" " >
                        <h6 class="card-btn">Login</h6>
                    </a>
                    
                    <br>
                    <br>
                    ';
                }

                //  insert Question in database  --------------

                if (isset($_POST['question'])){
                    $form_question = $_POST['question'];
                    $author_email = $_SESSION['userEmail'];
                    if ($form_question == null){
                        echo '<p style="color: red">Empty on Invalid Insertion</p><br><br>';
                    }else {
                        $sql = "INSERT INTO `questions` (`cate_id`, `question`, `author`, `time`) VALUES ('$category_id', '$form_question', '$author_email', current_timestamp())";
                    $result = mysqli_query($conn , $sql);
                    unset($_POST);
                    }
                    
                }
            ?> 
            <!-- Questions List -->
            <!-- fetching Questions list form Database ---------- -->
            <?php
            // connection with database 
                // $sql = "SELECT * FROM `questions` Where `cate_id` = $category_id ";
                // fetching data in Dessending order 
                $sql = "SELECT * FROM `questions` Where `cate_id` = $category_id ORDER BY ques_id DESC";

                $result = mysqli_query($conn , $sql);
                $numOfrows = mysqli_num_rows($result);
                if ($numOfrows > 0){
                    while ($rows = mysqli_fetch_assoc($result)) {
                    echo '
                    <div class="Q-heading">
                        <h5>'.$rows['question'].'</h5>
                        <small>Asked By: '.$rows['author'].'</small>
                        <br>
                        <a href="replies.php?ques_id='. $rows['ques_id'] .'">Reply</a>
                    ';
                    // if session email and Fetching Email is same then show Delete button 
                    if ($rows['author'] == $_SESSION['userEmail']){
                        echo '
                        <a href="delete_ques.php?delete_q='. $rows['ques_id'] .'&cate_id='. $category_id.'">Delete</a>
                    </div>
                        ';
                    }
                    else {
                        echo '</div>';
                    }
                    echo '<hr>'; 
                    // extra spacing if there is only one Question 
                    if ($numOfrows < 2){
                        echo '<br><br><br><br>';
                    }
                    }
                }else{
                    echo '
                    <div style="margin-bottom: 300px;">
                        <h1 style="color: red">Empty!</h1>
                        <h5 style="color: black">Be the First to Post a Question in this Category</h5>
                    </div>
                    ';
                }
                
            ?>

        </div>

    </section>
    <!-- footer  -->

    <?php 
    require 'components/footer.php';
    ?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        // reset the values of form 
        document.getElementById("FORM").reset();

    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->



    
</body>

</html>