<?php
	require('../setup.php');	

	
?>
<!-- this file connect with suoPurchase DB that connect wtih supplier to track the inventory from supplier and after recive this inventry can add it to inventory table DB which connected with this table in DB -->
<!-- Add new eemployee to the system database -->
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../../CSS/person.css">

</head>
<body>
	<!-- depends on inventory name if it exists in DB for inventoryh table just add the amount to that inventory and if need to update new price ... if not add this all -->

	<form style="border:1px solid #ccc" method="post">
	    <div class="container">
		    <h1>Add Inventory</h1>
		    <hr>

		    <label for="inventoryName"><b>inventory Name</b></label>
		    <?php   $sqlsup = "SELECT * FROM supPruchased";//invoke suppliers information from DB
				    $result = $conn->query($sqlsup);?>
		    <select name="inventoryName" required>
		    	<?php if ($result->num_rows > 0) {   while($row = $result->fetch_assoc()) { ?>
		    	<option> <?php echo $row["supplierPurchaseName"] ;?> </option> <!-- just select names without redundancy change this selextion type to advance one-->
		    	<?php } } else echo "result 0"?>

		    </select>

		    <br/>
		    <label for="numberOfInventory"><b>number Of Inventory</b></label> <!-- user who enter this to meet the number of inventory in the store -->
		    <input type="number" placeholder="Enter numberOfInventory" name="numberOfInventory"   required>

		    <label for="inventorySellingPrice"><b>Price</b></label>
		    <input type="text" placeholder="Enter Selling Price" name="inventorySellingPrice"  >

		    <label for="inventoryDate"><b>Date</b></label>
		    <input type="date" placeholder="Enter Date" name="inventoryDate"   >
		    <br/>
		    <label for="inventoryRemark"><b>Note</b></label>
		    <textarea name="inventoryRemark" placeholder="Enter Note"> </textarea> 
		    
		   
	    
	        <div class="clearfix">
		        <a href="../inventory.php"><button type="button" class="cancelbtn">Cancel</button></a> 
		        <button type="submit" class="signupbtn" name="create">New Record</button>
		    </div>
		</div>
	</form>

</body>
</html>

<?php 

	if(isset($_POST['create'])){ //create after clicking the edit button to ensure date
		$supplierPurchaseId= "1"; //get supplierPurchaseId by selecting inventory name from DB and get the fist one 
		$userId = $_SESSION['userName']; //userId form sessions just after make login
		$inventoryName = $_POST['inventoryName'];
		$numberOfInventory = $_POST['numberOfInventory'];
		$inventorySellingPrice = $_POST['inventorySellingPrice'];
		$inventoryDate=$_POST['inventoryDate'];
		$inventoryRemark=$_POST['inventoryRemark'];

		$sqlForCheckName = "SELECT * FROM inventory WHERE (inventory.inventoryName =  '$inventoryName')";
		$resultForCheck = $conn->query($sqlForCheckName);

		
		if ($resultForCheck->num_rows == 1) {
			$rowCheck = $resultForCheck->fetch_assoc();
			$newInventoryAmount = $rowCheck['numberOfInventory']+$numberOfInventory ; //add current number with new number
			$newPrice = $rowCheck['inventorySellingPrice'];
			$newRemark = $rowCheck['inventoryRemark'];
			if($_POST['inventorySellingPrice'] != null) $newPrice = $inventorySellingPrice;//if don't have value no chancges
			if($_POST['inventoryRemark'] != null) $newRemark = $inventoryRemark; //if don't have value no chancges

			$sql = "UPDATE inventory SET numberOfInventory='$newInventoryAmount', inventorySellingPrice = ' $newPrice' , inventoryDate= '$inventoryDate', inventoryRemark='$inventoryRemark' ";
		}
		else {
			$sql = "INSERT INTO inventory (supplierPurchaseId ,userId, inventoryName , numberOfInventory ,  inventorySellingPrice , inventoryDate, inventoryRemark)
			VALUES ('$supplierPurchaseId' , '$userId ' , '$inventoryName' ,'$numberOfInventory' , '$inventorySellingPrice', '$inventoryDate', '$inventoryRemark')";
		}

		$query=$conn->query($sql);


		if ($query) {
		   echo "New record created successfully";
		} else {
		  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		//add header to redirect the pagre into employee page after updated the data if need 
	}


?>
