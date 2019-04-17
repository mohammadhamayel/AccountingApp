<?php

require_once "header.php";

$sql = "SELECT * FROM employee";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Employees Information</title>

</head>
<body>
	<h2>	Employees</h2>
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
		    <td><?php echo $row["employeeFirstName"] ." " .$row["employeeLastName"] ;?></td>
		    <td><?php echo $row["employeeAddress"] ;?></td>
		    <td><?php echo $row["employeePhoneNumber"] ;?></td>
		    <td><?php echo $row["employeeEmail"] ; ?></td>
		    <td><?php echo $row["employeeSalary"]; ?></td>
		    <td><?php echo $row["employeeDate"]; ?></td>
		    <td><?php echo $row["employeeRemark"]; ?></td>
		    <td><a href="persons/employeeEdit.php?id=<?= $row['employeeId'];?>"><button>Edit </button></a> </td>  <!-- run popup form to edit specific user --> 

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

		<a href="persons/createEmployee.php"><button class="btn-primary">Add +</button></a>
			
	</div>
</body>
</html>
