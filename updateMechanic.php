<?php
include 'Config/connect.php';
session_start();
$uid = $_GET['updateMechanicId'];



$sql_mechanic = "SELECT `mechanic_name` FROM client_order  WHERE oid = '$uid ';";
$mechanic_result = mysqli_query($conn, $sql_mechanic);
$row = mysqli_fetch_assoc($mechanic_result);
$mechanic_name = $row['mechanic_name'];



$sql = "SELECT * FROM `mechanics`";
$mechanic_list = mysqli_query($conn, $sql);



if($_SERVER["REQUEST_METHOD"] == "POST") {
    $appointment_mechanic = $_POST['mechanic_name'];

    $sql_update_appointment = "UPDATE `client_order` SET `mechanic_name` = '$appointment_mechanic' WHERE `client_order`.`oid` = $uid;";
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
            <label for="mechanic">Choose a Mechanic:</label>

            <select name="mechanic_name" id="mechanic" required>
                
                <?php
                    //We can fetch in a better way using the while loop
                    while($row = mysqli_fetch_assoc($mechanic_list)) {
                        if($row['name'] != $mechanic_name) {
                            echo "<option selected='$mechanic_name' value = " . $row['name'] . "> ".$row['name']." </option>";
                        }
                        
                    }
                ?>
            </select>
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


