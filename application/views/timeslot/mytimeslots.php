<h1>My Timeslots</h1>
<?php 
	if(empty($timeslot_instance)) {
		echo '<p><a href="' . base_url('index.php/user/profile/' . $lecturer['usr_id']) . '">' . $lecturer['usr_first_name'] . ' ' . $lecturer['usr_last_name'] . '</a> has no timeslots.</p>';
	} else {
		echo '<p>Browse <a href="' . base_url('index.php/user/profile/' . $lecturer['usr_id']) . '">' . $lecturer['usr_first_name'] . ' ' . $lecturer['usr_last_name'] . "</a>'s timeslots:</p>";
		echo '<table><tr><td>Timeslot</td><td></td></tr>';
	}
?>
<?php foreach ($timeslot_instance as $timeslot): ?>
	<div class="main"><tr><td>
		<?php echo 'From ' . $timeslot['tsl_start'] . ' to ' . $timeslot['tsl_end'] . ' in ' . $timeslot['tsl_location']; ?>
	</td><td>
		<?php echo '<a href="'. $_SERVER['PHP_SELF'] . '?deletetimeslot=' . $timeslot['tsl_id'] . '">Delete Timeslot</a>'; ?>
	</td></tr>
	</div>
<?php endforeach; ?>
</table>