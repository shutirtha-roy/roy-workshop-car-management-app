<?php
include 'Config/connect.php';

$login = false;
$showError = false;

if($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST["email"];
  $password = $_POST["password"];
  $exits = false;

  $sql = "Select * from users where email='$email' AND password='$password'";
  $result = mysqli_query($conn, $sql);
  $num = mysqli_num_rows($result);
  //echo $num;

  if ($num == 1) {
    $login = true;
    session_start();
    $_SESSION['loggedin'] = true;
    $_SESSION['email'] = $email;

    if($_SESSION['email'] != "admin@gmail.com") {
        header("location: welcome.php");
    } else {
        header("location: admin.php");
    }
    
  }
  else {
    $showError = "Invalid Credentials";
  } 

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Roy Car WORKSHOP</title>

    

</head>
<body>
    <?php require 'Views/nav.php'; ?>



    <form action="login.php" method="post">
        <div class="group-content">
            <label for="email">Email&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="group-content">
            <label for="password">Password&emsp;&emsp;&emsp;&emsp;</label>
            <input type="password" name="password" id="password" required>
        </div>

        <div class="group-content">
            <button type="submit" class="btn login">Login</button>
        </div>
    </form>

    </div>
  </form>










    
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