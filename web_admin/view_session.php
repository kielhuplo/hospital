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
            <th>DOCTOR</th>
            <th>LOGIN DATE & TIME</th>
            <th>LOGOUT DATE & TIME</th>
        </tr>

    <?php

        $con = mysqli_connect("localhost", "root", "", "patient_care") or die(mysqli_error());
        $user_id = $_SESSION['user_id'];
        $query = mysqli_query($con, "SELECT login_date_time, logout_date_time, CONCAT(fname, \" \", lname) AS doctor_name FROM `doctor_log` INNER JOIN doctor on doctor.doctor_id = doctor_log.doctor_id ORDER BY login_date_time asc");
        
        while($row = mysqli_fetch_array($query))
        {
        Print '<tr>';
	    Print '<td>' . $row['doctor_name'];
        Print '<td>' . $row['login_date_time'];
        Print '<td>' . $row['logout_date_time'];
        Print '</tr>';
        }
    ?>
    </table><br>

    <table align="center" border="1px">
        <tr>
            <th>PATIENT</th>
            <th>LOGIN DATE & TIME</th>
            <th>LOGOUT DATE & TIME</th>
        </tr>

    <?php

        $con = mysqli_connect("localhost", "root", "", "patient_care") or die(mysqli_error());
        $user_id = $_SESSION['user_id'];
        $query = mysqli_query($con, "SELECT login_date_time, logout_date_time, CONCAT(fname, \" \", lname) AS patient_name FROM `patient_log` INNER JOIN patient WHERE patient.patient_id = patient_log.patient_id ORDER BY login_date_time asc");
        

        
        while($row = mysqli_fetch_array($query))
        {
        Print '<tr>';
	    Print '<td>' . $row['patient_name'];
        Print '<td>' . $row['login_date_time'];
        Print '<td>' . $row['logout_date_time'];
        Print '</tr>';
        }
    ?>
    </table>
    
 
    



</body>
</html>