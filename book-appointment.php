<?php
include 'database.php';
session_start();
if(isset($_POST['submit'])){

   $doctor_name = mysqli_real_escape_string($conn, $_POST['doctor_name']);
   $patient_name = mysqli_real_escape_string($conn, $_POST['patient_name']);
   $descripition = mysqli_real_escape_string($conn, ($_POST['descripition']));
   $report = mysqli_real_escape_string($conn, ($_POST['report']));
   $select = mysqli_query($conn, "SELECT * FROM `appointment_list` WHERE doctor_name = '$doctor_name' AND patient_name = '$patient_name'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $message[] = 'user already exists'; 
   }
   else{
      $insert = mysqli_query($conn, "INSERT INTO `appointment_list`(doctor_name, patient_name, descripition ,appoint) VALUES('$doctor_name', '$patient_name', '$descripition','$report')") or die('query failed');

      if($insert){
         header('location:view-appointment.php');
      }
      else{
         $message[] = 'registration failed!';
      }
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-click</title>
    <link rel="stylesheet" href="scs.css">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
<section>
    <nav>
    <h1><a href="home.php" class="text-light text-decoration-none"><img src="logo.png" class="logo"></a></h1>
    <div class="nav ">
    <a href="admin.php">Admin</a>
    <a href="doctorsignup.php">Doctor</a>
    <a href="patient-signup.php">Patient</a>
    </div>
    <div class="nav">
    <a href="">About us</a>
    <a href="">Contact US</a>
    </div>
    </nav>
    </section>
    <div class="form-container">

   <form action="" method="post" >
      <h3>Appoint the patient</h3>
      <?php
      if(isset($message)){
         foreach($message as $message){
            echo '<div class="message text-bg-success">'.$message.'</div>';
         }
      }
      ?>
      <input type="text" name="doctor_name" placeholder="enter doctor name" class="box" required>
      <input type="text" name="patient_name" placeholder="enter Patient name" class="box" required>
      <input type="text" name="descripition" placeholder="enter description" class="box" required>
      <input type="text" name="report" placeholder="enter Report" class="box" value="report">
      <input type="submit" name="submit" value="submit" class="btn btn-primary">
   </form>

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
