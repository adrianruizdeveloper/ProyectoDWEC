-- MySQL Script generated by MySQL Workbench
-- Fri Mar  6 09:55:07 2020
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema peliculas
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema peliculas
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `peliculas` DEFAULT CHARACTER SET utf8 ;
USE `peliculas` ;

-- -----------------------------------------------------
-- Table `peliculas`.`tipos_roles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `peliculas`.`tipos_roles` (
  `id_rol` INT NOT NULL,
  `descripcion_rol` VARCHAR(45) NULL,
  PRIMARY KEY (`id_rol`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `peliculas`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `peliculas`.`usuarios` (
  `id_usu` INT NOT NULL AUTO_INCREMENT,
  `usuario_usu` VARCHAR(45) NOT NULL,
  `rol_usu` INT NOT NULL,
  `nombre_usu` VARCHAR(45) NULL,
  `apellido1_usu` VARCHAR(45) NULL,
  `apellido2_usu` VARCHAR(45) NULL,
  `fechanac_usu` DATE NULL,
  `telefono_usu` VARCHAR(45) NULL,
  `correo_usu` VARCHAR(45) NULL,
  PRIMARY KEY (`id_usu`, `rol_usu`),
  CONSTRAINT `fk_usuarios_tipos_roles1`
    FOREIGN KEY (`rol_usu`)
    REFERENCES `peliculas`.`tipos_roles` (`id_rol`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `peliculas`.`contrasenas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `peliculas`.`contrasenas` (
  `idusuario_contra` INT NOT NULL,
  `contrasena_contra` VARCHAR(45) NOT NULL,
  `fecha_contra` DATE NOT NULL,
  PRIMARY KEY (`idusuario_contra`),
  CONSTRAINT `fk_contrasenas_usuarios1`
    FOREIGN KEY (`idusuario_contra`)
    REFERENCES `peliculas`.`usuarios` (`id_usu`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `peliculas`.`tipos_restricciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `peliculas`.`tipos_restricciones` (
  `id_restriccion` INT NOT NULL,
  `descripcion_restriccion` VARCHAR(45) NULL,
  `edad_restriccion` INT NULL,
  PRIMARY KEY (`id_restriccion`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `peliculas`.`tipos_categorias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `peliculas`.`tipos_categorias` (
  `id_categoria` INT NOT NULL,
  `descripcion_categoria` VARCHAR(45) NULL,
  PRIMARY KEY (`id_categoria`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `peliculas`.`peliculas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `peliculas`.`peliculas` (
  `id_peli` INT NOT NULL,
  `nombre_peli` VARCHAR(100) NOT NULL,
  `nombre_director_peli` VARCHAR(100) NOT NULL,
  `fecha_peli` YEAR NOT NULL,
  `restriccion_peli` INT NOT NULL,
  `categoria1_peli` INT NOT NULL,
  PRIMARY KEY (`id_peli`),
  CONSTRAINT `fk_peliculas_tipos_restricciones1`
    FOREIGN KEY (`restriccion_peli`)
    REFERENCES `peliculas`.`tipos_restricciones` (`id_restriccion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_peliculas_tipos_categorias1`
    FOREIGN KEY (`categoria1_peli`)
    REFERENCES `peliculas`.`tipos_categorias` (`id_categoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `peliculas`.`tarjetas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `peliculas`.`tarjetas` (
  `usuarios_id_usu` INT NOT NULL,
  `ntarjeta_tarjeta` VARCHAR(45) NOT NULL,
  `cvv_tarjeta` VARCHAR(45) NOT NULL,
  `fechacad_tarjeta` DATE NOT NULL,
  PRIMARY KEY (`usuarios_id_usu`, `ntarjeta_tarjeta`),
  CONSTRAINT `fk_tarjetas_usuarios1`
    FOREIGN KEY (`usuarios_id_usu`)
    REFERENCES `peliculas`.`usuarios` (`id_usu`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `peliculas`.`salas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `peliculas`.`salas` (
  `id_sala` INT NOT NULL,
  `nombre_sala` VARCHAR(45) NULL,
  `capacidad_sala` INT NULL,
  PRIMARY KEY (`id_sala`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `peliculas`.`sesiones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `peliculas`.`sesiones` (
  `id_sesion` INT NOT NULL,
  `peliculas_id_peli` INT NOT NULL,
  `fecha_sesion` DATE NULL,
  `hora_sesion` TIME(1) NULL,
  `sala_sesion` INT NOT NULL,
  PRIMARY KEY (`id_sesion`),
  CONSTRAINT `fk_sesiones_peliculas1`
    FOREIGN KEY (`peliculas_id_peli`)
    REFERENCES `peliculas`.`peliculas` (`id_peli`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_sesiones_salas1`
    FOREIGN KEY (`sala_sesion`)
    REFERENCES `peliculas`.`salas` (`id_sala`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `peliculas`.`asientos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `peliculas`.`asientos` (
  `sesion_asiento` INT NOT NULL,
  `fila_asiento` INT NOT NULL,
  `n_asiento` INT NOT NULL,
  PRIMARY KEY (`fila_asiento`, `n_asiento`, `sesion_asiento`),
  CONSTRAINT `fk_asientos_sesiones1`
    FOREIGN KEY (`sesion_asiento`)
    REFERENCES `peliculas`.`sesiones` (`id_sesion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `peliculas`.`tickets`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `peliculas`.`tickets` (
  `id_ticket` INT NOT NULL,
  `usuario_ticket` INT NOT NULL,
  `fecha_ticket` DATE NULL,
  `hora_ticket` TIME(1) NULL,
  `sesion_ticket` INT NOT NULL,
  `fila_asiento_ticket` INT NOT NULL,
  `num_asiento_ticket` INT NOT NULL,
  PRIMARY KEY (`id_ticket`),
  CONSTRAINT `fk_tickets_usuarios`
    FOREIGN KEY (`usuario_ticket`)
    REFERENCES `peliculas`.`usuarios` (`id_usu`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tickets_asientos1`
    FOREIGN KEY (`fila_asiento_ticket` , `num_asiento_ticket` , `sesion_ticket`)
    REFERENCES `peliculas`.`asientos` (`fila_asiento` , `n_asiento` , `sesion_asiento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `peliculas`.`valoraciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `peliculas`.`valoraciones` (
  `idusuario_val` INT NOT NULL,
  `pelicula_val` INT NOT NULL,
  `valoracion_val` INT NOT NULL,
  PRIMARY KEY (`idusuario_val`, `pelicula_val`),
  CONSTRAINT `fk_usuarios_has_peliculas_usuarios1`
    FOREIGN KEY (`idusuario_val`)
    REFERENCES `peliculas`.`usuarios` (`id_usu`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuarios_has_peliculas_peliculas1`
    FOREIGN KEY (`pelicula_val`)
    REFERENCES `peliculas`.`peliculas` (`id_peli`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
