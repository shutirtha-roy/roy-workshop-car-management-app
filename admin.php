<?php
include 'Config/connect.php';

session_start();

if($_SESSION['email'] != "admin@gmail.com") {
  header("location: login.php");
  exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin</title>

    

</head>
<body>
    <?php require 'Views/nav.php'; ?>











    
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