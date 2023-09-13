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

<div class="right-side" style="width:100%">
   <nav>
   <h1><a href="home.php" class="text-light text-decoration-none"><img src="logo.png" class="logo"></a></h1>
    <div class="nav ">
    <a href="home.php">Logout</a>
    </div>
    </nav>

    <div class=" my-5">
        <div class="col">
        <h2 class="text-center">Report Record</h2>
        <table class="table table-dark">
     <thead>
    
     <tr>
      <th scope="col">ID</th>
      <th scope="col">patient name</th>
      <th scope="col">description</th>
      <th scope="col">date</th>
      <th scope="col">report</th>
      <th scope="col">add test</th>

    </tr>
  </thead>
  <tbody>
  <?php 
     include 'database.php';
    $sql="SELECT * from `appointment_list` where appoint='reported'";
    $result=mysqli_query($conn,$sql);
    if($result){
    while($row=mysqli_fetch_assoc($result)){
       $id=$row["Id"]; 
       $patient_name=$row["patient_name"]; 
       $dscription=$row["descripition"]; 
       $date=$row["date"];
       $appoint=$row["appoint"];
       echo"
       <tr>
      <td>$id</td>
      <td> $patient_name</td>
      <td> $dscription</td>
      <td>$date</td>
      <td>$appoint</td>
      <td> <button class='btn btn-primary '><a href='add-lab-test.php?id=$id' class='text-light '>Add test</a></button>
    <button class='btn btn-danger '><a href='remove-lab-test.php?deleteid=$id' class='text-light '>Reject</a></button>
      <td>
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