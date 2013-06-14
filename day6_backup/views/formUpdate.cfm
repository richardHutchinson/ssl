<!--add html-->

<cfform method="post" action="?action=updatePost">
	<h2>Edit Current Post</h2>
	<p>
		<label for="title">Title: </label>
		<cfinput type="text" name="title" value="#data.title#">
	</p>
	<p>
		<label for="detail">Detail: </label>
		<textarea name="detail" cols="47" rows="5">
			<cfoutput>#data.detail#</cfoutput>
		</textarea>
		<cfinput type="hidden" value="#data.postId#" name="postId">
	</p>
	<p>
		<cfinput type="submit" name="submit" value="Update Post">
	</p>
</cfform>
<span>
	<a href="index.cfm?controller=post&action=getAll">Back</a> | 
	<a href="authentication.cfm?action=logout">Logout</a>
</span>