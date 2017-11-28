-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-11-2017 a las 23:44:50
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sgt`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultorios`
--

CREATE TABLE `consultorios` (
  `id_consultorio` int(11) NOT NULL,
  `ubicacion` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `consultorios`
--

INSERT INTO `consultorios` (`id_consultorio`, `ubicacion`, `estado`) VALUES
(1, 'Planta baja', 1),
(2, 'Planta baja', 1),
(3, 'Planta baja', 1),
(4, '1er piso', 1),
(5, '1er piso', 1),
(6, '1er piso', 1),
(7, '2do piso', 1),
(8, '2do piso', 1),
(9, '2do piso', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dias`
--

CREATE TABLE `dias` (
  `id_dia` int(11) NOT NULL,
  `nombre` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `dias`
--

INSERT INTO `dias` (`id_dia`, `nombre`) VALUES
(1, 'Lunes'),
(2, 'Martes'),
(3, 'Miercoles'),
(4, 'Jueves'),
(5, 'Viernes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidades`
--

CREATE TABLE `especialidades` (
  `id_especialidad` int(11) NOT NULL,
  `descripcion` varchar(40) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `especialidades`
--

INSERT INTO `especialidades` (`id_especialidad`, `descripcion`) VALUES
(1, 'Psicologo'),
(2, 'Psicopedagogo'),
(3, 'Nutricionista'),
(4, 'Psiquiatra'),
(5, 'Neurologo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE `horarios` (
  `id_horario` int(11) NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `horarios`
--

INSERT INTO `horarios` (`id_horario`, `hora`) VALUES
(1, '08:00:00'),
(2, '09:00:00'),
(3, '10:00:00'),
(4, '11:00:00'),
(5, '12:00:00'),
(6, '13:00:00'),
(7, '14:00:00'),
(8, '15:00:00'),
(9, '16:00:00'),
(10, '17:00:00'),
(11, '18:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `obras_sociales`
--

CREATE TABLE `obras_sociales` (
  `id_obrasocial` int(11) NOT NULL,
  `nombre` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` bigint(11) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `obras_sociales`
--

INSERT INTO `obras_sociales` (`id_obrasocial`, `nombre`, `email`, `telefono`, `estado`) VALUES
(1, 'Osde', 'info@osde.com.ar', 44444444, 1),
(2, 'Galeno', 'info@galeno.com.ar', 55555555, 1),
(3, 'Omint', 'info@omint.com.ar', 66666666, 1),
(4, 'Medife', 'info@medife.com.ar', 77777777, 1),
(5, 'Osecac', 'info@osecac.com.ar', 88888888, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `id_paciente` int(11) NOT NULL,
  `nombre` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `dni` int(8) NOT NULL,
  `direccion` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` bigint(11) NOT NULL,
  `id_obrasocial` int(11) NOT NULL,
  `certificado` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `autorizacion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id_paciente`, `nombre`, `apellido`, `dni`, `direccion`, `telefono`, `id_obrasocial`, `certificado`, `autorizacion`, `estado`) VALUES
(1, 'Tania', 'Scortegagna', 35949247, 'Escobar 66', 1234567, 3, '', '', 1),
(4, 'Rocio', 'Larcamon', 34587647, 'Calle falsa 1234', 1132960551, 1, '', '', 1),
(5, 'Virginia', 'Eliggi', 341269853, 'Cantilo 456', 1132960226, 4, '', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente_personacargo`
--

CREATE TABLE `paciente_personacargo` (
  `id_paciente` int(11) NOT NULL,
  `id_personaCargo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pdc`
--

CREATE TABLE `pdc` (
  `id_pdc` int(11) NOT NULL,
  `id_profesional` int(11) NOT NULL,
  `id_consultorio` int(11) NOT NULL,
  `id_dia` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pdc`
--

INSERT INTO `pdc` (`id_pdc`, `id_profesional`, `id_consultorio`, `id_dia`, `estado`) VALUES
(1, 1, 4, 1, 1),
(2, 2, 6, 3, 1),
(3, 1, 4, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas_cargo`
--

CREATE TABLE `personas_cargo` (
  `id_personaCargo` int(11) NOT NULL,
  `nombre` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `dni` int(8) NOT NULL,
  `direccion` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` bigint(11) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `personas_cargo`
--

INSERT INTO `personas_cargo` (`id_personaCargo`, `nombre`, `apellido`, `dni`, `direccion`, `telefono`, `estado`) VALUES
(1, 'Leonardo', 'Marquez', 31656989, 'Origone 789', 1132960960, 1),
(2, 'Gonzalo', 'Moyano', 31131454, 'Pehuajo 100', 1132960515, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesionales`
--

CREATE TABLE `profesionales` (
  `id_profesional` int(11) NOT NULL,
  `nombre` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` int(11) NOT NULL,
  `direccion` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `id_especialidad` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `profesionales`
--

INSERT INTO `profesionales` (`id_profesional`, `nombre`, `apellido`, `telefono`, `direccion`, `email`, `id_especialidad`, `estado`) VALUES
(1, 'Veronica', 'Rogliano', 1132960333, 'Calle 50 456', 'vrogliano@gmail.com', 1, 1),
(2, 'Elias', 'Epelboim', 1132960697, 'Quilmes 789', 'eepelboim@gmail.com', 4, 1),
(3, 'Braian', 'Portillo', 13123456, 'Escobar 66', 'admin@braian.com.ar', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turnos`
--

CREATE TABLE `turnos` (
  `id_turno` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `id_pdc` int(11) NOT NULL,
  `id_hora` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `turnos`
--

INSERT INTO `turnos` (`id_turno`, `id_paciente`, `fecha`, `id_pdc`, `id_hora`, `estado`) VALUES
(54, 1, '2017-12-04', 1, 2, 1),
(55, 1, '2017-12-11', 1, 2, 1),
(56, 1, '2017-12-18', 1, 2, 1),
(57, 1, '2017-12-25', 1, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `clave` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usuario`, `clave`, `tipo_usuario`) VALUES
(1, 'tania', '1234', 1),
(2, 'juan', '1234', 2),
(3, 'gabi', '1234', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `consultorios`
--
ALTER TABLE `consultorios`
  ADD PRIMARY KEY (`id_consultorio`),
  ADD UNIQUE KEY `id_consultorio` (`id_consultorio`);

--
-- Indices de la tabla `dias`
--
ALTER TABLE `dias`
  ADD PRIMARY KEY (`id_dia`);

--
-- Indices de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  ADD PRIMARY KEY (`id_especialidad`);

--
-- Indices de la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id_horario`);

--
-- Indices de la tabla `obras_sociales`
--
ALTER TABLE `obras_sociales`
  ADD PRIMARY KEY (`id_obrasocial`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id_paciente`),
  ADD KEY `id_obrasocial` (`id_obrasocial`);

--
-- Indices de la tabla `paciente_personacargo`
--
ALTER TABLE `paciente_personacargo`
  ADD KEY `id_paciente` (`id_paciente`),
  ADD KEY `id_personaCargo` (`id_personaCargo`);

--
-- Indices de la tabla `pdc`
--
ALTER TABLE `pdc`
  ADD PRIMARY KEY (`id_pdc`),
  ADD KEY `id_profesional` (`id_profesional`),
  ADD KEY `id_consultorio` (`id_consultorio`),
  ADD KEY `id_dia` (`id_dia`);

--
-- Indices de la tabla `personas_cargo`
--
ALTER TABLE `personas_cargo`
  ADD PRIMARY KEY (`id_personaCargo`);

--
-- Indices de la tabla `profesionales`
--
ALTER TABLE `profesionales`
  ADD PRIMARY KEY (`id_profesional`),
  ADD UNIQUE KEY `id_profesional` (`id_profesional`),
  ADD KEY `id_especialidad` (`id_especialidad`);

--
-- Indices de la tabla `turnos`
--
ALTER TABLE `turnos`
  ADD PRIMARY KEY (`id_turno`),
  ADD KEY `id_pdc` (`id_pdc`) USING BTREE,
  ADD KEY `id_hora` (`id_hora`) USING BTREE,
  ADD KEY `id_paciente` (`id_paciente`) USING BTREE;

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `consultorios`
--
ALTER TABLE `consultorios`
  MODIFY `id_consultorio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `dias`
--
ALTER TABLE `dias`
  MODIFY `id_dia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  MODIFY `id_especialidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id_horario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `obras_sociales`
--
ALTER TABLE `obras_sociales`
  MODIFY `id_obrasocial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id_paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `pdc`
--
ALTER TABLE `pdc`
  MODIFY `id_pdc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `personas_cargo`
--
ALTER TABLE `personas_cargo`
  MODIFY `id_personaCargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `profesionales`
--
ALTER TABLE `profesionales`
  MODIFY `id_profesional` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `turnos`
--
ALTER TABLE `turnos`
  MODIFY `id_turno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD CONSTRAINT `pacientes_ibfk_1` FOREIGN KEY (`id_obrasocial`) REFERENCES `obras_sociales` (`id_obrasocial`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `paciente_personacargo`
--
ALTER TABLE `paciente_personacargo`
  ADD CONSTRAINT `paciente_personacargo_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id_paciente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `paciente_personacargo_ibfk_2` FOREIGN KEY (`id_personaCargo`) REFERENCES `personas_cargo` (`id_personaCargo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pdc`
--
ALTER TABLE `pdc`
  ADD CONSTRAINT `pdc_ibfk_1` FOREIGN KEY (`id_consultorio`) REFERENCES `consultorios` (`id_consultorio`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pdc_ibfk_2` FOREIGN KEY (`id_dia`) REFERENCES `dias` (`id_dia`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pdc_ibfk_3` FOREIGN KEY (`id_profesional`) REFERENCES `profesionales` (`id_profesional`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `profesionales`
--
ALTER TABLE `profesionales`
  ADD CONSTRAINT `profesionales_ibfk_1` FOREIGN KEY (`id_especialidad`) REFERENCES `especialidades` (`id_especialidad`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `turnos`
--
ALTER TABLE `turnos`
  ADD CONSTRAINT `turnos_ibfk_1` FOREIGN KEY (`id_hora`) REFERENCES `horarios` (`id_horario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `turnos_ibfk_2` FOREIGN KEY (`id_pdc`) REFERENCES `pdc` (`id_pdc`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `turnos_ibfk_3` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id_paciente`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
