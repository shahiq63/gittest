
<?php require_once ("includes/header.php");  ?>
<?php

	$message="this is not that bad";


	if($session->is_signed_in())
	{
		header("Location: index.php");	
	}

	if(isset($_POST['submit']))
	{
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);

		$user = new User();

		$user_found = $user->verify_user($username,$password);

		if($user_found->id > 0){

			$session->login($user_found);
			header("Location: index.php");

		}
		else
		{
			$message = "UserName or Password is incorrect";
		}


	}


?>

	<div class="col-md-4 col-md-offset-3">

	<h4 class="bg-danger"><?php echo $message; ?></h4>
		
	<form  action="" method="POST">
		
	<div class="form-group">
		<label for="username">Username</label>
		<input type="text" class="form-control" name="username" >

	</div>

	<div class="form-group">
		<label for="password">Password</label>
		<input type="password" class="form-control" name="password">
		
	</div>


	<div class="form-group">
	<input type="submit" name="submit" value="Submit" class="btn btn-primary">

	</div>


	</form>


	</div>