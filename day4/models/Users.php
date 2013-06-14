<?
	class Users extends db{
		public function readUsers(){
			$sql = "SELECT * FROM users ORDER BY userId DESC";
			$result = $this->dbcon->prepare($sql);
			$result->execute();
			$data = $result->fetchAll();
			return $data;
		}
		
		public function readUser($userId){
			$sql = "SELECT * FROM users WHERE userId = ?";
			$result = $this->dbcon->prepare($sql);
			$result->execute(array($userId));
			$data = $result->fetchAll();
			return $data;
		}
		
		public function createUser($userName,$password,$email){
			$sql = "INSERT INTO users(userName,password,email) VALUES(?,?,?)";
			$result = $this->dbcon->prepare($sql);
			$result->execute(array($userName,$password,$email));
		}
		
		public function updateUser($userName,$password,$email,$userId){
			$sql = "UPDATE users SET userName = ?,password = ?,email = ? WHERE userId = ?";
			$result = $this->dbcon->prepare($sql);
			$result->execute(array($userName,$password,$email,$userId));
		}
		
		public function deleteUser($userId){
			$sql = "DELETE FROM users WHERE userId = ?";
			$result = $this->dbcon->prepare($sql);
			$result->execute(array($userId));
		}
	}
	
	//create posts
	//update posts
	//read posts
	//delete posts
?>