<cfform action="?" method="post">
	<label for="username">Username: </label>
	<cfinput type="text" name="username" message="Please fill in the username" required="yes" />
	<br />
	<label for="password">Password: </label>
	<cfinput type="password" name="password" message="Please fill in the password field" required="yes" />
	<br />
	<label for="email">Email: </label>
	<cfinput type="text" name="email" message="invalid email" validate="email" required="yes" />
	<br />
	<cfinput type="submit" name="Send" />
</cfform>