<?php
	//error_reporting(0);

	require_once __dir__."/header.php";

	//$id = $_SESSION['userName'];
	$id=1;

	
	$sqlForId = "SELECT * FROM employee JOIN user where employee.employeeId = $id ";//check autherized user that use the system
	$resultForId = $conn->query($sqlForId);

    // output data of each rowForId
	$rowForId = $resultForId->fetch_assoc();
?>


<!DOCTYPE html>
<html>
<head>
	<title>Compnay Adminstrator Site</title>
</head>
<body>



	<div class="popup" id="myForm">

	    <form method="post" class="form-container" enctype="multipart/form-data">
		    <h1>Add Post</h1>
		    <label>select file for upload</label> 
	        <input type="file" name="postPicture" required> 
	          
	        <textarea placeholder="Type message.." name="postRemark" > </textarea>
	        <button type="submit" name="upload">Upload</button>
		    <button type="button" class="btn cancel"   onclick="closeForm()">Close</button>
    	</form>
	</div>    
	
	<div class="addPerson" id="add">

		<a href=""><button class="btn-primary" onclick="openForm()">Add +</button></a><!-- fixed location to add supplir button redirect to addition page -->
			
	</div>
	<?php
		if (isset($_POST['upload'])) {

			$companyId = $rowForId['companyId'];
			$userId = $id;
			$postName = "PSOTS";
	 		$postDate = "";
	 		$postRemark = $_POST['postRemark'];

	 		$result=""; 
	 		
	 		$postPicture= "../images/" . $_FILES['postPicture']['name']; //create image path  route the pictures to the outer file under AcccountProject
			$postPicture = mysqli_real_escape_string($conn,$postPicture); //get image to store it in DB

			$Image = $_FILES['postPicture']['name'];
			$ImageExt = explode('.',$Image);
	        $ImgCorrectExt = strtolower(end($ImageExt));
	        $Allow = array('jpg','jpeg','png','gif');

			if(in_array($ImgCorrectExt,$Allow)){ //check if the file uoloaded is picture or not
				if(copy($_FILES['postPicture']['tmp_name'], "$postPicture")){ //copy the image into image folder, before copy see the destination file permission 

					$sql = "INSERT INTO post(companyId , userId , postName ,postPicture, postDate, postRemark)
	 				VALUES ('$companyId' , '$userId', '$postName', '$postPicture', '$postDate', '$postRemark')";

					if(mysqli_query($conn,$sql)){ 
						$result="Image Successfully Uploaded!"; 
					}
					else{ 
						$result="Image Upload failed!".mysqli_error($conn);
					} 
				}
				else{ 
					$result="Image Upload failed! check image forder".mysql_error();
				} 
				echo $result ;
			} 
			else{ 
				$result="Only upload JPG, PNG & GIF Images!"; 
			}
	 		
		}
			

	?>



	<script type="text/javascript">
	    function openForm() {
	        document.getElementById("myForm").style.display = "block";
	        document.getElementById("add").style.display = "none";
	    }

        function closeForm() {
            document.getElementById("myForm").style.display = "none";
            document.getElementById("add").style.display = "all";

        }
    </script>
</body>
</html>