<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Patient Help: Registration Page</title>
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/templatemo-klassy-cafe.css">
    <link rel="stylesheet" href="css/owl-carousel.css">
    <link rel="stylesheet" href="css/lightbox.css">
    <link rel="shortcut icon" type="image/png" href="images/transparenticon.png">
    </head>
	<style>
	/* Mark input boxes that gets an error on validation: */
	input.invalid {
	  background-color: #ffdddd;
	}

	/* Hide all steps by default: */
	.tab {
	  display: none;
	}

	button:hover {
	  opacity: 0.8;
	}

	#prevBtn {
	  background-color: #bbbbbb;
	}

	/* Make circles that indicate the steps of the form: */
	.step {
	  height: 15px;
	  width: 15px;
	  margin: 0 2px;
	  background-color: #bbbbbb;
	  border: none;  
	  border-radius: 50%;
	  display: inline-block;
	  opacity: 0.5;
	}

	.step.active {
	  opacity: 1;
	}

	/* Mark the steps that are finished and valid: */
	.step.finish {
	  background-color: #4dc0d7;
	}
	</style>
    <body>
    <!-- Header -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!--  Logo  -->
                        <a href="index.html" class="logo">
                            <img src="images/patienthelplogo.png" align="klassy cafe html template">
                        </a>
                        <!--  Menu  -->
           				<ul class="nav">
                            <li class="scroll-to-section"><a href="index.html #top">Home</a></li>
                            <li class="scroll-to-section"><a href="index.html #about">About Us</a></li>
							<li class="scroll-to-section"><a href="index.html #ourteam">Our Team</a></li> 
                            <li class="scroll-to-section"><a href="index.html #contactus">Contact Us</a></li>
							<li class="scroll-to-section"><a href="login.php #top">Login</a></li> 
							<li class="scroll-to-section"><a href="#top" class="active">Register</a></li> 
                        </ul>    
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!--  Main -->
    <div id="top">
    <section class="section" id="contactus">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <div class="left-text-content">
                        <div class="section-heading">
                            <h6>Registration</h6>
                            <h2>Welcome to PatientHelp.</h2>
                        </div>
                        <p>Kindly fill out the form to create an account.</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-form">
                        <form id="contact" action="register.php" method="POST">
                          <div class="row">
                            <div class="col-lg-12">
                                <h4>Registration Form</h4>
                            </div>
                            <div class="col-lg-12">
							  <!-- Steps -->
							  <div class="tab">
								Enter Username:
									<input type="text" name="username" required="required">
								Enter Password:
									<input type="password" name="password" required="required">
								First Name:
									<input type="text" name="fname" required="required">
								Last Name:
									<input type="text" name="lname" required="required">
							  </div>
							  <div class="tab">
								Birthday:
									<input type="date" id="birth_date" name="birth_date">
								Sex:
									<select name="sex">
									<option value="m">Male</option>
									<option value="f">Female</option>
									</select>
								Contact Number:
									<input type="text" name="contact_num" required="required">
								Email:
									<input type="text" name="email" required="required">
							  </div>
							  <div class="tab">
								Street:
									<input type="text" name="address_line1" required="required">
								Barangay:
									<input type="text" name="address_line2" required="required">
								City:
								    <input type="text" name="address_city" required="required">
								State:
									<input type="text" name="address_state" required="required">
							  </div>
							  <div class="tab">
								Enter Zip Code:
									<input type="text" name="zip_code" required="required">
								Enter Marital Status:
									<select name="marital_status">
									<option value="single">Single</option>
									<option value="married">Married</option>
									<option value="widowed">Widowed</option>
									<option value="divorced">Divorced</option>
									<option value="separated">Separated</option>
									</select>
								Enter Weight:
									<input type="text" name="weight" required="required">
								Enter Height:
									<input type="text" name="height" required="required">
							  </div>
							  <div class="tab">
								Currently Taking Meds?:
									<select name="taking_meds">
									<option value="1">Yes</option>
									<option value="0">No</option>
									</select>
							    In case of emergency, contact:
									<input type="text" name="emergency_name" required="required">
								Relationship:
									<input type="text" name="emergency_relation" required="required">
								Contact Number:
									<input type="text" name="emergency_num" required="required">
							  </div>
							  <div style="overflow:auto;">
								<fieldset>
							  	<div style="float:left;">
								  <button type="button" id="prevBtn" onclick="nextPrev(-1)">Prev</button><br/>
								</div>
								<div style="float:right;">
								  <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
								</div>
								</fieldset>
							  </div>
							  <!-- Circle Indicator -->
							  <div style="text-align:center;margin-top:40px;">
								<span class="step"></span>
								<span class="step"></span>
								<span class="step"></span>
								<span class="step"></span>
								<span class="step"></span>
							  </div>
							  <div class="col-lg-12">
                              <fieldset>
								<br/>
								<a href="login.php"  style="color:#4dc0d7">Already have an Account? Login Here!</a>
                              </fieldset>
                            </div>
                            </div>
                          </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-xs-12">
                    <div class="right-text-content">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="logo">
                        <a href="index.html"><img src="images/white-logo.png" alt=""></a>
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
    <script src="js/jquery-2.1.0.min.js"></script>
    <!-- Bootstrap -->
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugins -->
    <script src="js/owl-carousel.js"></script>
    <script src="js/accordions.js"></script>
    <script src="js/datepicker.js"></script>
    <script src="js/scrollreveal.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/imgfix.min.js"></script> 
    <script src="js/slick.js"></script> 
    <script src="js/lightbox.js"></script> 
    <script src="js/isotope.js"></script> 
    <!-- Global Init -->
    <script src="js/custom.js"></script>
	<script>
	var currentTab = 0; // Current tab is set to be the first tab (0)
	showTab(currentTab); // Display the current tab

	function showTab(n) {
	  // This function will display the specified tab of the form...
	  var x = document.getElementsByClassName("tab");
	  x[n].style.display = "block";
	  //... and fix the Previous/Next buttons:
	  if (n == 0) {
		document.getElementById("prevBtn").style.display = "none";
	  } else {
		document.getElementById("prevBtn").style.display = "inline";
	  }
	  if (n == (x.length - 1)) {
		document.getElementById("nextBtn").innerHTML = "Register";
	  } else {
		document.getElementById("nextBtn").innerHTML = "Next";
	  }
	  //... and run a function that will display the correct step indicator:
	  fixStepIndicator(n)
	}

	function nextPrev(n) {
	  // This function will figure out which tab to display
	  var x = document.getElementsByClassName("tab");
	  // Exit the function if any field in the current tab is invalid:
	  if (n == 1 && !validateForm()) return false;
	  // Hide the current tab:
	  x[currentTab].style.display = "none";
	  // Increase or decrease the current tab by 1:
	  currentTab = currentTab + n;
	  // if you have reached the end of the form...
	  if (currentTab >= x.length) {
		// ... the form gets submitted:
		document.getElementById("contact").submit();
		return false;
	  }
	  // Otherwise, display the correct tab:
	  showTab(currentTab);
	}

	function validateForm() {
	  // This function deals with validation of the form fields
	  var x, y, i, valid = true;
	  x = document.getElementsByClassName("tab");
	  y = x[currentTab].getElementsByTagName("input");
	  // A loop that checks every input field in the current tab:
	  for (i = 0; i < y.length; i++) {
		// If a field is empty...
		if (y[i].value == "") {
		  // add an "invalid" class to the field:
		  y[i].className += " invalid";
		  // and set the current valid status to false
		  valid = false;
		}
	  }
	  // If the valid status is true, mark the step as finished and valid:
	  if (valid) {
		document.getElementsByClassName("step")[currentTab].className += " finish";
	  }
	  return valid; // return the valid status
	}

	function fixStepIndicator(n) {
	  // This function removes the "active" class of all steps...
	  var i, x = document.getElementsByClassName("step");
	  for (i = 0; i < x.length; i++) {
		x[i].className = x[i].className.replace(" active", "");
	  }
	  //... and adds the "active" class on the current step:
	  x[n].className += " active";
	}
