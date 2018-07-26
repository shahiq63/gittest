
<?php require_once ("includes/init.php");  ?>
<?php


if(!$session->is_signed_in())
{

    header("Location: login.php");


}

?>
<?php


$comments = new Comment();

if($comments->delete($_GET['id']))
{
	//echo "Item removed from database";
	header("Location: comments.php");
}
else
{
	echo "Error in Removing item";
}






?>