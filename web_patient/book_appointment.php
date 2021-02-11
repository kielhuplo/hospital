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
	
    <!-- ***** About Area Starts ***** -->
    <section class="section" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="left-text-content">
                        <div class="section-heading">
                            <h6>Book Appointment</h6>
                            <h2>Schedule Appointment</h2>
                        </div>
                    <div class="contact-form">
                        <form action="" method="post">
                          <div class="row">
							<br/>
							<br/>
                            <div class="col-lg-6">
                              <fieldset>
									<br/>Doctor:
									<select name="doctor_id">
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
                              </fieldset>
							  <fieldset>
									Appointment Date:
										<input type="date" name="appointment_date" required="required" />
									Appointment Time:
										<input type="time" name="appointment_time" required="required" />
									Details:
										<select name="details">
											<option value="Checkup">Checkup</option>
											<option value="Follow-up">Follow-up</option>
										</select>
                              <fieldset>
								<br/>
                                <button type="submit" id="form-submit" class="main-button-icon">Submit</button><br/><br/>
                              </fieldset>
                            </div>
                          </div>
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
                    </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="right-content">
                        <div class="thumb">
							<img src="https://i.redd.it/2at5kzjpmlz51.jpg">
						</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** About Area Ends ***** -->

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
					  $con = mysqli_connect("localhost", "root", "", "patient_care") or die(mysqli_error()); //Connect to server
					  $query = mysqli_query($con, "select * from doctor inner join doctor_schedule on doctor.doctor_id = doctor_schedule.doctor_id"); // SQL Query
            $doctor_id_sched = '';
					  
					  while($row = mysqli_fetch_array($query)) {

              $doctor_id_sched = $row['doctor_id']; //get current doctor_id to view their schedule

						  Print "<tr>";
						  Print "<td>" . $row['fname'] . " " . $row['lname'] . "</td>";
						  Print "<td>" . $row['spec_detail']. "<br>";

              $query_sched = mysqli_query($con, "SELECT day, time_from, time_to FROM doctor_schedule WHERE doctor_id = '".$doctor_id_sched."'"); //get schedule of doctor based on $doctor_id_sched
              while($row_sched = mysqli_fetch_array($query_sched)) {  //while loop to output schedule table
                Print "<i>" . $row_sched['day'] . ": " . $row_sched['time_from'] . " - " . $row_sched['time_to'] . "</i><br/>";
              }

						  Print "</td><td>" . "Contact Num: " . $row['contact_num'] .  
								"<br>Email: " . $row['email'] . "</td>";
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
    
    <!-- Global Init -->
    <script src="../js/custom.js"></script>
  </body>
</html>