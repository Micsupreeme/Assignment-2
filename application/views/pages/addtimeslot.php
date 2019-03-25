<?php
	handleAddTimeslot($lecturer);
	
	function handleAddTimeslot($lecturer) {
		if(isset($_POST['txtLocation'])) {
		echo 'Information received: ' . $_POST['txtLocation'];
		echo '. Add timeslot for ' . $lecturer['usr_first_name'] . ' ' . $lecturer['usr_last_name'];
		//A new timeslot form has been submitted, perform add timeslot database operation here
		}
	}
?>

<form name="addTime" method="post" action="">
	<h1>Timeslot</h1>
	<p>Start Date/Time <input type="date" name="dateStart"></p>
	<p>End Date/Time <input type="date" name="dateStart"></p>
	<p>Location <input type="text" name="txtLocation"></p>
	<input type="submit" name="addTimeSubmit" value="Submit">
	<input type="reset" name="addTimeClear" value="Clear">
</form>