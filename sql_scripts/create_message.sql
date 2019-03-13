CREATE TABLE `s4922402`.`message` (
  `msg_id` INT NOT NULL AUTO_INCREMENT,
  `msg_author` INT NOT NULL,
  `msg_subject` VARCHAR(200) NOT NULL,
  `msg_recipient` VARCHAR(100) NOT NULL,
  `msg_date` DATETIME NOT NULL,
  `msg_body` TEXT(1000) NOT NULL,
  PRIMARY KEY (`mess_id`));
