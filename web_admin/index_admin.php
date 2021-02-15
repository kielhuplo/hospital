<?php
    session_start();
    if (isset($_SESSION['username'])) {
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
							<li class="scroll-to-section"><a href="#ourteam">Our Team</a></li> 
                            <li class="submenu">
                                <a href="javascript:;">Functions</a>
                                <ul>
                                    <li><a href="view_appointment.php">Edit Appointments</a></li>
									<li><a href="view_session.php">Session Logs</a></li>  
									<li><a href="register_doctor.php">Add Doctor</a></li>  
                                    <li><a href="view_doctor.php">View Doctors List</a></li> 
                                    <li><a href="view_patient.php">View Patients List</a></li> 
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
                                <a href="view_appointment.php">Edit Appointments</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="main-banner header-text">
                        <div class="Modern-Slider">
                          <!-- Item -->
                          <div class="item">
                            <div class="img-fill">
                                <img src="../images/doc1.jpg" alt="">
                            </div>
                          </div>
                          <!-- Item -->
                          <div class="item">
                            <div class="img-fill">
                                <img src="https://fm.cnbc.com/applications/cnbc.com/resources/img/editorial/2015/01/12/102329974-doctor-patient.1910x1000.jpg" alt="">
                            </div>
                          </div>
                          <!-- Item -->
                          <div class="item">
                            <div class="img-fill">
                                <img src="https://th.bing.com/th/id/Re4ab6654af6cf92e450cf586451ed78c?rik=2%2f3YgvjYrXVQ0w&riu=http%3a%2f%2fwww.lumahealth.io%2fwp-content%2fuploads%2f2018%2f05%2fTransparency-in-the-Doctor-Patient-Relationship-1.jpg&ehk=gu%2bLtp6gz5Rqts9XNrRoaYlJZgcFGDhE5YHDdalycqg%3d&risl=&pid=ImgRaw" alt="">
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- About Area Starts -->
    <section class="section" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="left-text-content">
                        <div class="section-heading">
                            <h6>My Account</h6>
                            <h2>
								<?php
								echo "WELCOME, " . strtoupper($username);
								?>
							</h2>
                        </div>
                        <img src="../images/bot.png" alt="">
                        <div class="section-heading">
						<h2>Manage List</h2>
						</div>
						<div class="row">
                            <div class="col-6">
                                <a href="view_patient.php"><div class="acctbutton"> View Doctor List </div></a>
                            </div>
                            <div class="col-6">
                                <a href="view_doctor.php"><div class="acctbutton"> View Patient List </div></a>
                                </div>
                        </div>
                    </div>
                    <br>
                    <a href="register_doctor.php">
							<img src="../images/cdoc.png" alt="">
                    </a>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="right-content">
                        <div class="thumb">
						<a href="view_appointment.php">
							<img src="../images/manapp.png" alt="">
						</a>
						<a href="view_session.php">
							<img src="../images/viewsess.png" alt="">
                        </a>
						</div>
                    </div>
                </div>
        </div>
        </div>
        </div>
            </div>
        </div>
    </section>
    <!-- About  -->

    <!-- Our Team -->
    <section class="section" id="ourteam">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4 text-center">
                    <div class="section-heading">
                        <h6>Our Team</h6>
                        <h2>We offer the best service for you</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 offset-lg-2">
                    <div class="team-item">
                        <div class="thumb">
                            <div class="overlay"></div>
                            <ul class="social-icons">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                            <img src="../images/person1.png" alt="Person #1">
                        </div>
                        <div class="down-content">
                            <h4>Adrian Alfonso</h4>
                            <span>OL161</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="team-item">
                        <div class="thumb">
                            <div class="overlay"></div>
                            <ul class="social-icons">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                            <img src="../images/person2.png" alt="Person #2">
                        </div>
                        <div class="down-content">
                            <h4>Kiel Huplo</h4>
                            <span>OL161</span>
                        </div>
                    </div>
                </div>
			</div>	
			<div class="row">
                <div class="col-lg-4 offset-lg-2">
                    <div class="team-item">
                        <div class="thumb">
                            <div class="overlay"></div>
                            <ul class="social-icons">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                            <img src="../images/person3.png" alt="Person #3">
                        </div>
                        <div class="down-content">
                            <h4>Shawn Santos</h4>
                            <span>BM4</span>
                        </div>
                    </div>
                </div>
				<div class="col-lg-4">
                    <div class="team-item">
                        <div class="thumb">
                            <div class="overlay"></div>
                            <ul class="social-icons">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                            <img src="../images/person4.png" alt="Person #4">
                        </div>
                        <div class="down-content">
                            <h4>Stephany Zamora</h4>
                            <span>BM4</span>
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
  </body>
</html>