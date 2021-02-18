### Crear la base de datos

CREATE DATABASE `miperfil` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

### Crear las tabla ROLES

CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rol` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

### Crear la tabla USERS

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(32) NOT NULL,
  `nombre` varchar(128) NOT NULL,
  `apellidos` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `rol` int(11) NOT NULL,
  `pass` varchar(128) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_rol_idx` (`rol`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

### Insertar datos existentes en la tabla ROLES

INSERT INTO `miperfil`.`roles`
(`id`,
`rol`)
VALUES
(1,
'usuario');
INSERT INTO `miperfil`.`roles`
(`id`,
`rol`)
VALUES
(2,
'administrador');
INSERT INTO `miperfil`.`roles`
(`id`,
`rol`)
VALUES
(3,
'privilegiado');

### Insertar datos existentes en la tabla USERS

INSERT INTO `miperfil`.`users`
(`id`,
`usuario`,
`nombre`,
`apellidos`,
`email`,
`rol`,
`pass`)
VALUES
(1,
'arturo@email.com',
'arturo',
'b martin',
'arturo@email.com',
3,
'40bd001563085fc35165329ea1ff5c5ecbdbbeef');
INSERT INTO `miperfil`.`users`
(`id`,
`usuario`,
`nombre`,
`apellidos`,
`email`,
`rol`,
`pass`)
VALUES
(2,
'cesur@email.com',
'cesur',
'profesor',
'cesur@email.com',
1,
'7b52009b64fd0a2a49e6d8a939753077792b0554');

### Establecer la clave foránea
 
ALTER TABLE `miperfil`.`users` 
ADD CONSTRAINT `user_rol_idx`
  FOREIGN KEY (`rol`)
  REFERENCES `miperfil`.`roles` (`id`)
  ON DELETE RESTRICT
  ON UPDATE CASCADE;




