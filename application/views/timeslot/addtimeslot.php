<form name="addTime" method="post" action="">
		<h1>Add Timeslot</h1>
	<table>
		<tr><th>Start Date/Time</th><td><input type="datetime-local" name="dateStart"></td></tr>
		<tr><th>End Date/Time</th><td><input type="datetime-local" name="dateEnd"></td></tr>
		<tr><th>Location</th><td><input type="text" name="txtLocation"></td></tr>
	</table>
	<input type="submit" name="addTimeSubmit" value="Submit">
	<input type="reset" name="addTimeClear" value="Clear">
</form>
<?php echo validation_errors(); ?>