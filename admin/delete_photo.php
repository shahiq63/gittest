
<?php require_once ("includes/init.php");  ?>
<?php


if(!$session->is_signed_in())
{

    header("Location: login.php");


}

?>
<?php

$photo = new Photo();

if($photo->delete($_GET['id']))
{
	//echo "Item removed from database";
	header("Location: photos.php");
}
else
{
	echo "Error in Removing item";
}






?>