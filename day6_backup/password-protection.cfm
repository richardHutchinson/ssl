<cfset salt="wolverine">
<cfset password="orcun1234">

<br />
Salt:<cfoutput>#salt#</cfoutput>
<br />
Password:<cfoutput>#password#</cfoutput>

<cfset newpass=hash("#salt#"&"#password#","md5")>
<!---there's more in the pdf file--->

<!---log out--->