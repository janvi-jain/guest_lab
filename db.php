<?php
$conn = mysqli_connect("localhost", "root", "", "guest_lab");

if(!$conn){
    die("Database Connection Failed: " . mysqli_connect_error());
}

?>