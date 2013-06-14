<cfset myview = new models.Views()>
<cfset users = new models.Users()>

<cfif #IsDefined("url.action")#>
	<cfset action = url.action>
	<cfif #action# is ''>
		<cfset data = users.getAll()>
	<cfelseif #action# is 'getAll'>
		<cfset data = users.getAll()>
		<cfset myview.getView("../views/body.cfm",data)>
	<cfelseif #action# is 'createUser'>
		<cfset data = users.createUser(form.userName,form.password,form.email)>
		<cfset data = users.getAll()>
		<cfset myview.getView("../views/body.cfm",data)>
	<cfelseif #action# is 'deleteUser'>
		<cfset data = users.deleteUser(url.userId)>
		<cfset data = users.getAll()>
		<cfset myview.getView("../views/body.cfm",data)>
	<cfelseif #action# is 'updateForm'>
		<cfset data = users.getUser(url.userId)>
		<!---<cfset data = users.getAll()>--->
		<cfset myview.getView("../views/formUpdate.cfm",data)>
	<cfelseif #action# is 'updateUser'>
		<cfset users.updateUser(form.userId)>
		<cfset data = users.getAll()>
		<cfset myview.getView("../views/body.cfm",data)>
	</cfif>
</cfif>