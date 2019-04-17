<?php 

$localhost = "localhost";
$userName = "mohammad";
$pass = "1234";
$dbName ="Account";

$conn = mysqli_connect($localhost,$userName,$pass, $dbName);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}




?>