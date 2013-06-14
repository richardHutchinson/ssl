<?php
	include "models/Views.php";
	include "helpers/db.php"; //must be above the Post.php - order of operation
	include "models/Posts.php";
	include "models/Users.php";
	include "models/Image.php";
	
	$myview = new Views();
	$posts = new Posts();
	$users = new Users();
	$image = new Image();
	
	//session_start();
	/*$captchaString = md5(microtime());
	$randomCaptcha = substr($captchaString,0,6);
	$image->msg($randomCaptcha);*/
	/*$_SESSION["captcha"] = $randomCaptcha;*/

	$myview->getView("views/header.html",array());
	
	if(!empty($_GET["controller"])){
		header("Location: controllers/post.php");
	}else{

?>
<div id="content">
	<div class="content-right">
	<?php
		$myview->getView("views/formRegister.php");
	?>
	</div>
	<div class="content-left">
	<?php
		$myview->getView("views/formLogin.php");
		//echo("<br />".$userName.$password." test");
	?>
	</div>
</div>
<?php
	}
	$myview->getView("views/footer.html",array());
?>