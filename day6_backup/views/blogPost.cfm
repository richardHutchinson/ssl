<!---add html--->

<cfloop query="data">
	<p>
		<h4><cfoutput>#title#</cfoutput></h4>
		<span><cfoutput>#detail#</cfoutput></span>
	</p>
</cfloop>
<span>
	<a href="../index.cfm">Back</a> | 
	<a href="authentication.cfm?action=logout">Logout</a>
</span>