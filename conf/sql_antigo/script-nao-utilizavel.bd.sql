-- MySQL Script generated by MySQL Workbench
-- Mon Oct 31 14:59:50 2022
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema TCC
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `TCC` ;

-- -----------------------------------------------------
-- Schema TCC
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `TCC` DEFAULT CHARACTER SET utf8 ;
USE `TCC` ;

-- -----------------------------------------------------
-- Table `TCC`.`arduino`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TCC`.`arduino` ;

CREATE TABLE IF NOT EXISTS `TCC`.`arduino` (
  `id_arduino` INT(11) NOT NULL,
  `temp_value` FLOAT NULL,
  `AcY` FLOAT NULL,
  `AcX` FLOAT NULL,
  `AcZ` FLOAT NULL,
  `GyX` FLOAT NULL,
  `GyY` FLOAT NULL,
  PRIMARY KEY (`id_arduino`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `TCC`.`exercicio`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TCC`.`exercicio` ;

CREATE TABLE IF NOT EXISTS `TCC`.`exercicio` (
  `id_exercicio` INT(11) NOT NULL,
  `nome_exercicio` VARCHAR(255) NULL,
  PRIMARY KEY (`id_exercicio`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `TCC`.`funcao`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TCC`.`funcao` ;

CREATE TABLE IF NOT EXISTS `TCC`.`funcao` (
  `id_funcao` INT(11) NOT NULL,
  `nome` VARCHAR(255) NULL,
  PRIMARY KEY (`id_funcao`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `TCC`.`usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TCC`.`usuario` ;

CREATE TABLE IF NOT EXISTS `TCC`.`usuario` (
  `id_usuario` INT(11) NOT NULL,
  `nome` VARCHAR(255) NULL,
  `senha` VARCHAR(255) NULL,
  `email` VARCHAR(255) NULL,
  `cpf` VARCHAR(255) NULL,
  `id_funcao` INT(11) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  INDEX `fk_usuario_funcao1_idx` (`id_funcao` ASC),
  CONSTRAINT `fk_usuario_funcao1`
    FOREIGN KEY (`id_funcao`)
    REFERENCES `TCC`.`funcao` (`id_funcao`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `TCC`.`treino`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TCC`.`treino` ;

CREATE TABLE IF NOT EXISTS `TCC`.`treino` (
  `id_treino` INT(11) NOT NULL,
  `treino_repeticao` INT(11) NULL,
  `treino_tipo` VARCHAR(255) NULL,
  `id_usuario` INT(11) NOT NULL,
  PRIMARY KEY (`id_treino`, `id_usuario`),
  INDEX `fk_treino_usuario1_idx` (`id_usuario` ASC),
  CONSTRAINT `fk_treino_usuario1`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `TCC`.`usuario` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `TCC`.`exercicio_has_treino`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TCC`.`exercicio_has_treino` ;

CREATE TABLE IF NOT EXISTS `TCC`.`exercicio_has_treino` (
  `exercicio_id_exercicio` INT(11) NOT NULL,
  `treino_id_treino` INT(11) NOT NULL,
  PRIMARY KEY (`exercicio_id_exercicio`, `treino_id_treino`),
  INDEX `fk_exercicio_has_treino_treino1_idx` (`treino_id_treino` ASC),
  INDEX `fk_exercicio_has_treino_exercicio_idx` (`exercicio_id_exercicio` ASC),
  CONSTRAINT `fk_exercicio_has_treino_exercicio`
    FOREIGN KEY (`exercicio_id_exercicio`)
    REFERENCES `TCC`.`exercicio` (`id_exercicio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_exercicio_has_treino_treino1`
    FOREIGN KEY (`treino_id_treino`)
    REFERENCES `TCC`.`treino` (`id_treino`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `TCC`.`arduino_has_usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TCC`.`arduino_has_usuario` ;

CREATE TABLE IF NOT EXISTS `TCC`.`arduino_has_usuario` (
  `arduino_id_arduino` INT(11) NOT NULL,
  `usuario_id_usuario` INT(11) NOT NULL,
  PRIMARY KEY (`arduino_id_arduino`, `usuario_id_usuario`),
  INDEX `fk_arduino_has_usuario_usuario1_idx` (`usuario_id_usuario` ASC),
  INDEX `fk_arduino_has_usuario_arduino1_idx` (`arduino_id_arduino` ASC),
  CONSTRAINT `fk_arduino_has_usuario_arduino1`
    FOREIGN KEY (`arduino_id_arduino`)
    REFERENCES `TCC`.`arduino` (`id_arduino`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_arduino_has_usuario_usuario1`
    FOREIGN KEY (`usuario_id_usuario`)
    REFERENCES `TCC`.`usuario` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
