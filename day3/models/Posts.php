<?
	class Posts extends db{
		public function createPosts($title,$detail){
			$sql = "INSERT INTO post(title,detail) VALUES(?,?)";
			$result = $this->dbcon->prepare($sql);
			$result->execute(array($title,$detail));
		}
		
		public function readPosts(){
			//this is to get all the posts from the post table
			$sql = "SELECT * FROM post";
			$result = $this->dbcon->prepare($sql);
				//two ways to query, prepare and query
				//prepare is used to prevent sql injection
				//query is not as secure
			$result->execute();
			$data = $result->fetchALL();
			return $data;
		}
		
		public function readPost($postid){
			$sql = "SELECT * FROM post WHERE post_id = ?";
			$result = $this->dbcon->prepare($sql);
				//two ways to query, prepare and query
				//prepare is used to prevent sql injection
				//query is not as secure
			$result->execute(array($postid));
			$data = $result->fetchALL();
			return $data;
		}
		
		public function addpost($title,$detail){ //need to make a form, then to catch the values use post
			$sql = "INSERT INTO post (title,detail) VALUES(?,?)";
			$result = $this->dbcon->prepare($sql);
				//two ways to query, prepare and query
				//prepare is used to prevent sql injection
				//query is not as secure
			$result->execute(array($title,$detail));
			$data = $result->fetchALL();
			echo("post added");
		}
	}
	
	//create posts
	//update posts
	//read posts
	//delete posts
?>