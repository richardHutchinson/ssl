<cfcomponent> <!---this is a class--->
	<cffunction name="getView" access="public" returntype="void">
		<cfargument name="pagename" type="any">
		<cfinclude template="#pagename#"> <!---is how to output variables--->
	</cffunction>
</cfcomponent>