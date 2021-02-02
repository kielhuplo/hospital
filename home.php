<html>
<head>
 <title>WELCOMEEEE</title>
</head>
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
			}
			input[type=submit] {
			width: 20em;  height: 3em;
			
			}
			input[type=text] {
			width: 20em;  height: 3em;
			
			}
			input[type=checkbox] {
			width: 2em;  height: 2em;
			
			}
			table, th, td {
  border: 1px solid white;
  border-collapse: collapse;
}
			
</style>
<?php
session_start(); //starts the session
if($_SESSION['user']){ //checks if user is logged in
}
else{
 header("location:index.php"); // redirects if user is not logged in
}
$user = $_SESSION['user']; //assigns user value
?>
<body>
 <h1 align="center" >WELCOMEEEEEEEEEEEEEEEEEEEEE ITS A SUCCESSSSSSSSSSSSSSSSSSSSSSSSSSSS Home Page</h1>
 
</body>
</html>