<!---may have to put these in the webroot folder in the railo folder - seems my paths are changed to look in my xamp folder, no need to change the path--->
<!---http://localhost:9999/--->

<!---<cfinclude template="">--->
<cfset myview = new Views()>

<html>

<body>
	<cfset myview.getView("../views/header.html")>
	<cfset myview.getView("../index.html")>
	<cfset myview.getView("../views/footer.html")>
</body>