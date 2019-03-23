<?php foreach ($user_instance as $user): ?>
	<div class="main"><p>
		<?php
		switch ($user['usr_auth_level']) {
			case 0:
				echo "(Student) ";
				break;
			case 1:
				echo "(Lecturer) ";
				break;
			case 2:
				echo "(Administrator) ";
				break;
			default:
				echo "(Student) ";
				break;
		}
		?>
		<?php echo $user['usr_last_name'] . ', ' . $user['usr_first_name'] . ' '; ?><a href="<?php echo trim($_SERVER['PHP_SELF'], "addressbook") . 'view/' . $user['usr_id']; ?>">View Profile</a>
	</p></div>
<?php endforeach; ?>