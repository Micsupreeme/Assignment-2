<h1>My Students</h1>
<p>Browse students assigned to <?php echo '<a href="' . base_url('user/profile/' . $lecturer['usr_id']) . '">' . $lecturer['usr_first_name'] . ' ' . $lecturer['usr_last_name'] . '</a>:'; ?></p>
<?php foreach ($user_instance as $user): ?>
	<div class="main"><p>
		<?php echo '<a href="' . base_url('user/profile/' . $user['usr_id']) . '">' . $user['usr_last_name'] . ', ' . $user['usr_first_name'] . '</a>'?>
	</p></div>
<?php endforeach; ?>