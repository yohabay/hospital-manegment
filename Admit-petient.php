<?php

include 'database.php';

        if(isset($_POST['submit'])){
        
           $name = mysqli_real_escape_string($conn, $_POST['name']);
           $symptom = mysqli_real_escape_string($conn, $_POST['symptom']);
           $email = mysqli_real_escape_string($conn, $_POST['email']);
           $password = mysqli_real_escape_string($conn, $_POST['password']);
           $address = mysqli_real_escape_string($conn, ($_POST['address']));
           $appoint = mysqli_real_escape_string($conn, ($_POST['appoint']));
                 $insert = mysqli_query($conn, "INSERT INTO `patient-recient`(name,symptom, email,password, address,Doctor_name,status) VALUES('$name','$symptom', '$email',$password, '$address','$appoint','approved')") or die('query failed');
        
                 if($insert){
                    move_uploaded_file($image_tmp_name, $image_folder);
                    $message[] = 'registered successfully!';
                    header('location:patient-record.php');
                 }else{
                    $message[] = 'registeration failed!';
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
        <div>
            <nav>
                
            <h1><a href="home.php" class="text-light text-decoration-none"><img src="logo.png" class="logo"></a></h1>
                <div class="nav ">
                    <a href="home.php">Logout</a>
                </div>
            </nav>
            
 <div class="form-container">
   <form action="" method="post" enctype="multipart/form-data">
   <h3>register to hospital</h3>
   <?php
   if(isset($message)){
      foreach($message as $message){
         echo '<div class="message">'.$message.'</div>';
      }
   }
   ?>
   <input type="text" name="name" placeholder="enter name" class="box" required>
   <input type="text" name="symptom" placeholder="patient Type" class="box" required>
   <input type="text" name="email" placeholder="enter email" class="box" required>
   <input type="password" name="password" placeholder="enter password" class="box" required>
   <input type="text" name="address" placeholder="enter Address" class="box" required>
   <input type="text" name="appoint" placeholder="enter doctors name" class="box" required>
   <!-- <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png"> -->
   <input type="submit" name="submit" value="registered now" class="btn btn-primary">
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