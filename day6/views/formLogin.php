<?php
	include("controllers/authentication.php");
	
	if(!empty($_POST["userName"]) || !empty($_POST["password"])){
		$userName = $_POST["userName"];
		$password = $_POST["password"];
	}else{
		$userName = "";
		$password = "";
	}
?>

<h2>Login</h2>
<!--controllers/authentication.php?action=checklogin-->
<!--controllers/authentication.php?action=invalidLogin-->
<form action="<?php $_SERVER["PHP_SELF"] ?>" method="post" enctype="multipart/form-data">
	<h3>Login</h3>
	<p>
		<label for="userName">Username: </label>
		<input type="text" name="userName" value="<?php echo($userName); ?>" />
	</p>
	<p>
		<label for="password">Password: </label>
		<input type="password" name="password" />
	</p>
	<p>
		<input type="submit" value="Login" />
	</p>
</form>