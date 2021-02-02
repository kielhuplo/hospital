<html>
 
	
	<head>
		<title>REGISTRATION FORM</title>
		<link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
		<link href='http://fonts.googleapis.com/css?family=Ropa+Sans' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/responsiveslides.css">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script src="js/responsiveslides.min.js"></script>
		  <script>
		    // You can also use "$(window).load(function() {"
			    $(function () {
			
			      // Slideshow 1
			      $("#slider1").responsiveSlides({
			        maxwidth: 1600,
			        speed: 600
			      });
			});
		  </script>
	</head>
	<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=number], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}
input[type=date], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}
input[type=password], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
	
	
 
 <body>

					<div class="container">
					<div class="underline"><div class="txt-center">  <h1> New Patient Registration</h1></div> </div>
						 <form action="register.php" method="POST">
											
Username: <input type="text" name="username" required="required" placeholder="User" /><br>

Password: <input type="password" name="password" required="required" placeholder="Password" /><br>
Updation Date: <input type="date" name="updation_date" required="required" placeholder="..." /><br>

<br><br>
								<input type="submit" id="submit" value="Register"/><br/><br/>
								<a href="register_admin.php" style="color:blue">Have an Account? Login Here!</a>
 						</form>
				    </div>
			



 </body>
</html>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
$username = ($_POST['username']);
$password = ($_POST['password']);
$updation_date = ($_POST['updation_date']);

$bool = true;
$db_name = "patient_care";
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
mysqli_query($con, "INSERT INTO 'administrator' (username, password, updation_date) VALUES ('$username', '$password', '$updation_date')"); //Inserts the value to table users
Print '<script>alert("Successfully Registered!");</script>'; // Prompts the user
Print '<script>window.location.assign("register_admin.php");</script>'; // redirects to register.php

}
}
?>

