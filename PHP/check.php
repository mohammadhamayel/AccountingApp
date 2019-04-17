<?php 
//session_start();

/*this page for check the user if he autherized or not */

$localhost = "localhost";
$userName = "mohammad";
$pass = "1234";
$dbName ="Account";

$conn = mysqli_connect($localhost,$userName,$pass, $dbName);

if (!$conn) {
	die("connection Failed: " . mysqli_connect_error());
}
echo "connected successfully"."</br>" ;

$userName = $_POST['userName'];
$pass = $_POST['password'];

$sql = "SELECT * from user where userId = '$userName'  AND userPassword='$pass' ";

$result = $conn->query($sql);

if ($result->num_rows == 1) {

	$_SESSION['userName'] ="$userName";
	$_SESSION['password']="$pass";

	$sqlForId = "SELECT * FROM employee JOIN user where employee.employeeId = $userName ";//check autherized user that use the system
	$resultForId = $conn->query($sqlForId);

    // output data of each rowForId
		$rowForId = $resultForId->fetch_assoc();

	$_SESSION['CompanyId'] = $rowForId['companyId'];

	header("location:index.php");

}else{
	echo "Incorrect UserName or Password";
}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	</br>
	<a href="login.php"><button class="btn-primary"> Back To Login </button> </a>
</body>
</html>



