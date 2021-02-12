<?php
    session_start();
    if (isset($_SESSION['username'])) {
        $db_name = "patient_care";
        $db_username = "root";
        $db_pass = "";
        $db_host = "localhost";
        $con = mysqli_connect("$db_host","$db_username","$db_pass", "$db_name") or
        die(mysqli_error()); //Connect to server
    }
    else {
      header("location: ../index.html");
    }
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
            <th>PATIENT</th>
            <th>APPOINTMENT DATE</th>
            <th>APPOINTMENT TIME</th>
            <th>DATE POSTED</th>
            <th>STATUS</th>
            <th>UPDATE</th>
        </tr>

    <?php

        $user_id = $_SESSION['user_id'];
        $query = mysqli_query($con, "SELECT appointment_date, appointment_time, date_posted, CONCAT(fname, \" \", lname) AS patient_assigned, approval as status FROM `appointment` INNER JOIN patient on patient.patient_id = appointment.patient_id WHERE doctor_id = '".$user_id."' ORDER BY appointment_date asc");
        
        while($row = mysqli_fetch_array($query))
        {
            Print '<tr>';
            Print '<td>' . $row['patient_assigned'];
            Print '<td>' . $row['appointment_date'];
            Print '<td>' . $row['appointment_time'];
            Print '<td>' . $row['date_posted'];
            Print "<td><select name=\"doctor_approval\">";
            Print "<option value=\"" . $row['status'] . "\" selected disabled hidden>" . $row['status'] . "</option>";
            Print "<option value=\"pending\">Pending</option>";
            Print "<option value=\"approved\">Approved</option>";
            Print "<option value=\"declined\">Declined</option>";
            Print "</select>";
            // Print '<td><a href="edit.php?">UPDATE</a> </td>';
            Print "<td><input type=\"submit\" value=\"Update\">";
            Print '</tr>';
        }
    ?>
    </table>
    
 
    

<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $approval = $_SESSION['doctor_approval'];						
  
    mysqli_query($con, "INSERT INTO appointment (appointment_date,appointment_time,details,date_posted,doctor_id,patient_id,approval) VALUES
    ('$appointment_date','$appointment_time','$details','$date','$doctor_id','$patient_id','pending')"); //Inserts the value to table users
    Print '<script>alert("Appointment Sent to Doctor!");</script>'; // Prompts the user
    Print '<script>window.location.assign("book_appointment.php");</script>'; // redirects to register.php
}
?>

</body>
</html>