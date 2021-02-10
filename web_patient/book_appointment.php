<?php
    session_start();
    if (isset($_SESSION['username'])) {

    }
    else {
      header("location: ../index.html");
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Patient Help</title>
      <link rel="shortcut icon" type="image/png" href="../images/transparenticon.png">
  </head>

  <body>
    <table align="center" border="1px" width="50%">
      <tr>
          <th>Doctor Name</th>
          <th>Details</th>
      </tr>

      <?php
      $con = mysqli_connect("localhost", "root", "", "patient_care") or die(mysqli_error()); //Connect to server
      $query = mysqli_query($con, "select * from doctor inner join doctor_schedule on doctor.doctor_id = doctor_schedule.doctor_id order by doctor.doctor_id asc"); // SQL Query

      while($row = mysqli_fetch_array($query)) {
        Print "<td>" . $row['fname'] . " " . $row['lname'] . "</td>";
        Print "<td>" . "Contact Num: " . $row['contact_num'] .  
            "<br>Email: " . $row['email'] .
            "<br>Specialization: " . $row['spec_detail'];
        Print "<br><br>Schedule:<br>" . $row['day'] . ": " . $row['time_from'] . " - " . $row['time_to'] . "</td>";
        Print "</tr>";
        Print "";
      }
      ?>
    </table>

    <table align="center" border="1px" width="50%">

    <form action="book_appointment.php" method="POST">
            <table>
                <tr>
                    <td>Doctor:
                    <td><select name="doctor_id">
									    <option value="6">Dexter Bentley</option>
									    <option value="7">Honey Lawson</option>
                      <option value="8">Thomas Wheatley</option>
									    <option value="9">Nala Barr</option>
                      <option value="10">Monica Driscoll</option>
									    <option value="11">Julius Schmidt</option>
                      <option value="12">Jamal Swift</option>
									    <option value="13">Tyrell Welch</option>
                      <option value="14">Elena Kouma</option>
									    <option value="15">Rico Alba  </option>
									</select>
                </tr>
                <tr>
                    <td>Appointment Date:
                    <td><input type="date" name="appointment_date" required="required" />
                </tr>
                <tr>
                    <td>Appointment Time:
                    <td><input type="time" name="appointment_time" required="required" />
                </tr>
                <tr>
                    <td>Details:
                    <td><select name="details">
									        <option value="Checkup">Checkup</option>
									       <option value="Follow-up">Follow-up</option>
									    </select>
                </tr>
                
            </table>
            <input type="submit" value="Submit"/><br/><br/>
    </form>


<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $doctor_id = ($_POST['doctor_id']);
    $appointment_date = ($_POST['appointment_date']);
    $appointment_time = ($_POST['appointment_time']);
    $details = ($_POST['details']);
    $patient_id = $_SESSION['user_id'];
    
    $date = strftime("%Y-%m-%d");
    
    $db_name = "patient_care";
    $db_username = "root";
    $db_pass = "";
    $db_host = "localhost";
    $con = mysqli_connect("$db_host","$db_username","$db_pass", "$db_name") or
    die(mysqli_error()); //Connect to server
    
  
        mysqli_query($con, "INSERT INTO appointment (appointment_date,appointment_time,details,date_posted,doctor_id,patient_id) VALUES
        ('$appointment_date','$appointment_time','$details','$date','$doctor_id','$patient_id')"); //Inserts the value to table users
        Print '<script>alert("Appointment Sent to Doctor!");</script>'; // Prompts the user
        Print '<script>window.location.assign("book_appointment.php");</script>'; // redirects to register.php
    
}
?>
    
  </body>
</html>