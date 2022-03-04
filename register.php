<?php
include 'Config/connect.php';


$showAlert = false;
$showError = false;

if($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST["email"];
  $name = $_POST["name"];
  $address = $_POST["address"];
  $phone = $_POST["phone"];
  $carLicense = $_POST["carLicense"];
  $carEngine = $_POST["carEngine"];
  $password = $_POST["password"];
  $cpassword = $_POST["cpassword"];
  //$exits = false;











  //Check whether this username Exists
  $existsSql = "SELECT * FROM `users` where email = '$email'";
  $result = mysqli_query($conn, $existsSql);
  $numExistRows = mysqli_num_rows($result);

  if($numExistRows > 0) {
    //$exists = true;
    $showError = "Email Already Exists";
  } else {
    if(($password == $cpassword) && $password != "") {
      $sql = "INSERT INTO `users` (`email`, `name`, `address`, `phone`, `carLicense`, `carEngine`, `password`) VALUES ('$email', '$name', '$address', '$phone', '$carLicense', '$carEngine', '$password');";
      $result = mysqli_query($conn, $sql);

      if ($result) {
        $showAlert = true;
        //header("location: login.php");
        $login = true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['email'] = $email;
        header("location: welcome.php");
      }
    }
    else {
      $showError = "Passwords do not match";
    } 
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



    <form action="register.php" method="post">
        <div class="group-content">
            <label for="email">Email&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="group-content">
            <label for="name">Name&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="group-content">
            <label for="address">Address&emsp;&emsp;&emsp;&emsp;&emsp;</label>
            <input type="text" class="form-control" id="address" name="address" required>
        </div>

        <div class="group-content">
            <label for="phone">Phone&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</label>
            <input type="text" class="form-control" id="phone" name="phone" required>
        </div>

        <div class="group-content">
            <label for="carLicense">Car License Number</label>
            <input type="text" class="form-control" id="carLicense" name="carLicense" required>
        </div>

        <div class="group-content">
            <label for="carLicense">Car Engine Number</label>
            <input type="text" class="form-control" id="carEngine" name="carEngine" required>
        </div>

        <div class="group-content">
            <label for="password">Password&emsp;&emsp;&emsp;&emsp;</label>
            <input type="password" name="password" id="password" required>
        </div>

        <div class="group-content">
            <label for="cpassword">Confirm Password&nbsp;</label>
            <input type="password" name="cpassword" id="cpassword" required>
        </div>

        <div class="group-content">
            <button type="submit" class="btn register">Register</button>
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