<?php
	include("../models/Views.php");
	include("../helpers/db.php");
	include("../models/Posts.php");
	include("../models/Image.php");
	include("../models/Users.php");
	//add Validator.php
	
	$myview = new Views();
	$myview = new Posts();
	$users = new Users();
	$image = new Image(); //add this method
	//add validator function call here
	
	if($_GET["action"] == "checklogin"){
		$data = $users->checkUser($_POST["userName"],$_POST["password"]);
		
		if($data){
			session_start();
			$_SESSION["loggedin"] = 1;
			$_SESSION["userId"] = $data[0]["userId"];
			$_SESSION["profileimg"] = $data[0]["imageName"];
			header("Location: http://localhost/websites/ssl/day6/controllers/post.php");
		}else{
			header("Location: http://localhost/websites/ssl/day6/main.php");
		}
	}elseif($_GET["action"] == "logout"){
		session_start();
		$_SESSION["loggedin"] = 0;
		session_destroy();
		header("Location: http://localhost/websites/ssl/day6/main.php");
	}elseif($_GET["action"] == "userRegistration"){
		session_start();
		if($_POST["captcha"] == $_SESSION["captcha"]){
			$data = $users->createUser($_POST["userName"],$_POST["password"],$_POST["email"],"profile".$_POST["userName"].".".substr(strrchr($_FILES["profileimg"]["name"],'.'),1));
			
			if($data){
				$image->fileUpload($_FILES["profileimg"],$_POST["userName"]);
				$_SESSION["loggedin"] = 1;
				$_SESSION["userId"] = $data[0]["userId"];
				$_SESSION["profileimg"] = $data[0]["imageName"];
				header("Location: http://localhost/websites/ssl/day6/controllers/post.php");
			}else{
				header("Location: http://localhost/websites/ssl/day6/main.php");
			}
		}else{
			header("Location: http://localhost/websites/ssl/day6/main.php");
		}
	}
?>