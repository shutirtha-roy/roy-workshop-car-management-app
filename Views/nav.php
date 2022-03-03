<?php 

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  $loggedin = true;
} else {
  $loggedin = false;
}



?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <style>
        <?php require 'style.css' ?>
    </style>
  </head>



  <body>
    <?php 
  echo 
    '<nav>
        <ul class="left-navigation">
            <li class="first-link"><a href="#">ROY CAR WORKSHOP</a></li>
        </ul>

        <ul class="right-navigation">
            <li><a href="index.php">Home</a></li>';
            if(!$loggedin){
              echo '<li><a href="register.php">Sign Up</a></li>
            <li><a href="login.php">Login</a></li>';
            }
            if($loggedin && $_SESSION['email'] == "admin@gmail.com"){
            echo '<li><a href="admin.php">Select Appointment Details</a></li>
            <li><a href="logout.php">Log Out</a></li>';
            } else if($loggedin && $_SESSION['email'] != "admin@gmail.com") {
              echo '<li><a href="welcome.php">Select Appointment</a></li>
            <li><a href="logout.php">Log Out</a></li>';
            }
        echo '</ul>
    </nav>';
  ?>
</body>



