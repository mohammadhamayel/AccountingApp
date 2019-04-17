<?php
$localhost="localhost";
$userName="mohammad";
$pass="1234";
$db_name="Account";

$conn = mysqli_connect($localhost,$userName,$pass,$db_name); // this page for test insertion different people to the system


if (isset($_POST['submit'])) {

	$name = $_POST['name'];
	$phoneNumber= $_POST['phoneNumber'];
	$livingPlace= $_POST['livingPlace'];
	echo $name . $phoneNumber . $livingPlace;

// add button in people page do this insert query
	$sql = "INSERT INTO user (name , phone , livingPlace)
	VALUES ('$name', '$phoneNumber' ,'$livingPlace')";


	$query=mysqli_query($conn,$sql);


	if ($query) {
	   echo "New record created successfully";
	} else {
	  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

}


?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="../CSS/person.css">
	</head>
	<body>
		<form action="person.php" style="border:1px solid #ccc" method="post">
		    <div class="container">
			    <h1>Add People</h1>
			    <hr>

			    <label for="name"><b>Name</b></label>
			    <input type="text" placeholder="Enter Name" name="name" required>

			    <label for="phoneNumber"><b>Phone Number</b></label>
			    <input type="text" placeholder="Enter Phone Number" name="phoneNumber" required>

			    <label for="livingPlace"><b>Living Place</b></label>
			    <input type="text" placeholder="living place" name="livingPlace" required>
			    
			   
		    
		        <div class="clearfix">
			        <a href="index.php"><button type="button" class="cancelbtn">Cancel</button></a> 
			        <button type="submit" class="signupbtn">Sign Up</button>
			    </div>
			</div>
		</form>
	</body>
</html>
