<cfcomponent>
	<cffunction name="getAll" access="public">
		<cfquery datasource="blog" name="allusers">
			SELECT * FROM users ORDER BY userId DESC
		</cfquery>
		<cfreturn allusers>
	</cffunction>
	
	<cffunction name="createUser" access="public">
		<cfargument name="userName" type="any" required="yes">
		<cfargument name="password" type="any" required="yes">
		<cfargument name="email" type="any" required="yes">
		<cfquery datasource="blog" name="user">
			INSERT INTO users(userName,password,email) VALUES (<cfqueryparam value="#userName#">,<cfqueryparam value="#password#">,<cfqueryparam value="#email#">)
		</cfquery>
	</cffunction>
	
	<cffunction name="getUser" access="public">
		<cfargument name="userId" type="any" required="yes">
		<cfquery datasource="blog" name="user">
			SELECT * FROM users WHERE userId = <cfqueryparam value="#userId#">
		</cfquery>
		<cfreturn user>
	</cffunction>
	
	<cffunction name="deleteUser" access="public">
		<cfargument name="userId" type="any" required="yes">
		<cfquery datasource="blog" name="user">
			DELETE FROM blog.users WHERE userId = <cfqueryparam value="#userId#">
		</cfquery>
	</cffunction>
	
	<cffunction name="updateUser" access="public">
		<cfargument name="userId" required="yes" type="numeric">
		<cfquery datasource="blog" name="user">
			UPDATE blog.users SET userName = <cfqueryparam value="#userName#">,password = <cfqueryparam value="#password#">,email = <cfqueryparam value="#email#"> WHERE userId = <cfqueryparam value="#userId#">
		</cfquery>
	</cffunction>
</cfcomponent>