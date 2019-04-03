<h1>My Timeslots</h1>
<?php 
	if(empty($timeslot_instance)) {
		echo '<p>You have no outstanding timeslots.</p>';
	} else {
		echo '<p>Browse your timeslots:</p>';
		echo '<table><tr><th>Timeslot</th><td></td></tr>';
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