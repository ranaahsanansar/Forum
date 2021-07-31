<?php 

session_start();
require 'components/__dbconnect.php';
// if get method is sed 
if (isset($_GET['ques_id'])){
    $question_id = $_GET['ques_id'];
}else{
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
    <section class="replies-section">
        <div class="container">

            <?php
            $sql = "SELECT * FROM `questions` Where `ques_id` = $question_id ";
            $result = mysqli_query($conn , $sql);
            $numOfrows = mysqli_num_rows($result);
            if ($numOfrows == 1 ){
                while ($rows = mysqli_fetch_assoc($result)) {
                echo '
                <div class="Question_replyPage">
                    <h2>'. $rows['question'] .' </h2>
                    <small>Asked By:'. $rows['author'].'</small>
                <hr>
                </div>
                ';
                }
            }else{
                header('location: questions.php');
            }
            
            ?>
            
            <!-- ------------Form -------------  -->

            <?php
                if ($loggedin == true){
                    echo '

                    <div class="forms">
                    <form action="'.$_SERVER['REQUEST_URI'].'" method="POST">
                        <div class="mb-3">
                            <label for="reply" class="form-label">Reply To This Question</label>
                            <textarea name="reply" id="reply" class="form-control" value=" " ></textarea>
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
                // inserting reply in Database 
                if (isset($_POST['reply'])){
                    $reply = $_POST['reply'];
                    $author_email_reply = $_SESSION['userEmail'];
                    $reply = str_replace("<", "&lt;" , $reply ); // Secure from XSS Attacks 
                    // checking empty Reply 
                    if ($reply != null){
                        $sql = "INSERT INTO `replies` (`ques_id`, `reply`, `author`, `time`) VALUES ('$question_id', '$reply', '$author_email_reply', current_timestamp())";
                        $result = mysqli_query($conn , $sql);
                    }
                    else{
                        echo '<p style="color: red">Empty on Invalid Insertion</p><br><br>';
                    }
                    
                }
                
            ?> 
            <!-- -----replies -------------- -->
                <!-- fetching replies from database  -->

                <?php
                $sql = "SELECT * FROM `replies` Where `ques_id` = $question_id ORDER BY reply_id DESC";
                $result = mysqli_query($conn , $sql);
                $numOfrows = mysqli_num_rows($result);
                if ($numOfrows > 0){
                    while ($rows = mysqli_fetch_assoc($result)) {
                        $reply_id = $rows['reply_id'];
                    echo '
                    <div class="card reply-card">
                    <div class="card-body">
                        <div class="Q-heading">
                            <p style="font-size: 15px; "><strong>'. $rows['reply'] .'</strong> ';
                            if ($rows['author'] == $_SESSION['userEmail']){
                                echo '
                                <a href="delete_reply.php?delete_r='.$reply_id.'&ques_id='.$question_id.'">Delete</a> </p>
                                ';
                            } 
                            echo '
                             </p>
                            <strong style="font-size: small;">User ID:</strong> '. $rows['author'].'
                            <p style=" float: right; ">Time: ' . $rows['time'] .'</p>
                        </div>
                        
                    </div>
                </div>
                            ';
                    // extra spacing if there is only one Question 
                    if ($numOfrows < 2){
                        echo '<br><br><br><br>';
                    }
                    }
                }else{
                    echo '
                    <div style="margin-bottom: 300px;">
                        <h1 style="color: red">Empty!</h1>
                        <h5 style="color: black">Be the First to Post a Reply</h5>
                    </div>
                    ';
                }
                
            ?>
            <!-- ---------------------------------------------------------------------- -->
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
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>