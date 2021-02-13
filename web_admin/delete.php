<?php
session_start(); //starts the session
if($_SESSION['user_id']){ //checks if user is logged in
}
else{
header("location:index.html"); // redirects if user is not logged in
}

$con = mysqli_connect("localhost", "root", "", "patient_care") or die(mysqli_error()); //Connect to server
    mysqli_query($con, "SELECT * FROM appointment");
    $id = $_GET['id'];
    $sql = "DELETE FROM appointment WHERE appointment_no = $id";
	    
    $data = mysqli_query($con, $sql);
	    if(mysqli_query($con, $sql))
	    {
	    	header("refresh:1; url=view_appointment.php");
	    }
	    else
	    {
	    	echo "Something went wrong";
    	}

	
?>

