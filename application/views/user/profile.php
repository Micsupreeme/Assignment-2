<h1><?php echo $user_instance['usr_first_name']; ?>'s Profile</h1>
<img src="<?php
switch ($user_instance['usr_auth_level']) {
	case 0:
		echo base_url('images/student_pic.png');
		break;
	case 1:
		echo base_url('images/lecturer_pic.png');
		break;
	case 2:
		echo base_url('images/administrator_pic.png');
		break;
	default:
		echo base_url('images/student_pic.png');
		break;
}?>"/><br>
<?php if ('/Assignment-2/index.php/user/profile/' . $this->session->userdata('id')==($_SERVER['REQUEST_URI'])){
    echo '<a href=" ' . base_url('user/editprofile') . ' ">Edit Profile</a><br>';
}?>
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
    }?></label><br>
<?php
	/*E-mail address, Assigned Lecturer and Bio are protected by profile visibility settings.
	There are 3 cases when you can view this data:
		1. Profile visibility is set to "All Users".
		2. You are looking at your own profile.
		3. Profile visibility is set to "Lecturers Only" and you are a Lecturer or Administrator.
	*/
	if($user_instance['usr_profile_is_private'] == 0 || $user_instance['usr_id'] == $this->session->userdata('id') || ($user_instance['usr_profile_is_private'] == 1 && $this->session->userdata('authLevel') > 0)) {
		echo '<label>Email:' . $user_instance['usr_email'] . '</label><br>';
		
		if($user_instance['usr_auth_level'] == 0) { //Only display an assigned lecturer for students
			$data['user_lecturer'] = $this->User_model->get_user($user_instance['usr_assigned_lecturer_id']);
			if (empty($data['user_lecturer'])) { //If the student has no assigned lecturer, display something else instead of NULL
				echo '<label>Assigned Lecturer: Not Set</label><br>';
			} else {
				echo '<label>Assigned Lecturer: ' . '<a href="' . base_url('user/profile/' . $data['user_lecturer']['usr_id']) . '">' . $data['user_lecturer']['usr_first_name'] . ' ' . $data['user_lecturer']['usr_last_name'] . '</a></label><br>';
			}
		}
		
		echo '<br><label>Bio:</label>
		<p class="bioParagraph">' . $user_instance['usr_bio'] . '</p>';
	}
?>
