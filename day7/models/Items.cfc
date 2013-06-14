<cfcomponent> <!---this is a class--->
	<cffunction name="createEntries" access="public" returntype="void">
		<cfargument name="title" type="any" required="yes">
		<cfargument name="detail" type="any" required="yes">
		<cfargument name="date" type="date" required="yes">
		<cfquery datasource="blog" name="post">
			INSERT INTO blog.newsitem2(newsTitle2,newsDetail2,newsDate2) VALUES(<cfqueryparam value="#title#">,<cfqueryparam value="#detail#">,<cfqueryparam value="#date#">)
		</cfquery>
		<!---<cfinclude template="#pagename#">---> <!---is how to include variables--->
	</cffunction>
</cfcomponent>