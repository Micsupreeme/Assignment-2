<h1>Arrange Meeting</h1>
<?php
	if(empty($timeslot_instance)) {
		if($this->session->userdata('authLevel') == 0) {
			echo '<p>Unfortunately, you cannot arrange a meeting because your assigned lecturer <a href="' . base_url('index.php/user/profile/' . $lecturer['usr_id']) . '">' . $lecturer['usr_first_name'] . ' ' . $lecturer['usr_last_name'] . '</a> has no available timeslots.</p>';
		} else {
			echo '<p>Unfortunately, you cannot arrange a meeting because you have no available timeslots. Please follow the My Timeslots link above to add new timeslots</p>';
		}
	} else {
		if($this->session->userdata('authLevel') == 0) {
			echo '<p>Select one of your assigned lecturer <a href="' . base_url('index.php/user/profile/' . $lecturer['usr_id']) . '">' . $lecturer['usr_first_name'] . ' ' . $lecturer['usr_last_name'] . "</a>'s available timeslots to arrange a meeting with them:</p>";
		} else {
			echo '<p>Select one of your available timeslots to arrange a meeting with an assigned student:</p>';
		}
		echo '<table><tr><td>Timeslot</td><td></td></tr>';
		
		foreach ($timeslot_instance as $timeslot):
			echo '<div class="main"><tr><td>From ' . $timeslot['tsl_start'] . ' to ' . $timeslot['tsl_end'] . ' in ' . $timeslot['tsl_location'] . '</td><td>';
			echo '<a href="'. $_SERVER['PHP_SELF'] . '?selecttimeslot=' . $timeslot['tsl_id'] . '">Select Timeslot</a></td></tr></div>';
		endforeach;
		echo '</table>';
	}
?>