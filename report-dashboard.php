
<?php
include "database.php";
session_start();
$name12 = $_SESSION['name1'];
$email12 = $_SESSION['email1'];

$qry = "SELECT * FROM `receint-doctor` WHERE name='$name12'";
$equery = mysqli_query($conn, $qry);
$row1 = mysqli_fetch_array($equery);

$image = isset($_SESSION['image']) ? $_SESSION['image'] : null; // Check if 'image' key is set in $_SESSION array

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor-dashboard</title>
    <link rel="stylesheet" href="scs.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <style>
      
   
    </style>
</head>
<body>
<div class="maincontaient">
  <div class="left-side col-md" >
    <div class="container text-center">
           
        <img src="image/doctor.png" style="width:100px ;margin-top:50px; background:white; border-radius: 50%;"><br>
         <h3><?php echo $name12 ?></h3>
        <h3>Doctor</h3>
   
     <div class="leftmenu " style="font-size: 20px;">
        <a href="doctor-dashboard.php">Dashboard</a>
        <a href="doctor-patient.php">Patient</a>
        <a href="doctor-appointment.php">Appointment</a>
        <a href="report-dashboard.php">Report_Dashboard</a>
     </div>
     </div>
</div>



<!-- right side  -->
<div class="right-side">
   <nav>
   <h1><a href="home.php" class="text-light text-decoration-none"><img src="logo.png" class="logo"></a></h1>
    <div class="nav ">
    <a href="home.php">Logout</a>
    </div>
    </nav>
    <div class="record1">
    <div class="container ">
        <div class="row">
        <div class="col doctor-value"> 
           <h6><a href="lab_report.php">Make report</a></h6>
            
        </div>
        <div class="col register-value"> 
        <h6><a href="your-report-result.php">See your report result</a></h6>
        </div>
        <div class="col doctor-value bg-success"> 
        <h6 ><a href="report-result.php">Laboratory result</a></h6>
        </div>
        </div>
        </div>
    </div>
    </div>
</div>
</div>
</div>

<footer class="footer">
    <div class="social">
    <a href=""> <img src="image/facebook.png"></a>
     <a href=""><img src="image/instagram.png"></a>
     <a href=""><img src="image/twitter.png"></a>
     <a href=""><img src="image/whatsapp.png"></a>
     </div>
     <h4>Created By Computer Science Group 3</h4>
   </footer>
</body>
</html>