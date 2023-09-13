
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
      <div class="col appointment-value bg-info ">
             <a href="doctor-appointment-view.php"><a href="doctor-appointment-view.php"> <img src="image/app.png"  style="width:150px; border-radius:50%">
              <?php
                $result ="SELECT count(*) FROM `appointment_list` where doctor_name='$name12'";
                $stmt = $conn->prepare($result);
                $stmt->execute();
              $stmt->bind_result($appointment);
              $stmt->fetch();
            $stmt->close();
        ?>
          <h3 class="text-dark mt-1"><span data-plugin="counterup"><?php echo $appointment;?></span></h3>
                <h6>Your appointment</h6></a></a>
            </div>
      <div class="col patient-value" style="height:250px" >
              <a href="doctor-patient-record.php"><img src="image/patient.jpg" style="width:200px;border-radius:50%">

           <?php
            //code for summing up number of in / admitted  patients 
                $result ="SELECT count(*) FROM `appointment_list` where doctor_name='$name12' ";
                $stmt = $conn->prepare($result);
                $stmt->execute();
              $stmt->bind_result($patient);
              $stmt->fetch();
            $stmt->close();
        ?>
          <h3 class="text-dark mt-1"><span data-plugin="counterup"><?php echo $patient;?></span></h3>
                  <a href=""><h5>patient under you</h5></a></a>
          
            </div>
    <div class="col appointment-value">

       <a href="your-report-result.php"><img src="image/lab.jpg" style="width:200px;border-radius:50%"> <?php
            $result ="SELECT count(*) FROM `appointment_list` where doctor_name='$name12' && appoint='reported'";
            $stmt = $conn->prepare($result);
            $stmt->execute();
          $stmt->bind_result($lab_report);
          $stmt->fetch();
        $stmt->close();
     ?>
    <h3 class="text-dark mt-1"><span data-plugin="counterup"><?php echo $lab_report;?></span></h3>
    <a href=""><h5>Your laboratory Request</h5></a></a>
  </div>
      </div>
    </div>
</div>

  <div class="row">
      <div class="col">
       <table class="table table-danger">
   <thead>
    
    <tr>
    <h4 class="text-center text-bg-primary mb-0 p-2">Recent appointment for you</h4>
      <th scope="col">Id</th>
      <th scope="col">Patient name</th>
      <th scope="col">Description</th>
      <th scope="col">Date</th>
    </tr>
  </thead>
  <tbody>
  <?php
     include 'database.php';
     $result = "SELECT Id, patient_name, descripition, date FROM `appointment_list` where doctor_name='$name12'&& appoint='report'";
          $equery = mysqli_query($conn, $result);
           while ($row = mysqli_fetch_array($equery)) {
                 $id = $row["Id"];
                 $doctor_name = $row["patient_name"];
                 $description = $row["descripition"];
                 $date = $row["date"];

                   echo "
                   <tr>
                       <td>$id</td>
                       <td>$doctor_name</td>
                       <td>$description</td>
                       <td>$date</td>
                   </tr>
                   ";
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
