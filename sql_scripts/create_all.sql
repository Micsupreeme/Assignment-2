CREATE TABLE `user` (
  `usr_id` int(11) NOT NULL AUTO_INCREMENT,
  `usr_email` varchar(100) NOT NULL,
  `usr_my_key` varchar(60) NOT NULL,
  `usr_first_name` varchar(50) NOT NULL,
  `usr_last_name` varchar(50) NOT NULL,
  `usr_bio` text,
  `usr_assigned_lecturer_id` int(11) DEFAULT NULL,
  `usr_auth_level` int(11) NOT NULL DEFAULT '0',
  `usr_profile_is_private` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`usr_id`),
  UNIQUE KEY `id_UNIQUE` (`usr_id`),
  UNIQUE KEY `email_UNIQUE` (`usr_email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `message` (
  `msg_id` int(11) NOT NULL AUTO_INCREMENT,
  `msg_author` varchar(200) NOT NULL,
  `msg_subject` varchar(200) NOT NULL,
  `msg_recipient` varchar(100) NOT NULL,
  `msg_date` datetime NOT NULL,
  `msg_body` text NOT NULL,
  `msg_read` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`msg_id`),
  UNIQUE KEY `id_UNIQUE` (`msg_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `timeslot` (
  `tsl_id` int(11) NOT NULL AUTO_INCREMENT,
  `tsl_start` datetime NOT NULL,
  `tsl_end` datetime NOT NULL,
  `tsl_lecturer_id` int(11) NOT NULL,
  `tsl_booked` tinyint(1) NOT NULL DEFAULT '0',
  `tsl_location` varchar(100) NOT NULL,
  PRIMARY KEY (`tsl_id`),
  UNIQUE KEY `id_UNIQUE` (`tsl_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `meeting` (
  `met_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `met_time_slot_id` int(11) NOT NULL,
  `met_title` varchar(100) NOT NULL,
  `met_lecturer_id` int(11) NOT NULL,
  `met_student_id` int(11) NOT NULL,
  PRIMARY KEY (`met_id`),
  UNIQUE KEY `id_UNIQUE` (`met_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;