<cfset myview = new models.Views()>
<cfset posts = new models.Posts()>

<cfif StructKeyExists(session,"isloggedin")>
	<cfif session.isloggedin == 1>
	<cfelseif session.isloggedin != 1>
		<cflocation url="http://localhost:9999/ssl/day6/index.cfm">
	</cfif>
<cfelse>
	<cfset session.isloggedin = 0>
		<cflocation url="http://localhost:9999/ssl/day6/index.cfm">
</cfif>

<cfif #IsDefined("url.action")#>
	<cfset action = url.action>
	<cfif #action# is ''>
		<cfset data = posts.getAll()>
	<cfelseif #action# is 'getAll'>
		<cfset data = posts.readPosts()>
		<cfset myview.getView("../views/body.cfm",data)>
	<cfelseif #action# is 'readPost'>
		<cfset data = posts.readPost(url.postId)>
		<cfset myview.getView("../views/blogPost.cfm",data)>
	<cfelseif #action# is 'createPost'>
		<cfset data = posts.createPost(form.title,form.detail,#session.userId#)>
		<cfset data = posts.readPosts()>
		<cfset myview.getView("../views/body.cfm",data)>
	<cfelseif #action# is 'deletePost'>
		<cfset data = posts.deletePost(url.postId)>
		<cfset data = posts.readPosts()>
		<cfset myview.getView("../views/body.cfm",data)>
	<cfelseif #action# is 'updateForm'>
		<cfset data = posts.getPost(url.postId)>
		<cfset myview.getView("../views/formUpdate.cfm",data)>
	<cfelseif #action# is 'updatePost'>
		<!---<cfset posts.updatePost(form.title,form.detail,form.postId)>--->
		<cfset posts.updatePost(form.postId)>
		<cfset data = posts.readPosts()>
		<cfset myview.getView("../views/body.cfm",data)>
	</cfif>
<!---<cfelseif NOT #IsDefined("url.postId")#>
	<cfset myview.getView("../views/home.cfm",array())>--->
<cfelse>
	<cfset myview.getView("../views/home.cfm",array())>
</cfif>