<html>
    <head>
        <title>Register Doctor</title>
    </head>
    <body>
        <center>
            <h2>Registration Page</h2>
            <form action="register.php" method="POST">
            <table>
                <tr>
                    <td>Enter Username:
                    <td><input type="text" name="username" required="required" />
                </tr>
                <tr>
                    <td>Enter Password:
                    <td><input type="password" name="password" required="required" />
                </tr>
                <tr>
                    <td>Enter First Name:
                    <td><input type="text" name="fname" required="required" />
                </tr>
                <tr>
                    <td>Enter Last Name:
                    <td><input type="text" name="lname" required="required" />
                </tr>
                <tr>
                    <td>Enter Contact Num:
                    <td><input type="text" name="contact_num" required="required" />
                </tr>
                <tr>
                    <td>Enter Email:
                    <td><input type="text" name="email" required="required" />
                </tr>
                <tr>
                    <td>Enter Addresssss:
                    <td><input type="text" name="address" required="required" />
                <tr>
                    <td>Enter Specialization:
                    <td><input type="text" name="spec_detail" required="required" />
                </tr>
                
            </table><br>
            <input type="submit" value="Register"/><br/><br/>
                <a href="login.php">Have an Account? Login Here!</a>
        </center>
    </body>
</html>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $username = ($_POST['username']);
    $password = ($_POST['password']);
    $fname = ($_POST['fname']);
    $lname = ($_POST['lname']);
    $contact_num = ($_POST['contact_num']);
    $email = ($_POST['email']);
    $address = ($_POST['address']);
    $spec_detail = ($_POST['spec_detail']);


    $date = strftime("%Y-%m-%d");
    $date1 = strftime("%Y-%m-%d");
    $bool = true;
    $db_name = "patient_care";
    $db_username = "root";
    $db_pass = "";
    $db_host = "localhost";
    $con = mysqli_connect("$db_host","$db_username","$db_pass", "$db_name") or
    die(mysqli_error()); //Connect to server
    $query = "SELECT * from doctor";
    $results = mysqli_query($con, $query); //Query the patient table
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
        mysqli_query($con, "INSERT INTO doctor (username, password, fname, lname, contact_num, email, addres, creation_date, updation_date, spec_detail) VALUES
        ('$username', '$password', '$fname', '$lname', '$contact_num', '$email', '$addres', '$date', '$date1', '$spec_detail')"); //Inserts the value to table users
        Print '<script>alert("Successfully Registered!");</script>'; // Prompts the user
        Print '<script>window.location.assign("register.php");</script>'; // redirects to register.php
    }
}
?>