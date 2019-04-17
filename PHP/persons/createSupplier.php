<?php
	session_start();

	require('../setup.php');

	
	$sqlForId = "SELECT * FROM employee JOIN user where employee.employeeId = user.employeeId ";//check autherized user that use the system
	$resultForId = $conn->query($sqlForId);

    // output data of each rowForId
		$rowForId = $resultForId->fetch_assoc();
	
	
?>
<!-- Add new Supplier to the system DB -->
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../../CSS/person.css">

</head>
<body>

	<form style="border:1px solid #ccc" method="post">
	    <div class="container">
		    <h1>Add Supplier</h1>
		    <hr>

		    <label for="supplierFirstName"><b>First Name</b></label>
		    <input type="text" placeholder="Enter First Name" name="supplierFirstName" required>

		    <label for="supplierLastName"><b>Last Name</b></label>
		    <input type="text" placeholder="Enter Last Name" name="supplierLastName"  required>

		    <label for="supplierAddress"><b>Address</b></label>
		    <input type="text" placeholder="Enter Address" name="supplierAddress"  >

		    <label for="supplierPhoneNumber"><b>Phone Number</b></label>
		    <input type="text" placeholder="Enter Phone Number" name="supplierPhoneNumber" required>
		    <br/>
		    <label for="supplierEmail"><b>Email</b></label>
		    <input type="email" placeholder="Enter Email" name="supplierEmail"   >
		    <br/>
		    <label for="suppplierBalance"><b>Balance</b></label>
		    <input type="number" placeholder="Enter Balance" name="suppplierBalance"   >
		    <br/>
		    <label for="supplierDate"><b>Date</b></label>
		    <input type="date" placeholder="Enter Date" name="supplierDate"  >
		    <br/>
		    <label for="supplierRemark"><b>Note</b></label>
		    <textarea name="supplierRemark" placeholder="Enter Note"> </textarea> 
		    
		   
	    
	        <div class="clearfix">
		        <a href="../supplier.php"><button type="button" class="cancelbtn">Cancel</button></a> 
		        <button type="submit" class="signupbtn" name="create">New Supplier</button>
		    </div>
		</div>
	</form>
</body>
</html>

<?php 

	if(isset($_POST['create'])){	//do updated after clicking the edit button to ensure date
		$companyId = $rowForId['companyId'];
		$userId = $_SESSION['userName'];
		$supplierFirstName = $_POST['supplierFirstName'];
		$supplierLastName = $_POST['supplierLastName'];
		$supplierAddress = $_POST['supplierAddress'];
		$supplierPhoneNumber = $_POST['supplierPhoneNumber'];
		$supplierEmail=$_POST['supplierEmail'];
		$suppplierBalance=$_POST['suppplierBalance'];
		$supplierDate=$_POST['supplierDate'];
		$supplierRemark=$_POST['supplierRemark'];

		$sql = "INSERT INTO supplier (companyId, userId, supplierFirstName, supplierLastName, supplierAddress, supplierPhoneNumber, supplierEmail, suppplierBalance, supplierDate, supplierRemark )
			VALUES ('$companyId' ,'$userId', '$supplierFirstName' , '$supplierLastName', '$supplierAddress','$supplierPhoneNumber' ,'$supplierEmail','$suppplierBalance', '$supplierDate', '$supplierRemark')";

		$query=$conn->query($sql);


		if ($query) {
		   echo "New record created successfully";
		} else {
		  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}


?>

