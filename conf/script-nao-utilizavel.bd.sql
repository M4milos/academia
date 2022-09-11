-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema TCC
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema TCC
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `TCC` DEFAULT CHARACTER SET utf8 ;
USE `TCC` ;

-- -----------------------------------------------------
-- Table `TCC`.`personal`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `TCC`.`personal` (
  `id_personal` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(250) NULL,
  `login` VARCHAR(250) NOT NULL,
  `senha` VARCHAR(250) NOT NULL,
  `email` VARCHAR(250) NULL,
  PRIMARY KEY (`id_personal`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `TCC`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `TCC`.`usuario` (
  `id_usuario` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(250) NULL,
  `login` VARCHAR(250) NOT NULL,
  `senha` VARCHAR(250) NOT NULL,
  `email` VARCHAR(250) NOT NULL,
  `id_personal` INT NOT NULL,
  PRIMARY KEY (`id_usuario`),
  INDEX `fk_usuario_personal1_idx` (`id_personal` ASC),
  CONSTRAINT `fk_usuario_personal1`
    FOREIGN KEY (`id_personal`)
    REFERENCES `TCC`.`personal` (`id_personal`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `TCC`.`treino`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `TCC`.`treino` (
  `id_treino` INT NOT NULL AUTO_INCREMENT,
  `treino_repeticao` INT NULL,
  `treino_tipo` VARCHAR(250) NULL,
  `usuario_id_usuario` INT NOT NULL,
  PRIMARY KEY (`id_treino`, `usuario_id_usuario`),
  INDEX `fk_treino_usuario1_idx` (`usuario_id_usuario` ASC),
  CONSTRAINT `fk_treino_usuario1`
    FOREIGN KEY (`usuario_id_usuario`)
    REFERENCES `TCC`.`usuario` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `TCC`.`exercicio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `TCC`.`exercicio` (
  `id_exercicio` INT NOT NULL AUTO_INCREMENT,
  `nome_exercicio` VARCHAR(250) NULL,
  `id_personal` INT NOT NULL,
  PRIMARY KEY (`id_exercicio`),
  INDEX `fk_exercicio_personal1_idx` (`id_personal` ASC),
  CONSTRAINT `fk_exercicio_personal1`
    FOREIGN KEY (`id_personal`)
    REFERENCES `TCC`.`personal` (`id_personal`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `TCC`.`treino_has_exercicio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `TCC`.`treino_has_exercicio` (
  `id_treino` INT NOT NULL,
  `id_exercicio` INT NOT NULL,
  PRIMARY KEY (`id_treino`, `id_exercicio`),
  INDEX `fk_treino_has_exercicio_exercicio1_idx` (`id_exercicio` ASC),
  INDEX `fk_treino_has_exercicio_treino1_idx` (`id_treino` ASC),
  CONSTRAINT `fk_treino_has_exercicio_treino1`
    FOREIGN KEY (`id_treino`)
    REFERENCES `TCC`.`treino` (`id_treino`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_treino_has_exercicio_exercicio1`
    FOREIGN KEY (`id_exercicio`)
    REFERENCES `TCC`.`exercicio` (`id_exercicio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
