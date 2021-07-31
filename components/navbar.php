<?php 
// session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
    $loggedin = false;
}
else{
    $loggedin = true;
}
?>

<nav class="navbar navbar-expand-lg navbar-dark custom-color">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">ASN</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Social Links
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">LinkedIn</a></li>
                        <li><a class="dropdown-item" href="#">GitHub</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">My Website</a></li>
                    </ul>
                </li>
                <!-- --------------------------------- login and Logout Button ------------------ -->
                <?php 
        
        if($loggedin == true){
          echo '
           <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
            </li>
          ';
        }
        ?>
            </ul>
        </div>

        <!-- if user is Logedin then show his name on navbar  -->
        <?php
          if ($loggedin == true){
              $userName = strtoupper($_SESSION['userName']) ;
              echo '
              <h4 style="color: rgb(54, 252, 5);">'. $userName .'</h4>
              ';
          }
        ?>

    </div>
</nav>