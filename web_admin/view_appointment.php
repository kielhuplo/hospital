<!DOCTYPE html>

<html lang="en">
  <head>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Patient Help</title>
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/templatemo-klassy-cafe.css">
    <link rel="stylesheet" href="css/owl-carousel.css">
    <link rel="stylesheet" href="css/lightbox.css">
    <link rel="shortcut icon" type="image/png" href="images/transparenticon.png">
    </head>
    <body>
    

    <table align="center" border="1px">
        <tr>
            <th>PATIENT</th>
            <th>DOCTOR</th>
            <th>APPOINTMENT DATE</th>
            <th>APPOINTMENT TIME</th>
            <th>STATUS</th>
            <th>UPDATE</th>
        </tr>

    


    <?php

        $con = mysqli_connect("localhost", "root", "", "patient_care") or die(mysqli_error());

        
	  
    
        $query = mysqli_query($con, "Select * FROM patient inner join appointment where patient.patient_id = appointment.patient_id");
       // $query2 = mysqli_query($con, "Select * FROM doctor inner join appointment where doctor.doctor_id = appointment.doctor_id");
        
       $sql = "SELECT id, fname, lname FROM doctor";

        while($row = mysqli_fetch_array($query))
        {
        Print '<tr>';
	    Print '<td>' . $row['fname'] . " " . $row['lname'];
        Print '<td>' . $row['doctor_id'];
        Print '<td>' . $row['appointment_date'];
        Print '<td>' . $row['appointment_time'];
        Print '<td>' . $row['details'];
        Print '<td>' . "<form action='register.php' method='POST'> <select> 
                        <option value=CONFIRM>CONFIRM</option>
                        <option value=CANCEL>CANCEL</option>
                        </select> </form>" ;
        Print '</tr>';
        }
    ?>
    </table>
    
 
    

<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    
    $status = ($_POST['emergency_num']);

    $date = strftime("%Y-%m-%d");
    $bool = true;
    $db_name = "patient_care";
    $db_username = "root";
    $db_pass = "";
    $db_host = "localhost";
    $con = mysqli_connect("$db_host","$db_username","$db_pass", "$db_name") or
    die(mysqli_error()); //Connect to server
    $query = "SELECT * from appointment";
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

</body>
</html>