<cfform method="post" action="?action=updatePost">
	<p>
		<cfinput type="hidden" value="#data#" name="postId">
		<label for="title">Title: </label>
		<cfinput type="text" name="title">
	</p>
	<p>
		<label for="detail">Detail: </label>
		<cfinput type="text" name="detail">
	</p>
	<br />
	<cfinput type="submit" name="submit" value="submit"> <!---note: use name="submit" not value="submit"--->
</cfform>