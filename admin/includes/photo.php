<?php 


class Photo{

	public $photo_id;
	public $title;
	public $description;
	public $filename;
	public $type;
	public $caption;
	public $alternate_text;
	public $size;

	public $tmp_path;

	public $directory = "uploads";

	public function find_all_photos(){

		return $this->checkquery("SELECT * from photos");
	}
	public function find_photo_by_id($photo_id){

		return $this->checkquery("SELECT * from photos WHERE photo_id = $photo_id");

	}

	public function delete($id)
	{
		return $this->checkquery("DELETE from photos WHERE photo_id = $id");
	}

	public function update($id)
	{
		

		$sql ="UPDATE photos SET title = '$this->title',description = '$this->description',filename = '$this->filename',type = '$this->type',caption = '$this->caption',alternate_text = '$this->alternate_text' ,size = '$this->size' WHERE photo_id = $id";

		return $this->checkquery($sql);

	

	}


	public function checkquery($query){
			global $database;

			$getres = $database->query($query);

			return $getres;

	}

		public function create($file)
	{

		global $database;	

		$this->filename = $file['name'];

		$filen = $this->filename;
		$this->tmp_path = $file['tmp_name'];
		$this->type = $file['type'];
		$this->size = $file['size'];
		$this->title ="new";
		$this->description = "This is new uploaded photo";
		$this->caption = "Caption";
		$this->alternate_text = "Alternate Text";

		$sql = "INSERT INTO photos (title, description , filename , caption , alternate_text , type , size) VALUES ('$this->title','$this->description','$this->filename','$this->caption','$this->alternate_text','$this->type','$this->size')";

		if ($database->query($sql) && move_uploaded_file($this->tmp_path,"includes/uploads" .'/'.$filen)) {

			return true;

		}
		else
		{
			return false;
		}


	}




}


 ?>