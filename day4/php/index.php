<?php
	include "../models/Views.php";
	include "../helpers/db.php"; //must be above the Post.php - order of operation
	include "../models/Posts.php";
	$myview = new Views();
	$posts = new Posts();

	$myview->getView("../views/header.html",array());
	
	//$data = $posts->readPosts();
	if(!empty($_GET["postid"])){
		$data = $posts->readPost($_GET["postid"]);
		$myview->getView("../views/blog.php",$data);
	}
	
	//var_dump($data);
	//$post->addPost($_POST[""],$_POST[""])//use this for the lab
	
	if(!empty($_GET["controller"])){
		
		if($_GET["controller"] == "blog"){
			header("Location: ../controllers/blog.php");
		}/*elseif($_GET["controller"] == "shop"){ //these are a reference for additional pages
			header("Location: ../controllers/shop.php");
		}elseif($_GET["controller"] == "contact"){
			header("Location: ../controllers/controller.php");
		}*/
		
		header("Location: ../controllers/blog.php");
	}else{
?>
<div id="content">
	<a href="?controller=blog">Blog</a>
</div>
<?php
	}
	$myview->getView("../views/footer.html",array());
?>