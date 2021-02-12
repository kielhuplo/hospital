<?php
session_start(); //starts the session
if($_SESSION['user_id']){ //checks if user is logged in
}
else{
header("location:index_admin.html"); // redirects if user is not logged in
}

$con = mysqli_connect("localhost", "root", "", "patient_care") or die(mysqli_error()); //Connect to server
    mysqli_query($con, "SELECT * FROM appointment");
    $id = $_GET['id'];
    $sql = "DELETE FROM appointment WHERE appointment_no = $id";
	    
    $data = mysqli_query($con, $sql);
	    if($data)
	    {
	    	echo "DATA DELETED";
	    }
	    else
	    {
	    	echo "Something went wrong";
    	}


?>