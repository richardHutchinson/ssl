<cfform method="post" action="authentication.cfm?action=checklogin">
	<h3>Login</h3>
	<p>
		<label for="userName">Username: </label>
		<cfinput type="text" name="userName">
	</p>
	<p>
		<label for="password">Password: </label>
		<cfinput type="text" name="password">
	</p>
	<p>
		<cfinput type="submit" value="Login" name="login">
	</p>
</cfform>