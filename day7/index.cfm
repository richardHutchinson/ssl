<cfset myview = new models.Views()>
<cfset items = new models.Items()>

<cffile action="read" file="#ExpandPath('http://news.yahoo.com/rss/college-sports')#" variable="entries">

<cfset entriesXml = XMLParse(#entries#)>
<cfset title = XMLSearch(entriesXml,"//title")>
<cfset description = XMLSearch(entriesXml,"//description")>
<cfset date = XMLSearch(entriesXml,"//pubDate")>

<cfset myview.getView("../views/header-coldfusion.html",array())>

<div class="content">
	<!---<cfset captchaMsg = Mid((Hash(Now(),"MD5")),1,5)>
	<cflock timeout="20" scope="session" type="exclusive">
		<cfset session.captcha = #captchaMsg#>
	</cflock>--->
	
	<!---<cfset myview.getView("../views/formLogin.cfm",array())>
	<cfset myview.getView("../views/formRegister.cfm",#captchaMsg#)>--->
	
	<!---<cfdump var="variable_name">---> <!---this is how to dump a variable name--->
	
<cfloop index="i" from="1" to="20">
	<cfset items.createEntries("#title[i].xmlText#","#description[i].xmlText#","#date[i].xmlText#")>
</cfloop>
	
	<!---<cfdump var = "#title#">--->
</div>

<cfset myview.getView("../views/footer-coldfusion.html",array())>