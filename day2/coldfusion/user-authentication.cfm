<cfset myview = new Views()>

<cfset myview.getView("../views/header.html")>
<cfset myview.getView("../views/user-authentication-form.cfm")>

<!---<cfoutput>#form.username#</cfoutput>--->

<!---<cfif #isDefined("form.username")#>
	<cfoutput>#form.username#</cfoutput>
</cfif>---> <!---use this for post--->
<br />
<cfif #isDefined("form.username")#>
	<cfoutput>#form.username#</cfoutput> <!---fill in the form and the info will display--->
	<cfelse>
		<cfoutput>Please fill in the Username</cfoutput>
</cfif>
<br />
<cfif #IsDefined("form.password")#>
	<cfoutput>#form.password#</cfoutput>
</cfif>
<br />
<cfif #IsDefined("form.email")#>
	<cfoutput>#form.email#</cfoutput>
</cfif>

<!---<cfif #isDefined("form.password")#>
	<cfoutput>#form.password#</cfoutput>
	<cfelseif #IsDefined("form.password") lt 8#>
		<cfoutput><span>Please use eight characters in the password</span></cfoutput>
</cfif> not working--->

<!---<cfdump var="#url#">--->

<cfset myview.getView("../views/footer.html")>