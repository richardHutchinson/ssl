<?php
	//include "/lab/ssl/Views.php";
	include "Views.php";
	$myview = new Views();
?>
<?php
	$myview->getView("../views/header.html");
?>
<div id="content">
	<?php
		$myview->getView("../views/form.html");
		
		//var_dump($_POST["username"]);
		//echo($_POST["username"]);
		
		/*if(!empty($_POST["username"])){
			echo($_POST["username"]);
		}*/
		
		//echo($_GET["username"]);
		
		if(!empty($_GET["username"])){
			$myname = $_GET["username"];
			if(preg_match('#[^a-z]+$#i',$_GET["username"])){
				echo "thank you ".$myname;
			}else{
				echo "not a valid entry ".$myname;
			}
		}
	?>
</div>
<?php
	$myview->getView("../views/footer.html");
?>