<?php
	include "../models/Views.php";
	include "../helpers/db.php"; //must be above the Post.php - order of operation
	include "../models/Users.php";
	$myview = new Views();
	$posts = new Users();

	$myview->getView("../views/header.html",array());
	
	if(!empty($_GET["controller"])){
		header("Location: ../controllers/user.php");
	}else{
?>
<div id="content">
	<a href="?controller=user">Show Users</a>
</div>
<?php
	}
	$myview->getView("../views/footer.html",array());
?>