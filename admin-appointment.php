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
      <img src="image/pngwing.com.png" style="width:100px ;margin-top:50px; background:white; border-radius: 50%;"><br>
         <?php
         include "database.php";
         $sql="select name, image from `admin-list`";
         $result=mysqli_query($conn,$sql);
         if($result){
         $row=mysqli_fetch_assoc($result);
         $name=$row["name"]; 
         $image=$row["image"];
          echo $name;
         }
         ?>  
        <h3>admin</h3>
   
     <div class="leftmenu " style="font-size: 25px;">
        <a href="">Dashboard</a>
        <a href="admin-doctor.php">Doctor</a>
        <a href="admin-petient.php">Patient</a>
        <a href="admin-appointment.php">Appointment</a>
     </div>
     </div>
</div>
<!-- right side  -->
<div class="right-side "style="width:100%">
   <nav>
   <h1><a href="home.php" class="text-light text-decoration-none"><img src="logo.png" class="logo"></a></h1>
    <div class="nav ">
    <a href="home.php">Logout</a>
    </div>
    </nav>
    <div class="record1">
    <div class="container ">
        <div class="row">
        <div class="col doctor-value"> 
           <h6><a href="view-appointment.php">view appointment</a></h6>
            
        </div>
        <div class="col register-value"> 
        <h6><a href="book-appointment.php">book appointment</a></h6>
        </div>
        </div>
        </div>
    </div>
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