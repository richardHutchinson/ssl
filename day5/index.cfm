<cfset myview = new models.Views()>

<cfset myview.getView("../views/header-coldfusion.html",array())>

<div class="content">
	<cfset myview.getView("../views/formLogin.cfm",array())>
	<cfset myview.getView("../views/formRegister.cfm",array())>
</div>

<cfset myview.getView("../views/footer-coldfusion.html",array())>