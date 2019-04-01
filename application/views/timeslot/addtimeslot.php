<form name="addTime" method="post" action="">
		<h1>Add Timeslot</h1>
	<table>
		<tr><td>Start Date/Time</td><td><input type="datetime-local" name="dateStart"></td></tr>
		<tr><td>End Date/Time</td><td><input type="datetime-local" name="dateEnd"></td></tr>
		<tr><td>Location</td><td><input type="text" name="txtLocation"></td></tr>
	</table>
	<input type="submit" name="addTimeSubmit" value="Submit">
	<input type="reset" name="addTimeClear" value="Clear">
</form>