<?php
    session_start();
    if (isset($_SESSION['username'])) {
        $db_name = "patient_care";
        $db_username = "root";
        $db_pass = "";
        $db_host = "localhost";
        $con = mysqli_connect("$db_host","$db_username","$db_pass", "$db_name") or
        die(mysqli_error()); //Connect to server
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
                        <!--  Logo  -->
                        <a href="index_patient.php" class="logo">
                            <img src="../images/patienthelplogo.png" align="klassy cafe html template">
                        </a>
                        <!--  Menu  -->   
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="index_doctor.php #top" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="index_doctor.php #about">Account</a></li>
                            <li class="scroll-to-section"><a href="index_doctor.php #contactus">Contact Us</a></li> 
                            <li class="submenu">
                                <a href="javascript:;">Appointment</a>
                                <ul>
                                    <li><a href="view_appointment.php">Manage Appointments</a></li>
                                </ul>
                            </li> 
                            <li><a href="add_schedule.php" class="active">Add Schedule</a></li>
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
	
    <!-- About -->
    <section class="section" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="left-text-content">
                        <div class="section-heading">
                            <h6>Schedule</h6>
                            <h2>Add Schedule</h2>
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
                                        <?php
                                            $doctor_query = mysqli_query($con, "SELECT doctor_id, CONCAT(fname, \" \", lname) AS doctor_assigned FROM doctor ORDER BY doctor_id ASC"); // SQL Query
                                            while($doctor_row = mysqli_fetch_array($doctor_query)){
                                                Print "<option value=\"" . $doctor_row['doctor_id'] . "\">" . $doctor_row['doctor_assigned'] . "</option>";  // output doctors on dropdown
                                            }
                                        ?>
									</select>
                              </fieldset>
							  <fieldset>
                                    Day:
                                        <select name="day">
                                            <?php
                                                Print "<option value=\"\" selected disabled hidden>Select Day</option>";
                                                $day_query = mysqli_query($con, "SELECT DISTINCT day FROM doctor_schedule"); // SQL Query
                                                while($day_row = mysqli_fetch_array($day_query)){
                                                    Print "<option value=\"" . $day_row['day'] . "\">" . $day_row['day'] . "</option>";  // output doctors on dropdown
                                                }
                                            ?>
                                        </select>
									Time From:
										<input type="time" name="time_from" required="required" />
									Time To:
                                        <input type="time" name="time_to" required="required" />
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
							$day = ($_POST['day']);
							$time_from = ($_POST['time_from']);
							$time_to = ($_POST['time_to']);                    						
						  
                            mysqli_query($con, "INSERT INTO doctor_schedule (day,time_from,time_to,doctor_id) VALUES
                            ('$day','$time_from','$time_to','$doctor_id')"); //Inserts the value to table users
                            Print '<script>alert("Schedule Created!");</script>'; // Prompts the user
                            Print '<script>window.location.assign("add_schedule.php");</script>'; // redirects to register.php
						}
						?>
                    </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="right-content">
                        <div class="thumb">
							<img src="../images/bsidepic.png">
						</div>
                    </div>
                </div>
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