<?php
	include "header.html";
?>
<div id="content">
	<form action="?action=createUser" method="post">
		<h3>Add New User</h3>
		<p>
			<label for="userName">Username: </label>
			<input type="text" name="userName" />
		</p>
		<p>
			<label for="password">Password: </label>
			<input type="text" name="password" />
		</p>
		<p>
			<label for="email">Email: </label>
			<input type="text" name="email" />
		</p>
		<p>
			<input type="submit" value="Send" />
		</p>
	</form>
	<a href="../index.php">Back</a>
</div>
<?php
echo($data);
	foreach($data as $user){
		echo('<p>'.$user["userName"].'<a href="?action=updateUser&userId='.$user["userId"].'">Edit</a> | <a href="?action=deleteUser&userId='.$user["userId"].'">Delete</a></p>');
	}
	include "footer.html";
?>