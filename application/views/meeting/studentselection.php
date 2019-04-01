<?php
	if(empty($student_instance)) {
		echo '<p>Unfortunately, you cannot arrange a meeting because there are no students assigned to you.</p>';
	} else {
		echo '<p>Select a student who is assigned to you, to arrange a meeting with them:</p>';
		echo '<table><tr><td>Name</td><td></td></tr>';
	}		
	foreach ($student_instance as $student):
		echo '<div class="main"><tr><td><a href="' . base_url('index.php/user/profile/' . $student['usr_id']) . '">' . $student['usr_last_name'] . ', ' . $student['usr_first_name'] . '</a></td><td>';
		echo '<a href="'. $_SERVER['PHP_SELF'] . '?selecttimeslot=' . $selecttimeslot . '&selectstudent=' . $student['usr_id'] . '">Select Student</a></td></tr></div>';
	endforeach;
	echo '</table>';
?>