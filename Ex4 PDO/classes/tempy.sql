-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema studentbd
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema studentbd
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `studentbd` DEFAULT CHARACTER SET utf8mb4 ;
USE `studentbd` ;

-- -----------------------------------------------------
-- Table `studentbd`.`etudiant`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `studentbd`.`etudiant` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(40) NULL DEFAULT NULL,
  `birthday` DATE NULL DEFAULT NULL,
  `image` VARCHAR(100) NULL DEFAULT NULL,
  `section` VARCHAR(3) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id` (`id` ASC) VISIBLE)
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `studentbd`.`section`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `studentbd`.`section` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `designation` VARCHAR(3) NULL DEFAULT NULL,
  `description` VARCHAR(100) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id` (`id` ASC) VISIBLE)
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `studentbd`.`student`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `studentbd`.`student` (
  `id` INT(11) NOT NULL,
  `name` VARCHAR(50) NULL DEFAULT NULL,
  `birthday` DATE NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id` (`id` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `studentbd`.`utilisateur`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `studentbd`.`utilisateur` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(30) NULL DEFAULT NULL,
  `password` VARCHAR(60) NULL DEFAULT NULL,
  `email` VARCHAR(30) NULL DEFAULT NULL,
  `role` ENUM('user', 'admin') NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id` (`id` ASC) VISIBLE)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8mb4;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
