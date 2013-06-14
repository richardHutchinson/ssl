<cfform action="?" method="get">
	<cfinput type="text" name="username" required="yes" validate="regular_expression" pattern="orcun" message="no no!">
	<cfinput type="submit" name="submit"> <!---note: use name="submit" not value="submit"--->
</cfform>