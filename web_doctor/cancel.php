<?php
session_start(); //starts the session
if($_SESSION['user_id']){ //checks if user is logged in
}
else{
header("location:index.html"); // redirects if user is not logged in
}

		$db_server ="localhost";
		$db_username ="root";
		$db_password ="";
		$db_name ="patient_care";
			
		$con = mysqli_connect($db_server, $db_username, $db_password, $db_name) or
		die(mysqli_error()); //Connect to server
        mysqli_query($con, "SELECT * FROM appointment");
        $approval = "CANCELLED";
        $id = $_GET['id'];
        $sql = "UPDATE appointment SET approval = '$approval' WHERE appointment_no='$id'";
	    
        $data = mysqli_query($con, $sql);
	        if(mysqli_query($con, $sql))
	        {
                //echo "updated!";
	    	    header("refresh:1; url=view_appointment.php");
	        }
	        else
	        {
	    	    echo "Something went wrong";
    	    }

	
?>

