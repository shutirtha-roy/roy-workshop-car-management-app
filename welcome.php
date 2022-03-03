<?php
include 'Config/connect.php';

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true || $_SESSION['email'] == 'admin@gmail.com') {
  header("location: login.php");
  exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>

    

</head>
<body>
    <?php require 'Views/nav.php'; ?>
    <div style="font-size: 6vh; margin-top: 5vh; text-align:center;">Welcome - <?php echo  ucfirst(explode("@",$_SESSION['email'])[0]) ?></div>

    <div class="group-content" >
        <button type="submit" class="btn register" style="text-center: center;"><a href="appointment.php" style="color:white; padding: 8vh 8vh;">Make Appointment</a></button>
    </div>

    







    
</body>
























<style>
    header {
        background-color: #000000;
        background: url('Views/img/Capture.PNG');
        height: 100vh;
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
        position: relative;
    }
</style>
</html>