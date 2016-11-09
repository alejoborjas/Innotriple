-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`tbl_pulseras`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tbl_pulseras` (
  `codigo_pulsera` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `nombre_pulsera` VARCHAR(45) NOT NULL COMMENT '',
  `imagen` VARCHAR(200) NOT NULL COMMENT '',
  `disponibles` INT NOT NULL COMMENT '',
  `precio` INT NOT NULL COMMENT '',
  PRIMARY KEY (`codigo_pulsera`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`tbl_apartados`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tbl_apartados` (
  `codigo_apartado` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `codigo_pulsera` INT NOT NULL COMMENT '',
  PRIMARY KEY (`codigo_apartado`)  COMMENT '',
  INDEX `fk_tbl_apartados_tbl_pulseras1_idx` (`codigo_pulsera` ASC)  COMMENT '',
  CONSTRAINT `fk_tbl_apartados_tbl_pulseras1`
    FOREIGN KEY (`codigo_pulsera`)
    REFERENCES `mydb`.`tbl_pulseras` (`codigo_pulsera`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`tbl_usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tbl_usuarios` (
  `codigo_usuario` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `nombre` VARCHAR(45) NOT NULL COMMENT '',
  `apellido` VARCHAR(45) NOT NULL COMMENT '',
  `direccion` VARCHAR(200) NOT NULL COMMENT '',
  PRIMARY KEY (`codigo_usuario`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`tbl_factura`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tbl_factura` (
  `codigo_factura` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `codigo_usuario` INT NOT NULL COMMENT '',
  `codigo_apartado` INT NOT NULL COMMENT '',
  INDEX `fk_tbl_factura_tbl_usuarios1_idx` (`codigo_usuario` ASC)  COMMENT '',
  INDEX `fk_tbl_factura_tbl_apartados1_idx` (`codigo_apartado` ASC)  COMMENT '',
  PRIMARY KEY (`codigo_factura`)  COMMENT '',
  CONSTRAINT `fk_tbl_factura_tbl_usuarios1`
    FOREIGN KEY (`codigo_usuario`)
    REFERENCES `mydb`.`tbl_usuarios` (`codigo_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_factura_tbl_apartados1`
    FOREIGN KEY (`codigo_apartado`)
    REFERENCES `mydb`.`tbl_apartados` (`codigo_apartado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`tbl_usuarios_x_apartados`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tbl_usuarios_x_apartados` (
  `codigo_usuario` INT NOT NULL COMMENT '',
  `codigo_apartado` INT NOT NULL COMMENT '',
  INDEX `fk_tbl_usuarios_x_apartados_tbl_apartados1_idx` (`codigo_apartado` ASC)  COMMENT '',
  CONSTRAINT `fk_tbl_usuarios_x_apartados_tbl_usuarios`
    FOREIGN KEY (`codigo_usuario`)
    REFERENCES `mydb`.`tbl_usuarios` (`codigo_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_usuarios_x_apartados_tbl_apartados1`
    FOREIGN KEY (`codigo_apartado`)
    REFERENCES `mydb`.`tbl_apartados` (`codigo_apartado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
