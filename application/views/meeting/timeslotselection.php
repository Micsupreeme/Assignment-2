<h1>Arrange Meeting</h1>
<?php
	if(empty($timeslot_instance)) {
		echo '<p><a href="' . base_url('index.php/user/profile/' . $lecturer['usr_id']) . '">' . $lecturer['usr_first_name'] . ' ' . $lecturer['usr_last_name'] . '</a> has no outstanding timeslots.</p>';
	} else {
		echo '<p>Browse <a href="' . base_url('index.php/user/profile/' . $lecturer['usr_id']) . '">' . $lecturer['usr_first_name'] . ' ' . $lecturer['usr_last_name'] . "</a>'s timeslots:</p>";
		echo '<table><tr><td>Timeslot</td><td></td></tr>';
		
		foreach ($timeslot_instance as $timeslot):
			echo '<div class="main"><tr><td>From ' . $timeslot['tsl_start'] . ' to ' . $timeslot['tsl_end'] . ' in ' . $timeslot['tsl_location'] . '</td><td>';
			echo '<a href="'. $_SERVER['PHP_SELF'] . '?selecttimeslot=' . $timeslot['tsl_id'] . '">Select Timeslot</a></td></tr></div>';
		endforeach;
		echo '</table>';
	}
?>