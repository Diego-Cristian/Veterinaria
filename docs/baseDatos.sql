SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS `Personas`;
DROP TABLE IF EXISTS `Turnos`;
DROP TABLE IF EXISTS `Mascotas`;
DROP TABLE IF EXISTS `Roles`;
DROP TABLE IF EXISTS `Especies`;
DROP TABLE IF EXISTS `Razas`;
SET FOREIGN_KEY_CHECKS = 1;

CREATE TABLE `Personas` (
    `persona_id` INTEGER AUTO_INCREMENT NOT NULL,
    `nombre` VARCHAR(256) NOT NULL,
    `apellido` VARCHAR(64) NOT NULL,
    `email` VARCHAR(128) NOT NULL,
    `password` VARCHAR(128) NOT NULL,
    `telefono` VARCHAR(64) NOT NULL,
    `rol_id` INTEGER NOT NULL,
    PRIMARY KEY (`persona_id`)
);

CREATE TABLE `Turnos` (
    `turnos_id` INTEGER AUTO_INCREMENT NOT NULL,
    `fecha` DATETIME NOT NULL,
    `realizado` DATETIME,
    `veterinario_id` INTEGER NOT NULL,
    `mascota_id` INTEGER NOT NULL,
    `cliente_id` INTEGER NOT NULL,
    `consulta` VARCHAR(512) NOT NULL,
    PRIMARY KEY (`turnos_id`)
);

CREATE TABLE `Mascotas` (
    `mascota_id` INTEGER AUTO_INCREMENT NOT NULL,
    `cliente_id` INTEGER NOT NULL,
    `nombre` VARCHAR(64) NOT NULL,
    `raza_id` INTEGER NOT NULL,
    PRIMARY KEY (`mascota_id`)
);

CREATE TABLE `Roles` (
    `rol_id` INTEGER AUTO_INCREMENT NOT NULL,
    `descripcion` VARCHAR(64) NOT NULL,
    PRIMARY KEY (`rol_id`)
);

CREATE TABLE `Especies` (
    `especie_id` INTEGER AUTO_INCREMENT NOT NULL,
    `descripcion` VARCHAR(64) NOT NULL,
    PRIMARY KEY (`especie_id`)
);

CREATE TABLE `Razas` (
    `raza_id` INTEGER AUTO_INCREMENT NOT NULL,
    `descripcion` VARCHAR(64) NOT NULL,
    `especie_id` INTEGER NOT NULL,
    PRIMARY KEY (`raza_id`)
);

ALTER TABLE `Personas` ADD FOREIGN KEY (`rol_id`) REFERENCES `Roles`(`rol_id`);
ALTER TABLE `Turnos` ADD FOREIGN KEY (`veterinario_id`) REFERENCES `Personas`(`persona_id`);
ALTER TABLE `Turnos` ADD FOREIGN KEY (`mascota_id`) REFERENCES `Mascotas`(`mascota_id`);
ALTER TABLE `Turnos` ADD FOREIGN KEY (`cliente_id`) REFERENCES `Personas`(`persona_id`);
ALTER TABLE `Mascotas` ADD FOREIGN KEY (`cliente_id`) REFERENCES `Personas`(`persona_id`);
ALTER TABLE `Mascotas` ADD FOREIGN KEY (`raza_id`) REFERENCES `Razas`(`raza_id`);
ALTER TABLE `Razas` ADD FOREIGN KEY (`especie_id`) REFERENCES `Especies`(`especie_id`);