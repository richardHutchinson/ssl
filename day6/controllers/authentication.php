<?php
	//include("../models/Views.php");
	//include("../helpers/db.php");
	/*include("../models/Posts.php");
	include("../models/Image.php");*/
	//include("../models/Users.php");
	
	//$myview = new Views();
	//$myview = new Posts();
	$users = new Users();
	//$image = new Image();
	
	$masterUser = false;
	$masterPassword = false;
	//var_dump($masterUser);
	
	if(!empty($_POST["userName"]) || !empty($_POST["password"])){
		$userName = $_POST["userName"];
		$password = $_POST["password"];
	}else{
		$userName = "";
		$password = "";
	}

	if(empty($userName) || !preg_match("^\s*[a-zA-Z0-9,\s]+\s*$^",$userName)){
		echo("<span class=\"error\">Please fill in the Username<br /></span>");
		$masterUser = false;
	}else{
		echo("<span class=\"valid\">".$userName."<br /></span>");
		$masterUser = true;
	}
	//^[a-zA-Z0-9_$?-]$^
	if(empty($password) || !preg_match("^[a-zA-Z0-9_$?-]{8,32}$^",$password)){
		echo("<span class=\"error\">Please use eight to thirty two characters, letters, numbers or the following _ $ ? &ndash; in the password</span><br />");
		$masterPassword = false;
	}else{
		echo("<span class=\"valid\">".$password."</span><br />");
		$masterPassword = true;
	}
	
	if($masterUser == false || $masterPassword == false){
		//echo("<br /><strong>invalid login</strong>: ".$userName."<strong>invalid password</strong>: ".$password);
		echo("<span class=\"error_message\">There were errors in the form, please check the values.</span>");
	}elseif($masterUser == true && $masterPassword == true){
		//echo("<strong>valid</strong>: ".$userName."<br /><strong>valid</strong>: ".$password."<br />");
		
		$data = $users->checkUser($userName,$password);
		
		if($data){
			session_start();
			$_SESSION["loggedin"] = 1;
			$_SESSION["userId"] = $data[0]["userId"];
			$_SESSION["profileimg"] = $data[0]["imageName"];
			//convert this into mvc aka use $myview->getView("views/header.html",array());
			//header("Location: http://localhost/websites/ssl/day6/controllers/post.php");
			header("Location: http://localhost/websites/ssl/day6/controllers/post.php?action=getAll");
		}else{
			header("Location: http://localhost/websites/ssl/day6/main.php");
		}
	}/*else{*/
		/*if($_GET["action"] == "checklogin"){
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
		}*/
		/*if($_GET["action"] == "userRegistration"){
			session_start();
			if($_POST["captcha"] == $_SESSION["captcha"]){
				//var_dump($_SESSION["captcha"]);
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
		}*/
	/*}*/
?>