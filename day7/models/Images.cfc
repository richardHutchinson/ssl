<cfcomponent>
	<cffunction name="captcha" returntype="void" access="public">
		<cfargument name="msg" type="any">
		<cfimage action="captcha" fontSize="20" width="100" height="30" text="#msg#" fonts="Arial,Verdana">
	</cffunction>
	
	<cffunction name="uploadImg" access="public">
		<cfargument name="imgfile" type="any">
		<cfargument name="user" type="any">
		<cfset newFileName = "profile"&#user#>
		<cffile action="upload" filefield="#imgfile#" destination="../images/user_thumbs" nameconflict="overwrite">
		<cffile action="rename" source="../images/user_thumbs/#cffile.serverfile#" destination="../images/user_thumbs/#newFileName#.#cffile.serverfileext#">
		
		<cfreturn "#cffile.serverfileext#">
	</cffunction>
</cfcomponent>