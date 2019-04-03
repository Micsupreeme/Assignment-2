<?php
    echo '<h1>Meetings</h1>';
	if(empty($meeting_instance)) {
		echo '<p>You have no outstanding meetings with ';
	} else {
		echo '<p>Browse your meetings with ';
	}
	if($this->session->userdata('authLevel') > 0) {
		echo 'students';

	} else {
		echo 'your assigned lecturer';
	}
    echo '<br>';
    echo '<br>';
    echo '<a href="' . base_url('index.php/meeting/arrange') . '">New Meeting</a>';
	if(empty($meeting_instance)) {
		echo '.</p><table>';
	} else {
		echo ':</p><table><tr><th>Meeting</th><td></td></tr>';
	}

?>