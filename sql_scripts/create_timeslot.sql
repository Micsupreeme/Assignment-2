CREATE TABLE `timeslot` (
  `tsl_id` int(11) NOT NULL AUTO_INCREMENT,
  `tsl_start` datetime NOT NULL,
  `tsl_end` datetime NOT NULL,
  `tsl_lecturer_id` int(11) NOT NULL,
  `tsl_booked` tinyint(1) NOT NULL DEFAULT '0',
  `tsl_location` varchar(100) NOT NULL,
  PRIMARY KEY (`tsl_id`),
  UNIQUE KEY `tsl_id_UNIQUE` (`tsl_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
