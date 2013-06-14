<cfloop query="data">
	<span>
		<strong><cfoutput>#title#</cfoutput></strong>
		<br />
		<cfoutput>#detail#</cfoutput>
		<br />
		<a href="?action=updateForm&postId=<cfoutput>#postId#</cfoutput>">Edit</a> | 
		<a href="?action=deletePost&postId=<cfoutput>#postId#</cfoutput>">Delete</a>
	</span>
</cfloop>