<?php
	include "models/Views.php";
	include "helpers/db.php"; //must be above the Post.php - order of operation
	include "models/Posts.php";
	include "models/Users.php";
	include "models/Image.php";
	
	$myview = new Views();
	//$posts = new Posts();
	$image = new Image();
	
	session_start();
	$captchaString = md5(microtime());
	$randomCaptcha = substr($captchaString,0,6);
	$image->msg($randomCaptcha);
	$_SESSION["captcha"] = $randomCaptcha;

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