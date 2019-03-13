CREATE TABLE `s4922402`.`user` (
  `usr_id` INT NOT NULL AUTO_INCREMENT,
  `usr_email` VARCHAR(100) NOT NULL,
  `usr_my_key` VARCHAR(50) NOT NULL,
  `usr_first_name` VARCHAR(50) NOT NULL,
  `usr_last_name` VARCHAR(50) NOT NULL,
  `usr_bio` TEXT(1000) NULL,
  `usr_assigned_lecturer` INT NULL,
  `usr_auth_level` INT NOT NULL DEFAULT 0,
  PRIMARY KEY (`usr_id`),
  UNIQUE INDEX `id_UNIQUE` (`usr_id` ASC),
  UNIQUE INDEX `email_UNIQUE` (`usr_email` ASC));
