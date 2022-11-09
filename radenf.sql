-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-11-2022 a las 12:40:36
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `radenf`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documento_vacuna`
--

CREATE TABLE `documento_vacuna` (
  `id_documento` int(11) NOT NULL,
  `nombre_documento` varchar(255) NOT NULL,
  `ruta_documento` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `rut_estudiante` varchar(50) NOT NULL,
  `nombre_estudiante` varchar(50) NOT NULL,
  `app_estudiante` varchar(50) NOT NULL,
  `apm_estudiante` varchar(50) NOT NULL,
  `email_estudiante` varchar(50) NOT NULL,
  `telefono_estudiante` varchar(50) NOT NULL,
  `ingreso_estudiante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`rut_estudiante`, `nombre_estudiante`, `app_estudiante`, `apm_estudiante`, `email_estudiante`, `telefono_estudiante`, `ingreso_estudiante`) VALUES
('1-1', 'Estudiante ', 'Primero', 'Prueba', 'estudiante1@estudiante.cl', '+569111111', 2015),
('1-2', 'Estudiante', 'Segundo', 'Prueba', 'estudiante2@estudiante.cl', '+569222222', 2015);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `est_has_practica`
--

CREATE TABLE `est_has_practica` (
  `id_practica` int(11) NOT NULL,
  `det_practica` int(11) NOT NULL,
  `det_estudiante` varchar(50) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_termino` date NOT NULL,
  `estado_reserva` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `est_has_practica`
--

INSERT INTO `est_has_practica` (`id_practica`, `det_practica`, `det_estudiante`, `fecha_inicio`, `fecha_termino`, `estado_reserva`) VALUES
(1, 1, '1-1', '0000-00-00', '0000-00-00', 'En Espera'),
(2, 1, '1-2', '0000-00-00', '0000-00-00', 'En Espera');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `est_has_vacuna`
--

CREATE TABLE `est_has_vacuna` (
  `id_detalle` int(11) NOT NULL,
  `det_estudiante` varchar(50) NOT NULL,
  `det_vacuna` int(11) NOT NULL,
  `fecha_vacuna` date NOT NULL,
  `det_documento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `institucion`
--

CREATE TABLE `institucion` (
  `id_institucion` int(11) NOT NULL,
  `nombre_institucion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `institucion`
--

INSERT INTO `institucion` (`id_institucion`, `nombre_institucion`) VALUES
(1, 'Hospital Ovalle'),
(2, 'Hospital San Pablo'),
(3, 'Hospital La Serena'),
(4, 'CESFAM Tierras Blancas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `practica`
--

CREATE TABLE `practica` (
  `id_practica` int(11) NOT NULL,
  `nombre_practica` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `practica`
--

INSERT INTO `practica` (`id_practica`, `nombre_practica`) VALUES
(1, 'Práctica Urgencia'),
(2, 'Práctica Emergencia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `practica_has_centro`
--

CREATE TABLE `practica_has_centro` (
  `id_campo` int(11) NOT NULL,
  `cupo_campo` int(11) NOT NULL,
  `det_centro` int(11) NOT NULL,
  `det_practica` int(11) NOT NULL,
  `det_semestre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `practica_has_centro`
--

INSERT INTO `practica_has_centro` (`id_campo`, `cupo_campo`, `det_centro`, `det_practica`, `det_semestre`) VALUES
(1, 16, 1, 1, 1),
(2, 16, 2, 1, 1),
(3, 16, 3, 1, 1),
(4, 16, 1, 2, 2),
(5, 16, 2, 2, 2),
(6, 16, 3, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `semestre`
--

CREATE TABLE `semestre` (
  `id_semestre` int(11) NOT NULL,
  `nombre_semestre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `semestre`
--

INSERT INTO `semestre` (`id_semestre`, `nombre_semestre`) VALUES
(1, '1er Semestre'),
(2, '2do Semestre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacuna`
--

CREATE TABLE `vacuna` (
  `vacuna` int(11) NOT NULL,
  `n_vacuna` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `documento_vacuna`
--
ALTER TABLE `documento_vacuna`
  ADD PRIMARY KEY (`id_documento`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`rut_estudiante`);

--
-- Indices de la tabla `est_has_practica`
--
ALTER TABLE `est_has_practica`
  ADD PRIMARY KEY (`id_practica`),
  ADD KEY `det_practica` (`det_practica`),
  ADD KEY `det_estudiante` (`det_estudiante`);

--
-- Indices de la tabla `est_has_vacuna`
--
ALTER TABLE `est_has_vacuna`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `det_estudiante` (`det_estudiante`,`det_vacuna`),
  ADD KEY `det_documento` (`det_documento`),
  ADD KEY `det_vacuna` (`det_vacuna`);

--
-- Indices de la tabla `institucion`
--
ALTER TABLE `institucion`
  ADD PRIMARY KEY (`id_institucion`);

--
-- Indices de la tabla `practica`
--
ALTER TABLE `practica`
  ADD PRIMARY KEY (`id_practica`);

--
-- Indices de la tabla `practica_has_centro`
--
ALTER TABLE `practica_has_centro`
  ADD PRIMARY KEY (`id_campo`),
  ADD KEY `det_centro` (`det_centro`,`det_practica`),
  ADD KEY `det_practica` (`det_practica`),
  ADD KEY `det_semestre` (`det_semestre`);

--
-- Indices de la tabla `semestre`
--
ALTER TABLE `semestre`
  ADD PRIMARY KEY (`id_semestre`);

--
-- Indices de la tabla `vacuna`
--
ALTER TABLE `vacuna`
  ADD PRIMARY KEY (`vacuna`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `documento_vacuna`
--
ALTER TABLE `documento_vacuna`
  MODIFY `id_documento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `est_has_practica`
--
ALTER TABLE `est_has_practica`
  MODIFY `id_practica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `est_has_vacuna`
--
ALTER TABLE `est_has_vacuna`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `institucion`
--
ALTER TABLE `institucion`
  MODIFY `id_institucion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `practica`
--
ALTER TABLE `practica`
  MODIFY `id_practica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `practica_has_centro`
--
ALTER TABLE `practica_has_centro`
  MODIFY `id_campo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `semestre`
--
ALTER TABLE `semestre`
  MODIFY `id_semestre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `vacuna`
--
ALTER TABLE `vacuna`
  MODIFY `vacuna` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `est_has_practica`
--
ALTER TABLE `est_has_practica`
  ADD CONSTRAINT `est_has_practica_ibfk_1` FOREIGN KEY (`det_practica`) REFERENCES `practica_has_centro` (`id_campo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `est_has_practica_ibfk_2` FOREIGN KEY (`det_estudiante`) REFERENCES `estudiante` (`rut_estudiante`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `est_has_vacuna`
--
ALTER TABLE `est_has_vacuna`
  ADD CONSTRAINT `est_has_vacuna_ibfk_1` FOREIGN KEY (`det_estudiante`) REFERENCES `estudiante` (`rut_estudiante`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `est_has_vacuna_ibfk_2` FOREIGN KEY (`det_vacuna`) REFERENCES `vacuna` (`vacuna`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `est_has_vacuna_ibfk_3` FOREIGN KEY (`det_documento`) REFERENCES `documento_vacuna` (`id_documento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `practica_has_centro`
--
ALTER TABLE `practica_has_centro`
  ADD CONSTRAINT `practica_has_centro_ibfk_1` FOREIGN KEY (`det_centro`) REFERENCES `institucion` (`id_institucion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `practica_has_centro_ibfk_2` FOREIGN KEY (`det_practica`) REFERENCES `practica` (`id_practica`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `practica_has_centro_ibfk_3` FOREIGN KEY (`det_semestre`) REFERENCES `semestre` (`id_semestre`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
