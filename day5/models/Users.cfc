<cfcomponent>
	<cffunction name="checkUser" access="public">
		<cfargument name="userName" type="any" required="yes">
		<cfargument name="password" type="any" required="yes">
		<cfset salt = 'wolverine'>
		<cfset masterPassword = Hash('#salt#'&'#password#','md5')>
		<cfquery datasource="blog" name="users">
			SELECT * FROM users WHERE userName = "#userName#" AND password = "#masterPassword#"
		</cfquery>
		<cfset isgood = #users.RecordCount#>
		<cfif #isgood# == 1>
			<cfreturn users>
		<cfelseif #isgood# == 0>
			<cfreturn array()>
		</cfif>
	</cffunction>
	
	<cffunction name="createUser" access="public">
		<cfargument name="userName" type="any" required="yes">
		<cfargument name="password" type="any" required="yes">
		<cfargument name="email" type="any" required="yes">
		<cfset salt = 'wolverine'>
		<cfset masterPassword = Hash('#salt#'&'#password#','md5')>
		<cfquery datasource="blog" name="addedUser">
			INSERT INTO users(userName,password,email) VALUES(<cfqueryparam value="#userName#">,<cfqueryparam value="#masterPassword#">,<cfqueryparam value="#email#">)
		</cfquery>
		<cfquery datasource="blog" name="user">
			SELECT * FROM users WHERE userName = "#userName#"
		</cfquery>
		<cfreturn user>
	</cffunction>
</cfcomponent>