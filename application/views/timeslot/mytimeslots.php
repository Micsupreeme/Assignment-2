<h1>My Timeslots</h1>
<p>Browse <?php echo '<a href="' . substr($_SERVER['PHP_SELF'], 0, -18) . 'user/profile/' . $lecturer['usr_id'] . '">' . $lecturer['usr_first_name'] . ' ' . $lecturer['usr_last_name'] . '</a>'; ?>'s Timeslots</p>
<?php foreach ($timeslot_instance as $timeslot): ?>
	<div class="main"><p>
		<?php echo 'From ' . $timeslot['tsl_start'] . ' to ' . $timeslot['tsl_end'] . ' in ' . $timeslot['tsl_location'] . ' ' . '<a href="'. $_SERVER['PHP_SELF'] . '?delete=' . $timeslot['tsl_id'] . '">Delete</a>' ?>
	</p></div>
<?php endforeach; ?>