CREATE TABLE `s4922402`.`meeting` (
  `met_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `met_time_slot_id` INT NOT NULL,
  `met_title` VARCHAR(100) NOT NULL,
  `met_lecturer_id` INT NOT NULL,
  `met_student_id` INT NOT NULL,
  PRIMARY KEY (`met_id`));
