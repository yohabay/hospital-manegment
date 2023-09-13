<?php
include 'database.php';
if(isset($_GET['deleteid'])){
$id=$_GET['deleteid'];
$sql="delete  from `receint-doctor` where Id=$id";
$result=mysqli_query($conn,$sql);
if($result){
header('location:doctor-approve.php');
}
else{
    die(mysqli_error($conn));
}

}
?>