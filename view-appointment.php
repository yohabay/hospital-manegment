<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-click</title>
    <link rel="stylesheet" href="scs.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <style>
    @media (max-width: 767px) {
    .left-side {
        width: 100%;
    }
    .right-side {
        width: 100%;
    }
}

.right-side {
    width: 100%;
}

</style>

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

<div class="right-side">
   <nav>
   <h1><a href="home.php" class="text-light text-decoration-none"><img src="logo.png" class="logo"></a></h1>
    <div class="nav ">
    <a href="home.php">Logout</a>
    </div>
    </nav>

    <div class=" my-5">
        <div class="col">
        <h2 class="text-center  ">veiw the appointment</h2>
<table class="table table-dark ">
     <thead>
    
     <tr>
      <th scope="col">Id</th>
      <th scope="col">Doctor name</th>
      <th scope="col">patient name</th>
      <th scope="col">Description</th>
      <th scope="col">date</th>
      <th scope="col">oppration</th>
    </tr>
  </thead>
  <tbody>
  <?php 
     include 'database.php';
    $sql="SELECT * from `appointment_list`";
    $result=mysqli_query($conn,$sql);
    if($result){
    while($row=mysqli_fetch_assoc($result)){
       $id=$row["Id"]; 
       $doctor_name=$row["doctor_name"]; 
       $patient_name=$row["patient_name"]; 
       $descripition =$row["descripition"];
       $date=$row["date"];
       echo"
       <tr>
      <td>$id</td>
      <td>$doctor_name</td>
      <td>$patient_name</td>
      <td>$descripition</td>
      <td>$date</td>
      <td>   <button class='btn btn-danger'><a href='appointment-view-delete.php?deleteid=$id'class='text-light'>Reject</a></button></th>
      </tr> </td>
   
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