<cfform action="?" method="post">
	<label for="date">Date: </label>
	<cfinput type="text" name="date" message="Please fill in the date" required="yes" validate="regular_expression" pattern="((0?[13578]|10|12)(-|\/)((0[0-9])|([12])([0-9]?)|(3[01]?))(-|\/)((\d{4})|(\d{2}))|(0?[2469]|11)(-|\/)((0[0-9])|([12])([0-9]?)|(3[0]?))(-|\/)((\d{4}|\d{2})))" />
	<br />
	<label for="experience">Experience: </label>
	<cfinput type="text" name="experience" message="Please fill in years of experience" required="yes" validate="regular_expression" pattern="^(\+|-)?\d+$" />
	<br />
	<label for="salary">Salary: </label>
	<cfinput type="text" name="salary" message="Please fill in salary" required="yes" validate="regular_expression" pattern="^\$?([1-9]{1}[0-9]{0,2}(\,[0-9]{3})*(\.[0-9]{0,2})?|[1-9]{1}[0-9]{0,}(\.[0-9]{0,2})?|0(\.[0-9]{0,2})?|(\.[0-9]{1,2})?)$" />
	<br />
	<label for="website">Website: </label>
	<cfinput type="text" name="website" message="Please list a website" required="yes" validate="regular_expression" pattern="^([a-zA-Z0-9]([a-zA-Z0-9\-]{0,61}[a-zA-Z0-9])?\.)+[a-zA-Z]{2,6}$" />
	<br />
	<br />
	<label for="transportation">Transportation:</label>
	<br />
	<cfselect multiple="no" name="transportation">
		<option value="ownVehicle">Own Vehicle</option>
		<option value="carpool">Carpool</option>
		<option value="other">Other</option>
	</cfselect>
	<br />
	<br />
	<label for="gender">Gender</label>
	<br />
	<cfinput type="radio" name="gender" value="Male" required="yes" /> Male
	<cfinput type="radio" name="gender" value="Male" required="yes" /> Female
	<br />
	<!--http://www.homeandlearn.co.uk/php/php4p10.html-->
	<span>----</span>
	<br />
	<label for="newsLetter">Sign up for ProTask's newsletter?: </label>
	<br />
	Yes <cfinput type="checkbox" name="newsLetter" value="yes" required="yes" />
	No <cfinput type="checkbox" name="newsLetter" value="no" required="yes" />
	<br />
	<br />
	<cfinput type="submit" name="send" value="Send">
</cfform>