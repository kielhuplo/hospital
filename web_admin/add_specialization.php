<?php
    session_start();
    $db_server ="sql107.epizy.com";
	$db_username ="epiz_27937498";
	$db_password ="IA8QyYIzOeKC";
	$db_name ="epiz_27937498_patient_care";
	
	$con = mysqli_connect($db_server, $db_username, $db_password, $db_name);
	
	if(!$con){
		die("Connection failed:".mysqli_connect_error());
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
                            <li class="scroll-to-section"><a href="index_admin.php #top">Home</a></li>
						    <li class="scroll-to-section"><a href="#ourteam">Our Team</a></li> 
                            <li class="submenu">
                            <a href="javascript:;" class="active">Functions</a>
                            <ul>
                              <li><a href="view_appointment.php">Edit Appointments</a></li>
                              <li><a href="view_session.php">Session Logs</a></li>  
                              <li><a href="register_doctor.php">Add Doctor</a></li>  
                              <li><a href="add_specialization.php">Add Specialization</a></li> 
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
	
    <!-- About -->
    <section class="section" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="left-text-content">
                        <div class="section-heading">
                            <h6>Specialization</h6>
                            <h2>Add Specialization</h2>
                        </div>
                    <div class="contact-form">
                        <form action="" method="post">
                          <div class="row">
							<br/>
							<br/>
                            <div class="col-lg-6">
                              
							  <fieldset>
								Add Specialization:
                                    <input type="spec_detail" name="spec_detail" required="required" />
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
							$spec_detail = ($_POST['spec_detail']);
                           
							$date = strftime("%Y-%m-%d");							
						  
                            mysqli_query($con, "INSERT INTO specialization (spec_detail,creation_date) VALUES
                            ('$spec_detail','$date')"); //Inserts the value to table specialization
                            Print '<script>alert("Appointment Sent to Doctor!");</script>'; // Prompts the user
                            Print '<script>window.location.assign("add_specialization.php");</script>'; // redirects to register.php
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
	<script>
	  $(document).ready(function(){
		  $(".get_id").click(function(){
			  var ids = $(this).data('id');
			   $.ajax({
				   url:"view_schedule.php",
				   method:'POST',
				   data:{id:ids},
				   success:function(data){
					   
					   $('#load_data').html(data);
				   
				   }
				   
			   })
		  })
		  
	  })
	  </script>
    <!-- Global Init -->
    <script src="../js/custom.js"></script>
  </body>
</html>