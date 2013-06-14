<?php
	//include "/lab/ssl/Views.php";
	include "../models/Views.php";
	$myview = new Views();
?>
<?php
	$myview->getView("../views/header.html");
?>
<div id="content">
	<?php
		$myview->getView("../views/user-authentication-form.html");
		
		//var_dump($_POST["username"]);
		//echo($_POST["username"]);
		
		if(!empty($_POST["username"])){
			echo($_POST["username"]."<br />");
		}else{
			echo("<br />Please fill in the Username<br />");
		}
		
		if(empty($_POST["password"])){
			echo("Please fill in the password field<br />");
		}elseif(strlen($_POST["password"]) < 8){
			echo("Please use eight characters in the password<br />");
		}else{
			echo($_POST["password"]."<br />");
		}
		
		if(empty($_POST["email"])){
			echo("Please fill in a valid email");
		}elseif(!preg_match("^[\w-]+(\.[\w-]+)*@([a-z0-9-]+(\.[a-z0-9-]+)*?\.[a-z]{2,6}|(\d{1,3}\.){3}\d{1,3})(:\d{4})?$^",$_POST["email"])){
			echo("Please provide a valid email");
		}else{
			echo($_POST["email"]);
		}
		
		//echo($_GET["username"]);
		
		/*if(!empty($_GET["username"])){
			$myname = $_GET["username"];
			if(preg_match('#[^a-z]+$#i',$_GET["username"])){
				echo "thanks you ".$myname;
			}else{
				echo "not a valid entry ".$myname;
			}
		}*/
	?>
</div>
<?php
	$myview->getView("../views/footer.html");
?>