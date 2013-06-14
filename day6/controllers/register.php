<?php
	//include("../models/Views.php");
	//include("../helpers/db.php");
	/*include("../models/Posts.php");
	include("../models/Image.php");*/
	//include("../models/Users.php");
	
	//$myview = new Views();
	//$myview = new Posts();
	$users = new Users();
	$image = new Image();
	
	$masterUser = false;
	$masterPassword = false;
	$masterEmail = false;
	//var_dump($masterUser);
	
	if(!empty($_POST["registerUserName"]) || !empty($_POST["registerPassword"]) || !empty($_POST["registerEmail"])){
		$userName = $_POST["registerUserName"];
		$password = $_POST["registerPassword"];
		$email = $_POST["registerEmail"];
	}else{
		$userName = "";
		$password = "";
		$email = "";
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
	
	if(empty($email) || !preg_match("/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/",$email)){
		echo("<span class=\"error\">Please fill in the Email<br /></span>");
		$masterEmail = false;
	}else{
		echo("<span class=\"valid\">".$email."<br /></span>");
		$masterEmail = true;
	}
	
	//validate captcha - only runing, not validating
	/*$captchaString = md5(microtime());
	$randomCaptcha = substr($captchaString,0,6);
	$image->msg($randomCaptcha);*/
	
	//captcha - not working, though may work here or in the elseif condition
	/*if(isset($_POST["submitMe"])){
		session_start();
		echo("submit <br />");
		var_dump($_SESSION["captcha"]);
	}else{
		echo("no");
		session_start();
		$captchaString = md5(microtime());
		$randomCaptcha = substr($captchaString,0,6);
		$image->msg($randomCaptcha);
		$_SESSION["captcha"] = $randomCaptcha;
	}*/
	
	if($masterUser == false || $masterPassword == false || $masterEmail == false){
		//echo("<br /><strong>invalid login</strong>: ".$userName."<strong>invalid password</strong>: ".$password);
		echo("<span class=\"error_message\">There were errors in the form, please check the values.</span>");
	}elseif($masterUser == true && $masterPassword == true && $masterEmail == true){
		echo("<strong>valid</strong>: ".$userName."<br /><strong>valid</strong>: ".$password."<br /><strong>valid</strong>: ".$email."<br />");
		
		session_start();
		
		//var_dump($_POST["captcha"]);
		//echo("<br /> session: ".$_SESSION["captcha"]."<br />");
		
		//var_dump($_POST["captcha"]);
		//var_dump($_SESSION["captcha"]);
		$data = $users->createUser($userName,$password,$email,"profile".$userName.".".substr(strrchr($_FILES["profileimg"]["name"],'.'),1));
		
		if($data){
			//var_dump($data);
			$image->fileUpload($_FILES["profileimg"],$userName);
			$_SESSION["loggedin"] = 1;
			$_SESSION["userId"] = $data[0]["userId"];
			$_SESSION["profileimg"] = $data[0]["imageName"];
			//$_SESSION["captcha"] = $randomCaptcha;
			//echo($_SESSION["captcha"]);
			
			//header("Location: http://localhost/websites/ssl/day6/controllers/post.php");
			header("Location: http://localhost/websites/ssl/day6/controllers/post.php?action=getAll");
		}else{
			//echo("no data sent");
			header("Location: http://localhost/websites/ssl/day6/main.php");
		}
		
		/*if($_POST["captcha"] == $_SESSION["captcha"]){
			echo("captcha session working");
			//var_dump($_POST["captcha"]);
			//var_dump($_SESSION["captcha"]);
			$data = $users->createUser($userName,$password,$email,"profile".$userName.".".substr(strrchr($_FILES["profileimg"]["name"],'.'),1));
			
			if($data){
				$image->fileUpload($_FILES["profileimg"],$userName);
				$_SESSION["loggedin"] = 1;
				$_SESSION["userId"] = $data[0]["userId"];
				$_SESSION["profileimg"] = $data[0]["imageName"];
				//header("Location: http://localhost/websites/ssl/day6/controllers/post.php");
			}else{
				echo("no data sent");
				//header("Location: http://localhost/websites/ssl/day6/main.php");
			}
		}else{
			echo("no captcha data sent from session or the captchas are different");
			//header("Location: http://localhost/websites/ssl/day6/main.php");
		}*/
	}/*else{
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
		}
	}*/
?>