<cfform action="?" method="post">
	<label for="username">Username: </label>
	<cfinput type="text" name="username" message="Please fill in the username" required="yes" validate="regular_expression" pattern="^[a-zA-Z]+$" />
	<br />
	<label for="password">Password: </label>
	<cfinput type="text" name="password" message="Please fill in the password field" required="yes"validate="regular_expression" pattern="^[a-zA-Z]\w{3,14}$" />
	<br />
	<label for="email">Email: </label>
	<cfinput type="text" name="email" message="invalid email" required="yes" validate="regular_expression" pattern="^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$"/>
	<br />
	<cfinput type="submit" name="Send" />
</cfform>