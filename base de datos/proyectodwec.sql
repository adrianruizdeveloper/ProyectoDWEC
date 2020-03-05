-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 05, 2020 at 05:46 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proyectodwec`
--

-- --------------------------------------------------------

--
-- Table structure for table `peliculas`
--

CREATE TABLE `peliculas` (
  `id` int(15) NOT NULL,
  `titulo` varchar(45) NOT NULL,
  `duracion` int(5) NOT NULL,
  `genero` varchar(45) NOT NULL,
  `calificacion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `salas`
--

CREATE TABLE `salas` (
  `id` int(15) NOT NULL,
  `fila` int(15) NOT NULL,
  `asientos` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sesiones`
--

CREATE TABLE `sesiones` (
  `sesion_id` int(15) NOT NULL,
  `pelicula_id` int(15) NOT NULL,
  `sala_id` int(15) NOT NULL,
  `hora` time NOT NULL,
  `dia` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sesiones_ocupadas`
--

CREATE TABLE `sesiones_ocupadas` (
  `id` int(15) NOT NULL,
  `asiento_fila` varchar(45) NOT NULL,
  `sesion_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `id` int(11) NOT NULL,
  `sesion_ocupada_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id` int(15) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` int(15) NOT NULL,
  `correo_electronico` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salas`
--
ALTER TABLE `salas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sesiones`
--
ALTER TABLE `sesiones`
  ADD PRIMARY KEY (`sala_id`,`pelicula_id`,`sesion_id`),
  ADD KEY `pelicula_id` (`pelicula_id`),
  ADD KEY `pelicula_id_2` (`pelicula_id`),
  ADD KEY `sesion_id` (`sesion_id`),
  ADD KEY `sesion_id_2` (`sesion_id`,`pelicula_id`);

--
-- Indexes for table `sesiones_ocupadas`
--
ALTER TABLE `sesiones_ocupadas`
  ADD PRIMARY KEY (`id`,`asiento_fila`,`sesion_id`),
  ADD KEY `sesion_ocup_fk` (`sesion_id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket_sesion_ocup_fk` (`sesion_ocupada_id`),
  ADD KEY `ticket_user_fk` (`user_id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sesiones`
--
ALTER TABLE `sesiones`
  ADD CONSTRAINT `sesion_pelicula_fk` FOREIGN KEY (`pelicula_id`) REFERENCES `peliculas` (`id`),
  ADD CONSTRAINT `sesion_sala_fk` FOREIGN KEY (`sala_id`) REFERENCES `salas` (`id`);

--
-- Constraints for table `sesiones_ocupadas`
--
ALTER TABLE `sesiones_ocupadas`
  ADD CONSTRAINT `sesion_ocup_fk` FOREIGN KEY (`sesion_id`) REFERENCES `sesiones` (`sesion_id`);

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_sesion_ocup_fk` FOREIGN KEY (`sesion_ocupada_id`) REFERENCES `sesiones_ocupadas` (`id`),
  ADD CONSTRAINT `ticket_user_fk` FOREIGN KEY (`user_id`) REFERENCES `usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
