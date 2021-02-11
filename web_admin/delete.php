<?php
session_start(); //starts the session
if($_SESSION['user_id']){ //checks if user is logged in
}
else{
header("location:index_admin.html"); // redirects if user is not logged in
}
if($_SERVER['REQUEST_METHOD'] == "GET")
{
$con = mysqli_connect("localhost", "root", "", "patient_care") or die(mysqli_error()); //Connect to server
$id = $_GET['user_id'];
mysqli_query($con, "DELETE FROM appointment WHERE 'appointment_no'='$id'");
header("location: view_appointment.php");
}
?>