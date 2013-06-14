<cfset myview = new models.Views()>

<cfset myview.getView("../views/header.html",array())>

<a href="?controller=blog">blog</a>

<cfif  #IsDefined("url.controller")#>
	<cfif url.controller is "blog">
		<cfheader value="blog.cfm">
	</cfif>
</cfif>

<cfset myview.getView("../views/footer.html")>