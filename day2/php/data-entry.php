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
		$myview->getView("../views/data-entry-form.html");
		
		//var_dump($_POST["username"]);
		//echo($_POST["username"]);
		
		if(empty($_POST["date"])){
			echo("<br />Please fill in the date<br />");
		}elseif(!is_numeric($_POST["date"])){
			echo("<br />Please fill in a numeric date<br />");
		}else{
			echo($_POST["date"]."<br />");
		}
		
		if(empty($_POST["experience"])){
			echo("Please fill in experience<br />");
		}elseif(!preg_match("^[-+]?\d+(\.\d+)?$^",$_POST["experience"])){
			echo("Please use positive numbers or negetive numbers<br />");
		}else{
			echo($_POST["experience"]."<br />");
		}
		
		if(empty($_POST["salary"])){
			echo("Please fill in the salary<br />");
		}elseif(!preg_match("^((?:\+|\-|\$)?(?:\d+|\d{1,3}(?:\,\d{3})*)(?:\.\d+)?(?:[a-zA-Z]{2}|\%)?)$^",$_POST["salary"])){
			echo("Please use numbers in the salary field");
		}else{
			echo($_POST["salary"]."<br />");
		}
		
		if(empty($_POST["website"])){
			echo("Please enter a URL<br />");
		}elseif(!preg_match("^http\://[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(/\S*)?$^",$_POST["website"])){
			echo("Please enter a valid URL");
		}else{
			echo($_POST["website"]."<br />");
		}
		
		if(empty($_POST["transportation"])){
			echo("Please select transportation<br />");
		}else{
			echo($_POST["transportation"]."<br />");
		}
		
		if(!isset($_POST["gender"])){
			echo("Please select gender<br />");
		}else{
			echo($_POST["gender"]."<br />");
		}
		
		if(!isset($_POST["newsLetter"])){
			echo("The news letter will not be sent<br />");
		}else{
			echo($_POST["newsLetter"]."<br />");
		}
	?>
</div>
<?php
	$myview->getView("../views/footer.html");
?>