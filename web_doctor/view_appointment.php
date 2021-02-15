<?php
    session_start();
    if (isset($_SESSION['username'])) {
        $con = mysqli_connect("sql107.epizy.com", "epiz_27937498", "IA8QyYIzOeKC", "epiz_27937498_patient_care") or die(mysqli_error());
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
                        <a href="index_doctor.php" class="logo">
                            <img src="../images/patienthelplogo.png" align="klassy cafe html template">
                        </a>
                        <!--  Menu  -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="index_doctor.php #top">Home</a></li>
                            <li class="scroll-to-section"><a href="index_doctor.php #about">Account</a></li>
                            <li class="scroll-to-section"><a href="index_doctor.php #contactus">Contact Us</a></li> 
                            <li class="submenu">
                                <a href="javascript:;" class="active">Appointment</a>
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

    <!--  My Schedule -->
    <section class="section" id="menu">
        <div class="container">
            <div class="row">
				<div class="col-lg-12 text-center">
                    <div class="headBnnr">
						<br><br><br>
                        <h6>MY SCHEDULED APPOINTMENTS</h6>
						<h2><b>MANAGE APPOINTMENTS</b></h2>
                    </div>
				</div>
			</div>
		<div class="respoTable">
    <?php
        $user_id = $_SESSION['user_id'];
        $query = mysqli_query($con, "SELECT appointment_no,appointment_date, appointment_time, date_posted, CONCAT(fname, \" \", lname) AS patient_assigned, approval as status FROM `appointment` INNER JOIN patient on patient.patient_id = appointment.patient_id WHERE doctor_id = '".$user_id."' ORDER BY appointment_date asc");
        
		Print '<table align="center" class="fixed_header mngTable">
			<thead><tr>
				<th>PATIENT</th>
				<th>APPOINTMENT DATE</th>
				<th>APPOINTMENT TIME</th>
				<th>DATE POSTED</th>
				<th>STATUS</th>
				<th>UPDATE</th>
			</tr></thead>';
					
        while($row = mysqli_fetch_array($query))
        {
            Print '<tr>';
            Print '<td>' . strtoupper($row['patient_assigned']);
            Print '<td>' . $row['appointment_date'];
            Print '<td>' . $row['appointment_time'];
            Print '<td>' . $row['date_posted'];
            Print '<td>' . $row['status']; 
            Print "<td><a class='btn-primary' href='../approval.php?id= ".$row['appointment_no']. "'>APPROVE</a><a> OR </a><a class='btn-danger' href='../cancel.php?id= ".$row['appointment_no']. "'> DECLINE</a>";
            Print '</tr>';
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