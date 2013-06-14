<cfset myview = new models.Views()>
<cfset posts = new models.Posts()>

<cfset myview.getView("../views/header-coldfusion.html",array())>
<cfset myview.getView("../views/form.cfm",array())>

<cfif #IsDefined("url.action")#>
	<cfset action = url.action>
	<cfif #action# is ''>
		<cfset data = posts.getAll()>
	<cfelseif #action# is 'getAll'>
		<cfset data = posts.getAll()>
		<cfset myview.getView("../views/blog.cfm",data)>
	<cfelseif #action# is 'deletePost'>
		<cfset data = posts.deletePost(url.postId)>
		<cfset data = posts.getAll()>
		<cfset myview.getView("../views/blog.cfm",data)>
	<cfelseif #action# is 'updateForm'>
		<cfset myview.getView("../views/form.cfm",url.postId)>
	<cfelseif #action# is 'updatePost'>
		<cfset posts.updatePost(form.title,form.detail,form.postId)>
		<cfset data = posts.getAll()>
		<cfset myview.getView("../views/blog.cfm",data)>
	</cfif>
</cfif>

<cfset myview.getView("../views/footer-coldfusion.html",array())>