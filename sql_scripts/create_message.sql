CREATE TABLE `message` (
  `msg_id` int(11) NOT NULL AUTO_INCREMENT,
  `msg_author` int(11) NOT NULL,
  `msg_subject` varchar(200) NOT NULL,
  `msg_recipient` varchar(100) NOT NULL,
  `msg_date` datetime NOT NULL,
  `msg_body` text NOT NULL,
  `msg_read` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`msg_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
