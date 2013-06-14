<cfform method="post" action="?action=updateUser">
	<h3>Edit Current User</h3>
	<p>
		<label for="userName">Username: </label>
		<cfinput type="text" name="userName" value="#data.userName#">
	</p>
	<p>
		<label for="password">Password: </label>
		<cfinput type="text" name="password" value="#data.password#">
	</p>
	<p>
		<label for="email">Email: </label>
		<cfinput type="text" name="email" value="#data.email#">
		<cfinput type="hidden" value="#data.userId#" name="userId">
	</p>
	<p>
		<cfinput type="submit" name="submit" value="Update User">
	</p>
</cfform>
<span><a href="main.cfm?controller=user">Back</a></span>