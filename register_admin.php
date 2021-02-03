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
						 <form action="" method="POST">
											
Username: <input type="text" name="username" required="required" placeholder="User" /><br>

Password: <input type="password" name="password" required="required" placeholder="Password" /><br>
Updation Date: <input type="date" name="updation_date" required="required" placeholder="..." /><br>

<br><br>
								<input type="submit" name="submit" id="submit" value="Register"/><br/><br/>
								<a href="register_admin.php" style="color:blue">Have an Account? Login Here!</a>
 						</form>
				    </div>
			



 </body>
</html>

<?php
$server_name="localhost";
$username = "root";
$password = "";
$database_name="patient_care";

$conn = mysqli_connect($server_name, $username, $password, $database_name);

if (!$conn)
{
die("Connection Failed:" . mysqli_connect_Error());
}

if(isset($_POST['submit']))
{
$username = "admn_" . $_POST['username'];
$password = $_POST['password'];
$updation_date = $_POST['updation_date'];

$sql_query = "INSERT INTO administrator (username, password, updation_date) 
VALUES ('$username', '$password', '$updation_date')";

if(mysqli_query($conn, $sql_query))
{
	echo "NEW DETAILS ENTRY!";
}
else
{
	echo "Error: " . "" . mysqli_error($conn);
}
mysqli_close($conn);
			}
			
?>

