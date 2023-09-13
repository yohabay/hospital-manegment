<?php

include 'database.php';
session_start();
if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $address = mysqli_real_escape_string($conn, ($_POST['address']));
   $department = mysqli_real_escape_string($conn, ($_POST['department']));
   // $image = $_FILES['image']['name'];
   // $image_size = $_FILES['image']['size'];
   // $image_tmp_name = $_FILES['image']['tmp_name'];
   // $image_folder = 'uploaded_img/'.$image;

   $select = mysqli_query($conn, "SELECT * FROM `lab_technitian` WHERE name = '$name' AND email = '$email'") or 
    die('query failed');

   if(mysqli_num_rows($select) > 0){
      $message[] = 'user already exist'; 
   }
  //  else{
      // if($pass != $cpass){
      //    $message[] = 'confirm password not matched!';
      // }
      // elseif($image_size > 2000000){
      //    $message[] = 'image size is too large!';
      // }
      else{
         $insert = mysqli_query($conn, "INSERT INTO `lab_technitian`(name, email, address, department,status) VALUES('$name', '$email', '$address', '$department','approve')") or die('query failed');

         if($insert){
            // move_uploaded_file($image_tmp_name, $image_folder);
          
            $message[] = 'You well wait afew moment until approve : You to sign in! ';
               //header('location:user-login.php');
            

         }else{
            $message[] = 'registeration failed!';
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
    <a href="lab-tecnitial-login.php">Lab Tecnitian</a>
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
      if(isset($message)){
         foreach($message as $message){
            echo '<div class="message text-bg-success">'.$message.'</div>';
         }
      }
      ?>
      <input type="text" name="name" placeholder="enter your name" class="box" required>
      <input type="email" name="email" placeholder="write your email" class="box" required>
      <input type="text" name="address" placeholder="enter your address " class="box" required>
      <input type="address" name="department" placeholder="enter your profession" class="box" required>
      <!-- <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png"> -->
      <input type="submit" name="submit" value="register now" class="btn btn-primary">
      <p>Already Have an Account? <a href="lab-tecnitial-login.php" >login now</a></p>
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