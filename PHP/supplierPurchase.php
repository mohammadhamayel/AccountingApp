<?php
	require('setup.php');	
	require('header.php');
	
?>
<!-- this file connect with suoPurchase DB that connect wtih supplier to track the inventory from supplier and after recive this inventry can add it to inventory table DB which connected with this table in DB -->
<!-- Add new eemployee to the system database -->
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../CSS/person.css">

</head>
<body>

	<form style="border:1px solid #ccc" method="post">
	    <div class="container">
		    <h1>Add Goods</h1>
		    <hr>
		    <!-- need to method to identify supplierId  -->

		    <label for="supplierName"><b>Supplier Name</b></label>


		    <?php   $sqlsup = "SELECT * FROM supplier";//invoke suppliers information from DB
				    $result = $conn->query($sqlsup);?>
		    <select name="supplierName" required>
		    	<?php if ($result->num_rows > 0) {   while($row = $result->fetch_assoc()) { ?>
		    	<option <?php $idSupplier = $row['supplierId'];?> > <?php echo $row["supplierFirstName"] ." " .$row["supplierLastName"] ;?> </option>
		    	<?php } } else echo "result 0"?>

		    </select>

		    <br/>
		    <label for="supplierPurchaseName"><b>Goods Name</b></label>
		    <input type="text" placeholder="Enter Goods Name" name="supplierPurchaseName" required>

		    <br/>
		    <label for="numberOfSupplierPurchase"><b>Amount</b></label>
		    <input type="text" placeholder="Enter Amount" name="numberOfSupplierPurchase"   required>
		    
		    <br/>
		    <label for="supplierPurchasePrice"><b>Price</b></label>
		    <input type="number" placeholder="Enter Price" name="supplierPurchasePrice"   >
		    <br/>

		    <label><b>Deleviered</b></label>
		    <input type="radio" name="supplierPurchaseDelivered" value="yes">Yes <!-- determine if the goods devilerved or not -->
			<input type="radio" name="supplierPurchaseDelivered" value="no">No
		    <br/>
		    <br/>
		    <label for="supplierPurchaseDate"><b>Date</b></label>
		    <input type="date" placeholder="Enter Date" name="supplierPurchaseDate"   >
		    <br/>
		    <label for="supplierPurchaseRemark"><b>Note</b></label>
		    <textarea name="supplierPurchaseRemark" placeholder="Enter Note"> </textarea> 
		    
		   
	    
	        <div class="clearfix">
		        <a href="../employee.php"><button type="button" class="cancelbtn">Cancel</button></a> 
		        <button type="submit" class="signupbtn" name="create">Add</button>
		    </div>
		</div>
	</form>
</body>
</html>

<?php 

	if(isset($_POST['create'])){ //do updated after clicking the edit button to ensure date

		/*select supplierId by split supplier name and find his Id be searching first result of Fisrt && Last Name*/

		$supplierId= "1"; //get comapnyId and userId form sessions just after make login
		$userId = $_SESSION['userName'];
		$supplierName = $_POST['supplierName'];
		$supplierPurchaseName = $_POST['supplierPurchaseName'];
		$numberOfSupplierPurchase = $_POST['numberOfSupplierPurchase'];
/*		$supplierPurchaseDelivered = $_POST['supplierPurchaseDelivered']; add this to query after extract checkbox value
*/		$supplierPurchaseDate = $_POST['supplierPurchaseDate'];
		$supplierPurchasePrice = $_POST['supplierPurchasePrice'];
		$supplierPurchaseRemark=$_POST['supplierPurchaseRemark'];
		

		$sql = "INSERT INTO supPruchased (supplierId ,userId, supplierName , supplierPurchaseName , numberOfSupplierPurchase  , supplierPurchaseDelivered ,  supplierPurchaseDate , supplierPurchasePrice , supplierPurchaseRemark )
			VALUES ('$supplierId' , '$userId ' , '$supplierName' , '$supplierPurchaseName' ,'$numberOfSupplierPurchase' ,'1' ,'$supplierPurchaseDate', '$supplierPurchasePrice', '$supplierPurchaseRemark')";

		$query=$conn->query($sql);

		if ($query) {
		   echo "New record created successfully";
		} else {
		  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		//add header to redirect the pagre into employee page after updated the data 
	}


?>
