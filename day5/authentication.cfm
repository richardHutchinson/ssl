<cfset myview = new models.Views()>
<cfset posts = new models.Posts()>
<cfset users = new models.Users()>

<cfif #isDefined("url.action")#>
	<cfset action = url.action>
	<cfif #action# == 'checklogin'>
		<cfset data = users.checkUser(form.userName,form.password)>
		<cfif IsQuery(#data#)>
			<cflock timeout="20" scope="session" type="exclusive">
				<cfset session.isloggedin = "1">
				<cfset session.userId = #data.userId#>
			</cflock>
			<cflocation url="http://localhost:9999/ssl/day5/post.cfm">
		<cfelseif IsArray(#data#)>
			<cflocation url="http://localhost:9999/ssl/day5/">
		</cfif>
	<cfelseif #action# == 'logout'>
		<cflock timeout="20" scope="session" type="exclusive">
			<cfset session.isloggedin = "0">
			<cfset StructDelete(session,"userId")>
		</cflock>
		<cfset StructClear(session)>
		<cflocation url="http://localhost:9999/ssl/day5/">
	<cfelseif #action# == 'userRegistration'>
		<cfset data = users.createUser(form.userName,form.password,form.email)>
		<cfif IsQuery(#data#)> 
			<cflock timeout="20" scope="session" type="exclusive">
				<cfset session.isloggedin = "1">
				<cfset session.userId = #data.userId#>
			</cflock>
			<cflocation url="http://localhost:9999/ssl/day5/post.cfm">
		<cfelseif IsArray(#data#)>
			<cflocation url="http://localhost:9999/ssl/day5/">
		</cfif>
	</cfif>
</cfif>