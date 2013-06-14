<cfcomponent>
	<cffunction name="readPosts" access="public">
		<cfquery datasource="blog" name="allposts">
			SELECT * FROM post ORDER BY postId DESC
		</cfquery>
		<cfreturn allposts>
	</cffunction>
	
	<cffunction name="createPost" access="public">
		<cfargument name="title" type="any" required="yes">
		<cfargument name="detail" type="any" required="yes">
		<cfargument name="postId" type="any" required="yes">
		<cfquery datasource="blog" name="post">
			INSERT INTO post(title,detail,postId) VALUES(<cfqueryparam value="#title#">,<cfqueryparam value="#detail#">,<cfqueryparam value="#postId#">)
		</cfquery>
	</cffunction>
	
	<cffunction name="readPost" access="public">
		<cfargument name="postId" type="any" required="yes">
		<cfquery datasource="blog" name="post">
			SELECT * FROM post WHERE postId = <cfqueryparam value="#postId#">
		</cfquery>
		<cfreturn post>
	</cffunction>
	
	<cffunction name="deletePost" access="public">
		<cfargument name="postId" type="any" required="yes">
		<cfquery datasource="blog" name="post">
			DELETE FROM blog.post WHERE postId = <cfqueryparam value="#postId#">
		</cfquery>
	</cffunction>
	
	<cffunction name="updatePost" access="public">
		<cfargument name="title" required="yes" type="any">
		<cfargument name="detail" required="yes" type="any">
		<cfargument name="postId" required="yes" type="numeric">
		<cfquery datasource="blog" name="post">
			UPDATE blog.post SET title = <cfqueryparam value="#title#">,detail = <cfqueryparam value="#detail#"> WHERE postId = <cfqueryparam value="#postId#">
		</cfquery>
	</cffunction>
	
	<cffunction name="getPost" access="public">
		<cfargument name="postId" type="any" required="yes">
		<cfquery datasource="blog" name="post">
			SELECT * FROM post WHERE postId = <cfqueryparam value="#postId#">
		</cfquery>
		<cfreturn post>
	</cffunction>
</cfcomponent>