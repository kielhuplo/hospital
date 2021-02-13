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
                        <!--  Menu Start  -->
						<ul class="nav">
							<li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#about">Account</a></li>
                            <li class="scroll-to-section"><a href="#contactus">Contact Us</a></li> 
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
                                <a href="book_appointment.php">Make an Appointment</a>
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
                        <div class="section-heading">
                            <h6>My Account</h6>
                            <h2>
								<?php
								echo "WELCOME, " . strtoupper($username);
								?>
							</h2>
                        </div>
                        <p>We at PatientHelp believes that Digitalization is one of the key of Innovation. 
						<br/><br/>By making appointment digitally or available on the internet, scheduling and meeting your Doctor in an orderly fashion could help many patients during this time of pandemic. 
						<br/><br/>Contactless appointment scheduling could also be a way to help reduce transmission  of the Covid-19 Virus  and avoid a crowd of patient eaiting in line just to get an appointment. 
						<br/><br/>By the use of PatientHelp not only can patients schedule for an appointment but also they could choose the Doctor who is available at the moment along with their specialization.</p>
                        <div class="section-heading">
						<h2>Manage Account</h2>
						</div>
						<div class="row">
                            <div class="col-6">
                                <a href="view_account.php"><div class="acctbutton"> View Account </div></a>
                            </div>
                            <div class="col-6">
                                <a href="#"><div class="acctbutton"> Edit Account </div></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="right-content">
                        <div class="thumb">
						<a href="book_appointment.php">
							<img src="../images/schedapp.png" alt="">
						</a>
						<a href="book_appointment.php">
							<img src="../images/viewapp.png" alt="">
                        </a>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
	<div class="container">
	</br></br></br>
	</div>

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
                        <a href="index_admin.php"><img src="../images/white-logo.png" alt=""></a>
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