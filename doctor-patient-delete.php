<?php
include 'database.php';
if(isset($_GET['id'])){
$id=$_GET['id'];
$sql="delete  from `appointment_list` where Id=$id";
$result=mysqli_query($conn,$sql);
if($result){
header('location:doctor-patient-record.php');
}
else{
    die(mysqli_error($conn));
}

}
?>