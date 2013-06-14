<form action="?action=changeUser" method="post">
	<h3>Edit Current Form</h3>
	<p>
		<label for="userName">Username:</label>
		<input type="text" name="userName" value="<?php echo($data[0]["userName"]); ?>" />
	</p>
	<p>
		<label for="password">Password:</label>
		<input type="text" name="password" value="<?php echo($data[0]["password"]); ?>" />
	</p>
	<p>
		<label for="email">Email:</label>
		<input type="text" name="email" value="<?php echo($data[0]["email"]); ?>" />
		<input type="hidden" name="userId" value="<?php echo($data[0]["userId"]); ?>" />
	</p>
	<p>
		<input type="submit" value="Update User" />
	</p>
</form>
<br />
<span><a href="?controller=user">Back</a></span>