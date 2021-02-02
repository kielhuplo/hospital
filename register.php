<html>
 <head>
 <style>
 body {
			background: url(bg.jpg) no-repeat center center fixed; 
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			background-size: cover;
			margin-top: 5px;
			
			color: white;
			font-family: Times New Roman;
			font-size:30px;
			
			text-shadow: 2px 2px 4px #000000;
			text-align: center;
			
			}
			input[type=submit] {
			width: 20em;  height: 3em;
			
			}
			
</style>
 
 <title>My Online Store</title>
 </head>
 <body>
<center>
 <h1>Registration Page</h1>
 <form action="register.php" method="POST">

Username:
<input type="text" name="username" required="required" placeholder="Uzumakiel" /><br>
Password:
<input type="password" name="password" required="required" placeholder="P@s$W0rd" />
<br><br>
 <input type="submit" id="submit" value="Register"/><br/><br/>
<a href="login.php" style="color:blue">Have an Account? Login Here!</a>
</center>
 </body>
</html>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
$username = ($_POST['username']);
$password = ($_POST['password']);
echo "Username entered is: " . $username. "<br/>";
echo "Password entered is: " . $password;
}
?>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
$username = ($_POST['username']);
$password = ($_POST['password']);
$bool = true;
$db_name = "deliverydb";
$db_username = "root";
$db_pass = "";
$db_host = "localhost";
$con = mysqli_connect("$db_host","$db_username","$db_pass", "$db_name") or
die(mysqli_error()); //Connect to server
$query = "SELECT * from users";
$results = mysqli_query($con, $query); //Query the users table
while($row = mysqli_fetch_array($results)) //display all rows from query
{
$table_users = $row['username']; // the first username row is passed on to $table_users, and so on until the query is finished

if($username == $table_users) // checks if there are any matching fields
{
$bool = false; // sets bool to false
Print '<script>alert("Username has been taken!");</script>'; //Prompts the user
Print '<script>window.location.assign("register.php");</script>'; // redirects to register.php

}
}
if($bool) // checks if bool is true
{
mysqli_query($con, "INSERT INTO users (username, password) VALUES
('$username','$password')"); //Inserts the value to table users
Print '<script>alert("Successfully Registered!");</script>'; // Prompts the user
Print '<script>window.location.assign("login.php");</script>'; // redirects to register.php

}
}
?>

