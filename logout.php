<?php
    session_start();

    $login_date_time = $_SESSION['login_date_time'];
    $logout_date_time = strftime("%Y-%m-%d %H:%M:%S");
    $user_id = $_SESSION['user_id'];
    $db_name = "patient_care";
    $db_username = "root";
    $db_pass = "";
    $db_host = "localhost";
    $con = mysqli_connect("$db_host","$db_username","$db_pass", "$db_name") or
    die(mysqli_error()); //Connect to server

    if (isset($_SESSION['username'])) {
        if ($_SESSION['login_as'] == "admin") {
        } 
        
        else if ($_SESSION['login_as'] == "patient") {
            mysqli_query($con, "INSERT INTO patient_log (login_date_time,logout_date_time,patient_id) VALUES
                ('$login_date_time','$logout_date_time','$user_id')");
        } 
        
        else if ($_SESSION['login_as'] == "doctor") {
        }

        session_destroy();
        header("location: index.html");
    }
    else {
        header("location: index.html");
    }
?>