<cfset myview = new models.Views()>
<cfset users = new models.Users()>

<cfset myview.getView("../views/header-coldfusion.html",array())>

<!---<cfchart
         format="png"
         scalefrom="0"
         scaleto="1200000"
         pieslicestyle="solid">
	<cfchartseries
	             type="pie"
	             serieslabel="Website Traffic 2006"
	             seriescolor="blue">
		<cfchartdata item="January" value="503100">
		<cfchartdata item="February" value="720310">
		<cfchartdata item="March" value="688700">
		<cfchartdata item="April" value="986500">
		<cfchartdata item="May" value="1063911">
		<cfchartdata item="June" value="1125123">
	</cfchartseries>
</cfchart>--->

<a href="?controller=user">Show Users!</a>
<cfif #IsDefined("url.controller")#>
	<cfif url.controller is "user">
		<cflocation url="user.cfm?action=getAll">
	</cfif>
</cfif>

<cfset myview.getView("../views/footer.html",array())>