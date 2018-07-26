
<?php require_once ("includes/init.php");  ?>
<?php


if(!$session->is_signed_in())
{

    header("Location: login.php");


}

?>
<?php

$user = new User();

if($user->delete($_GET['id']))
{
	header("Location: users.php");
}
else
{
	echo "Error in Removing item";
}

?>