</script>
  </body>
</html>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $username = ($_POST['username']);
    $password = ($_POST['password']);
    $fname = ($_POST['fname']);
    $lname = ($_POST['lname']);
    $birth_date = ($_POST['birth_date']);
    $sex = ($_POST['sex']);
    $contact_num = ($_POST['contact_num']);
    $email = ($_POST['email']);
    $address_line1 = ($_POST['address_line1']);
    $address_line2 = ($_POST['address_line2']);
    $address_city = ($_POST['address_city']);
    $address_state = ($_POST['address_state']);
    $zip_code = ($_POST['zip_code']);
    $marital_status = ($_POST['marital_status']);
    $weight = ($_POST['weight']);
    $height = ($_POST['height']);
    $taking_meds = ($_POST['taking_meds']);
    $emergency_name = ($_POST['emergency_name']);
    $emergency_relation = ($_POST['emergency_relation']);
    $emergency_num = ($_POST['emergency_num']);
    $date = strftime("%Y-%m-%d");
    $bool = true;
    $db_server ="localhost";
	$db_username ="root";
	$db_password ="";
	$db_name ="patient_care";
		
	$con = mysqli_connect($db_server, $db_username, $db_password, $db_name) or
	die(mysqli_error()); //Connect to server
    $query = "SELECT * from patient";
    $results = mysqli_query($con, $query); //Query the patient table
    while($row = mysqli_fetch_array($results)) //display all rows from query
    {
        $table_users = $row['username']; // the first username row is passed on to $table_users, and so on until the query is finished

        if($username == $table_users) // checks if there are any matching fields
        {
            $bool = false; // sets bool to false
            Print '<script>alert("Username has been taken!");</script>'; //Prompts the user
            Print '<script>window.location.assign("register.php");</script>'; // redirects to register.php
        }
    }

    if($bool) // checks if bool is true
    {
        mysqli_query($con, "INSERT INTO patient (username,password,fname,lname,birth_date,sex,contact_num,email,address_line1,address_line2,address_city,address_state,zip_code,marital_status,weight,height,taking_meds,emergency_name,emergency_relation,emergency_num,registration_date) VALUES
        ('$username','$password','$fname','$lname','$birth_date','$sex','$contact_num','$email','$address_line1','$address_line2','$address_city','$address_state','$zip_code','$marital_status','$weight','$height','$taking_meds','$emergency_name','$emergency_relation','$emergency_num','$date')"); //Inserts the value to table users
        Print '<script>alert("Successfully Registered!");</script>'; // Prompts the user
        Print '<script>window.location.assign("register.php");</script>'; // redirects to register.php
    }
}
?>