<?php 
include "database.php";
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-dashboard</title>
    <link rel="stylesheet" href="scs.css">
    <link rel="stylesheet" href="bootstrap.min.css">
</head>

<body>
    <div class="maincontaient">
        <div class="left-side col-md">
            <div class="container text-center ">
                <img src="image/pngwing.com.png"
                    style="width:100px ;margin-top:50px; background:white; border-radius: 50%;"><br>
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
                    <a href="admin-dashboard.php">Dashboard</a>
                    <a href="admin-doctor.php">Doctor</a>
                    <a href="admin-petient.php">Patient</a>
                    <a href="lab-thechnitian.php">Lab_Technitian</a>
                    <a href="admin-appointment.php">Appointment</a>
                </div>
            </div>
        </div>


        <!-- right side  -->
        <div class="right-side" style="width:100%">
            <nav>
                <h1><a href="home.php" class="text-light text-decoration-none "></a></h1>

                <div class="nav ">
                    <a href="home.php">Logout</a>
                </div>
            </nav>
            <div class="record1">
                <div class="container ">
                    <div class="row">
                        <div class="col doctor-value" style="height:250px">
                            <a href="doctor-record.php"> <img src="image/doctor.png" style="width:100px">
                                <?php
            //code for summing up number of in / admitted  doctor 
                $result ="SELECT count(*) FROM `receint-doctor` ";
                $stmt = $conn->prepare($result);
                $stmt->execute();
              $stmt->bind_result($doctor);
              $stmt->fetch();
            $stmt->close();
        ?>
                                <h3 class="text-dark mt-1"><span data-plugin="counterup"><?php echo $doctor;?></span>
                                </h3>
                                <h6>Total approved Doctor</h6>
                            </a>
                        </div>
                        <div class="col patient-value" style="height:250px">
                            <a href="patient-record.php"> <img src="image/patient.jpg" style="width:200px">
                                <?php
 //code for summing up number of in / admitted  patients 
     $result ="SELECT count(*) FROM `patient-recient` ";
     $stmt = $conn->prepare($result);
     $stmt->execute();
   $stmt->bind_result($patient);
   $stmt->fetch();
 $stmt->close();
?>
                                <h3 class="text-dark mt-1"><span data-plugin="counterup"><?php echo $patient;?></span>
                                </h3>
                                <h6>Total approved patient</h6>
                            </a>
                        </div>
                        <div class="col patient-value bg-info" style="height:250px">
                            <a href="lab-technitian-record.php"> <img src="image/microscope.png" style="width:100px">

                                <?php
            //code for summing up number of in / admitted  patients 
                $result ="SELECT count(*) FROM `lab_technitian` ";
                $stmt = $conn->prepare($result);
                $stmt->execute();
              $stmt->bind_result($lab_technician);
              $stmt->fetch();
            $stmt->close();
        ?>
                                <h3 class="text-dark mt-1"><span
                                        data-plugin="counterup"><?php echo $lab_technician;?></span></h3>
                                <h6>Total laboratory Technician</h6>
                            </a>
                        </div>
                        <div class="col appointment-value">
                            <a href="view-appointment.php"><img src="image/app.png" style="width:150px">
                                <?php
            //code for summing up number of in / admitted  appointment 
                $result ="SELECT count(*) FROM `appointment_list` ";
                $stmt = $conn->prepare($result);
                $stmt->execute();
              $stmt->bind_result($appointment);
              $stmt->fetch();
            $stmt->close();
        ?>
                                <h3 class="text-dark mt-1"><span
                                        data-plugin="counterup"><?php echo $appointment;?></span></h3>
                                <h6>Total appointment</h6>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <table class="table table-danger">
                        <thead>
                            <h4 class="bg text-center text-bg-primary">Recient doctor</h4>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">name</th>
                                <th scope="col">Department</th>
                                <th scope="col">email</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
     include 'database.php';
    $sql="SELECT * from `receint-doctor` where status='approve'ORDER by id ASC";
    $result=mysqli_query($conn,$sql);
    if($result){
    while($row=mysqli_fetch_assoc($result)){
       $id=$row["id"];
       $name=$row["name"];
       $department=$row["department"];
       $email=$row["email"];
       echo"
       <tr>
      <th>$id</th>
      <th>$name</th>
      <th>$department</th>
      <th>$email</th>
      <td>
      <a href='doctor-appending.php?id=$id' class='btn btn-info'>approve</a></td
    </tr> 
       ";
      
    }
  }
   ?>


                        </tbody>
                    </table>
                </div>
                <div class="col">
                    <table class="table table-danger">
                        <thead>
                            <h4 class="bg text-center text-bg-primary">Recient Lab Technitian</h4>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">name</th>
                                <th scope="col">Department</th>
                                <th scope="col">email</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
     include 'database.php';
    $sql="SELECT * from `lab_technitian` where status='approve'ORDER by id ASC";
    $result=mysqli_query($conn,$sql);
    if($result){
    while($row=mysqli_fetch_assoc($result)){
       $id=$row["id"];
       $name=$row["name"];
       $department=$row["department"];
       $email=$row["email"];
       echo"
       <tr>
      <th>$id</th>
      <th>$name</th>
      <th>$department</th>
      <th>$email</th>
      <td>
      <a href='lab-appending.php?id=$id' class='btn btn-info'>approve</a></td
    </tr> 
       "; 
      }
    }
  ?>
                        </tbody>
                    </table>
                </div>
                <div class="col">
                    <table class="table table-danger">
                        <thead>
                            <tr>
                                <h4 class=" bg text-center text-bg-danger">recient patient</h4>
                                <th scope="col">name</th>
                                <th scope="col">symptom</th>
                                <th scope="col">email</th>
                                <th scope="col">address</th>
                                <th scope="col">status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
     include 'database.php';
    $sql="SELECT * from `patient-recient` where status='approve'ORDER by id ASC ";
    $result=mysqli_query($conn,$sql);
    if($result){
    while($row=mysqli_fetch_assoc($result)){
      $id=$row['Id'];
       $name=$row["name"];
       $symptom=$row["symptom"];
       $email=$row["email"];
       $address=$row["address"];

       echo"
       <tr>
      <td>$name</td>
      <td>$symptom</td>
      <td>$email</td>
      <td>$address</td>
      <td>
      <a href='patient-appending.php?id=$id' class='btn btn-info' name='approve'>approve</a>
      </td>
    </tr> 
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