<?php
	include "../models/Views.php";
	include "../helpers/db.php"; //must be above the Post.php - order of operation
	include "../models/Posts.php";
	$myview = new Views();
	$posts = new Posts();

	$myview->getView("../views/header.html",array());
	
	//$data = $posts->readPosts();
	/*if(!empty($_GET["postid"])){
		$data = $posts->readPost($_GET["postid"]);
		$myview->getView("../views/blog.php",$data);
	}*/
	
	//var_dump($data);
	//$post->addPost($_POST[""],$_POST[""])//use this for the lab
?>
<div id="content">
	<?php
		$myview->getView("../views/form.html");
		if(!empty($_POST["title"]) && !empty($_POST["detail"])){
			$posts->createPosts($_POST["title"],$_POST["detail"]);
			$data = $posts->readPosts();
			//$data = var_dump($_POST["title"]);
			$myview->getView("../views/blog.php",$data);
		}else{
			$data = $posts->readPosts();
			$myview->getView("../views/blog.php",$data);
		}
	?>
</div>
<?php
	$myview->getView("../views/footer.html");
?>