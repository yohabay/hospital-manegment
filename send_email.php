<?php
if (isset($_POST['submit'])) {
    include 'database.php';

    if(isset($_POST['submit'])){
    
       $name = mysqli_real_escape_string($conn, $_POST['name']);
       $email = mysqli_real_escape_string($conn, $_POST['email']);
       $subject = mysqli_real_escape_string($conn, ($_POST['subject']));
       $message = mysqli_real_escape_string($conn, ($_POST['message']));
       
  $insert = mysqli_query($conn, "INSERT INTO `message`(name, email, subject,message) VALUES('$name', '$email', '$subject','$message')") or die('query failed');
    
             if($insert){
                echo '<script>';
                echo 'alert("You  Sent  successfully!");';
                echo 'window.location.href = "home.php";';
                echo '</script>';
   
             }
       
        }
   
}
?>
