<?php
include 'database.php';
if(isset($_GET['id'])){
    $id=$_GET['id'];
   $sql="update `lab_technitian` set status='approved' where id=$id";
   $result=mysqli_query($conn,$sql); 
   if($result){
    echo '<script>';
        echo 'alert("Record approved successfully!");';
        echo 'window.location.href = "lab-dashboard.php";';
        echo '</script>';
   }
   else{
    die(mysqli_error($conn));
}
}
?>