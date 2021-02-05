<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Patient Help</title>
      <link rel="shortcut icon" type="image/png" href="../images/transparenticon.png">
      <style>
        .modal {
          display: none; /* Hidden by default */
          position: fixed; /* Stay in place */
          z-index: 1; /* Sit on top */
          padding-top: 100px; /* Location of the box */
          left: 0;
          top: 0;
          width: 100%; /* Full width */
          height: 100%; /* Full height */
          overflow: auto; /* Enable scroll if needed */
          background-color: rgb(0,0,0); /* Fallback color */
          background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }
        .modal-content {
          background-color: #fefefe;
          margin: auto;
          padding: 20px;
          border: 1px solid #888;
          width: 80%;
        }
        .close {
          color: #aaaaaa;
          float: right;
          font-size: 28px;
          font-weight: bold;
        }
        .close:hover,
        .close:focus {
          color: #000;
          text-decoration: none;
          cursor: pointer;
        }
      </style>
  </head>
  <body>
    <table border="1px" width="50%">
      <tr>
          <th>Doctor Name</th>
          <th>Details</th>
          <th>Book Appointment?</th>
      </tr>

      <?php
      $con = mysqli_connect("localhost", "root", "", "patient_care") or die(mysqli_error()); //Connect to server
      $query = mysqli_query($con, "select * from doctor inner join doctor_schedule on doctor.doctor_id = doctor_schedule.doctor_id"); // SQL Query
      
      while($row = mysqli_fetch_array($query)) {
          Print "<tr>";
          Print "<td>" . $row['fname'] . " " . $row['lname'] . "</td>";
          Print "<td>" . "Contact Num: " . $row['contact_num'] .  
                "<br>Email: " . $row['email'] .
                "<br>Specialization: " . $row['spec_detail'] .
                "<br><br>Schedule:<br>" . $row['day'] . ": " . $row['time_from'] . " - " . $row['time_to'] . "</td>";
          Print "<td align='center'>" . "<button id=\"bookBtn\">Book Appointment</button>" . "</td>";
          Print "</tr>";
          Print "";
      }
      ?>
    </table>

    <div id="myModal" class="modal">
      <div class="modal-content">
        <span class="close">&times;</span>
        <p>Book Appointment</p>
      </div>
    </div>

  <script>
  // Get the modal
  var modal = document.getElementById("myModal");

  // Get the button that opens the modal
  var btn = document.getElementById("bookBtn");

  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];

  // When the user clicks the button, open the modal 
  btn.onclick = function() {
    modal.style.display = "block";
  }

  // When the user clicks on <span> (x), close the modal
  span.onclick = function() {
    modal.style.display = "none";
  }

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
  </script>

</body>
    
  </body>
</html>