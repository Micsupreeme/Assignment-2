<html>
<head>
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="<?php echo base_url(substr($_SERVER['PHP_SELF'], 0, -9) .'css/style')?>"/>
</head>
<body>
    <div id="navBar" class="topnav" id="myTopnav" si>
            <a href="<?php echo base_url('user/profile/' . $this->session->userdata('id'));?>">My Profile</a>
            <a href="<?php echo base_url('message/inbox');?>">Messages</a>
            <a href="">Meetings</a>
            <a href="<?php echo base_url('user/addressbook');?>">Address Book</a>
			<?php
				if($this->session->userdata('authLevel') > 0) { //Only show these navigation bar items to Lecturers and Administrators
					echo '<a href="' . base_url('user/students') . '">My Students</a>
					<a href="' . base_url('timeslot/manage') . '">My Timeslots</a>';
				}
			?>
            <a href="<?php echo base_url('user/logout/');?>">Logout</a>
    </div>
