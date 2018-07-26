<?php 
require_once ("new_config.php");
class Database {

	public $connection;

	function __construct(){

		$this->dbconnection();

	}

	public function dbconnection()
	{
		$this->connection = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

		

		if($this->connection)
		{

//			echo "Database connected";
		}
		else
		{
			die("ERROR") ;
		}

	}

	public function query($query){

//		$res = mysqli_query($this->connection,$query);

		$res =$this->connection->query($query);

		return $res;

	}

	private function confirmquery()
	{
		if(!$res)
		{

			die("Error Found in Query");
		}
	}

	public function escapestring($string){

          $escape = $this->connection->real_escape_string($string);


          return $escape;
	}

	public function insertid()
	{

		return $this->connection->insert_id;

	}

	public function the_insert_id(){
		return mysqli_insert_id($this->connection);
	}
}


$database = new Database();


 ?>


