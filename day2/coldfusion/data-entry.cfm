<cfset myview = new Views()>

<cfset myview.getView("../views/header.html")>
<cfset myview.getView("../views/data-entry-form.cfm")>

<!---<cfoutput>#form.username#</cfoutput>--->

<!---<cfif #isDefined("form.username")#>
	<cfoutput>#form.username#</cfoutput>
</cfif>---> <!---use this for post--->

<cfif #isDefined("form.date")#>
	<cfoutput>#form.date#</cfoutput>
</cfif>
<br />
<cfif #isDefined("form.experience")#>
	<cfoutput>#form.experience#</cfoutput>
</cfif>
<br />
<cfif #isDefined("form.salary")#>
	<cfoutput>#form.salary#</cfoutput>
</cfif>
<br />
<cfif #isDefined("form.website")#>
	<cfoutput>#form.website#</cfoutput>
</cfif>
<br />
<cfif #isDefined("form.transportation")#>
	<cfoutput>#form.transportation#</cfoutput>
</cfif>
<br />
<cfif #isDefined("form.gender")#>
	<cfoutput>#form.gender#</cfoutput>
</cfif>
<br />
<cfif #isDefined("form.newsLetter")#>
	<cfoutput>#form.newsLetter#</cfoutput>
</cfif>
<br />

<!---<cfdump var="#url#">--->

<cfset myview.getView("../views/footer.html")>