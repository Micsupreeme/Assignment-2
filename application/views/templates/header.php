<html>
<head>
    <title><?php echo $title; ?></title>
</head>
<body>
    <div id="navBar">
        <ul>
            <li><a href="<?php echo base_url('user/profile/' . $this->session->userdata('id'));?>">Profile</a></li>
            <li><a href="<?php echo base_url('message/inbox/');?>">Messages</a></li>
            <li><a href="">Meetings</a></li>
            <li><a href="<?php echo base_url('user/addressbook/');?>">Address Book</a></li>
            <li><a href="<?php echo base_url('user/mystudents/');?>">My Students</a></li>
            <li><a href="">My Time Slots</a></li>
            <li><a href="<?php echo base_url('user/logout/');?>">Logout</a></li>
        </ul>
    </div>
