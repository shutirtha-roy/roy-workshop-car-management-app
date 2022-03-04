<?php
include 'Config/connect.php';

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true || $_SESSION['email'] == 'admin@gmail.com') {
  header("location: login.php");
  exit;
} else {
    $session_user = $_SESSION['email'];
    $sql_total_orders = "SELECT * FROM client_order JOIN users ON client_order.`client_email` = users.`email` WHERE client_email = '$session_user';";
    $user_order_result = mysqli_query($conn, $sql_total_orders);
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

    

    

    <div class="table-content" style="text-align:center;">
        <table style="text-align:center;">
            <tr>
                <th>SL. No</th>
                <th>Appointment Date</th>
                <th>Mechanic</th>
            </tr>
            <?php
                $count = 1;
                while($row = mysqli_fetch_assoc($user_order_result)) {
                    $temp_date_appointment = $row['date_of_appointment'];
                    $temp_mechanic_name = $row['mechanic_name'];
                    echo "<tr>
                            <td>$count</td>
                            <td>$temp_date_appointment</td>
                            <td>$temp_mechanic_name</td>
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