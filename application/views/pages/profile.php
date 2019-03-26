<h1><?php echo $user_instance['usr_first_name']; ?>'s Profile</h1>
<label>Name: <?php echo $user_instance['usr_first_name'] . ' ' . $user_instance['usr_last_name']; ?> </label><br>
<label>Role: <?php
switch ($user_instance['usr_auth_level']) {
			case 0:
				echo "Student";
				break;
			case 1:
				echo "Lecturer";
				break;
			case 2:
				echo "Administrator";
				break;
			default:
				echo "Student";
				break;
		}
?></label><br>
<label>Email: <?php echo $user_instance['usr_email']; ?> </label><br>
<?php
if($user_instance['usr_auth_level'] == 0) { //Only display an assigned lecturer for students
	$data['user_lecturer'] = $this->User_model->get_user($user_instance['usr_assigned_lecturer_id']);
	echo '<label>Assigned Lecturer: ' . '<a href="' . substr($_SERVER['PHP_SELF'], 0, -1) . $data['user_lecturer']['usr_id'] . '">' . $data['user_lecturer']['usr_first_name'] . ' ' . $data['user_lecturer']['usr_last_name'] . '</a></label><br>';
}
?>
<label>Bio:</label><br>
<textarea readonly rows="4" cols="50"> <?php echo $user_instance['usr_bio']; ?> </textarea>
