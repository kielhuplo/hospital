<!DOCTYPE html>

<html lang="en">
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
            <th>NAME</th>
            <th>SCHEDULE</th>
            <th>Book Appointment?</th>
        </tr>

    <?php

        $con = mysqli_connect("localhost", "root", "", "patient_care") or die(mysqli_error());
        $query = mysqli_query($con, "Select * FROM doctor inner join doctors_schedule where doctor.doctor_id = doctors_schedule.doctor_id");
        

        while($row = mysqli_fetch_array($query))
        {
        Print '<tr>';
	    Print '<td>' . "Dr. " . $row['fname'] . " " . $row['lname'];
        Print '<td>' . $row['day'] . " " . $row['time_from'];
        Print "<td align='center'>" . "<button id=\"bookBtn\">Book Appointment</button>" . "</td>";
        Print '</tr>';
        }
    ?>
    </table>
    <div id="myModal" class="modal">
      <div class="modal-content">
        <span class="close">&times;</span>
        <p>Book Appointment</p>
        <form action="register.php" method="POST">
            <table>
                    <td><label">Enter Date:</label>
                    <td><input type="date" id="appointment_date" name="appointment_time">
                    <td><label">Enter Time:</label>
                    <td><input type="time" id="appointment_date" name="appointment_date">
                </tr>
            </table>
            <input type="submit" value="Submit"/><br/><br/>
        </form>
      </div>
    </div>

  <script>
  // Get the modal
  var modal = document.getElementById("myModal");

  // Get the button that opens the modal
  var btn = document.getElementById("bookBtn");

  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];

  // When the user clicks the button, open the modal 
  btn.onclick = function() {
    modal.style.display = "block";
  }

  // When the user clicks on <span> (x), close the modal
  span.onclick = function() {
    modal.style.display = "none";
  }

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
  </script>


<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $appointment_date = ($_POST['appointment_date']);
    $appointment_time = ($_POST['appointment_time']);
    
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
        mysqli_query($con, "INSERT INTO appointment (appointment_date, appointment_time, date_posted) VALUES
        ('$appointment_date', '$appointment_time', '$date')"); //Inserts the value to table users
        Print '<script>alert("Appointment Booked!");</script>'; // Prompts the user
        Print '<script>window.location.assign("login.php");</script>'; // redirects to register.php
    }
}
?>


    
</body>
</html>

