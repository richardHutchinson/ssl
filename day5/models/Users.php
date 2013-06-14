<?php
	class Users extends db{
		public function checkUser($userName,$password){
			$sql = "SELECT * FROM users WHERE userName = ? AND password = ?";
			$result = $this->dbcon->prepare($sql);
			$salt = "wolverine";
			$masterPassword = md5($salt.$password);
			$result->execute(array($userName,$masterPassword));
			$data = $result->fetchAll();
			$isgood = $result->rowCount();
			
			if($isgood > 0){
				return $data;
			}else{
				return array();
			}
		}
		
		public function createUser($userName,$password,$email){
			$sql = "INSERT INTO users(userName,password,email) VALUES(?,?,?)";
			$result = $this->dbcon->prepare($sql);
			$salt = "wolverine";
			$newPass = md5($salt.$password);
			$result->execute(array($userName,$newPass,$email));
			
			$newUser = "SELECT * FROM users WHERE userName = ?";
			$newResult = $this->dbcon->prepare($newUser);
			$newResult->execute(array($userName));
			$data = $newResult->fetchAll();
			return $data;
		}
	}
?>