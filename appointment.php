<?php
include 'Config/connect.php';

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true || $_SESSION['email'] == 'admin@gmail.com') {
  header("location: login.php");
  exit;
}



$sql = "SELECT * FROM `mechanics`";
$mechanic_list = mysqli_query($conn, $sql);



//Check if mechanic is already selected by the user













if($_SERVER["REQUEST_METHOD"] == "POST") {
    $client_email = $_SESSION['email'];
    $mechanic_name = $_POST["mechanic_name"];
    $date_of_appointment = $_POST["date_of_appointment"];



    //If condition to check if date of appointment of a mechanic is greater than 4
    $mechanic_appointment_count = "SELECT COUNT(*) as total FROM `client_order` WHERE `mechanic_name` = '$mechanic_name' AND `date_of_appointment` = '$date_of_appointment'";
    $count_result = mysqli_query($conn, $mechanic_appointment_count);
    $data=mysqli_fetch_assoc($count_result);
    $count_mechanic = $data['total'];


    if($count_mechanic >= 4) {
        echo "Mechanic " . $mechanic_name . "  is busy on that day";
    } else {
        $sql = "INSERT INTO `client_order` (`client_email`, `mechanic_name`, `date_of_appointment`) VALUES ('$client_email', '$mechanic_name', '$date_of_appointment');";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            header("location: welcome.php");
        }
    }


}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>

    

</head>
<body>
    <?php require 'Views/nav.php'; ?>
    
    <form action="appointment.php" method="post">
        
        <div class="group-content">
            <label for="mechanic">Choose a Mechanic:</label>

            <select name="mechanic_name" id="mechanic" required>
                
                <?php
                    //We can fetch in a better way using the while loop
                    while($row = mysqli_fetch_assoc($mechanic_list)) {
                        echo "<option value = " . $row['name'] . "> ".$row['name']." </option>";
                    }
                ?>
            </select>
        </div>


        <div class="group-content">
            <label for="date_of_appointment">Appointment Date</label>
            <input type="date" class="form-control" id="date_of_appointment" name="date_of_appointment" required>
        </div>

        

        <div class="group-content">
            <button type="submit" class="btn">Submit</button>
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