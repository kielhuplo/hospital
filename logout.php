<?php
    session_start();

    $login_date_time = $_SESSION['login_date_time'];
    $logout_date_time = strftime("%Y-%m-%d %H:%M:%S");
    $user_id = $_SESSION['user_id'];
	
	$db_server ="sql107.epizy.com";
	$db_username ="epiz_27937498";
	$db_password ="IA8QyYIzOeKC";
	$db_name ="epiz_27937498_patient_care";
	
	$con = mysqli_connect($db_server, $db_username, $db_password, $db_name) or die(mysqli_error()); //Connect to server

    if (isset($_SESSION['username'])) {
                
        if ($_SESSION['login_as'] == "patient") {
            mysqli_query($con, "INSERT INTO patient_log (login_date_time,logout_date_time,patient_id) VALUES
                ('$login_date_time','$logout_date_time','$user_id')");
        } 
        
        else if ($_SESSION['login_as'] == "doctor") {
            mysqli_query($con, "INSERT INTO doctor_log (login_date_time,logout_date_time,doctor_id) VALUES
                ('$login_date_time','$logout_date_time','$user_id')");
        }

        session_destroy();
        header("location: index.html");
    }
    else {
        header("location: index.html");
    }
?>