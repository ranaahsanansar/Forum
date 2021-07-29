<?php 

// session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
  // echo "false";
    $loggedin = false;
}
else{
  // echo "true";
    $loggedin = true;
    $userName = $_SESSION['userName'];
}
?>

<nav class="navbar navbar-expand-lg navbar-dark custom-color">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">ASN Discussion</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
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
              echo '
              <h4>'. $userName .'</h4>
              ';
          }
        ?>
    
  </div>
</nav>