<html>
<head>
    <title><?php echo $title; ?></title>
</head>
<body>
    <div id="navBar">
        <ul>
            <li><a href="<?php echo base_url('user/profile/' . $this->session->userdata('id'));?>">My Profile</a></li>
            <li><a href="<?php echo base_url('message/inbox');?>">Messages</a></li>
            <li><a href="">Meetings</a></li>
            <li><a href="<?php echo base_url('user/addressbook');?>">Address Book</a></li>
			<?php
				if($this->session->userdata('authLevel') > 0) { //Only show these navigation bar items to Lecturers and Administrators
					echo '<li><a href="' . base_url('user/students') . '">My Students</a></li>
					<li><a href="' . base_url('timeslot/manage') . '">My Timeslots</a></li>';
				}
			?>
            <li><a href="<?php echo base_url('user/logout/');?>">Logout</a></li>
        </ul>
    </div>
