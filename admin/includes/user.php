<?php


class User{

	public $id;
	public $username;
	public $password;
	public $firstname;
	public $lastname;
	public $filename;

	public function find_all_user(){

		return $this->checkquery("SELECT * from users");
	}
	public function find_user_by_id($userid){

		return $this->checkquery("SELECT * from users WHERE id = $userid");

	}

	public function delete($id)
	{
		return $this->checkquery("DELETE from users WHERE id = $id");
	}


	public function checkquery($query){
			global $database;

			$getres = $database->query($query);

			return $getres;

	}

	public  function verify_user($username,$password)
	{
		global $database;

		 $username = $database->escapestring($username);



		 $password = $database->escapestring($password);

		 $sql = "SELECT * from users WHERE username='{$username}' AND password='{$password}'";

		 $result = $this->checkquery($sql);
		 

		 $resarr = mysqli_fetch_assoc($result);

		  $user1 = new User();

          $user1->id = $resarr['id'];

          $user1->username = $resarr['username'];
                        
          $user1->password = $resarr['password'];

          $user1->firstname = $resarr['firstname'];

          $user1->lastname =  $resarr['lastname'];


		 return $user1;
		 


	}


		public function create($file)
	{

		global $database;	

		$this->filename = $file['name'];

		$filen = $this->filename;

		$tmp_path = $file['tmp_name'];

		$sql = "INSERT INTO users (filename,username,password,firstname,lastname) VALUES ('$this->filename','$this->username','$this->password','$this->firstname','$this->lastname')";

		if ($database->query($sql) && move_uploaded_file($tmp_path,"includes/uploads" .'/'.$filen)) {

			return true;

		}
		else
		{
			return false;
		}


	}


	public function update($id){

		global $database;
		$sql = "UPDATE users SET filename ='$this->filename',username ='$this->username',password='$this->password',firstname='$this->firstname',lastname='$this->lastname' WHERE id = $id";

		if ($database->query($sql)) {
			return true;
		}
		else{
			return false;
		}



	}




}


?>