/*Criando Tabela e BD*/
CREATE DATABASE IF NOT EXISTS vehicle_management;
USE vehicle_management;

/*Crie a tabela no Bd em vehicle_management*/
CREATE TABLE `vehicle_management`.`veiculos` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `marca` VARCHAR(255) NOT NULL,
    `modelo` VARCHAR(255) NOT NULL,
    `ano` VARCHAR(4) NOT NULL,
    `cor` VARCHAR(255) NOT NULL,
    `num_reg` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE (`num_reg`);

/*Insira um usuário para poder logar no sistema*/
INSERT INTO `usuarios`(`id_usuario`, `email`, `senha`) VALUES ('anderson@gmail.com','$2y$10$2CrrcW/C.19l6xz4kc66LOL0OxmUmHA6KoYWzjcdwXX4O/xwAa.oe');