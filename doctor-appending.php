<?php
include 'database.php';
if(isset($_GET['id'])){
    $id=$_GET['id'];
   $sql="update `receint-doctor` set status='approved' where id=$id";
   $result=mysqli_query($conn,$sql); 
   if($result){
   header("location:admin-dashboard.php");
   }
}

?>