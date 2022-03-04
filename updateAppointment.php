<?php
include 'Config/connect.php';


$uid = $_GET['updateAppId'];
session_start();

$sql_appointment = "SELECT `date_of_appointment` FROM client_order  WHERE oid = '$uid ';";
$appointment_result = mysqli_query($conn, $sql_appointment);
$row = mysqli_fetch_assoc($appointment_result);
$pre_appointment = $row['date_of_appointment'];



if($_SERVER["REQUEST_METHOD"] == "POST") {
    $appointment_date = $_POST['date_of_appointment'];

    $sql_update_appointment = "UPDATE `client_order` SET `date_of_appointment` = '$appointment_date' WHERE `client_order`.`oid` = $uid;";
    $result = mysqli_query($conn, $sql_update_appointment);
    header("location: admin.php"); 
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>

    

</head>
<body>
    <?php require 'Views/nav.php'; ?>
    
    <form method="post">

        <div class="group-content">
            <label for="date_of_appointment">Appointment Date</label>
            <input type="date" class="form-control" id="date_of_appointment" name="date_of_appointment" value="<?php echo $pre_appointment ?>" required>
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
