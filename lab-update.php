<?php

include 'database.php';
$id=$_GET['updateid'];
$sql="SELECT * from `lab_technitian` where Id=$id";
    $result=mysqli_query($conn,$sql);
    if($result){
    $row=mysqli_fetch_assoc($result);
       $name=$row["name"]; 
       $email=$row["email"];
       $address=$row["address"];
       $department=$row["department"];

    }

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $id=$_GET['updateid'];
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $address = mysqli_real_escape_string($conn, ($_POST['address']));
   $department = mysqli_real_escape_string($conn, ($_POST['department']));
  $sql="update `lab_technitian` set Id=$id,name='$name',email='$email',address='$address',department='$department' where Id=$id";
         $insert = mysqli_query($conn,$sql ) or die('query failed');

         if($insert){
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'registered successfully!';
            header('location:lab-technitian-record.php');
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
   <h3>Add to Hospital</h3>
   <?php
   if(isset($message)){
      foreach($message as $message){
         echo '<div class="message">'.$message.'</div>';
      }
   }
   ?>
   <input type="text" name="name" placeholder="enter name" class="box" required value=<?php echo $name;?>> 
   <input type="text" name="email" placeholder="enter email" class="box" required value=<?php echo $email;?>>
   <input type="text" name="address" placeholder="enter Address" class="box" required value=<?php echo $address;?>>
   <input type="text" name="department" placeholder="enter department" class="box" required value=<?php echo $department;?>>
   <!-- <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png"> -->
   <input type="submit" name="submit" value="Update" class="btn btn-primary">
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