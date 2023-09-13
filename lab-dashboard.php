<?php
include "database.php";
session_start();
$name12 = $_SESSION['name1'];
$email12 = $_SESSION['email1'];

$qry = "SELECT * FROM `lab_technitian` WHERE name='$name12'";
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
    <title>Admin-click</title>
    <link rel="stylesheet" href="scs.css">
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
<div class="maincontaient">

<div class="left-side col-md-2 ">
    <div class="container text-center ">
    <?php
            if ($image == null) {
                echo '<a href="edit_profile.php"><img src="image/doctor.png" style="width:100px ;margin-top:50px; background:white; border-radius: 50%;"></a><br>';
            } else {
                echo '<a href="edit_profile.php"><img src="' . $image . '" style="width:100px ;margin-top:50px; background:white; border-radius: 50%;"></a> <br>';
            }
            ?>
         <h3><?php echo $name12 ?></h3>
        <h4>Lab Technitian</h4>
   
     <div class="leftmenu " style="font-size: 20px;">
       <a href="lab-dashboard.php">Dashboard</a>
        <a href="patient-lab-test.php">Patient Lab Test</a>
        <a href="lab-report.php">Lab Report</a>
        <a href="patient-lab-result.php">Patient Lab Result</a>
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
      <div class="col appointment-value bg-info" style="height:250px" >
              <img src="image/app.png"  style="width:150px;border-radius:50%">
              <?php
                $result ="SELECT count(*) FROM `lab_technitian` where name='$name12'";
                $stmt = $conn->prepare($result);
                $stmt->execute();
              $stmt->bind_result($appointment);
              $stmt->fetch();
            $stmt->close();
        ?>
          <h3 class="text-dark mt-1"><span data-plugin="counterup"><?php echo $appointment;?></span></h3>
                <h6>Patient Lab Result</h6>
            </div>
      <div class="col patient-value" style="height:250px" >
              <img src="image/patient.jpg" style="width:200px">

           <?php
            //code for summing up number of in / admitted  patients 
                $result ="SELECT count(*) FROM `lab_technitian` where name='$name12' ";
                $stmt = $conn->prepare($result);
                $stmt->execute();
              $stmt->bind_result($patient);
              $stmt->fetch();
            $stmt->close();
        ?>
          <h3 class="text-dark mt-1"><span data-plugin="counterup"><?php echo $patient;?></span></h3>
                  <a href=""><h5>Lab Report</h5></a>

            </div>
        </div>
    </div>
</div>

  <div class="row">
  <div class="col">
        <table class="table table-danger">
  <thead>
  <h4 class="bg text-center text-bg-primary">Recient Report </h4>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">patient name</th>
      <th scope="col">Description</th>
      <th scope="col">Date</th>
      <th scope="col">Report Status</th>
    </tr>
  </thead>
  <tbody>
    <?php 
     include 'database.php';
    $sql="SELECT * from `appointment_list` where appoint='reported'ORDER by id ASC";
    $result=mysqli_query($conn,$sql);
    if($result){
    while($row=mysqli_fetch_assoc($result)){
       $id=$row["Id"];
       $name=$row["patient_name"];
       $description=$row["descripition"];
       $date=$row["date"];
       echo"
       <tr>
      <th>$id</th>
      <th>$name</th>
      <th>$description</th>
      <th>$date</th>
      <td>
      <a href='report.php?id=$id' class='btn btn-info'>Lab request</a></td
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
