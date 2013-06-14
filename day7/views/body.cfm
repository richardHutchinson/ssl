<!---add html--->

<cfform method="post" action="?action=createPost">
	<h2>Add New Post</h2>
	<p>
		<label for="title">Title: </label>
		<cfinput type="text" name="title">
	</p>
	<p>
		<label for="detail">Detail: </label>
		<cfinput type="text" name="detail">
	</p>
	<p>
		<cfinput type="submit" name="submit" value="Add Post">
	</p>
</cfform>
<span>
	<a href="index.cfm">Back</a> | 
	<a href="authentication.cfm?action=logout">Logout</a>
</span>
<cfloop query="data">
	<p>
		<a href="post.cfm?action=readPost&postId=<cfoutput>#postId#</cfoutput>">
			<cfoutput>#title#</cfoutput>
		</a>
		<br />
		<br />
		<a href="?action=updateForm&postId=<cfoutput>#postId#</cfoutput>">
			<span>Edit</span>
		</a>
		 | 
		 <a href="?action=deletePost&postId=<cfoutput>#postId#</cfoutput>">
			<span>Delete</span>
		</a>
	</p>
</cfloop>