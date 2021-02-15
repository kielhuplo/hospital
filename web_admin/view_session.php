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
                            <li class="scroll-to-section"><a href="index_admin.php">Home</a></li>
							<li class="scroll-to-section"><a href="index_admin.php #ourteam">Our Team</a></li> 
                            <li class="submenu">
                                <a href="javascript:;" class="active">Functions</a>
                                <ul>
                                    <li><a href="view_appointment.php">Edit Appointments</a></li>
									<li><a href="view_session.php">Session Logs</a></li>
									<li><a href="register_doctor.php">Add Doctor</a></li>
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

    <!-- View Session Starts -->
    <section class="section" id="menu">
        <div class="container">
            <div class="row">
			<div class="col-lg-12 text-center">
                    <div class="headBnnr">
                    <br<br><br><br><br>
                        <h6>MONITOR LOGIN & LOGOUT</h6>
						<h2><b>SESSION LOGS</b></h2>
                    </div>
            </div>
			</div>
    <div class="respoTable">

    <?php
        $con = mysqli_connect("localhost", "root", "", "patient_care") or die(mysqli_error());
        $user_id = $_SESSION['user_id'];
        $query = mysqli_query($con, "SELECT login_date_time, logout_date_time, CONCAT(fname, \" \", lname) AS doctor_name FROM `doctor_log` INNER JOIN doctor on doctor.doctor_id = doctor_log.doctor_id ORDER BY login_date_time asc");
        
        Print '<table align="center" class="fixed_header mngTable">
        <thead><tr>
            <th>DOCTOR</th>
            <th>LOGIN DATE & TIME</th>
            <th>LOGOUT DATE & TIME</th>
        </tr></thead>';

        while($row = mysqli_fetch_array($query))
        {
        Print '<tr>';
	    Print '<td style="text-align:center">' . $row['doctor_name'];
        Print '<td style="text-align:center">' . $row['login_date_time'];
        Print '<td style="text-align:center">' . $row['logout_date_time'];
        Print '</tr>';
        }
    ?>
    </table><br>

    <?php

        $con = mysqli_connect("localhost", "root", "", "patient_care") or die(mysqli_error());
        $user_id = $_SESSION['user_id'];
        $query = mysqli_query($con, "SELECT login_date_time, logout_date_time, CONCAT(fname, \" \", lname) AS patient_name FROM `patient_log` INNER JOIN patient WHERE patient.patient_id = patient_log.patient_id ORDER BY login_date_time asc");
        
        Print '<table align="center" class="fixed_header mngTable">
        <thead><tr>
            <th>PATIENT</th>
            <th>LOGIN DATE & TIME</th>
            <th>LOGOUT DATE & TIME</th>
        </tr></thead>';
        
        while($row = mysqli_fetch_array($query))
        {
        Print '<tr>';
	    Print '<td style="text-align:center">' . $row['patient_name'];
        Print '<td style="text-align:center">' . $row['login_date_time'];
        Print '<td style="text-align:center">' . $row['logout_date_time'];
        Print '</tr>';
        }
    ?>
            </table>
        </div>
    </section>
    <br></br>
    <!-- View Session Ends -->
    
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
	$('.update_app').click(function(){
		uni_modal("Edit Appintment","set_appointment.php?id="+$(this).attr('data-id'),"mid-large")
	})
	$('#new_appointment').click(function(){
		uni_modal("Add Appintment","set_appointment.php","mid-large")
	})
	$('.delete_app').click(function(){
		_conf("Are you sure to delete this appointment?","delete_app",[$(this).attr('data-id')])
	})
	function delete_app($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_appointment',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
	</script>
	<!-- Global Init -->
    <script src="../js/custom.js"></script>
  </body>
</html>