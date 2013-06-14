<?php
	include "../models/Views.php";
	include "../helpers/db.php"; //must be above the Post.php - order of operation
	include "../models/Users.php";
	$myview = new Views();
	$users = new Users();
?>
<!--<link href="/day4/css/site.css" rel="stylesheet" />--> <!--dirrect path - can use this due to the ../ paths-->
<?php
	if(!empty($_GET["action"])){
		if($_GET["action"]=="updateUser"){
			$data = $users->readUser($_GET["userId"]);
			$myview->getView("../views/formUpdate.php",$data);
		}elseif($_GET["action"]=="changeUser"){
			$users->updateUser($_POST["userName"],$_POST["password"],$_POST["email"],$_POST["userId"]);
			$data = $users->readUsers();
			$myview->getView("../views/body.php",$data);
		}elseif($_GET["action"]=="deleteUser"){
			$users->deleteUser($_GET["userId"]);
			$data = $users->readUsers();
			$myview->getView("../views/body.php",$data);
		}elseif($_GET["action"]=="createUser"){
			$users->createUser($_POST["userName"],$_POST["password"],$_POST["email"]);
			$data = $users->readUsers();
			$myview->getView("../views/body.php",$data);
		}
	}elseif(empty($_GET["userId"])){
		$data = $users->readUsers();
		$myview->getView("../views/body.php",$data);
	}
?>