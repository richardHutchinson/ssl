<cfset myview = new Views()>

<cfset myview.getView("../views/header.html")>
<cfset myview.getView("../views/form.cfm")>

<!---<cfoutput>#form.username#</cfoutput>--->

<!---<cfif #isDefined("form.username")#>
	<cfoutput>#form.username#</cfoutput>
</cfif>---> <!---use this for post--->

<cfdump var="#url#">

<cfif #isDefined("url.username")#>
	<cfoutput>#url.username#</cfoutput>
</cfif> <!---use this for get--->

<cfset myview.getView("../views/footer.html")>

<!---create form, validate, output info--->