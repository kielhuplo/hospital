<?php
session_start(); //starts the session
if($_SESSION['user_id']){ //checks if user is logged in
}
else{
header("location:index_admin.html"); // redirects if user is not logged in
}

    $con = mysqli_connect("localhost", "root", "", "patient_care") or die(mysqli_error()); //Connect to server
        mysqli_query($con, "SELECT * FROM appointment");
        $approval = "CANCELLED";
        $id = $_GET['id'];
        $sql = "UPDATE appointment SET approval = '$approval' WHERE appointment_no='$id'";
	    
        if (isset($_SESSION['username'])) {

			if ($_SESSION['login_as'] == "doctor") {
				if(mysqli_query($con, $sql))
				{
					//echo "updated!";
					header("refresh:1; url=./web_doctor/view_appointment.php");
				}
				else
				{
					echo "Something went wrong";
				}
			}
	
			else if ($_SESSION['login_as'] == "admin") {
					if(mysqli_query($con, $sql))
					{
						//echo "updated!";
						header("refresh:1; url=./web_admin/view_appointment.php");
					}
					else
					{
						echo "Something went wrong";
					}
			}
	
		}

	
?>

