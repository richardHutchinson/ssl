<cfcomponent> <!---this is a class--->
	<cffunction name="getView" access="public" returntype="void">
		<cfargument name="pagename" type="any" required="yes">
		<cfargument name="data" type="any" required="yes">
		<cfinclude template="#pagename#"> <!---is how to include variables--->
	</cffunction>
</cfcomponent>