<?php
	session_start();

	require('../setup.php');

	
	$id = $_GET['id'];

	$sqlForId = "SELECT * FROM customer WHERE (customer.customerId = $id)";//check autherized user that use the system and who do modifications
	$resultForId = $conn->query($sqlForId);

    // output data of each rowForId
		$rowForId = $resultForId->fetch_assoc();
	
	
?>
<!-- Edit csutomer information -->
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../../CSS/person.css">

</head>
<body>

	<form style="border:1px solid #ccc" method="post">
	    <div class="container">
		    <h1>Edit Customer</h1>
		    <hr>

		    <label for="customerFirstName"><b>First Name</b></label>
		    <input type="text" placeholder="Enter First Name" name="customerFirstName" value="<?php echo $rowForId["customerFirstName"]; ?>" required>

		    <label for="customerLastName"><b>Last Name</b></label>
		    <input type="text" placeholder="Enter Last Name" name="customerLastName" value="<?php echo $rowForId["customerLastName"]; ?>"  required>

		    <label for="customerAddress"><b>Address</b></label>
		    <input type="text" placeholder="Enter Address" name="customerAddress" value="<?php echo $rowForId["customerAddress"]; ?>"  >

		    <label for="customerphoneNumber"><b>Phone Number</b></label>
		    <input type="text" placeholder="Enter Phone Number" name="customerphoneNumber" value="<?php echo $rowForId["customerphoneNumber"]; ?>"  required>
		    <br/>
		    <label for="customerEmail"><b>Email</b></label>
		    <input type="email" placeholder="Enter Email" name="customerEmail" value="<?php echo $rowForId["customerEmail"]; ?>"  >
		    <br/>
		    <label for="customerBalance"><b>Balance</b></label>
		    <input type="number" placeholder="Enter Balance" name="customerBalance" value="<?php echo $rowForId["customerBalance"]; ?>"  >
		    <br/>
		    <label for="customerDate"><b>Date</b></label>
		    <input type="date" placeholder="Enter Date" name="customerDate" value="<?php echo $rowForId["customerDate"]; ?>"  >
		    <br/>
		    <label for="customerRemark"><b>Note</b></label>
		    <textarea name="customerRemark" placeholder="Enter Note"><?php echo $rowForId["customerRemark"]; ?> </textarea> 
		    
		   
	    
	        <div class="clearfix">
		        <a href="../customer.php"><button type="button" class="cancelbtn">Cancel</button></a> 
		        <button type="submit" class="signupbtn" name="edit">Update</button>
		    </div>
		</div>
	</form>
</body>
</html>

<?php 

	if(isset($_POST['edit'])){	//do updated after clicking the edit button to ensure date
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

		$sql = "UPDATE customer SET userId = '$userId', customerFirstName = '$customerFirstName' , customerLastName ='$customerLastName' ,  customerAddress='$customerAddress', customerphoneNumber='$customerphoneNumber' , customerEmail='$customerEmail' ,customerBalance='$customerBalance' ,customerDate='$customerDate', customerRemark='$customerRemark' WHERE customerId = $id";

		$query=$conn->query($sql);


		if ($query) {
		   echo "New record created successfully";
		} else {
		  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

		//add header to redirect the page into customer page after updated
	}


?>

