<cfset myview = new models.Views()>

<cfset myview.getView("../views/header-coldfusion.html",array())>

<div class="content">
	<cfset captchaMsg = Mid((Hash(Now(),"MD5")),1,5)>
	<cflock timeout="20" scope="session" type="exclusive">
		<cfset session.captcha = #captchaMsg#>
	</cflock>
	
	<cfset myview.getView("../views/formLogin.cfm",array())>
	<cfset myview.getView("../views/formRegister.cfm",#captchaMsg#)>
</div>

<cfset myview.getView("../views/footer-coldfusion.html",array())>