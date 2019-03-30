<h1>Address Book</h1>
<p>Browse all users:</p>
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
		<?php echo '<a href="' . base_url('user/profile/' . $user['usr_id']) . '">' . $user['usr_last_name'] . ', ' . $user['usr_first_name'] . '</a>'?>
	</p></div>
<?php endforeach; ?>