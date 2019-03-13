CREATE TABLE `s4922402`.`timeslot` (
  `tsl_id` INT NOT NULL AUTO_INCREMENT,
  `tsl_start` DATETIME NOT NULL,
  `tsl_end` DATETIME NOT NULL,
  `tsl_lecturer_id` INT NOT NULL,
  `tsl_booked` TINYINT(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`tsl_id`),
  UNIQUE INDEX `tsl_id_UNIQUE` (`tsl_id` ASC));
