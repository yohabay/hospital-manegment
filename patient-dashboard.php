<?php
include "database.php";
session_start();
$name12 = $_SESSION['name2'];
$email12 = $_SESSION['email2'];
$qry = "SELECT * FROM `patient-recient` WHERE name='$name12'";
$equery = mysqli_query($conn, $qry);
$row1 = mysqli_fetch_array($equery);
?>
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
        <div class="left-side col-md">
            <div class="container text-center ">
                <img src="image/hospitalisation.png" style="width:100px ;margin-top:50px; background:white; border-radius: 50%;"><br>
                <h3><?php echo $name12 ?></h3>
                <h3>Patient</h3>

                <div class="leftmenu " style="font-size: 25px;">
                    <a href="patient-dashboard.php">Dashboard</a>
                    <a href="patient-appointment.php">Appointment</a>
                    <a href="view-print.php">Discharge</a>
                    <a href="lab_result.php">Lab_result</a>
                </div>
            </div>
        </div>

        <!-- right side  -->
        <div class="right-side">
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

                            <h6>Doctor name</h6>
                            <?php
                            $result = "SELECT doctor_name FROM `appointment_list` where patient_name='$name12'";
                            $stmt = $conn->prepare($result);
                            $stmt->execute();
                            $stmt->bind_result($appointment);
                            $stmt->fetch();
                            $stmt->close();
                            ?>
                            <h3 class="text-dark mt-1"><span data-plugin="counterup"><?php echo $appointment; ?></span></h3>
                        </div>
                        <div class="col patient-value">
                            <h6>Description </h6>
                            <?php
                            $result = "SELECT descripition FROM `appointment_list`  where patient_name='$name12'";
                            $stmt = $conn->prepare($result);
                            $stmt->execute();
                            $stmt->bind_result($description);
                            $stmt->fetch();
                            $stmt->close();
                            ?>
                            <h3 class="text-dark mt-1"><span data-plugin="counterup"><?php echo $description; ?></span></h3>
                        </div>
               <div class="col appointment-value">
                   <h6>Admin Date</h6>
                   <?php
                $result = "SELECT date FROM `appointment_list` where patient_name='$name12' ";
                   $stmt = $conn->prepare($result);
                   $stmt->execute();
                   $stmt->bind_result($date);
                   $stmt->fetch();
                   $stmt->close();
                   ?>
             <h3 class="text-dark mt-1"><span data-plugin="counterup"><?php echo $date; ?></span></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <table class="table table-dark ">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Doctor name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Date</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include 'database.php';
                           $result = "SELECT Id, doctor_name, descripition, date FROM `appointment_list` where patient_name='$name12'";
                            $equery = mysqli_query($conn, $result);
                            while ($row = mysqli_fetch_array($equery)) {
                                $id = $row["Id"];
                                $doctor_name = $row["doctor_name"];
                                $description = $row["descripition"];
                                $date = $row["date"];

                                echo "
                                <tr>
                                    <td>$id</td>
                                    <td>$doctor_name</td>
                                    <td>$description</td>
                                    <td>$date</td>
                                </tr>
                                ";
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
