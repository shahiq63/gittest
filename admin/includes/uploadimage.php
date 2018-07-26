<?php include ("init.php");  ?>

<?php 

	$test="";

if(isset($_POST['Submit']))
{


	$photos = new Photo();


	if ($photos->create($_FILES['file_upload'])) {
	
		$test = "File uploaded successfully";

	}
	else
	{
		$test ="Error in uploading file";
	}
	
}


 ?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<form action="uploadimage.php" enctype="multipart/form-data" method="post">

	<input type="file" name="file_upload" required>


	<br>
	<input type="submit" name="Submit">
	<br>

	<p>
		<?php echo $test;  ?>

	</p>


</form>

</body>
</html>