<?php
	class Posts extends db{
		public function readPosts(){
			$sql = "SELECT * FROM post ORDER BY postId DESC";
			$result = $this->dbcon->prepare($sql);
			$result->execute();
			$data = $result->fetchAll();
			return $data;
		}
		
		public function readPost($postId){
			$sql = "SELECT * FROM post WHERE postId = ?";
			$result = $this->dbcon->prepare($sql);
			$result->execute(array($postId));
			$data = $result->fetchAll();
			return $data;
		}
		
		public function createPost($title,$detail,$postId){
			$sql = "INSERT INTO post(title,detail,postId) VALUES(?,?,?)";
			$result = $this->dbcon->prepare($sql);
			$result->execute(array($title,$detail,$postId));
		}
		
		public function updatePost($title,$detail,$postId){ //may need to add userId here
			$sql = "UPDATE post SET title = ?, detail = ? WHERE postId = ?";
			$result = $this->dbcon->prepare($sql);
			$result->execute(array($title,$detail,$postId));
		}
		
		public function deletePost($postId){
			$sql = "DELETE FROM post WHERE postId = ?";
			$result = $this->dbcon->prepare($sql);
			$result->execute(array($postId));
		}
	}
	
	//create posts
	//update posts
	//read posts
	//delete posts
?>