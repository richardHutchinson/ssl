<?php
	include "Views.php";
	$myview = new Views();
	
	$myview->getView("../views/header.html");
	$myview->getView("../views/index.html");
	$myview->getView("../views/footer.html");
?>