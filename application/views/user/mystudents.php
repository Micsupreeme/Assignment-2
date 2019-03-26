<?php foreach ($user_instance as $user): ?>
	<div class="main"><p>
		<?php echo '<a href="' . substr($_SERVER['PHP_SELF'], 0, -10) . 'profile/' . $user['usr_id'] . '">' . $user['usr_last_name'] . ', ' . $user['usr_first_name'] . '</a>'?>
	</p></div>
<?php endforeach; ?>