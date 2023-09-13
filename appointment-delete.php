<?php
include 'database.php';
if(isset($_GET['deleteid'])){
$id=$_GET['deleteid'];
$sql="delete  from `patient-recient` where Id=$id";
$result=mysqli_query($conn,$sql);
if($result){
header('location:view-appointment.php');
}
else{
    die(mysqli_error($conn));
}

}
?>