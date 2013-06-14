<!---home.cfm--->
<!---add html--->

<!---<cfdump var="#data#">
make sure to put the image in a image array
<cfoutput>
	<img src="images/user_thumbs/#imageName#" width="77" height="80" />
</cfoutput>--->

<!---<cfoutput>
	<img src="images/user_thumbs/#session.profileImg#" width="77" height="80" />
</cfoutput>--->

<cfoutput>
	<img src="images/user_thumbs/#session.profileImg#" width="77" height="80" />
</cfoutput>
<span>
	<a href="post.cfm?action=getAll"><cfoutput>Show Posts</cfoutput></a> | 
	<a href="authentication.cfm?action=logout">Logout</a>
</span>