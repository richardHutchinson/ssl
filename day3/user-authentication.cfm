<cfset myview = new models.Views()>

<cfset myview.getView("../views/header.html",array())>
<cfset myview.getView("../views/user-authentication-form.cfm",array())>

<!---<cfoutput>#form.username#</cfoutput>--->

<!---<cfif #isDefined("form.username")#>
	<cfoutput>#form.username#</cfoutput>
</cfif>---> <!---use this for post - Url is for get--->

<!---<cfset t = "hi">
<cfdump var="#t#">--->

<cfif #isDefined("form.username")#>
	<cfoutput>#form.username#</cfoutput>
</cfif>

<!---<cfif #isDefined("form.password")#>
	<cfoutput>#form.password#</cfoutput>
	<cfelseif #IsDefined("form.password") lt 8#>
		<cfoutput><span>Please use eight characters in the password</span></cfoutput>
</cfif>--->

<!---<cfdump var="#url#">--->

<cfset myview.getView("../views/footer.html",array())>