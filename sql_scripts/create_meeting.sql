CREATE TABLE `meeting` (
  `met_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `met_time_slot_id` int(11) NOT NULL,
  `met_title` varchar(100) NOT NULL,
  `met_lecturer_id` int(11) NOT NULL,
  `met_student_id` int(11) NOT NULL,
  PRIMARY KEY (`met_id`),
  UNIQUE KEY `id_UNIQUE` (`met_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
