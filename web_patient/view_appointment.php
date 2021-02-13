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
	<link rel="stylesheet" href="../css/tempcss.css">
	</head>
    <body>
    <!-- Header -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!--  Logo Start  -->
                        <a href="index_patient.php" class="logo">
                            <img src="../images/patienthelplogo.png" align="klassy cafe html template">
                        </a>
                        <!--  Menu Start  -->
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
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <!--  My Schedule -->
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
    <table align="center" width="50%" class="viewTable">
        <tr>
            <th>APPOINTMENT DATE</th>
            <th>APPOINTMENT TIME</th>
            <th>DATE POSTED</th>
            <th>DOCTOR ASSIGNED</th>
            <th>STATUS</th>
        </tr>
		<?php
			$user_id = $_SESSION['user_id'];
			$query = mysqli_query($con, "SELECT appointment_date, appointment_time, date_posted, CONCAT(fname, \" \", lname) AS doctor_assigned, approval as status FROM `appointment` INNER JOIN doctor on doctor.doctor_id = appointment.doctor_id WHERE patient_id = '".$user_id."' ORDER BY appointment_date asc");
			

			while($row = mysqli_fetch_array($query))
			{
			Print '<tr>';
			Print '<td>' . $row['appointment_date'];
			Print '<td>' . $row['appointment_time'];
			Print '<td>' . $row['date_posted'];
			Print '<td>' . $row['doctor_assigned'];
			Print '<td>' . $row['status'];
			Print '</tr>';
			}
		?>
    </table>
        </div>
    </section>

    <!-- Our Doctors -->
    <section class="section" id="ourteam">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4 text-center">
                    <div class="section-heading">
                        <h6>Our Doctors</h6>
						<h2>Need Details?</h2>
                    </div>
                </div>
                <table border="1px" width="50%" class="viewTable">
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
	
	<!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-xs-12">
                    <div class="right-text-content">
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
	<!-- Global Init -->
    <script src="../js/custom.js"></script>
  </body>
</html>