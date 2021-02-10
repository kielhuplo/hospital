<html>
<head>
<title>Edit Appointment</title>
</head>
<?php
session_start(); //starts the session


?>
<body>



<table border="1px" width="100%">
<tr>
<th>PATIENT</th>
            <th>DOCTOR</th>
            <th>APPOINTMENT DATE</th>
            <th>APPOINTMENT TIME</th>
            <th>DETAILS</th>
            <th>STATUS</th>
      
</tr>
<?php



$con = mysqli_connect("localhost", "root", "", "patient_care") or die(mysqli_error()); //Connect to server
$sql = mysqli_query($con, "Select doctor.fname as doctor_fname, doctor.lname as doctor_lname, patient.fname, patient.lname, appointment.appointment_date, appointment.appointment_time, appointment.details, appointment.approval FROM patient inner join appointment inner join doctor where patient.patient_id = appointment.patient_id && appointment.doctor_id = doctor.doctor_id");


while($row = mysqli_fetch_array($sql))
{
    Print '<tr>';
    Print '<td>' . $row['fname'] . " " . $row['lname'];
    Print '<td>' . $row['doctor_fname'] . " " . $row['doctor_lname'];
    Print '<td>' . $row['appointment_date'];
    Print '<td>' . $row['appointment_time'];
    Print '<td>' . $row['details'];
    Print '<td>' . $row['approval'];
    Print '</tr>';
$approval = $row['approval'];
}


Print '<form action="edit.php" method="POST">

Update: <select name="approval">
                <option value="0">For Verification</option>
                <option value="1">Confirmed</option>
                <option value="2">Canceled</option>
            </select><br/><br/>';

Print'<input type="submit" value="Update List"/></form><br/><br/>';

?>
</body>
</html>
<?php
if($_SERVER['REQUEST_METHOD'] == "POST")
{
$con = mysqli_connect("localhost", "root", "", "patient_care") or die(mysqli_error()); //Connect to server
$approval = ($_POST['approval']);


mysqli_query($con, "UPDATE list SET details='$details', public='$public', date_edited='$date',
time_edited='$time' WHERE id='$id'") ;
header("location: view_appointment.php");
}
?>