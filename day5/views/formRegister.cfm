<cfform method="post" action="authentication.cfm?action=userRegistration">
	<h3>New User Registration</h3>
	<p>
		<label for="userName">Username: </label>
		<cfinput type="text" name="userName">
	</p>
	<p>
		<label for="password">Password: </label>
		<cfinput type="text" name="password">
	</p>
	<p>
		<label for="email">Email: </label>
		<cfinput type="text" name="email">
	</p>
	<p>
		<cfinput type="submit" value="Register" name="register">
	</p>
</cfform>