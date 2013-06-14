<cfcomponent>
	<cffunction name="getAll" access="public">
		<cfquery datasource="blog" name="allposts">
			SELECT * FROM post
		</cfquery>
		<cfreturn allposts>
	</cffunction>
	
	<cffunction name="getPost" access="public">
		<cfargument name="postId" type="any" required="yes">
		<cfquery datasource="blog" name="post">
			SELECT * FROM post WHERE postId = <cfqueryparam value="#postId#">
		</cfquery>
		<cfreturn post>
	</cffunction>
	
	<!---<cffunction name="updatePost" access="public">
		<cfargument name="post_id" type="any" required="yes">
		<cfquery datasource="blog" name="post">
			SELECT * FROM blog.post WHERE post_id = <cfqueryparam value="#post_id#">
		</cfquery>
		<cfreturn post>
	</cffunction>--->
	
	<cffunction  name="deletePost" access="public">
		<cfargument name="postId" type="any" required="yes">
		<cfquery datasource="blog" name="post">
			DELETE FROM blog.post WHERE postId = <cfqueryparam value="#postId#">
		</cfquery>
	</cffunction>
	
	<cffunction name="updatePost" access="public">
		<cfargument name="title" required="yes" type="string">
		<cfargument name="detail" required="yes" type="string">
		<cfargument name="postId" required="yes" type="numeric">
		<cfquery datasource="blog" name="post">
			UPDATE blog.post SET title = <cfqueryparam value="#title#">,
			detail = <cfqueryparam value="#detail#"> WHERE postId = <cfqueryparam value="#postId#">
		</cfquery>
	</cffunction>
</cfcomponent>