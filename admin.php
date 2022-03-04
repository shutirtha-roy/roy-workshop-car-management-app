<?php
include 'Config/connect.php';

session_start();

if($_SESSION['email'] != "admin@gmail.com") {
  header("location: login.php");
  exit;
} else {
    $sql_total_orders = "SELECT * FROM client_order JOIN users ON client_order.`client_email` = users.`email`";
    $all_user_order_result = mysqli_query($conn, $sql_total_orders);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin</title>

    

</head>
<body>
    <?php require 'Views/nav.php'; ?>


    <h1 style="text-align:center; margin-top: 5vh; font-size: 4vh;">All Appointment Details</h1>
    <div class="table-content" style="text-align:center; margin-top: 10vh;">
        <table style="text-align:center;">
            <tr>
                <th>SL. No</th>
                <th>Client name</th>
                <th>Phone No.</th>
                <th>Car registration number</th>
                <th>Car Engine</th>
                <th>Appointment Date</th>
                <th>Mechanic Name</th>
                <th>Change Appointment</th>
                <th>Change Mechanic</th>
            </tr>
            <?php
                $count = 1;
                while($row = mysqli_fetch_assoc($all_user_order_result)) {
                    $temp_name = $row['name'];
                    $temp_id = $row['oid'];
                    $temp_phone = $row['phone'];
                    $temp_carLicense = $row['carLicense'];
                    $temp_carEngine = $row['carEngine'];

                    $appointment_addID = 'updateAppointment.php?updateAppId='.$temp_id;
                    $mechanic_addID = 'updateMechanic.php?updateMechanicId='.$temp_id;

                    $temp_date_appointment = $row['date_of_appointment'];
                    $temp_mechanic_name = $row['mechanic_name'];
                    echo "<tr>
                            <td>$count</td>
                            <td>$temp_name</td>
                            <td>$temp_phone</td>
                            <td>$temp_carLicense</td>
                            <td>$temp_carEngine</td>
                            <td>$temp_date_appointment</td>
                            <td>$temp_mechanic_name</td>
                            <td><button class='btn'><a href='$appointment_addID' style='color:white; padding: 4vh 4vh;'>Change Appointment</a></button></td>
                            <td><button class='btn'><a href='$mechanic_addID' style='color:white; padding: 4vh 4vh;'>Change Mechanic</a></button></td>
                        </tr>";
                    $count++;
                }
            ?>
        </table>
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