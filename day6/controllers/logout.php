<?php
	if($_GET["action"] == "logout"){
		session_start();
		$_SESSION["loggedin"] = 0;
		session_destroy();
		header("Location: http://localhost/websites/ssl/day6/main.php");
	}
?>