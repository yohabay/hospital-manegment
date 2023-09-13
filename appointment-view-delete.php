<?php
include 'database.php';
if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];
    $sql = "delete from `appointment_list` where Id = $id";
    $result = mysqli_query($conn, $sql);
    if($result){
        echo '<script>';
        echo 'alert("Record deleted successfully!");';
        echo 'window.location.href = "view-appointment.php";';
        echo '</script>';
    }
    else{
        die(mysqli_error($conn));
    }
}
?>
