<cfcomponent>
	<cffunction name="getAll" access="public">
		<cfquery datasource="blog" name="allposts">
			SELECT *FROM post
		</cfquery>
		<cfreturn allposts>
	</cffunction>
	
	<cffunction name="getPost" access="public">
		<cfargument name="postid" type="any" required="yes">
		<cfquery datasource="blog" name="post">
			SELECT *FROM post WHERE post_id = <cfqueryparam value="#postid#">
			<!---use this as an example INSERT INTO post (title,desc) VALUES (<cfqueryparam value="#postid#">,<cfqueryparam value="#something goes here#">)--->
		</cfquery>
		<cfreturn allposts>
	</cffunction>
</cfcomponent>