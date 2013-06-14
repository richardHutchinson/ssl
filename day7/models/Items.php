<?php
	class Items extends db {
		public function saveEntries($id,$title,$summary,$date){
			$sql = "INSERT INTO newsItem(id,newsTitle,newsDetail,newsDate) values(?,?,?,?)";
			$result = $this->dbcon->prepare($sql);
			$result->execute(array($id,$title,$summary,$date));
		}
		
		public function updateEntries($id,$title,$summary,$date){
			$sql = "UPDATE newsitem SET id = ?,newsTitle = ?,newsDetail = ?,newsDate = ? WHERE id = \"".$id."\"";
			$result = $this->dbcon->prepare($sql);
			$result->execute(array($id,$title,$summary,$date));
		}
	}
?>