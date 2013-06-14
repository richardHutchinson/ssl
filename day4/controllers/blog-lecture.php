<?php
	include "../models/Views.php";
	include "../helpers/db.php"; //must be above the Post.php - order of operation
	include "../models/Posts.php";
	$myview = new Views();
	$posts = new Posts();

?>
<link href="/day4/css/site.css" rel="stylesheet" /> <!--dirrect path - can use this due to the ../ paths-->
<?php
	//$data = $posts->readPosts();
	if(!empty($_GET["postid"])){
		$data = $posts->readPost($_GET["postid"]);
		$myview->getView("../views/blog.php",$data);
	}

?>