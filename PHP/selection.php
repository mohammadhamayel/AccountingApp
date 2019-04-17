<?php


$localhost="localhost";
$userName="mohammad";
$pass="1234";
$db_name="Account";

$conn = mysqli_connect($localhost,$userName,$pass,$db_name);


/*$sql = "SELECT * FROM company where Cid= '1' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br>  ". $row["name"]. "   address : " . $row["address"] . "<br>";
    }
} else {
    echo "0 results";
}*/
//--------------------------------------------------------------------------------------------
/*$sql = "SELECT * FROM user  join company on user.Cid = company.Cid ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br>  name : " . $row["Fname"] . "  " . $row["lname"] . " ////  address:	" . $row["address"] . "   phone: "   .  $row["phone"] . "  email : " . $row["email"] . " ----- company name: " . $row["name"] . "  address : " . $row["address"] . "<br>";
    }
} else {
    echo "0 results";
}*/
//--------------------------------------------------------------------------------------------
/*$sql = "SELECT * FROM company join user where (company.companyID = user.companyID)";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br> " . " company name: " . $row["companyName"] . "  Company address : " . $row["companyAddress"]. " ---- userName : " . $row["userFirstName"] . "  " . $row["userLastName"] . "   address:	" . $row["userAddress"] . "   phone: "   .  $row["userPhoneNumber"] . "  email : " . $row["userEmail"]  . "<br>";
    }
} else {
    echo "0 results";
}*/
//--------------------------------------------------------------------------------------------
/*$sql = "SELECT * FROM customer";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br> " . " user name: " . $row["customerFirstName"] . $row["customerLastName"]. " ---- Address : " . $row["customerAddress"] . " ----- phone " . $row["customerphoneNumber"] .  "   email: "   .  $row["customerEmail"] . "  balance : " . $row["customerBalance"]  . "<br>";
    }
} else {
    echo "0 results";
}*/
//--------------------------------------------------------------------------------------------
/*$sql = "SELECT * FROM supplier";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br> " . " supplier name: " . $row["supplierFirstName"] . $row["supplierLastName"]. " ---- Address : " .  " ----- phone " . $row["supplierPhoneNumber"] .  "   email: "   .  $row["supplierEmail"] . "  balance : " . $row["suppplierBalance"]  . "<br>";
    }
} else {
    echo "0 results";
}*/
//--------------------------------------------------------------------------------------------
/*$sql = "SELECT * FROM employee";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br> " . " user name: " . $row["employeeFirstName"] ." ". $row["employeeLastName"]. " ---- Address : " . $row["employeeAddress"] . " ----- phone " . $row["employeePhoneNumber"] .  "   email: "   .  $row["employeeEmail"] . "  balance : " . $row["employeeSalary"]  . "<br>";
    }
} else {
    echo "0 results";
}*/

$sqlForId = "SELECT * FROM employee JOIN user where employee.employeeId = user.employeeId ";

$result = $conn->query($sqlForId);




if ($result->num_rows > 0) {
    // output data of each row
	    $row = $result->fetch_assoc();
	    echo $row["companyId"];
	    
	} else {
	    echo "0 results";
	}