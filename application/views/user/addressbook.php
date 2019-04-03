<h1>Address Book</h1>
<p>Browse all users:</p>
<table>
		<tr>
			<th>Role</th>
			<th>Name</th>
			<th></th>
			<th></th>
			<th></th>
		</tr>
<?php foreach ($user_instance as $user): ?>
	<div class="main"><tr><td>
		<?php
		switch ($user['usr_auth_level']) {
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
		?></td>
		<td><?php echo '<a href="' . base_url('user/profile/' . $user['usr_id']) . '">' . $user['usr_last_name'] . ', ' . $user['usr_first_name'] . '</a>'; ?></td>
		
		<?php 
			//The "Message" action can be performed by anyone on anyone except themselves
			if($user['usr_id'] != $this->session->userdata('id')) {
				echo '<td><a href="'. base_url('message/newmessage/') . '?email=' . $user['usr_id'] . '">Message</a></td>';
			} else {
				echo '<td></td>';
			}
		
			//The "Add Student" action can be performed by Lecturers and Administrators on Students that do not have an assigned lecturer
			if($user['usr_auth_level'] == 0 && empty($user['usr_assigned_lecturer_id']) && $this->session->userdata('authLevel') > 0) {
				echo '<td><a href="' . $_SERVER['PHP_SELF'] . '?addstudent=' . $user['usr_id'] . '">Add Student</a></td>';
			} else {
				echo '<td></td>';
			}
			
			//The "Delete User" action can be performed by Administrators on anyone except themselves
			if($user['usr_id'] != $this->session->userdata('id') && $this->session->userdata('authLevel') > 1) {
				echo '<td><a href="' . $_SERVER['PHP_SELF'] . '?deleteuser=' . $user['usr_id'] . '">Delete User</a></td>';
			} else {
				echo '<td></td>';
			}
		?>
	</tr></div>
<?php endforeach; ?>
</table>