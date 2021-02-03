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
                    <td><label">Enter Birthday:</label>
                    <td><input type="date" id="birth_date" name="birth_date">
                </tr>
                <tr>
                    <td><label>Enter Sex:</label>

                    <td><select name="sex">
                    <option value="m">Male</option>
                    <option value="f">Female</option>
                    </select>
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
                    <td>Enter Address Line 1:
                    <td><input type="text" name="address_line1" required="required" />
                </tr>
                <tr>
                    <td>Enter Address Line 2:
                    <td><input type="text" name="address_line2" required="required" />
                </tr>
                <tr>
                    <td>Enter City:
                    <td><input type="text" name="address_city" required="required" />
                </tr>
                <tr>
                    <td>Enter State:
                    <td><input type="text" name="address_state" required="required" />
                </tr>
                <tr>
                    <td>Enter Zip Code:
                    <td><input type="text" name="zip_code" required="required" />
                </tr>
                <tr>
                    <td><label>Enter Marital Status:</label>

                    <td><select name="marital_status">
                    <option value="single">Single</option>
                    <option value="married">Married</option>
                    <option value="widowed">Widowed</option>
                    <option value="divorced">Divorced</option>
                    <option value="separated">Separated</option>
                    </select>
                </tr>
                <tr>
                    <td>Enter Weight:
                    <td><input type="text" name="weight" required="required" />
                </tr>
                <tr>
                    <td>Enter Height:
                    <td><input type="text" name="height" required="required" />
                </tr>
                <tr>
                    <td><label>Currently Taking Meds?:</label>

                    <td><select name="taking_meds">
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                    </select>
                </tr>
                <tr>
                    <td>In case of emergency, contact:
                    <td><input type="text" name="emergency_name" required="required" />
                </tr>
                <tr>
                    <td>Relationship:
                    <td><input type="text" name="emergency_relation" required="required" />
                </tr>
                <tr>
                    <td>Contact Number:
                    <td><input type="text" name="emergency_num" required="required" />
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
    
    $date = strftime("%Y-%m-%d");
    $bool = true;
    $db_name = "patient_care";
    $db_username = "root";
    $db_pass = "";
    $db_host = "localhost";
    $con = mysqli_connect("$db_host","$db_username","$db_pass", "$db_name") or
    die(mysqli_error()); //Connect to server
    $query = "SELECT * from patient";
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
        mysqli_query($con, "INSERT INTO patient (username,password,fname,lname,birth_date,sex,contact_num,email,address_line1,address_line2,address_city,address_state,zip_code,marital_status,weight,height,taking_meds,emergency_name,emergency_relation,emergency_num,registration_date) VALUES
        ('$username','$password','$fname','$lname','$birth_date','$sex','$contact_num','$email','$address_line1','$address_line2','$address_city','$address_state','$zip_code','$marital_status','$weight','$height','$taking_meds','$emergency_name','$emergency_relation','$emergency_num','$date')"); //Inserts the value to table users
        Print '<script>alert("Successfully Registered!");</script>'; // Prompts the user
        Print '<script>window.location.assign("register.php");</script>'; // redirects to register.php
    }
}
?>