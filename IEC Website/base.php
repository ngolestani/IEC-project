<?php
$conn= new mysqli ("localhost", "root","", "iec");
if($conn ->connect_error)
{
die("Could not connect with server". $conn->connect_error);
}
?>
