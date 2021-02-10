<?php
    session_start();
?>

<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Patient Help</title>
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/templatemo-klassy-cafe.css">
    <link rel="stylesheet" href="css/owl-carousel.css">
    <link rel="stylesheet" href="css/lightbox.css">
    <link rel="shortcut icon" type="image/png" href="images/transparenticon.png">
    </head>
    <body>
  
    <table align="center" border="1px">
        <tr>
            <th>APPOINTMENT DATE</th>
            <th>APPOINTMENT TIME</th>
            <th>DATE POSTED</th>
            <th>DOCTOR ASSIGNED</th>
            <th>STATUS</th>
        </tr>

    <?php

        $con = mysqli_connect("localhost", "root", "", "patient_care") or die(mysqli_error());
        $user_id = $_SESSION['user_id'];
        $query = mysqli_query($con, "SELECT appointment_date, appointment_time, date_posted, CONCAT(fname, \" \", lname) AS doctor_assigned, approval as status FROM `appointment` INNER JOIN doctor on doctor.doctor_id = appointment.doctor_id WHERE patient_id = '".$user_id."' ORDER BY appointment_date asc");
        

        while($row = mysqli_fetch_array($query))
        {
        Print '<tr>';
        Print '<td>' . $row['appointment_date'];
        Print '<td>' . $row['appointment_time'];
        Print '<td>' . $row['date_posted'];
        Print '<td>' . $row['doctor_assigned'];
        Print '<td>' . $row['status'];
        Print '</tr>';
        }
    ?>
    </table>
    
 
    
</body>
</html>