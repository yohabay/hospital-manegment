<?php
include 'database.php';
if(isset($_GET['deleteid'])){
$id=$_GET['deleteid'];
$sql="delete  from `lab_technitian` where Id=$id";
$result=mysqli_query($conn,$sql);
if($result){
header('location:lab-technitian-record.php');
}
else{
    die(mysqli_error($conn));
}

}
?>