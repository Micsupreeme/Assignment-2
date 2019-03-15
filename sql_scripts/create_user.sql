CREATE TABLE `user` (
  `usr_id` int(11) NOT NULL AUTO_INCREMENT,
  `usr_email` varchar(100) NOT NULL,
  `usr_my_key` varchar(50) NOT NULL,
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
