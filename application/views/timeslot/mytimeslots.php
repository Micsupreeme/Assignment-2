<h1>My Timeslots</h1>
<p>Browse <?php echo '<a href="' . base_url('user/profile/' . $lecturer['usr_id']) . '">' . $lecturer['usr_first_name'] . ' ' . $lecturer['usr_last_name'] . '</a>'; ?>'s timeslots:</p>
<?php foreach ($timeslot_instance as $timeslot): ?>
	<div class="main"><p>
		<?php echo 'From ' . $timeslot['tsl_start'] . ' to ' . $timeslot['tsl_end'] . ' in ' . $timeslot['tsl_location'] . ' ' . '<a href="'. $_SERVER['PHP_SELF'] . '?deletetimeslot=' . $timeslot['tsl_id'] . '">Delete</a>' ?>
	</p></div>
<?php endforeach; ?>