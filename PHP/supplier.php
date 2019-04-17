<?php

require_once "header.php";

$sql = "SELECT * FROM supplier";//invoke suppliers information from DB
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Suppliers Information</title>

</head>
<body>
	<h2>	Suppliers</h2>
	<table>
		<tr>
		    <th>Name</th>
		    <th>Address</th>
		    <th>phone Number</th>
		    <th>Email</th>
		    <th>Balance</th>
		    <th>Date</th>
		    <th>Remark</th>
		    <th>Modifications</th>
		</tr>

<?php if ($result->num_rows > 0) {   while($row = $result->fetch_assoc()) { ?>
		<tr>
		    <td><?php echo $row["supplierFirstName"] ." " .$row["supplierLastName"] ;?></td>
		    <td><?php echo $row["supplierAddress"] ;?></td>
		    <td><?php echo $row["supplierPhoneNumber"] ;?></td>
		    <td><?php echo $row["supplierEmail"] ; ?></td>
		    <td><?php echo $row["suppplierBalance"]; ?></td>
		    <td><?php echo $row["supplierDate"]; ?></td>
		    <td><?php echo $row["supplierRemark"]; ?></td>
		    <td><a href="persons/supplierEdit.php?id=<?= $row['supplierId'];?>"><button>Edit </button></a> </td>  <!-- run popup form to edit specific user --> 

		</tr>	

<?php } } else echo "result 0"?>

		<tr>
		    <td>Jill</td>
		    <td>Smith</td>
		    <td>50</td>
		    <td>Jill</td>
		    <td>Smith</td>
		    <td>50</td>
		    <td>mm</td>
		    <td>Extra for delete</td>
		</tr>
	</table>
	<div class="addPerson">

		<a href="persons/createSupplier.php"><button class="btn-primary">Add +</button></a><!-- fixed location to add supplir button redirect to addition page -->
			
	</div>
</body>
</html>
