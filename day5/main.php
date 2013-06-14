<?php
	include "models/Views.php";
	include "helpers/db.php"; //must be above the Post.php - order of operation
	include "models/Posts.php";
	include "models/Users.php";
	$myview = new Views();
	//$posts = new Posts();

	$myview->getView("views/header.html",array());
	
	if(!empty($_GET["controller"])){
		header("Location: controllers/post.php");
	}else{

?>
<div id="content">
	<?php
		$myview->getView("views/formLogin.html");
		$myview->getView("views/formRegister.html");
	?>
</div>
<?php
	}
	$myview->getView("views/footer.html",array());
?>