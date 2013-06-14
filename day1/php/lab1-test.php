<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php echo"Untitled Document" ?></title>
		<?php
			//include "/scripts/js.js";
			//include "/css/css.css";
			include "Views.php";
			$myview = new Views();
			$myview->getView("header.php");
		?>
	</head>
	
	<body>
		<div id="myheader"><? include "/views/header.php"; ?></div>
		<?
			//do the same as above
				//logo
				//login
		?>
		
		<?
			//footer
		?>
	</body>
</html>