<?php
	include "../models/Views.php";
	include "../helpers/db.php";
	include "../models/Posts.php";
	
	$myview = new Views();
	$posts = new Posts();
	
	session_start();
	//shield
	if(isset($_SESSION["loggedin"])){
		//var_dump($_SESSION);
		//echo("post's session start is working");
	}else{
		header("Location: http://localhost/websites/ssl/day6/main.php");
	}
	
	include("../views/header.html");
	
	/*if(!isset($_SESSION["loggedin"])){
		header("Location: http://localhost/websites/ssl/day6/main.php");
	}*/
	
	if(!empty($_GET["action"])){
		if($_GET["action"] == "getAll"){
			$data = $posts->readPosts();
			$myview->getView("../views/body.php",$data);
		}elseif($_GET["action"] == "readPost"){
			$data = $posts->readPost($_GET["postId"]);
			$myview->getView("../views/blogPost.php",$data);
		}elseif($_GET["action"] == "updatePost"){
			$data = $posts->readPost($_GET["postId"]);
			$myview->getView("../views/formUpdate.php",$data);
		}elseif($_GET["action"] == "changePost"){
			$posts->updatePost($_POST["title"],$_POST["detail"],$_POST["postId"]);
			$data = $posts->readPosts();
			$myview->getView("../views/body.php",$data);
		}elseif($_GET["action"] == "deletePost"){
			$posts->deletePost($_GET["postId"]);
			$data = $posts->readPosts();
			$myview->getView("../views/body.php",$data);
		}elseif($_GET["action"] == "createPost"){
			$posts->createPost($_POST["title"],$_POST["detail"],$_SESSION["userId"]);
			$data = $posts->readPosts();
			$myview->getView("../views/body.php",$data);
		}
	}elseif(empty($_GET["postId"])){
		$myview->getView("../views/home.php",array());
	}
	
	include("../views/footer.html");
?>