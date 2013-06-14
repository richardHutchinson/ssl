<?php
	include("controllers/register.php");
	
	if(!empty($_POST["registerUserName"]) || !empty($_POST["registerPassword"]) || !empty($_POST["registerEmail"])){
		$userName = $_POST["registerUserName"];
		$password = $_POST["registerPassword"];
		$email = $_POST["registerEmail"];
	}else{
		$userName = "";
		$password = "";
		$email = "";
	}
?>

<h2>Register</h2>
<form action="<?php $_SERVER["PHP_SELF"] ?>" method="post" enctype="multipart/form-data">
	<h3>New User Registration</h3>
	<p>
		<label for="userName">Username: </label>
		<input type="text" name="registerUserName" value="<?php echo($userName); ?>" />
	</p>
	<p>
		<label for="password">Password: </label>
		<input type="password" name="registerPassword" />
	</p>
	<p>
		<label for="email">Email: </label>
		<input type="text" name="registerEmail" value="<?php echo($email); ?>" />
	</p>
	<p>
		<label for="profileimg">Profile Image:</label>
		<input type="file" name="profileimg" />
	</p>
	<!--<p>
		<img src="images/newCaptcha.jpg" />--> <!--this is used to generate the image, php will take the default image (one can use any image and then generate a new image with the .ttf file)-->
		<!--<input type="text" name="captcha" />
	</p>-->
	<p>
		<!--name="submitMe"-->
		<input type="submit" value="Register" />
	</p>
</form>