<html>
<head>
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/style.css')?>"/>
</head>
<body>
    <div id="navBar" class="topnav" id="myTopnav" si>
        <a href="<?php echo base_url('index.php/user/profile/' . $this->session->userdata('id'));?>">My Profile</a>
        <a href="<?php echo base_url('index.php/message/inbox');?>">Messages</a>
        <a href="<?php echo base_url('index.php/meeting/display');?>">Meetings</a>
        <a href="<?php echo base_url('index.php/user/addressbook');?>">Address Book</a>
        <div class="topnav-right"><a href="<?php echo base_url('index.php/user/logout/');?>">Logout</a></div>
        <?php
            if($this->session->userdata('authLevel') > 0) { //Only show these navigation bar items to Lecturers and Administrators
                echo '<div class="topnav-right"><a href="' . base_url('index.php/timeslot/manage') . '">My Timeslots</a></div>
                    <div class="topnav-right"><a href="' . base_url('index.php/message/myannouncements') . '">My Announcements</a></div>
                    <div class="topnav-right"><a href="' . base_url('index.php/user/students') . '">My Students</a></div>';
            }
        ?>
    </div>
