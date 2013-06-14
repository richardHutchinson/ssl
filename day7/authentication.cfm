<cfset myview = new models.Views()>
<cfset posts = new models.Posts()>
<cfset users = new models.Users()>
<cfset image = new models.Images()>

<cfif #isDefined("url.action")#>
	<cfset action = url.action>
	<cfif #action# == 'checklogin'>
		<cfset data = users.checkUser(form.userName,form.password)>
		<cfif IsQuery(#data#)>
			<cflock timeout="20" scope="session" type="exclusive">
				<cfset session.isloggedin = "1">
				<cfset session.userId = #data.userId#>
				<cfset session.profileImg = #data.imageName#>
			</cflock>
			<cflocation url="http://localhost:9999/ssl/day7/post.cfm">
		<cfelseif IsArray(#data#)>
			<cflocation url="http://localhost:9999/ssl/day7/">
		</cfif>
	<cfelseif #action# == 'logout'>
		<cflock timeout="20" scope="session" type="exclusive">
			<cfset session.isloggedin = "0">
			<cfset session.captcha = "">
			<cfset StructDelete(session,"userId")>
		</cflock>
		<cfset StructClear(session)>
		<cflocation url="http://localhost:9999/ssl/day7/">
	<cfelseif #action# == 'userRegistration'>
		<cfif form.captcha == #session.captcha#>
			<cfset data = users.createUser(form.userName,form.password,form.email)>
			<cfif IsQuery(#data#)>
				<cfset ext = image.uploadImg(form.profileimg,#data.userName#)>
				<cfset profImg = users.newUserAddProfImg(form.userName,"profile"&data.userName&"."&#ext#)>
				<cflock timeout="20" scope="session" type="exclusive">
					<cfset session.isloggedin = "1">
					<cfset session.userId = #data.userId#>
					<!---<cfset session.profileImg = #profImg#>--->
					<cfset session.profileImg = form.profileimg> <!---don't need pounds--->
				</cflock>
				<cflocation url="http://localhost:9999/ssl/day7/post.cfm">
			<cfelseif IsArray(#data#)>
				<cflocation url="http://localhost:9999/ssl/day7/">
			</cfif>
		<cfelseif form.captcha IS NOT #session.captcha#>
			<cflocation url="http://localhost:9999/ssl/day7/">
		</cfif>
	</cfif>
</cfif>