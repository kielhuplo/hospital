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
                            <li class="scroll-to-section"><a href="index_patient.php #top">Home</a></li>
							<li class="submenu">
                                <a href="javascript:;">My Account</a>
                                <ul>
									<li class="scroll-to-section"><a href="index_patient.php #about">Account</a></li>
                                    <li class="scroll-to-section"><a href="view_account.php #menu">View Profile</a></li>
									<li class="scroll-to-section"><a href="#">Edit Profile</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:;">Appointment</a>
                                <ul>
                                    <li><a href="book_appointment.php">Book Appointment</a></li>
                                    <li><a href="#menu.php">View Appointment</a></li>
									<li><a href="#ourteam">Our Doctors</a></li>
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
        <div class="container respoTable">
            <div class="row">
			<div class="col-lg-4 offset-lg-4 text-center">
                    <div class="section-heading">
                        <h6>MY SCHEDULED APPOINTMENTS</h6>
						<h2>Status of Request</h2>
                    </div>
            </div>
			</div>
    <table class="fixedHeader viewTable">
		<thead>
        <tr>
            <th>DATE</th>
            <th>TIME</th>
            <th>DATE POSTED</th>
            <th>DOCTOR ASSIGNED</th>
            <th>STATUS</th>
        </tr>
		</thead>
		<tbody>
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
		</tbody>
    </table>
        </div>
    </section>

    <!-- Our Doctors -->
    <section class="section" id="ourteam">
        <div class="container respoTable">
            <div class="row">
                <div class="col-lg-4 offset-lg-4 text-center">
                    <div class="section-heading">
                        <h6>Our Doctors</h6>
						<h2>Need Details?</h2>
                    </div>
                </div>
				<div style="width:80%; margin:auto;">
				 <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for doctor name or specialization" title="Type in a specialization">
				</div>
				<table class="fixedHeader viewTable" id="myTable">
					<thead>
                    <tr>
                        <th>Doctor Name</th>
                        <th>Schedule</th>
                        <th>Details</th>
                    </tr>
					</thead>
					<tbody>
					<?php
                        $query = mysqli_query($con, "select * from doctor order by doctor_id asc"); // SQL Query

                        while($row = mysqli_fetch_array($query)) {
                    ?>
                            <tr>
                                <td><?php echo "Dr. " . $row['fname'] . " " . $row['lname'] . "<br>" . $row['spec_detail'] ?></td>
                                <td><a href='javascript:void(0)' class="btn btn-success get_id" data-id='<?php echo $row["doctor_id"] ?>' data-toggle="modal" data-target="#myModal">View Schedule</a></td>
                                <td><?php echo "Contact Num: " . $row['contact_num'] . "<br>Email: " . $row['email'] ?> </td>
                            </tr>
                    <?php
                        }
                    ?>
					</tbody>
				</table>
			</div>
        </div>
		<div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
               
                    <div class="modal-body" id="load_data">
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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