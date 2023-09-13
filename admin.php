<?php
include 'database.php';

if(isset($_POST['reset'])) {
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $newPassword = mysqli_real_escape_string($conn, $_POST['new_password']); // Get the new password entered by the user
   if (strlen($_POST['new_password']) < 6) {
      $message = 'password should be at least 6 characters long';
   }
   // Check if the email exists in the database
   if (empty($message)) {
   $select = mysqli_query($conn, "SELECT * FROM `admin-list` WHERE email = '$email'") or die('query failed');
   
   if(mysqli_num_rows($select) > 0) {
      // Update the password in the database
      $update = mysqli_query($conn, "UPDATE `admin-list` SET password = '$newPassword' WHERE email = '$email'") or die('query failed');
      $message1 = 'password is reset you can check in email';
   
   } else {
      $message = 'Email address not found.';
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
      <form action="" method="post" enctype="multipart/form-data">
         <h3>Reset Password</h3>
         <?php
         if(isset($message)){
            echo '<div class="message">'.$message.'</div>';
         }
         if(isset($message1)){
            echo '<div class="message text-bg-success">'.$message1.'</div>';

         }
         ?>
         <input type="email" name="email" placeholder="Enter email" class="box" required>
         <input type="password" name="new_password" placeholder="Enter new password" class="box" required>
         <input type="submit" name="reset" value="Reset Password" class="btn btn-primary">
         <p>Remember your password? <a href="admin-login.php">Go back to login</a></p>
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
