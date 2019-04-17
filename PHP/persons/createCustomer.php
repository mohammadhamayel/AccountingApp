<?php
	session_start();

	require('../setup.php');

	
	$sqlForId = "SELECT * FROM employee JOIN user where employee.employeeId = user.employeeId "; //this for get autherized user information
	$resultForId = $conn->query($sqlForId);

    // output data of each rowForId
		$rowForId = $resultForId->fetch_assoc();
	
	
?>
<!-- this page for Add new customer to dataBase -->
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../../CSS/person.css">

</head>
<body>

	<form style="border:1px solid #ccc" method="post">
	    <div class="container">
		    <h1>Add Customer</h1>
		    <hr>

		    <label for="customerFirstName"><b>First Name</b></label>
		    <input type="text" placeholder="Enter First Name" name="customerFirstName" required>

		    <label for="customerLastName"><b>Last Name</b></label>
		    <input type="text" placeholder="Enter Last Name" name="customerLastName" required>

		    <label for="customerAddress"><b>Address</b></label>
		    <input type="text" placeholder="Enter Address" name="customerAddress"  >

		    <label for="customerphoneNumber"><b>Phone Number</b></label>
		    <input type="text" placeholder="Enter Phone Number" name="customerphoneNumber"   required>
		    <br/>
		    <label for="customerEmail"><b>Email</b></label>
		    <input type="email" placeholder="Enter Email" name="customerEmail"  >
		    <br/>
		    <label for="customerBalance"><b>Balance</b></label>
		    <input type="number" placeholder="Enter Balance" name="customerBalance"  >
		    <br/>
		    <label for="customerDate"><b>Date</b></label>
		    <input type="date" placeholder="Enter Date" name="customerDate"  >
		    <br/>
		    <label for="customerRemark"><b>Note</b></label>
		    <textarea name="customerRemark" placeholder="Enter Note"></textarea> 
		    
		   
	    
	        <div class="clearfix">
		        <a href="../customer.php"><button type="button" class="cancelbtn">Cancel</button></a> 
		        <button type="submit" class="signupbtn" name="create">New Customer</button>
		    </div>
		</div>
	</form>
</body>
</html>

<?php 

	if(isset($_POST['create'])){	//do updated after clicking the edit button to ensure date
		$companyId = $rowForId['companyId'];
		$userId = $_SESSION['userName'];
		$customerFirstName = $_POST['customerFirstName'];
		$customerLastName = $_POST['customerLastName'];
		$customerAddress = $_POST['customerAddress'];
		$customerphoneNumber = $_POST['customerphoneNumber'];
		$customerEmail=$_POST['customerEmail'];
		$customerBalance=$_POST['customerBalance'];
		$customerDate=$_POST['customerDate'];
		$customerRemark=$_POST['customerRemark'];

		$sql = "INSERT INTO customer (companyId, userId, customerFirstName, customerLastName, customerAddress, customerphoneNumber, customerEmail,customerBalance, customerDate, customerRemark)
			VALUES ('$companyId' ,'$userId', '$customerFirstName' , '$customerLastName','$customerAddress', '$customerphoneNumber' ,'$customerEmail','$customerBalance', '$customerDate', '$customerRemark')";

		$query=$conn->query($sql);


		if ($query) {
		   echo "New record created successfully";
		} else {
		  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

		//add header to redirect the page into customer page after updated
	}


?>

