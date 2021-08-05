<?php 
session_start();
// if session is already on then Go to index page 
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
    $loggedin = false;
}
else{
    header('location: index.php');
}
include 'components/stater.php' ;

?>
    <!-- header of the web page ---------------------- -->
    <header>
        <?php
      require 'components/navbar.php';
    ?>
        <div class="hero-text-box">
            <!-- singup form to singup  -->
            <form action="singup.php" method="POST" class="singupforum">
                <!-- name input  -->
                <div class="mb-3">
                <h6 style="color:antiquewhite" >Enter Name</h6>
                    <input type="text" class="form-control" id="name" name="name" >
                </div>
                <!-- email input  -->
                <div class="mb-3">
                <h6 style="color:antiquewhite" >Enter Email</h6>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <!-- password Input  -->
                <div class="mb-3">
                    <h6 style="color:antiquewhite" >Enter Password</h6>
                    <input type="password" class="form-control" id="password" name="password" >
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </header>
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