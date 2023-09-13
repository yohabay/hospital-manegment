<?php
include 'database.php';
if(isset($_GET['deleteid'])){
$id=$_GET['deleteid'];
$sql="delete  from `appointment_list` where Id=$id";
$result=mysqli_query($conn,$sql);
if($result){
header('location:doctor-delete-appointment.php');
}
else{
    die(mysqli_error($conn));
}

}
?>