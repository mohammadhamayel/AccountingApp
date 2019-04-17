<?php

$localhost="localhost";
$userName="mohammad";
$pass="1234";
$db_name="Account";

$conn = mysqli_connect($localhost,$userName,$pass,$db_name);

/*if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully" . "</br>" ; */

/*if(isset($_POST['submit'])){

$uesrId = $_POST['uname'];
$pass= $_POST['psw'];


$sql = "INSERT INTO signin (userId , pass)
VALUES ('$uesrId', '$pass')";


$query=mysqli_query($conn,$sql);


if ($query) {
   echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

}*/

 
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../CSS/login.css"> 

</head>
<body>
  <h1><?php if( !empty( $_REQUEST['Message'] ) ) //capture message to ask user do login if he not, this occure when redirect to login page from other pages
{
    echo sprintf( '<p>%s</p>', $_REQUEST['Message'] );
}  ?> </h1>

<h2>Login Form</h2>
<!-- action="check.php" -->
<form  method="post">
  <div class="imgcontainer">
    <img src="img_avatar2.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="userName"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="userName" required>

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
        
    <a href="index.php"><button type="submit" name="submit">Login</button></a> 
    <!-- <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label> -->
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">Forgot <a href="#">password?</a></span> <!-- add feature to send the password to user email just if the email exist in system database -->
  </div>
</form>

</body>
</html>
