<?php 

session_start();

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
            <div class="Topic">
                <h1>Andriod Securitry System</h1>
            </div>

            <!-- form ----------------------- -->
            <?php
                if ($loggedin == true){
                    echo '
                    
                    <div class="forms">
                <form>
                    <div class="mb-3">
                        <label for="question" class="form-label">Ask a Question related to the Topic</label>
                        <textarea name="reply" id="reply" class="form-control"></textarea>
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
            ?>
            

            <!-- Questions List -->

            <div class="Q-heading">
                <h5>How i can Secure My Andriod Phone</h5>
                <small>Asked By: Ahsan</small>
                <a href="replies.php">Reply</a>
                <hr>
            </div>

            <!-- -------------------------------------------  -->

            <div class="Q-heading">
                <h5>How i can Secure My Andriod Phone</h5>
                <small>Asked By: Ahsan</small>
                <a href="replies.php">Reply</a>
                <hr>
            </div>
            <div class="Q-heading">
                <h5>How i can Secure My Andriod Phone</h5>
                <small>Asked By: Ahsan</small>
                <a href="replies.php">Reply</a>
                <hr>
            </div>
            <div class="Q-heading">
                <h5>How i can Secure My Andriod Phone</h5>
                <small>Asked By: Ahsan</small>
                <a href="replies.php">Reply</a>
                <hr>
            </div>
            <div class="Q-heading">
                <h5>How i can Secure My Andriod Phone</h5>
                <small>Asked By: Ahsan</small>
                <a href="replies.php">Reply</a>
                <hr>
            </div>
            <div class="Q-heading">
                <h5>How i can Secure My Andriod Phone</h5>
                <small>Asked By: Ahsan</small>
                <a href="replies.php">Reply</a>
                <hr>
            </div>
            <div class="Q-heading">
                <h5>How i can Secure My Andriod Phone</h5>
                <small>Asked By: Ahsan</small>
                <a href="replies.php">Reply</a>
                <hr>
            </div>
            <div class="Q-heading">
                <h5>How i can Secure My Andriod Phone</h5>
                <small>Asked By: Ahsan</small>
                <a href="replies.php">Reply</a>
                <hr>
            </div>
            <div class="Q-heading">
                <h5>How i can Secure My Andriod Phone</h5>
                <small>Asked By: Ahsan</small>
                <a href="replies.php">Reply</a>
                <hr>
            </div>
            <div class="Q-heading">
                <h5>How i can Secure My Andriod Phone</h5>
                <small>Asked By: Ahsan</small>
                <a href="replies.php">Reply</a>
                <hr>
            </div>
            <div class="Q-heading">
                <h5>How i can Secure My Andriod Phone</h5>
                <small>Asked By: Ahsan</small>
                <a href="replies.php">Reply</a>
                <hr>
            </div>
            <div class="Q-heading">
                <h5>How i can Secure My Andriod Phone</h5>
                <small>Asked By: Ahsan</small>
                <a href="replies.php">Reply</a>
                <hr>
            </div>
            <div class="Q-heading">
                <h5>How i can Secure My Andriod Phone</h5>
                <small>Asked By: Ahsan</small>
                <a href="replies.php">Reply</a>
                <hr>
            </div>
            <div class="Q-heading">
                <h5>How i can Secure My Andriod Phone</h5>
                <small>Asked By: Ahsan</small>
                <a href="replies.php">Reply</a>
                <hr>
            </div>
            <div class="Q-heading">
                <h5>How i can Secure My Andriod Phone</h5>
                <small>Asked By: Ahsan</small>
                <a href="replies.php">Reply</a>
                <hr>
            </div>
            <div class="Q-heading">
                <h5>How i can Secure My Andriod Phone</h5>
                <small>Asked By: Ahsan</small>
                <a href="replies.php">Reply</a>
                <hr>
            </div>

            <!-- ---------------------------------------------------- -->

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