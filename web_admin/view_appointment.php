<?php
    session_start();
    if (isset($_SESSION['username'])) {
        $db_server ="localhost";
        $db_username ="root";
        $db_password ="";
        $db_name ="patient_care";
            
        $con = mysqli_connect($db_server, $db_username, $db_password, $db_name) or
        die(mysqli_error()); //Connect to server
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
                        <a href="index_admin.php" class="logo">
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

    <!-- View Appointment -->
    <section class="section" id="menu">
        <div class="container">
            <div class="row">
			<div class="col-lg-12 text-center">
                    <div class="headBnnr">
                    <br<br><br><br><br>
                        <h6>SCHEDULED APPOINTMENTS</h6>
						<h2><b>EDIT APPOINTMENTS</b></h2>
                    </div>
                </div>
		    </div>
        <div class="respoTable">
    <?php
        $user_id = $_SESSION['user_id'];
        $query = mysqli_query($con, "Select doctor.fname as doctor_fname, doctor.lname as doctor_lname, patient.fname, patient.lname, appointment.appointment_date, appointment.appointment_time, appointment.details, appointment.appointment_no, appointment.approval FROM patient inner join appointment inner join doctor where patient.patient_id = appointment.patient_id && appointment.doctor_id = doctor.doctor_id ORDER BY appointment_date asc");

        Print '<table align="center" class="fixed_header mngTable">
        <thead><tr>
            <th>PATIENT</th>
            <th>DOCTOR</th>
            <th>APPOINTMENT DATE</th>
            <th>APPOINTMENT TIME</th>
            <th>DETAILS</th>
            <th>STATUS</th>
            <th>UPDATE</th>
            <th>Delete</th>
        </tr></thead>';

        while($row = mysqli_fetch_array($query))
        {
        Print '<tr>';
	    Print '<td>' . $row['fname'] . " " . $row['lname'];
        Print '<td>' . $row['doctor_fname'] . " " . $row['doctor_lname'];
        Print '<td>' . $row['appointment_date'];
        Print '<td>' . $row['appointment_time'];
        Print '<td>' . $row['details'];
        Print '<td>' . $row['approval'];
        Print "<td><a class='btn-primary' href='../approval.php?id= ".$row['appointment_no']. "'>APPROVE </a><a> OR </a><a class='btn-danger' href='../cancel.php?id= ".$row['appointment_no']. "'> DECLINE</a>";
        Print "<td><a class='btn-danger' href='./delete.php?id= ".$row['appointment_no']. "'>DELETE</a>";
        Print '</tr>';
        }
    ?>
                </table>
            </div>
        </div>
    </section>
    <!-- View Appointment -->

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