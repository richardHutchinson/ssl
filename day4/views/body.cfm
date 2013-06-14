<cfform method="post" action="?action=createUser">
	<h3>Add New User</h3>
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
		<cfinput type="submit" name="submit" value="Add User">
	</p>
</cfform>
<a href="main.cfm">Back</a>
<cfloop query="data">
	<p>
		<span><cfoutput>#userName#</cfoutput></span>
		<span>
			<a href="?action=updateForm&userId=<cfoutput>#userId#</cfoutput>">
				Edit | 
			</a>
			<a href="?action=deleteUser&userId=<cfoutput>#userId#</cfoutput>">
				Delete
			</a>
		</span>
	</p>
</cfloop>