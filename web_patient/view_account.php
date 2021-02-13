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
                            <li class="scroll-to-section"><a href="index_patient.php">Home</a></li>
							<li class="scroll-to-section"><a href="#menu" class="active">My Profile</a></li> 
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

    <!-- My Profile -->
    <section class="section" id="menu">
        <div class="container">
			<div class="col-lg-4 offset-lg-1">
                    <div class="section-heading">
                        <h6>My Profile</h6>
						<h2>Account Details</h2>
                    </div>
            </div>
			<table>
			<?php
				$user_id = $_SESSION['user_id'];
				$query = mysqli_query($con, "SELECT birth_date, contact_num, email, CONCAT(fname, \" \", lname) AS patient_name, CONCAT(address_line1, \" \", address_line2, \" \", address_city, \" \", address_state) AS 'address', marital_status, weight, height, emergency_name, emergency_relation, emergency_num FROM `patient`  WHERE patient_id = $user_id");
				

				while($row = mysqli_fetch_array($query))
				{
				Print '<tr>';
				Print '<td>Name: </td><td>' . strtoupper($row['patient_name']) . '</td></tr><tr>';
				Print '<td>Birthday: </td><td>' . $row['birth_date'] . '</td></tr><tr>';
				Print '<td>Contact Number: </td><td>' . $row['contact_num'] . '</td></tr><tr>';
				Print '<td>Email: </td><td>' . $row['email'] . '</td><tr>';
				Print '<td>Address: </td><td>' . strtoupper($row['address']) . '</td></tr><tr>';
				Print '<td>Marital Status: </td><td>' . strtoupper($row['marital_status']) . '</td></tr><tr>';
				Print '<td>Weight (kg): </td><td>' . $row['weight'] . '</td></tr><tr>';
				Print '<td>Height (cm): </td><td>' . $row['height'] . '</td></tr><tr>';
				Print '<td colspan="2"><b>In case of emergency </b></td></tr><tr><td>Contact Person: </td><td>' . strtoupper($row['emergency_name']) . '</td></tr><tr>';
				Print '<td>Relationship: </td><td>' . strtoupper($row['emergency_relation']) . '</td></tr><tr>';
				Print '<td>Contact Number: </td><td>' . $row['emergency_num'] . '</td></tr>';
				}
			?>
			</table>
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