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

    $output = '';
    $rec_id = $_POST['id'];

    $sql = "select * from doctor inner join doctor_schedule on doctor.doctor_id = doctor_schedule.doctor_id  WHERE doctor.doctor_id=" . $rec_id . " order by doctor.doctor_id asc";
    $result = mysqli_query($con, $sql);

    

    while($row = mysqli_fetch_assoc($result)) {
        echo $row["day"] . ": " . $row["time_from"] . " - " . $row["time_to"] . "<br/>";
    }
 
mysqli_close($con);
?>
