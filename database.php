<?php
$conn =mysqli_connect("localhost","root","");
mysqli_select_db($conn,"hospital-manegment");
if(!$conn){
    Echo"the connection is failed";
}
?>