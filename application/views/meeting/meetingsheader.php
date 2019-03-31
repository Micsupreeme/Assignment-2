<?php
	echo '<a href="' . base_url('meeting/arrange') . '">New Meeting</a><h1>Meetings</h1>';
	if(empty($user_instance)) {
		echo '<p><a href="' . base_url('user/profile/' . $current_user['usr_id']) . '">' . $current_user['usr_first_name'] . ' ' . $current_user['usr_last_name'] . "</a> has no outstanding meetings with ";
	} else {
		echo '<p>Browse <a href="' . base_url('user/profile/' . $current_user['usr_id']) . '">' . $current_user['usr_first_name'] . ' ' . $current_user['usr_last_name'] . "</a>'s meetings with ";
	}
	if($this->session->userdata('authLevel') > 0) {
		echo 'students';
	} else {
		echo 'lecturers';
	}
	if(empty($user_instance)) {
		echo '.</p><table>';
	} else {
		echo ':</p><table><tr><td>Meeting</td><td></td></tr>';
	}
?>