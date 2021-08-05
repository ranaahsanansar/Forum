<?php 

// is there is any error then This Page show that error 

if (isset($_GET['error'])){
    $messge = true;
}
else{
    $messge = false;
}
include 'components/stater.php' ;
?>

 
    <!-- header of the web page ---------------------- -->
    <header>
        <?php
            include 'components/navbar.php';
        ?>
    <div class="hero-text-box">
        <h3>
            <?php
            if ($messge == true){
                $messge_text = $_GET['error'];
                echo  '<h3 style="color: red;" >'.$messge_text.'</h3>'  ;
            }
            ?>
        </h3>
        <button type="button" class="header-btn" onclick="javascript:history.go(-1)">Back</button>
        <!-- <a href="index.php" class="header-btn"><h4>Go Back</h4></a> -->
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
</body>

</html>