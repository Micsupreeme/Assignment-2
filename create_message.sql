CREATE TABLE `s4922402`.`message` (
  `mess_id` INT NOT NULL AUTO_INCREMENT,
  `mess_author` INT NOT NULL,
  `mess_subject` VARCHAR(200) NOT NULL,
  `mess_recipient` VARCHAR(100) NOT NULL,
  `msg_date` DATETIME NOT NULL,
  `msg_body` TEXT(1000) NOT NULL,
  PRIMARY KEY (`mess_id`));
