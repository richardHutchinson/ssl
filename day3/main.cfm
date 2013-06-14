<cfset myview = new models.Views()>
<cfset posts = new models.Posts()>

<cfset myview.getView("../views/header.html",array())>

<cfif isDefined("Url.pid")>
	<cfset data = posts.getPost(Url.pid)>
	<cfset myview.getView("../views/blog.cfm",data)>
</cfif>

<cfset myview.getView("../views/footer.html",array())>