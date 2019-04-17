<?php

session_start();

if (isset($_SESSION['userName'])) { // logout from the system
	
	session_destroy();
	header("location:login.php");
}

?>