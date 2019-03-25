<?php
	handleDeleteTimeslot();
	
	function handleDeleteTimeslot() {
		if(isset($_GET['delete'])) {
		echo 'Delete timeslot ID: ' . $_GET['delete'];
		//A timeslot has been specified for deletion in the "delete" GET variable, execute delete operation
		}
	}
?>
<h1>My Timeslots</h1>
<p>Browse <?php echo '<a href="' . substr($_SERVER['PHP_SELF'], 0, -18) . 'user/profile/' . $lecturer['usr_id'] . '">' . $lecturer['usr_first_name'] . ' ' . $lecturer['usr_last_name'] . '</a>'; ?>'s Timeslots</p>