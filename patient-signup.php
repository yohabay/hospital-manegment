<?php

include 'database.php';
session_start();
if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $symptom = mysqli_real_escape_string($conn, $_POST['symptom']);
   $email = mysqli_real_escape_string($conn, ($_POST['email']));
   $password = mysqli_real_escape_string($conn, ($_POST['password']));
   $address = mysqli_real_escape_string($conn, ($_POST['address']));
   $message1 = array();
   if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $message1[] = 'Invalid email format';
   }
   if (strlen($_POST['name']) < 4 || !preg_match("/^[a-zA-Z]+$/", $_POST['name'])) {
      $message1[] = 'Name should be at least 4 characters long and contain only letters';
   }   
   
   if (empty($message1)) {
   $select = mysqli_query($conn, "SELECT * FROM `patient-recient` WHERE password = '$password' AND email = '$email'") or 
    die('query failed');

   if(mysqli_num_rows($select) > 0){
      $message[] = 'user already exist'; 
   }
      else{
         $insert = mysqli_query($conn, "INSERT INTO `patient-recient`(name, symptom, email,password, address,status) VALUES('$name', '$symptom', '$email',$password, '$address','approve')") or die('query failed');

         if($insert){
            // move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'You well wait afew moment until approve : You to sign in! ';

         }else{
            $message[] = 'registeration failed!';
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
    <a href="">Admin</a>
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
      <h3>register now</h3>
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
      <input type="text" name="name" placeholder="enter your name" class="box" required>
      <input type="text" name="symptom" placeholder=" patient type" class="box" required>
      <input type="text" name="email" placeholder="enter email" class="box" required>
      <input type="password" name="password" placeholder="enter password" class="box" required>
      <input type="address" name="address" placeholder="enter your address" class="box" required>
      <!-- <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png"> -->
      <input type="submit" name="submit" value="register now" class="btn btn-primary">
      <p>already have an account? <a href="patient-login.php" >login now</a></p>
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