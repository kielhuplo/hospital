<html>
<?php
session_start();
$username = ($_POST['username']);
$password = ($_POST['password']);
$db_name = "patient_care";
$db_username = "root";
$db_pass = "";
$db_host = "localhost";
$con = mysqli_connect("$db_host","$db_username","$db_pass", "$db_name") or
die(mysqli_error()); //Connect to server
$query = "SELECT * from administrator WHERE username='$username'";
$results = mysqli_query($con, $query); //Query the users table if there are matching rows equal to $username
$exists = mysqli_num_rows($con, $query); //Checks if username exists
$table_users = "";
$table_password = "";
if($results != "") //IF there are no returning rows or no existing username
{
while($row = mysqli_fetch_assoc($results)) //display all rows from query
{
$table_users = $row['username']; // the first username row is passed on to $table_users, and so on until the query is finished
$table_password = $row['password']; // the first password row is passed on to $table_users, and so on until the query is finished
}
if(($username == $table_users) && ($password == $table_password)) // checks if there are any matching fields
{
if($password == $table_password)
{
$_SESSION['administrator'] = $username; //set the username in a session. This serves as a global variable
header("location: home.php"); // redirects the user to the authenticated home page
}
}
else
{
Print '<script>alert("Incorrect Password!");</script>'; //Prompts the user
Print '<script>window.location.assign("login.php");</script>'; // redirects to login.php
}
}
else
{
Print '<script>alert("Incorrect Username!");</script>'; //Prompts the user
Print '<script>window.location.assign("login.php");</script>'; // redirects to login.php
}
?>