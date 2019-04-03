<?php 
	echo '<tr><td>Meeting with <a href="' . base_url('user/profile/' . $current_other_attendee['usr_id']) . '">' . $current_other_attendee['usr_first_name'] . ' ' . $current_other_attendee['usr_last_name'] . '</a> - ' . $current_meeting['met_title'] . ': ' . $current_timeslot['tsl_start'] . ' to ' . $current_timeslot['tsl_end'] . ' in ' . $current_timeslot['tsl_location'] . '</td>';
	echo '</td><td><a href="' . $_SERVER['PHP_SELF'] . '?deletemeeting=' . $current_meeting['met_id'] . '">Delete Meeting</a></td></tr>';
?>