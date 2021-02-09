<!DOCTYPE html>

<html lang="en">
  <head>
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
            <th>DOCTOR</th>
            <th>APPOINTMENT DATE</th>
            <th>APPOINTMENT TIME</th>
            <th>DETAILS</th>
            <th>STATUS</th>
            <th>UPDATE</th>
        </tr>

    


    <?php

        $con = mysqli_connect("localhost", "root", "", "patient_care") or die(mysqli_error());

        
	  
    
        $query = mysqli_query($con, "Select doctor.fname as doctor_fname, doctor.lname as doctor_lname, patient.fname, patient.lname, appointment.appointment_date, appointment.appointment_time, appointment.details, appointment.approval FROM patient inner join appointment inner join doctor where patient.patient_id = appointment.patient_id && appointment.doctor_id = doctor.doctor_id");
        
       $sql = "SELECT id, fname, lname FROM doctor";

        while($row = mysqli_fetch_array($query))
        {
        Print '<tr>';
	    Print '<td>' . $row['fname'] . " " . $row['lname'];
        Print '<td>' . $row['doctor_fname'] . " " . $row['doctor_lname'];
        Print '<td>' . $row['appointment_date'];
        Print '<td>' . $row['appointment_time'];
        Print '<td>' . $row['details'];
        Print '<td>' . $row['approval'];
        Print '<td><a href="edit.php?">UPDATE</a> </td>';;
        Print '</tr>';
        }
    ?>
    </table>
    


</body>
</html>