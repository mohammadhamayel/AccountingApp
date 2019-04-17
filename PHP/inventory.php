<?php
	require('header.php');


$sql = "SELECT * FROM inventory";//invoke inventory information from DB
$result = $conn->query($sql);

	
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
	<h2>	Inventory</h2>
	<!-- depends on inventory name if it exists in DB for inventoryh table just add the amount to that inventory and if need to update new price ... if not add this all -->
	<table><!-- add inventory cost to this table  -->
		<tr>
		    <th>Name</th>
		    <th>Number</th>
		    <th>Selling Price</th>
		    <th>Date</th>
		    <th>Notes</th>
		    <th>Modifications</th>
		</tr>

		<?php if ($result->num_rows > 0) {   while($row = $result->fetch_assoc()) { ?><!-- display inventory information -->
		<tr>
		    <td><?php echo $row["inventoryName"] ;?></td>
		    <td><?php echo $row["numberOfInventory"] ; ?></td>
		    <td><?php echo $row["inventorySellingPrice"]; ?></td>
		    <td><?php echo $row["inventoryDate"]; ?></td>
		    <td><?php echo $row["inventoryRemark"]; ?></td>
		    <td><a href="goods/inventoryEdit.php?id=<?= $row['inventoryId'];?>"><button>Edit </button></a> </td>  <!-- run popup form to edit specific user --> 

		</tr>	

		<?php } } else echo "result 0"?>

		<tr>
		    <td>Jill</td>
		    <td>Smith</td>
		    <td>50</td>
		    <td>Jill</td>
		    <td>Smith</td>
		    <td>Extra for delete</td>
		</tr>
	</table>

	<div class="addPerson">

		<a href="goods/createInventory.php"><button class="btn-primary">Add +</button></a><!-- fixed location to add supplir button redirect to addition page -->
			
	</div>
</body>
</html>

<?php 


?>
