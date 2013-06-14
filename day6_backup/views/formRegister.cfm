<cfset image = new ssl.day6.models.Images()>

<cfform method="post" action="authentication.cfm?action=userRegistration" enctype="multipart/form-data">
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
		<label for="profileimg">Profile Image: </label>
		<cfinput type="file" name="profileimg">
	</p>
	<p>
		<cfset image.captcha(#data#)>
		<label for="captcha">Type the corresponding symbols: </label>
		<cfinput type="text" name="captcha">
	</p>
	<p>
		<cfinput type="submit" value="Register" name="register">
	</p>
</cfform>