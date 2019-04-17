<?php


$localhost="localhost";
$userName="mohammad";
$pass="1234";
$db_name="Account";

$conn = mysqli_connect($localhost,$userName,$pass,$db_name);

/*$sql = "INSERT INTO company (name , address , remark)
	VALUES ('projiner' , 'ain mespah' , '' )";*/
	//----------------------------------------------------------------------------------------------------------
/*$sql = "INSERT INTO employee (companyId ,userId, employeeFirstName , employeeLastName ,  employeeAddress , employeeEmail)
	VALUES ('1' , '1' , 'RAMIZ' ,'ali' , 'ram', 'a@a.com')";*/
	//___________________________________________________________________---------------------------------------

/*$sql = "INSERT INTO user (employeeId ,  userPassword )
	VALUES ('1' ,'222')";*/
	//----------------------------------------------------------------------------------------------------------

/*$sql = "INSERT INTO customer (Cid , Uid , Fname , lname ,  address , phone , email ,balance, remark)
	VALUES ('1' ,'1' , 'essa' ,'ali' , 'ram', '832742' , 'a@a.com' , '0' ,'')";*/
	//----------------------------------------------------------------------------------------------------------

/*$sql = "INSERT INTO CusPurchase (Cid , Uid , inventiryName , numberOfInv , price, remark)
	VALUES ('1' ,'1' , 'coca' ,'6' , '7' ,'')";*/
	//----------------------------------------------------------------------------------------------------------
/*
$sql = "INSERT INTO cusPayment (Cid , Uid , amount, remark)
	VALUES ('1' ,'1' ,'799' ,'')";*/
	//----------------------------------------------------------------------------------------------------------

/*$sql = "INSERT INTO customer (companyId, userId, customerFirstName, customerLastName, customerAddress, customerphoneNumber, customerEmail,customerBalance )
	VALUES ('1' ,'1', 'essa' , 'ali','Ramallah', '3562356' ,'a@m.com','1000')";*/
	//----------------------------------------------------------------------------------------------------------

/*$sql = "INSERT INTO supplier (companyId, userId, supplierFirstName, supplierLastName, supplierPhoneNumber, supplierEmail, suppplierBalance )
	VALUES ('1' ,'1', 'mario' , 'immad','99999999' ,'r@m.com','400')";*/
//----------------------------------------------------------------------------------------------------------


	/*$query=mysqli_query($conn,$sql);


	if ($query) {
	   echo "New record created successfully";
	} else {
	  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}*/
//----------------------------------------------------------------------------------------------------------
	// update query
	
	/*$sql = "UPDATE customer SET customerFirstName = 'Ali' , customerLastName ='mmmmmm' ,  customerAddress='Ram', customerphoneNumber='425235235' , customerEmail='a@a.com' ,customerBalance='0' ,customerDate='', customerRemark='' WHERE customerId = 1";

		$query=$conn->query($sql);


		if ($query) {
		   echo "New record created successfully";
		} else {
		  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}*/

	$sqlForId = "SELECT * FROM inventory where (inventory.inventoryName= 'Packet Water')";
	$resultForId = $conn->query($sqlForId);
	if ($resultForId->num_rows == 1) {
    // output data of each row
		echo $resultForId->num_rows;
	   while ($rowId = $resultForId->fetch_assoc()) {
	    	
	    	echo $rowId["inventoryName"]. '</br>';
	    } 
	    
	    
	} else {
	    echo "0 results";
	}

echo "</br>";

	$sql = "UPDATE inventory SET numberOfInventory='5', inventorySellingPrice = ' 14' , inventoryDate= '', inventoryRemark='momomomo' ";

	$query=$conn->query($sql);


		if ($query) {
		   echo "updated";
		} else {
		  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}