<?php
	include "../models/Views.php";
	include "../helpers/db.php";
	include "../models/Posts.php";
	
	$myview = new Views();
	$posts = new Posts();
	
	session_start();
	/*if(isset($_SESSION["loggedin"])){
		
	}else{
		header("Location: http://localhost/websites/ssl/day5/main.php");
	}
	*/
	//$_SESSION["loggedin"] = 0; //rich note: try to set this in the future
	if(!isset($_SESSION["loggedin"])){
		header("Location: http://localhost/websites/ssl/day5/main.php");
	}else{
		echo("banana (session set)");
	}
	
	if(!empty($_GET["action"])){
		if($_GET["action"] == "getAll"){
			$data = $posts->readPosts();
			$myview->getView("../views/body.php",$data);
		}elseif($_GET["action"] == "readPost"){
			$data = $posts->readPost($_GET["postId"]);
			$myview->getView("../views/blogPost.php",$data);
		}elseif($_GET["action"] == "updatePost"){
			$data = $posts->readPost($_GET["postId"]);
			$myview->getView("../views/formUpdate.html",$data);
		}elseif($_GET["action"] == "changePost"){
			$posts->updatePost($_POST["title"],$_POST["detail"],$_POST["postId"]);
			$data = $posts->readPosts();
			$myview->getView("../views/body.php",$data);
		}elseif($_GET["action"] == "deletePost"){
			$posts->deletePost($_GET["postId"]);
			$data = $posts->readPosts();
			$myview->getView("../views/body.php",$data);
		}/*elseif($_GET["action"] == "createPost"){
			$posts->createPost($_SESSION["postId"],$_POST["title"],$_POST["detail"]);
			$data = $posts->readPosts();
			$myview->getView("../views/body.php",$data);
		}*/
		elseif($_GET["action"] == "createPost"){
			$posts->createPost($_POST["title"],$_POST["detail"]);
			$data = $posts->readPosts();
			$myview->getView("../views/body.php",$data);
		}
	}elseif(empty($_GET["postId"])){
		$myview->getView("../views/home.php",array());
	}
?>