<?php
	session_start();

	require('../setup.php');

	
	$id = $_GET['id'];

	$sqlForId = "SELECT * FROM supplier WHERE (supplier.supplierId = $id)";//check autherized user that use the system and who do modifications
	$resultForId = $conn->query($sqlForId);

    // output data of each rowForId
		$rowForId = $resultForId->fetch_assoc();
	
	
?>
<!-- this page for edit supplier information in DB -->
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../../CSS/person.css">

</head>
<body>

	<form style="border:1px solid #ccc" method="post">
	    <div class="container">
		    <h1>Edit Supplier</h1>
		    <hr>

		    <label for="supplierFirstName"><b>First Name</b></label>
		    <input type="text" placeholder="Enter First Name" name="supplierFirstName" value="<?php echo $rowForId["supplierFirstName"]; ?>" required>

		    <label for="supplierLastName"><b>Last Name</b></label>
		    <input type="text" placeholder="Enter Last Name" name="supplierLastName" value="<?php echo $rowForId["supplierLastName"]; ?>"  required>

		    <label for="supplierAddress"><b>Address</b></label>
		    <input type="text" placeholder="Enter Address" name="supplierAddress" value="<?php echo $rowForId["supplierAddress"]; ?>"  >

		    <label for="supplierPhoneNumber"><b>Phone Number</b></label>
		    <input type="text" placeholder="Enter Phone Number" name="supplierPhoneNumber" value="<?php echo $rowForId["supplierPhoneNumber"]; ?>"  required>
		    <br/>
		    <label for="supplierEmail"><b>Email</b></label>
		    <input type="email" placeholder="Enter Email" name="supplierEmail" value="<?php echo $rowForId["supplierEmail"]; ?>"  >
		    <br/>
		    <label for="suppplierBalance"><b>Balance</b></label>
		    <input type="number" placeholder="Enter Balance" name="suppplierBalance" value="<?php echo $rowForId["suppplierBalance"]; ?>"  >
		    <br/>
		    <label for="supplierDate"><b>Date</b></label>
		    <input type="date" placeholder="Enter Date" name="supplierDate" value="<?php echo $rowForId["supplierDate"]; ?>"  >
		    <br/>
		    <label for="supplierRemark"><b>Note</b></label>
		    <textarea name="supplierRemark" placeholder="Enter Note"><?php echo $rowForId["supplierRemark"]; ?> </textarea> 
		    
		   
	    
	        <div class="clearfix">
		        <a href="../supplier.php"><button type="button" class="cancelbtn">Cancel</button></a> 
		        <button type="submit" class="signupbtn" name="edit">Update</button>
		    </div>
		</div>
	</form>
</body>
</html>

<?php 

	if(isset($_POST['edit'])){	//do updated after clicking the edit button to ensure date
		$userId = $_SESSION['userName'];
		$supplierFirstName = $_POST['supplierFirstName'];
		$supplierLastName = $_POST['supplierLastName'];
		$supplierAddress = $_POST['supplierAddress'];
		$supplierPhoneNumber = $_POST['supplierPhoneNumber'];
		$supplierEmail=$_POST['supplierEmail'];
		$suppplierBalance=$_POST['suppplierBalance'];
		$supplierDate=$_POST['supplierDate'];
		$supplierRemark=$_POST['supplierRemark'];

		$sql = "UPDATE supplier SET userId = '$userId', supplierFirstName = '$supplierFirstName' , supplierLastName ='$supplierLastName' ,  supplierAddress='$supplierAddress', supplierPhoneNumber='$supplierPhoneNumber' , supplierEmail='$supplierEmail' ,suppplierBalance='$suppplierBalance' ,supplierDate='$supplierDate', supplierRemark='$supplierRemark' WHERE supplierId = $id";

		$query=$conn->query($sql);


		if ($query) {
		   echo "New record created successfully";
		} else {
		  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}


?>

