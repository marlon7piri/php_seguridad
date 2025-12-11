
-- db/create_table.sql

CREATE DATABASE IF NOT EXISTS seguridad_php;

USE seguridad_php;

CREATE TABLE IF NOT EXISTS usuarios (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    contrasena VARCHAR(255) NOT NULL,
    reg_date TIMESTAMP
);
