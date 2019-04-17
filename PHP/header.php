<?php
//session_start();

//if (isset($_SESSION['userName'])) {
	
		$localhost="localhost";
		$userName="mohammad";
		$pass="1234";
		$db_name="Account";

		$conn = mysqli_connect($localhost,$userName,$pass,$db_name);

		/*if (!$conn) {
		    die("Connection failed: " . mysqli_connect_error());
		}
		echo "Connected successfully" . "</br>" ;*/
		
		if (isset($_POST['submit'])) {
				$uesrId = $_POST['uname'];
				$pass= $_POST['psw'];
		}	
		
?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="../CSS/login.css"> 

	</head>
	<body>

		<div class="navbar">
		    <a href="index.php">Home</a> 
			<a href="customer.php" >Customer</a>
			<a href="supplier.php" >Supplier</a>
			<a href="employee.php" >Employee</a>
			<a href="partners.php" >Partners</a> <!-- create stackholders table to invoke them in separate page -->
			<a href="inventory.php" >inventory</a>
			<a href="logout.php" style="margin-left: 60%;" >Sign Out</a>
		</div>




		<!-- <div class="addPerson">

			<a href="person.php"><button class="btn-primary">Add +</button></a>
			
		</div> -->

	</body>
</html>


<!-- to ensure that the authorized user uses the system -->
<?php
/*} after solve session problem discover it
else {
	$message = "Login, please";
	header("location:login.php?Message={$message}");

}*/
?>
