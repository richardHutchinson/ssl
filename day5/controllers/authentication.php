<?php
	include("../models/Views.php");
	include("../helpers/db.php");
	include("../models/Posts.php");
	include("../models/Users.php");
	
	$myview = new Views();
	$myview = new Posts();
	$users = new Users();
	
	if($_GET["action"] == "checklogin"){
		$data = $users->checkUser($_POST["userName"],$_POST["password"]);
		session_start();
		
		if($data){
			$_SESSION["loggedin"] = 1;
			$_SESSION["userId"] = $data[0]["userId"];
			header("Location: http://localhost/websites/ssl/day5/controllers/post.php");
		}else{
			header("Location: http://localhost/websites/ssl/day5/main.php");
		}
	}elseif($_GET["action"] == "logout"){
		session_start();
		$_SESSION["loggedin"] = 0;
		session_destroy();
		header("Location: http://localhost/websites/ssl/day5/main.php");
	}elseif($_GET["action"] == "userRegistration"){
		$data = $users->createUser($_POST["userName"],$_POST["password"],$_POST["email"]);
		session_start();
		
		if($data){
			$_SESSION["loggedin"] = 1;
			$_SESSION["userId"] = $data[0]["userId"];
			header("Location: http://localhost/websites/ssl/day5/controllers/post.php");
		}else{
			header("Location: http://localhost/websites/ssl/day5/main.php");
		}
	}
?>