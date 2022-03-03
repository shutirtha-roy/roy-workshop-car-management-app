<?php
include 'Config/connect.php';

session_start();
/*
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
  header("location: login.php");
  exit;
} */
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Roy Car WORKSHOP</title>

    

</head>
<body>
    <?php require 'Views/header.php'; ?>

    <div class="text-section">
        <h1>Welcome to ROY CAR WORKSHOP</h1>
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