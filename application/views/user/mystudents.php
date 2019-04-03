<h1>My Students</h1>
<?php 
	if(empty($user_instance)) {
		echo '<p>There are no students assigned to you.</p>';
	} else {
		echo '<p>Browse students assigned to you:</p>';
		echo '<table><tr><th>Name</th><td></td></tr>';
	}
?>
<?php foreach ($user_instance as $user): ?>
	<div class="main"><tr><td>
		<?php echo '<a href="' . base_url('user/profile/' . $user['usr_id']) . '">' . $user['usr_last_name'] . ', ' . $user['usr_first_name'] . '</a>'; ?>
	</td><td>
		<?php echo '<a href="' . $_SERVER['PHP_SELF'] . '?removestudent=' . $user['usr_id'] . '">Remove Student</a>'; ?>
	</td></tr>
	</div>
<?php endforeach; ?>
</table>