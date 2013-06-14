<?
	class db{ //this page will self exicute
		public function __construct(){
			//echo("hello world");
			$this->dbcon = new PDO("mysql:host=localhost;dbname=blog","root",""); //new means new function aka new constructor
			$this->dbcon->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		}
	}
?>