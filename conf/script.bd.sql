CREATE SCHEMA IF NOT EXISTS `tcc` DEFAULT CHARACTER SET utf8;
USE `tcc`;

    CREATE TABLE IF NOT EXISTS `tcc`.`usuario` (
        `id` INT NOT NULL AUTO_INCREMENT,
        `nome` VARCHAR(255) NOT NULL,
        `email` VARCHAR(255) NOT NULL,
        `senha` VARCHAR(255) NOT NULL,
        `cpf` VARCHAR(255) NOT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;