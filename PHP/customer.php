<?php

require_once __dir__."/header.php";

$sql = "SELECT * FROM customer";  //invoke customer information from DB
$result = $conn->query($sql);

$currentId;

?>

<!DOCTYPE html>
<html>
<head>
	<title>Customers Information</title> <!-- display customer information -->

</head>
<body>
	<h2>	Customers</h2>
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
		    <td><?php echo $row["customerFirstName"] ." " .$row["customerLastName"] ;?></td>
		    <td><?php echo $row["customerAddress"] ;?></td>
		    <td><?php echo $row["customerphoneNumber"] ;?></td>
		    <td><?php echo $row["customerEmail"] ; ?></td>
		    <td><?php echo $row["customerBalance"]; ?></td>
		    <td><?php echo $row["customerDate"]; ?></td>
		    <td><?php echo $row["customerRemark"]; ?></td>
		    <td><a href="persons/customerEdit.php?id=<?= $row['customerId'];?>"><button>Edit </button></a> </td>  <!-- run popup form to edit specific user --> 

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

		<a href="persons/createCustomer.php"><button class="btn-primary">Add +</button></a> <!-- fixed location for Add customer button -->
			
	</div>	

</body>
</html>
