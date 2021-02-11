<?php
    session_start();
    if (isset($_SESSION['username'])) {
        $con = mysqli_connect("localhost", "root", "", "patient_care") or die(mysqli_error());
    }
    else {
        header("location: ../index.html");
    }
?>
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
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.css">
    <link rel="stylesheet" href="../css/templatemo-klassy-cafe.css">
    <link rel="stylesheet" href="../css/owl-carousel.css">
    <link rel="stylesheet" href="../css/lightbox.css">
    <link rel="shortcut icon" type="image/png" href="../images/transparenticon.png">
    <style>
	table {
	  margin: auto;
	  width: 70%;
	  background-color: white;
	}
	
	th {
	  text-align: center;
	}
	
	td {
	  padding: 20px;
	}
	</style>
	</head>
    <body>
<<<<<<< HEAD:web_admin/view_appointment.php
    

    <table align="center" border="1px">
=======
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index_patient.php" class="logo">
                            <img src="../images/patienthelplogo.png" align="klassy cafe html template">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="index_patient.php">Home</a></li>
							<li class="scroll-to-section"><a href="#ourteam">Our Doctors</a></li> 
                            <li class="submenu">
                                <a href="javascript:;">Appointment</a>
                                <ul>
                                    <li><a href="book_appointment.php">Book Appointment</a></li>
                                    <li><a href="view_appointment.php">View Appointment</a></li>
                                </ul>
                            </li>
							<li><a href="../logout.php">Logout</a></li> 
                        </ul>        
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** My Schedule Starts ***** -->
    <section class="section" id="menu">
        <div class="container">
            <div class="row">
			<div class="col-lg-4 offset-lg-4 text-center">
                    <div class="section-heading">
                        <h6>MY SCHEDULED APPOINTMENTS</h6>
						<h2>Detailed List</h2>
                    </div>
            </div>
			</div>
    <table align="center" border="1px" width="50%">
>>>>>>> a351451b1085f04b2a13f253934d72485caecddd:web_patient/view_appointment.php
        <tr>
            <th>PATIENT</th>
            <th>DOCTOR</th>
            <th>APPOINTMENT DATE</th>
            <th>APPOINTMENT TIME</th>
            <th>DETAILS</th>
            <th>STATUS</th>
            <th>UPDATE</th>
            <th>Delete</th>
        </tr>
<<<<<<< HEAD:web_admin/view_appointment.php

    


    <?php

        $con = mysqli_connect("localhost", "root", "", "patient_care") or die(mysqli_error());
        $query = mysqli_query($con, "Select doctor.fname as doctor_fname, doctor.lname as doctor_lname, patient.fname, patient.lname, appointment.appointment_date, appointment.appointment_time, appointment.details, appointment.approval FROM patient inner join appointment inner join doctor where patient.patient_id = appointment.patient_id && appointment.doctor_id = doctor.doctor_id ORDER BY appointment_date asc");
=======
    <?php
        $user_id = $_SESSION['user_id'];
        $query = mysqli_query($con, "SELECT appointment_date, appointment_time, date_posted, CONCAT(fname, \" \", lname) AS doctor_assigned, approval as status FROM `appointment` INNER JOIN doctor on doctor.doctor_id = appointment.doctor_id WHERE patient_id = '".$user_id."' ORDER BY appointment_date asc");
>>>>>>> a351451b1085f04b2a13f253934d72485caecddd:web_patient/view_appointment.php
        
       $sql = "SELECT id, fname, lname FROM doctor";

        while($row = mysqli_fetch_array($query))
        {
        Print '<tr>';
	    Print '<td>' . $row['fname'] . " " . $row['lname'];
        Print '<td>' . $row['doctor_fname'] . " " . $row['doctor_lname'];
        Print '<td>' . $row['appointment_date'];
        Print '<td>' . $row['appointment_time'];
        Print '<td>' . $row['details'];
        Print '<td>' . $row['approval'];
        Print '<td><a href="edit.php">UPDATE</a> </td>';
        Print '<td><a href="delete.php">DELETE</a> </td>';
        Print '</tr>';
        }
    ?>
    </table>
        </div>
    </section>
    <!-- ***** My Schedule Ends ***** -->

    <!-- ***** Our Team Area Starts ***** -->
    <section class="section" id="ourteam">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4 text-center">
                    <div class="section-heading">
                        <h6>Our Doctors</h6>
						<h2>Need Details?</h2>
                    </div>
                </div>
                <table border="1px" width="50%">
                    <tr>
                        <th>Doctor Name</th>
                        <th>Specialization</th>
                        <th>Details</th>
                    </tr>
                
                    <?php
                        $query = mysqli_query($con, "select * from doctor inner join doctor_schedule on doctor.doctor_id = doctor_schedule.doctor_id order by doctor.doctor_id asc"); // SQL Query
                    
                        while($row = mysqli_fetch_array($query)) {

                            $doctor_id_sched = $row['doctor_id']; //get current doctor_id to view their schedule

                            Print "<tr>";
                            Print "<td>" . $row['fname'] . " " . $row['lname'] . "</td>";
                            Print "<td>" . $row['spec_detail']. "<br>";

                            $query_sched = mysqli_query($con, "SELECT day, time_from, time_to FROM doctor_schedule WHERE doctor_id = '".$doctor_id_sched."'"); //get schedule of doctor based on $doctor_id_sched
                            while($row_sched = mysqli_fetch_array($query_sched)) {  //while loop to output schedule table
                                Print "<i>" . $row_sched['day'] . ": " . $row_sched['time_from'] . " - " . $row_sched['time_to'] . "</i><br/>";
                            }

                            Print "</td><td>" . "Contact Num: " . $row['contact_num'] .  "<br>Email: " . $row['email'] . "</td>";
                            Print "</tr>";
                            Print "";
                        }
                    ?>
				</table>
			</div>
        </div>
    </section>
    <!-- ***** Our Team Area Ends ***** -->
	
	<!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-xs-12">
                    <div class="right-text-content">
                            <ul class="social-icons">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="logo">
                        <a href="index_patient.php"><img src="../images/white-logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-4 col-xs-12">
                    <div class="left-text-content">
                        <p>© Copyright Klassy Cafe Co.
                        
                        <br>Design: TemplateMo</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="../js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="../js/owl-carousel.js"></script>
    <script src="../js/accordions.js"></script>
    <script src="../js/datepicker.js"></script>
    <script src="../js/scrollreveal.min.js"></script>
    <script src="../js/waypoints.min.js"></script>
    <script src="../js/jquery.counterup.min.js"></script>
    <script src="../js/imgfix.min.js"></script> 
    <script src="../js/slick.js"></script> 
    <script src="../js/lightbox.js"></script> 
    <script src="../js/isotope.js"></script> 
    
<<<<<<< HEAD:web_admin/view_appointment.php


</body>
=======
	<!-- Global Init -->
    <script src="../js/custom.js"></script>
  </body>
>>>>>>> a351451b1085f04b2a13f253934d72485caecddd:web_patient/view_appointment.php
</html>