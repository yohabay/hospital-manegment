<?php
include 'database.php';
session_start();

if(isset($_POST['submit'])){
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $password = mysqli_real_escape_string($conn, $_POST['password']);
   $address = mysqli_real_escape_string($conn, $_POST['address']);
   $department = mysqli_real_escape_string($conn, $_POST['department']);
   
   // Validation
   $message1 = array();
   if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $message1[] = 'Invalid email format';
   }
   if (strlen($name) < 4) {
      $message1[] = 'Name should be at least 4 characters long';
   }
   if (preg_match('/\d/', $name)) {
      $message1[] = 'Name should not contain numbers';
   }
   if (!preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/', $password)) {
      $message1[] = 'Password should contain at least one letter and one number';
   }
   
   if (empty($message1)) {
      $select = mysqli_query($conn, "SELECT * FROM `receint-doctor` WHERE password = '$password' AND email = '$email'") or die('query failed');
      if(mysqli_num_rows($select) > 0){
         $message1[] = 'User already exists';
      } else {
         $insert = mysqli_query($conn, "INSERT INTO `receint-doctor`(name, email,password, address, department, status) VALUES('$name', '$email', '$password','$address', '$department', 'approve')") or die('query failed');
         if($insert){
            $message[] = 'You will wait a few moments until approval. Please sign in!';
         } else {
            $message[] = 'Registration failed!';
         }
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
   <form action="" method="post">
      <h3>Register now</h3>
      <?php
      if(isset($message1)){
         foreach($message1 as $msg){
            echo '<div class="message text-bg-danger">'.$msg.'</div>';
         }
         
      }
      if(isset($message)){
         foreach($message as $msg){
            echo '<div class="message text-bg-success">'.$msg.'</div>';
         }
         
      }
      ?>
      <input type="text" name="name" placeholder="Enter your name" class="box" required>
      <input type="email" name="email" placeholder="Write your email" class="box" required>
      <input type="password" name="password" placeholder="Write your password" class="box" required>
      <input type="text" name="address" placeholder="Enter your address" class="box" required>
      <input type="text" name="department" placeholder="Enter your profession" class="box" required>
      <input type="submit" name="submit" value="Register now" class="btn btn-primary">
      <p>Already have an account? <a href="doctor-login.php">Login now</a></p>
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
