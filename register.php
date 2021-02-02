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

First Name: <input type="text" name="fname" required="required" placeholder="Johny" /><br>

Last Name: <input type="text" name="lname" required="required" placeholder="Walker" /><br>

Birth day: <input type="date" name="birth_date" required="required" placeholder="01 - 01 - 2000" /><br>

Male<input type="radio" name="sex" value="male">

Female<input type="radio" name="sex" value="female"><br><br><br>

Contact Number: <input type="number" name="contact_num" required="required" placeholder="Walker" /><br>

Email Address: <input type="text" name="email" required="required" placeholder="JohynyWalker@gmail.com" /><br>
    
Address 1:  <input type="text" name="address_line1" required="required" placeholder="..." /><br>

Address 2: <input type="text" name="address_line2" placeholder="..." /><br>

City: <input type="text" name="address_city" required="required" placeholder="..." /><br>

State: <input type="text" name="address_state" required="required" placeholder="..." /><br>

Zip Code: <input type="number" name="zip_code" required="required" placeholder="..." /><br>

Marital Status: 
	<select id="zip_code" name="marital_status">
      <option value="Single">Single</option>
      <option value="Married">Married</option>
      <option value="Widowed">Widowed</option>
	  <option value="Divorced">Divorced</option>
    </select>
	
Weight (kg): <input type="number" name="weight" required="required" placeholder="..." /><br>

Height (cm): <input type="number" name="height" required="required" placeholder="..." /><br>
    
Taking Medicine? <br>
Yes<input type="radio" name="taking_meds" value="yes">
No<input type="radio" name="taking_meds" value="no"><br><br><br>
 
Person to contact in emergency: <input type="text" name="emergency_name" required="required" placeholder="..." /><br>
Relation:   <input type="text" name="emergency_relation" required="required" placeholder="..." /><br>
Contact Number: <input type="number" name="emergency_num" required="required" placeholder="..." /><br>

<br><br>
								<input type="submit" id="submit" value="Register"/><br/><br/>
								<a href="login.php" style="color:blue">Have an Account? Login Here!</a>
 						</form>
				    </div>
			



 </body>
</html>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
$username = ($_POST['username']);
$password = ($_POST['password']);
$fname = ($_POST['fname']);
$lname = ($_POST['lname']);
$birth_date = ($_POST['birth_date']);
$sex = ($_POST['sex']);
$contact_num = ($_POST['contact_num']);
$email = ($_POST['email']);

$address_line1 = ($_POST['address_line1']);
$address_line2 = ($_POST['address_line2']);
$address_city = ($_POST['address_city']);
$address_state = ($_POST['address_state']);
$zip_code = ($_POST['zip_code']);
$marital_status = ($_POST['marital_status']);
$weight = ($_POST['weight']);
$height = ($_POST['height']);

$taking_meds = ($_POST['taking_meds']);
$emergency_name = ($_POST['emergency_name']);
$emergency_relation = ($_POST['emergency_relation']);
$emergency_num = ($_POST['emergency_num']);



$bool = true;
$db_name = "hospital";
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
mysqli_query($con, "INSERT INTO users (username, password, fname, lname, birth_date, sex, contact_num, email, address_line1, address_line2, address_city, address_state, zip_code, marital_status, weight, height, taking_meds, emergency_name, emergency_relation, emergency_num ) VALUES
('$username', '$password', '$fname', '$lname', '$birth_date', '$sex', '$contact_num', '$email, '$address_line1', '$address_line2', '$address_city', '$address_state', '$zip_code', '$marital_status', '$weight', '$height', '$taking_meds', '$emergency_name', '$emergency_relation', '$emergency_num')"); //Inserts the value to table users
Print '<script>alert("Successfully Registered!");</script>'; // Prompts the user
Print '<script>window.location.assign("login.php");</script>'; // redirects to register.php

}
}
?>

