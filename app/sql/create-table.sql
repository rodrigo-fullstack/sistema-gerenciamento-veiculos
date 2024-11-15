/*Criando Tabela e BD*/
CREATE DATABASE IF NOT EXISTS vehicle_management;
USE vehicle_management;

CREATE TABLE `vehicle_management`.`veiculos` (`id` INT NOT NULL AUTO_INCREMENT , `marca` VARCHAR(255) NOT NULL , `modelo` VARCHAR(255) NOT NULL , `ano` VARCHAR(4) NOT NULL , `cor` VARCHAR(255) NOT NULL , `num_reg` VARCHAR(255) NOT NULL , PRIMARY KEY (`id`), UNIQUE