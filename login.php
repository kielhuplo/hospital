 <head>
 <title>My Online Store</title>
 </head>
 
 <body>
<center>
 <h1>Login Page</h1>
  <form action = "checklogin.php" method= "POST">
  
 <table>
<tr>
	<td><label>Login as:</label>
	<td><select name="loginAs">
                    <option value="admin">Admin</option>
                    <option value="patient">Patient</option>
					<option value="doctor">Doctor</option>
                    </select>
</tr>
	<td><label>Username:</label>
	<td><input type="text" name="username" required="required" placeholder="Enter Username"/><br/>
</tr>
<tr>
	<td><label>Password:</label>
	<td><input type="password" name="password" required="required" placeholder="Enter Password" />
</tr>
 </table><br>
 <input type="submit" value="Login"/><br/><br/>
 <a href="register.php"  style="color:blue">Don't have an Account? Register Here!</a>
</center>
 </body>
</html>
