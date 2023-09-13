<?php
include 'database.php';
if(isset($_GET['id'])){
    $id=$_GET['id'];
   $sql="update `appointment_list` set appoint='reported' where id=$id";
   $result=mysqli_query($conn,$sql); 
   if($result){
   header("location:lab-dashboard.php");
   }
}
?>