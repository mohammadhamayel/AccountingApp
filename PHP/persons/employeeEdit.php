<?php
	session_start();

	require('../setup.php');

	
	$id = $_GET['id'];

	$sqlForId = "SELECT * FROM employee WHERE (employee.employeeId = $id)";//check autherized user that use the system and who do modifications
	$resultForId = $conn->query($sqlForId);

    // output data of each rowForId
		$rowForId = $resultForId->fetch_assoc();
	
	
?>
<!-- this page for edit employee information -->
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../../CSS/person.css">

</head>
<body>

	<form style="border:1px solid #ccc" method="post">
	    <div class="container">
		    <h1>Edit Employee</h1>
		    <hr>

		    <label for="employeeFirstName"><b>First Name</b></label>
		    <input type="text" placeholder="Enter First Name" name="employeeFirstName" value="<?php echo $rowForId["employeeFirstName"]; ?>" required>

		    <label for="employeeLastName"><b>Last Name</b></label>
		    <input type="text" placeholder="Enter Last Name" name="employeeLastName" value="<?php echo $rowForId["employeeLastName"]; ?>"  required>

		    <label for="employeeAddress"><b>Address</b></label>
		    <input type="text" placeholder="Enter Address" name="employeeAddress" value="<?php echo $rowForId["employeeAddress"]; ?>"  >

		    <label for="employeeEmail"><b>Email</b></label>
		    <input type="email" placeholder="Enter Email" name="employeeEmail" value="<?php echo $rowForId["employeeEmail"]; ?>"  required>
		    <br/>
		    <label for="employeeSalary"><b>Salary</b></label>
		    <input type="text" placeholder="Enter Salary" name="employeeSalary" value="<?php echo $rowForId["employeeSalary"]; ?>"  >
		    <br/>
		    <label for="employeePhoneNumber"><b>phone number</b></label>
		    <input type="number" placeholder="Enter Phone number" name="employeePhoneNumber" value="<?php echo $rowForId["employeePhoneNumber"]; ?>"  >
		    <br/>
		    <label for="employeeDate"><b>Date</b></label>
		    <input type="date" placeholder="Enter Date" name="employeeDate" value="<?php echo $rowForId["employeeDate"]; ?>"  >
		    <br/>
		    <label for="employeeRemark"><b>Note</b></label>
		    <textarea name="employeeRemark" placeholder="Enter Note"><?php echo $rowForId["employeeRemark"]; ?> </textarea> 
		    
		   
	    
	        <div class="clearfix">
		        <a href="../employee.php"><button type="button" class="cancelbtn">Cancel</button></a> 
		        <button type="submit" class="signupbtn" name="edit">Update</button>
		    </div>
		</div>
	</form>
</body>
</html>

<?php 

	if(isset($_POST['edit'])){ //do updated after clicking the edit button to ensure date
		$userId = $_SESSION['userName'];
		$employeeFirstName = $_POST['employeeFirstName'];
		$employeeLastName = $_POST['employeeLastName'];
		$employeeAddress = $_POST['employeeAddress'];
		$employeeEmail = $_POST['employeeEmail'];
		$employeeSalary=$_POST['employeeSalary'];
		$employeePhoneNumber=$_POST['employeePhoneNumber'];
		$employeeDate=$_POST['employeeDate'];
		$employeeRemark=$_POST['employeeRemark'];

		$sql = "UPDATE employee SET userId = '$userId', employeeFirstName = '$employeeFirstName' , employeeLastName ='$employeeLastName' ,  employeeAddress='$employeeAddress', employeeEmail='$employeeEmail' , employeeSalary='$employeeSalary' ,employeePhoneNumber='$employeePhoneNumber' ,employeeDate='$employeeDate', employeeRemark='$employeeRemark' WHERE employeeId = $id";


		$query=$conn->query($sql);


		if ($query) {
		   echo "New record created successfully";
		} else {
		  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		//add header to redirect the pagre into employee page after updated the data 
	}


?>

