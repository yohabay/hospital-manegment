<?php 
include 'database.php';
session_start();

if(isset($_POST['submit'])) {
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $select = mysqli_query($conn, "SELECT * FROM `receint-doctor` WHERE password = '$password' AND email = '$email' AND status='approved'") or die('query failed');
    $row = mysqli_fetch_array($select);

    if($row != null) {
        $_SESSION['name1'] = $row['name'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['email1'] = $row['email'];
        header('location:doctor-dashboard.php');
    } else {
        if($name == '' || $email == '') {
            $message[] = 'Your request is processed!';
        } else {
            $message[] = 'Incorrect password or email';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- your head content here -->
</head>
<body>
    <!-- your HTML content here -->
</body>
</html>


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
    <a href="admin-login.php">Admin</a>
    <a href="doctor-login.php">Doctor</a>
    <a href="patient-login.php">Patient</a>
    <a href="lab-tecnitial-login.php">Lab Technician</a>
    </div>
    <div class="nav">
    <a href="about-us.php">About us</a>
    <a href="contact-us.php">Contact US</a>
    </div>
    </nav>
    </section>
    <div class="form-container">

   <form action="" method="post" enctype="multipart/form-data">
      <h3>Login Now</h3>
      <?php
      if(isset($message)){
         foreach($message as $message){
            echo '<div class="message">'.$message.'</div>';
         }
      }
      ?>
      <input type="email" name="email" placeholder="Enter your email" class="box" required>
      <input type="password" name="password" placeholder="Enter your password" class="box" required>
      <input type="submit" name="submit" value="Login Now" class="btn btn-primary">
      <p>Don't have an account? <a href="doctorsignup.php">Register now</a></p>
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
