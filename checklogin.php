<?php
session_start();
$username = ($_POST['username']);
$password = ($_POST['password']);
$login_as = ($_POST['loginAs']);
$_SESSION['login_as'] = $login_as;
$db_server ="localhost";
$db_username ="root";
$db_password ="";
$db_name ="patient_care";
	
$con = mysqli_connect($db_server, $db_username, $db_password, $db_name) or
die(mysqli_error()); //Connect to server

if ($login_as == "admin") {
    $query = "SELECT * from administrator WHERE username='$username'";
} 

else if ($login_as == "patient") {
    $query = "SELECT * from patient WHERE username='$username'";
} 

else if ($login_as == "doctor") {
    $query = "SELECT * from doctor WHERE username='$username'";
}

$results = mysqli_query($con, $query); //Query the users table if there are matching rows equal to $username
$exists = mysqli_num_rows($con, $query); //Checks if username exists
$user_id = "";
$table_users = "";
$table_password = "";

if($results != "") { //IF there are no returning rows or no existing username

    while($row = mysqli_fetch_assoc($results)) { //display all rows from query
        if ($login_as == "admin") {
            $user_id = $row['admin_id'];
        } 
        
        else if ($login_as == "patient") {
            $user_id = $row['patient_id'];
        } 
        
        else if ($login_as == "doctor") {
            $user_id = $row['doctor_id'];
        }

        $table_users = $row['username']; // the first username row is passed on to $table_users, and so on until the query is finished
        $table_password = $row['password']; // the first password row is passed on to $table_users, and so on until the query is finished
    }

    if(($username == $table_users) && ($password == $table_password)) { // checks if there are any matching fields

        if($password == $table_password) {

            if ($login_as == "admin") {
                header("location: web_admin/index_admin.php"); // redirects the user to the authenticated home page
            } 
            
            else if ($login_as == "patient") {
                header("location: web_patient/index_patient.php"); // redirects the user to the authenticated home page
            } 
            
            else if ($login_as == "doctor") {
                header("location: web_doctor/index_doctor.php"); // redirects the user to the authenticated home page
            }

            $_SESSION['username'] = $username; //set the username in a session. This serves as a global variable
            $_SESSION['user_id'] = $user_id;
            $_SESSION['login_date_time'] = strftime("%Y-%m-%d %H:%M:%S");
        }
    } 
    
    else {
        Print '<script>alert("Incorrect Password!");</script>'; //Prompts the user
        Print '<script>window.location.assign("login.php");</script>'; // redirects to login.php
    }
}

else {
    Print '<script>alert("Incorrect Username!");</script>'; //Prompts the user
    Print '<script>window.location.assign("login.php");</script>'; // redirects to login.php
}
?>