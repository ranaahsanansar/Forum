<?php 

session_start();
$userName = null;

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
    $loggedin = false;
}
else{
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
    <link rel="stylesheet" href="resources/media.css">

    <!-- fonts from Google  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@400;700&display=swap" rel="stylesheet">
    <!--***** font-family: 'Libre Baskerville', serif; ******* -->


    <title>ASN Discussion</title>
</head>

<body>
    <!-- header of the web page ---------------------- -->
    <header>
        <?php
      require 'components/navbar.php';
      ?>
        <div class="hero-text-box">
            <h4>Cyber Security Discussion Forum</h4>
            <br>
            <h4 style="text-decoration: underline;" class="glow">Project of RANA AHSAN ANSAR</h4>
            <br>
            <!-- if session in Login then disply the name of User  -->
            <?php
                if ($loggedin != true){
                    echo '
                    <a href="loginPage.php" class="header-btn">
                        <h4>Login</h4>
                    </a>
                    <a href="singuppage.php" class="header-btn">
                        <h4>Singup</h4>
                    </a>
                    ';
                }else{
                    $userName = strtoupper($_SESSION['userName']);
                    echo '<h3>Welcome <div style="color: rgb(54, 252, 5); display: inline-block;">'.$userName .'</div></h3>'   ;
                }
            ?>

        </div>
    </header>

    <!-- Section Topics ----------***************--------- -->
    <section class="topics-section">
        <div class="container">
            <div class="heading">
                <h1>Topics/Category For Discussion</h1>
                <br>
                <h5 style="text-align: center;">Only Admin Can Add a new Topic Or Category</h5>
            </div>
            <div class="row">

                <!-- ferching Dynamic Topics forms DataBase  -->

                <!-- INSERT INTO `categories` (`cate_id`, `name`, `details`) VALUES (NULL, 'Android Security', 'How to Secure Your Andriod Phone From Hackers.'); -->
                <?php  
                    require 'components/__dbconnect.php';
                    $sql = 'SELECT * FROM `categories`';
                    $result = mysqli_query($conn , $sql);
                    while($row = mysqli_fetch_assoc($result)){
                        echo '
                            <div class="col-md-4 my-2 cards_index">
                            <div class="card card-custom" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">'. substr($row['title'], 0 , 15) .'...</h5>
                            <h6 class="card-subtitle mb-2 text-muted">ASN Discussion Forum</h6>
                            <p class="card-text">'. substr($row['details'] , 0 , 15) .'.......</p>
                            <a href="questions.php?cate_id='.$row['cate_id'].'" class="card-btn">View</a>
                            <!-- <a href="#" class="card-btn">Another link</a> -->
                        </div>
                            </div>
                                </div>
                        ';
                    }

                ?>

                <!-- ----------------------------------------------------  -->

            </div>

        </div>
    </section>

    <!-- ------ Footer part --------------------------  -->
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