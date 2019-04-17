<?php
	session_start();

	require('../setup.php');	
	
?>
<!-- Add new eemployee to the system database -->
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../../CSS/person.css">

</head>
<body>

	<form style="border:1px solid #ccc" method="post">
	    <div class="container">
		    <h1>Add Employee</h1>
		    <hr>

		    <label for="employeeFirstName"><b>First Name</b></label>
		    <input type="text" placeholder="Enter First Name" name="employeeFirstName" required>

		    <label for="employeeLastName"><b>Last Name</b></label>
		    <input type="text" placeholder="Enter Last Name" name="employeeLastName"   required>

		    <label for="employeeAddress"><b>Address</b></label>
		    <input type="text" placeholder="Enter Address" name="employeeAddress"  >

		    <label for="employeeEmail"><b>Email</b></label>
		    <input type="email" placeholder="Enter Email" name="employeeEmail"  required>
		    <br/>
		    <label for="employeeSalary"><b>Salary</b></label>
		    <input type="text" placeholder="Enter Salary" name="employeeSalary"  >
		    <br/>
		    <label for="employeePhoneNumber"><b>phone number</b></label>
		    <input type="number" placeholder="Enter Phone number" name="employeePhoneNumber"   >
		    <br/>
		    <label for="employeeDate"><b>Date</b></label>
		    <input type="date" placeholder="Enter Date" name="employeeDate"   >
		    <br/>
		    <label for="employeeRemark"><b>Note</b></label>
		    <textarea name="employeeRemark" placeholder="Enter Note"> </textarea> 
		    
		   
	    
	        <div class="clearfix">
		        <a href="../employee.php"><button type="button" class="cancelbtn">Cancel</button></a> 
		        <button type="submit" class="signupbtn" name="create">New Employee</button>
		    </div>
		</div>
	</form>
</body>
</html>

<?php 

	if(isset($_POST['create'])){ //do updated after clicking the edit button to ensure date
		$companyId= $_SESSION['CompanyId']; //get comapnyId and userId form sessions just after make login
		$userId = $_SESSION['userName'];
		$employeeFirstName = $_POST['employeeFirstName'];
		$employeeLastName = $_POST['employeeLastName'];
		$employeeAddress = $_POST['employeeAddress'];
		$employeeEmail = $_POST['employeeEmail'];
		$employeeSalary=$_POST['employeeSalary'];
		$employeePhoneNumber=$_POST['employeePhoneNumber'];
		$employeeDate=$_POST['employeeDate'];
		$employeeRemark=$_POST['employeeRemark'];

		$sql = "INSERT INTO employee (companyId ,userId, employeeFirstName , employeeLastName ,  employeeAddress , employeeEmail , employeeSalary ,employeePhoneNumber, employeeDate, employeeRemark)
			VALUES ('$companyId' , '$userId ' , '$employeeFirstName' ,'$employeeLastName' , '$employeeAddress', '$employeeEmail', '$employeeSalary', '$employeePhoneNumber' ,'$employeeDate', '$employeeRemark')";


		$query=$conn->query($sql);


		if ($query) {
		   echo "New record created successfully";
		} else {
		  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		//add header to redirect the pagre into employee page after updated the data 
	}


?>
