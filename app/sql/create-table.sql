/*Criando Tabela e BD*/
CREATE DATABASE IF NOT EXISTS vehicle_management;
USE vehicle_management;

CREATE TABLE veiculos (
  id int(11) NOT NULL AUTO_INCREMENT,
  marca varchar(255) NOT NULL,
  modelo varchar(255) NOT NULL,
  ano varchar(4) NOT NULL,
  cor varchar(255) NOT NULL,
  num_reg varchar(255) NOT NULL UNIQUE,
  PRIMARY KEY (id)
);