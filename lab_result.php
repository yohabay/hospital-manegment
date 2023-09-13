<?php
include "database.php";
session_start();
$name12 = $_SESSION['name2'];
$email12 = $_SESSION['email2'];
$qry = "SELECT * FROM `patient-recient` WHERE name='$name12'";
$equery = mysqli_query($conn, $qry);
$row1 = mysqli_fetch_array($equery);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-click</title>
    <link rel="stylesheet" href="scs.css">
    <link rel="stylesheet" href="bootstrap.min.css">
</head>

<body>
    <div class="maincontaient">
        <div class="left-side col-md">
            <div class="container text-center ">
                <img src="image/hospitalisation.png" style="width:100px ;margin-top:50px; background:white; border-radius: 50%;"><br>
                <h3><?php echo $name12 ?></h3>
                <h3>Patient</h3>

                <div class="leftmenu " style="font-size: 25px;">
                    <a href="patient-dashboard.php">Dashboard</a>
                    <a href="patient-appointment.php">Appointment</a>
                    <a href="view-print.php">Discharge</a>
                    <a href="lab_result.php">Lab_result</a>
                </div>
            </div>
        </div>

<div class="right-side">
   <nav>
   <h1><a href="home.php" class="text-light text-decoration-none"><img src="logo.png" class="logo"></a></h1>
    <div class="nav ">
    <a href="home.php">Logout</a>
    </div>
    </nav>

    <div class=" my-5">
        <div class="col">
        <h2 class="text-center  ">Reported laboratory result</h2>
        <table class="table table-dark ">
     <thead>
    
     <tr>
      <th scope="col">Id</th>
      <th scope="col">Doctor name</th>
      <th scope="col">patient name</th>
      <th scope="col">Description</th>
      <th scope="col">date</th>
      <th scope="col">Report</th>
    </tr>
  </thead>
  <tbody>
  <?php 
     include 'database.php';
    $sql="SELECT * from `appointment_list`  WHERE patient_name='$name12' && appoint='Tested'";
    $result=mysqli_query($conn,$sql);
    if($result){
    while($row=mysqli_fetch_assoc($result)){
       $id=$row["Id"]; 
       $doctor_name=$row["doctor_name"]; 
       $patient_name=$row["patient_name"]; 
       $descripition =$row["descripition"];
       $date=$row["date"];
       $report=$row["appoint"];
       echo"
       <tr>
      <td>$id</td>
      <td>$doctor_name</td>
      <td>$patient_name</td>
      <td>$descripition</td>
      <td>$date</td> 
      <td>$report</td> 
      </tr> 
   
       ";
      
    }
  }
   ?>
  </tbody>
        </table>
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