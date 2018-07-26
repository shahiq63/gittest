<?php 


class Session{


	private $signedin = false;

	public $userid;

	function __construct(){

		session_start();

		$this->check_the_login();

	}

	public function is_signed_in(){

		return $this->signedin;


	}

	public function login($user )
	{

		if($user)
		{
			$this->userid = $_SESSION['userid'] = $user->id;
			$this->signedin = true;
		}
	}


	public function logout(){

		unset($_SESSION['userid']);
		unset($this->userid);
		$this->signedin = false;

	}


	private function check_the_login(){


		if(isset($_SESSION['userid']))
		{

			$this->userid = $_SESSION['userid'];
			$this->signedin = true;

		}
		else
		{
			unset($this->userid);
			$this->signedin = false;

		}

	}
}

$session = new Session();


 ?>