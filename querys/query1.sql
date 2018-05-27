INSERT INTO `mydb`.`sala` (`nombre`, `cantidad_participantes`, `monto_total`, `tipo`, `limite_participantes`, `apuesta_base`) VALUES ('DIOSES', '10', '40', 'PRIVADO', '30', '20');


ALTER TABLE `db_new`.`detalle_sala`
ADD COLUMN `id_sala` INT NULL AFTER `updated_at`,
ADD COLUMN `id_usuario` INT NULL AFTER `id_sala`;


ALTER TABLE `db_new`.`detalle__salas`
ADD COLUMN `goles_equipo1` INT NULL AFTER `id_usuario`,
ADD COLUMN `goles_equipo2` INT NULL AFTER `goles_equipo1`;
