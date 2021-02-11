<?php
    session_start();
?>
<html>
<head>
<title>Patient Help</title>
</head>
<?php
session_start(); //starts the session
if($_SESSION['user']){ //checks if user is logged in
}
else{
header("location:index.html "); // redirects if user is not logged in
}
$user = $_SESSION['user']; //assigns user value
$id_exists = false;
?>
<body>

    <table border="1px" width="100%">
        <tr>
            <th>PATIENT</th>
            <th>APPOINTMENT DATE</th>
            <th>APPOINTMENT TIME</th>
            <th>DATE POSTED</th>
            <th>STATUS</th>
        </tr>
<?php

$_SESSION['user_id'] = $id;
$id_exists = true;
$con = mysqli_connect("localhost", "root", "", "patient_care") or die(mysqli_error()); //Connect to server
$sql = "Select * from appointment Where user_id='$id'";

$query = mysqli_query($con, $sql); // SQL Query
$count = mysqli_num_rows($query);
if($count > 0)
{
    while($row = mysqli_fetch_array($sql))
    {
    Print '<tr>';
    Print '<td>' . $row['patient_assigned'];
    Print '<td>' . $row['appointment_date'];
    Print '<td>' . $row['appointment_time'];
    Print '<td>' . $row['date_posted'];
    Print '<td>' . $row['approval'];
    Print '</tr>';
    $approval = $row['approval'];
    }
}
else
{
$id_exists = false;
}
if($id_exists)
{
Print '<form action="edit.php" method="POST">
 Update List: <br/>
 Details:<td>   <select name="approval">
                    <option value="0">Cancel</option>
                    <option value="1">Confirmed</option>
                </select>';
Print'<input type="submit" value="Update List"/></form>';
}
else
{
Print '<h2 align="center">There is no data to be edited.</h2>';
}

?>
</body>
</html>

<?php
if($_SERVER['REQUEST_METHOD'] == "POST")
{
$con = mysqli_connect("localhost", "root", "", "patient_care") or die(mysqli_error()); //Connect to server
$approval = ($_POST['approval']);
$id = $_SESSION['user_id'];
}
mysqli_query($con, "UPDATE appointment SET approval='$approval'");
header("location: view_appointment.php");
?>