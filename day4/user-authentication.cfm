<cfset myview = new Views()>

<cfset myview.getView("../views/header.html")>
<cfset myview.getView("../views/user-authentication-form.cfm")>

<!---<cfoutput>#form.username#</cfoutput>--->

<!---<cfif #isDefined("form.username")#>
	<cfoutput>#form.username#</cfoutput>
</cfif>---> <!---use this for post--->

<cfif #isDefined("form.username")#>
	<cfoutput>#form.username#</cfoutput>
</cfif>

<cfif #isDefined("form.password")#>
	<cfoutput>#form.password#</cfoutput>
	<cfelseif #IsDefined("form.password") lt 8#>
		<cfoutput><span>Please use eight characters in the password</span></cfoutput>
</cfif>

<!---<cfdump var="#url#">--->

<cfset myview.getView("../views/footer.html")>