<?php
    session_start();
    if (isset($_SESSION['username'])) {
        $db_server ="localhost";
        $db_username ="root";
        $db_password ="";
        $db_name ="patient_care";
            
        $con = mysqli_connect($db_server, $db_username, $db_password, $db_name) or
        die(mysqli_error()); //Connect to server
		$username=($_SESSION['username']);
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
                        <a href="index_admin.html" class="logo">
                            <img src="../images/patienthelplogo.png" align="klassy cafe html template">
                        </a>
                        <!--  Menu  -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#about">Account</a></li>
                            <li class="scroll-to-section"><a href="#contactus">Contact Us</a></li> 
                            <li class="submenu">
                                <a href="javascript:;">Appointment</a>
                                <ul>
                                    <li><a href="view_appointment.php">Manage Appointments</a></li>
                                </ul>
                            </li> 
                            <li><a href="add_schedule.php">Add Schedule</a></li>
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
	
    <!-- Main -->
    <div id="top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="left-content">
                        <div class="inner-content">
						<img src="../images/white-logo.png" alt="">
                            <h6>Scheduling Website for Healthcare Facilities</h6>
                            <div class="main-white-button scroll-to-section">
                                <a href="view_appointment.php">Manage Appointments</a>
                            </div>
                        </div>
                    </div>
                </div>
				<div class="col-lg-8">
                    <div class="main-banner header-text">
                        <div class="Modern-Slider">
                          <!-- First Pic -->
                          <div class="item">
                            <div class="img-fill">
                                <img src="../images/1.png" alt="">
                            </div>
                          </div>
                          <!-- Second Pic -->
                          <div class="item">
                            <div class="img-fill">
                                <img src="../images/2.png" alt="">
                            </div>
                          </div>
                          <!-- Third Pic -->
                          <div class="item">
                            <div class="img-fill">
                                <img src="../images/3.png" alt="">
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- About -->
    <section class="section" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="left-text-content">
					<img src="../images/top.png"><br><br>
                        <div class="section-heading">
							<h6>My Account</h6>
                            <h2>
								<?php
								$user_id = $_SESSION['user_id'];
								$query = mysqli_query($con, "SELECT contact_num, email, lname, spec_detail, CONCAT(fname, \" \", lname) AS doctor_name, CONCAT(address_line1, \" \", address_line2, \" \", address_city, \" \", address_state) AS 'address' FROM `doctor` WHERE doctor_id = $user_id");
								while($row = mysqli_fetch_array($query))
								{
								Print 'WELCOME, DR. ' . strtoupper($row['lname']);
								?>
							</h2>
                        </div>
                        <p>
						<table class="regDetails">
						<th colspan="2"><h5><b>REGISTERED DETAILS</b></h5></th>
							<?php
								Print '<tr>';
								Print '<td>Name: </td><td>' . strtoupper($row['doctor_name']) . '</td></tr><tr>';
								Print '<td>Specialization: </td><td>' . strtoupper($row['spec_detail']) . '</td></tr><tr>';
								Print '<td>Contact Number: </td><td>' . $row['contact_num'] . '</td></tr><tr>';
								Print '<td>Email: </td><td>' . $row['email'] . '</td><tr>';
								Print '<td>Address: </td><td>' . strtoupper($row['address']) . '</td></tr>';
								}
								
								$query_sched = mysqli_query($con, "SELECT day, time_from, time_to FROM doctor_schedule WHERE doctor_id = $user_id");
                                Print "<td>Schedule: </td><td>";
								while($row_sched = mysqli_fetch_array($query_sched)) {
									Print strtoupper($row_sched['day']) . " <i>" . $row_sched['time_from'] . " - " . $row_sched['time_to'] . "</i><br/>";
								}
                                Print "</td></tr>";
							?>
							</table>
						</p>
                        <img src="../images/bot.png" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="right-content">
                        <div class="thumb">
							<div class="section-heading">
							<h6>MY APPOINTMENTS</h6>
							<h2>Status of Request</h2>
							</div>
								<?php
									$user_id = $_SESSION['user_id'];
									$query = mysqli_query($con, "SELECT appointment_date, appointment_time, CONCAT(fname, \" \", lname) AS patient_assigned, approval as status FROM `appointment` INNER JOIN patient on patient.patient_id = appointment.patient_id WHERE doctor_id = '".$user_id."' ORDER BY appointment_date asc");
									
									Print '<table class="fixed_header listTable" id="myTable">
											<thead>
											<tr>
												<th>PATIENT</th>
												<th>DATE</th>
												<th>TIME</th>
												<th>STATUS</th>
											</tr></thead>';

									while($row = mysqli_fetch_array($query))
									{
									Print '<tr>';
									Print '<td>' . strtoupper($row['patient_assigned']);
									Print '</td><td>' . $row['appointment_date'];
									Print '</td><td>' . $row['appointment_time'];
									Print '</td><td>' . $row['status'];
									Print '</tr>';
									}
									Print '</table>';
								?>
						</div>
						<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for patient" title="Type in a name">
                    </div>
                </div>
            </div>
        </div>
    </section>
	<div class="container">
	<br><br><br></div>

    <!-- Contact Us -->
    <section class="section" id="contactus">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <div class="left-text-content">
                        <div class="section-heading">
                            <h6>Contact Us</h6>
                            <h2>How Can We Help?</h2>
                        </div>
                        <p>For all inquiries, please contact and email us:</p>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="phone">
                                    <i class="fa fa-phone"></i>
                                    <h4>Phone Number</h4>
                                    <span><a href="#">080-090-0990</a><br></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="message">
                                    <i class="fa fa-envelope"></i>
                                    <h4>Email</h4>
                                    <span><a href="#">patienthelp@company.com</a><br></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-form">
                        <form id="contact" action="" method="post">
                          <div class="row">
                            <div class="col-lg-12">
                                <h4>Contact Form</h4>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                              <fieldset>
                                <input name="name" type="text" id="name" placeholder="Your Name*" required="">
                              </fieldset>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                              <fieldset>
                              <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email Address" required="">
                            </fieldset>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                              <fieldset>
                                <input name="phone" type="text" id="phone" placeholder="Phone Number*" required="">
                              </fieldset>
                            </div>
                            <div class="col-lg-6">
                                <div id="filterDate2">    
                                  <div class="input-group date" data-date-format="dd/mm/yyyy">
                                    <input  name="date" id="date" type="text" class="form-control" placeholder="dd/mm/yyyy">
                                    <div class="input-group-addon" >
                                      <span class="glyphicon glyphicon-th"></span>
                                    </div>
                                  </div>
                                </div>   
                            </div>
                            <div class="col-lg-12">
                              <fieldset>
                                <textarea name="message" rows="6" id="message" placeholder="Message" required=""></textarea>
                              </fieldset>
                            </div>
                            <div class="col-lg-12">
                              <fieldset>
                                <button type="submit" id="form-submit" class="main-button-icon">Send Message</button>
                              </fieldset>
                            </div>
                          </div>
                        </form>
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
                        <a href="index_admin.html"><img src="../images/white-logo.png" alt=""></a>
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
    <script>
        $(function() {
            var selectedClass = "";
            $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
              $("."+selectedClass).fadeIn();
              $("#portfolio").fadeTo(50, 1);
            }, 500);
                
            });
        });
    </script>
	<script>
	function myFunction() {
	  var input, filter, table, tr, td, i, txtValue;
	  input = document.getElementById("myInput");
	  filter = input.value.toUpperCase();
	  table = document.getElementById("myTable");
	  tr = table.getElementsByTagName("tr");
	  for (i = 0; i < tr.length; i++) {
		td = tr[i].getElementsByTagName("td")[0];
		if (td) {
		  txtValue = td.textContent || td.innerText;
		  if (txtValue.toUpperCase().indexOf(filter) > -1) {
			tr[i].style.display = "";
		  } else {
			tr[i].style.display = "none";
		  }
		}       
	  }
	}
	</script>
  </body>
</html>