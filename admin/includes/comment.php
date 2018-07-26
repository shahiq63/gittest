<?php


class Comment{

	public $id;
	public $photo_id;
	public $author;
	public $body;
	
	public function create_comment($photo_id,$author,$body){

		if(!empty($photo_id) && !empty($author) && !empty($body)){

			$comment = new Comment();

			$comment->photo_id = $photo_id;
			$comment->author = $author;
			$comment->body = $body;

			return $comment;

		}else
		{
			return false;
		}
	}

	public function find_the_comments($photo_id){

		global $database;

		$sql = "SELECT * from comments where photo_id = $photo_id ORDER BY photo_id ASC";

		$result = $database->query($sql);

		return $result;
	}

	public function find_all_comments()
	{
		global $database;
		$sql = "SELECT * FROM comments";
		$result = $database->query($sql);
		return $result;

	}


	public function delete($id)
	{
		global $database;
 		$sql = "DELETE from comments WHERE id = $id";
 		$result = $database->query($sql);
 		return $result;
	}

	public function insert_comments(){

		global $database;

			if(!empty($this->photo_id) && !empty($this->author) && !empty($this->body)){

			$sql = "INSERT INTO comments(photo_id,author,body) values ('$this->photo_id','$this->author','$this->body')";

			$result = $database->query($sql);

			return $result;
		}

	}


}


?>