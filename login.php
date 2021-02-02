 <head>
 <title>My Online Store</title>
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
			text-align: center;
			
			}
			input[type=submit] {
			width: 20em;  height: 3em;
			
			}
			
</style>
 <body>
<center>
 <h1>Login Page</h1>
  <form action = "checklogin.php" method= "POST">
 <table>
<tr>
Username:
<input type="text" name="username" required="required" placeholder="..."/><br/>
</tr>
<tr>
Password:
<input type="password" name="password" required="required" placeholder="..." />
</tr>
 </table><br>
 <input type="submit" value="Login"/><br/><br/>
 <a href="register.php"  style="color:blue">Don't have an Account? Register Here!</a>
</center>
 </body>
</html>
