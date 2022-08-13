-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-08-2022 a las 04:33:26
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sigi`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacionestudio`
--

CREATE TABLE `asignacionestudio` (
  `id_asig` int(11) NOT NULL,
  `agente_asig` varchar(250) NOT NULL,
  `cedula_asig` int(100) NOT NULL,
  `estudio_asig` varchar(250) NOT NULL,
  `fecha_asig` date NOT NULL,
  `hora_asig` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `asignacionestudio`
--

INSERT INTO `asignacionestudio` (`id_asig`, `agente_asig`, `cedula_asig`, `estudio_asig`, `fecha_asig`, `hora_asig`) VALUES
(7, 'Luis Caraballo', 0, 'CLARO MASIVOS POSPAGO NUEVOS', '2022-08-03', '07:20:00'),
(8, 'Luis Caraballo', 0, 'CLARO MASIVOS HOGARES RETENIDOS', '2022-08-03', '19:20:00'),
(9, 'admin', 0, 'CLARO MASIVOS POSPAGO RETENIDOS', '2022-08-03', '18:13:00'),
(10, 'Luis Caraballo', 0, 'CLARO MASIVOS POSPAGO NUEVOS', '2022-08-03', '16:30:00'),
(11, 'Luis Caraballo', 0, 'CLARO MASIVOS HOGARES RETENIDOS', '2022-08-03', '16:50:00'),
(12, 'Luis Caraballo', 0, 'CLARO MASIVOS HOGARES RETENIDOS', '2022-08-03', '10:30:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE `asistencia` (
  `idasistencia` int(11) NOT NULL,
  `codigo_persona` varchar(20) COLLATE utf8_bin NOT NULL,
  `fecha_hora` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tipo` varchar(45) COLLATE utf8_bin NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `capacitacion`
--

CREATE TABLE `capacitacion` (
  `id_capacitacion` int(45) NOT NULL,
  `cedulacap` varchar(250) NOT NULL,
  `agentecap` varchar(250) NOT NULL,
  `estudio` varchar(250) NOT NULL,
  `calificacion` float NOT NULL,
  `fecha_capacitacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `capacitacion`
--

INSERT INTO `capacitacion` (`id_capacitacion`, `cedulacap`, `agentecap`, `estudio`, `calificacion`, `fecha_capacitacion`) VALUES
(58, '1233827', 'Luis Caraballo', 'CLARO MASIVOS HOGARES RETENIDOS', 5, '2022-08-03'),
(59, '1233827', 'Luis Caraballo', 'CLARO MASIVOS POSPAGO NUEVOS', 5, '2022-08-03'),
(60, '12345678', 'admin admin', 'CLARO MASIVOS POSPAGO RETENIDOS', 0.2, '2022-08-26'),
(61, '1233827', 'Luis Caraballo', 'CLARO MASIVOS POSPAGO RETENIDOS', 5, '2022-08-04'),
(66, '1233827', 'Luis Caraballo', 'CLARO MASIVOS HOGARES NUEVOS', 5, '2022-08-03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `iddepartamento` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_bin NOT NULL,
  `descripcion` varchar(45) COLLATE utf8_bin NOT NULL,
  `fechacreada` datetime NOT NULL,
  `idusuario` varchar(45) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`iddepartamento`, `nombre`, `descripcion`, `fechacreada`, `idusuario`) VALUES
(1, 'IT', '', '0000-00-00 00:00:00', '1'),
(8, 'CALIDAD', '', '2022-07-23 08:34:01', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudios`
--

CREATE TABLE `estudios` (
  `id_Estudio` int(11) NOT NULL,
  `Estudio` varchar(250) NOT NULL,
  `Cliente` varchar(250) NOT NULL,
  `Muestra` varchar(20) NOT NULL,
  `Fecha_Inicio_Estudio` date NOT NULL,
  `Fecha_Entrega_Estudio` date NOT NULL,
  `TMO` float NOT NULL,
  `TME` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estudios`
--

INSERT INTO `estudios` (`id_Estudio`, `Estudio`, `Cliente`, `Muestra`, `Fecha_Inicio_Estudio`, `Fecha_Entrega_Estudio`, `TMO`, `TME`) VALUES
(1, 'CLARO MASIVOS POSPAGO EVOLUCIONAR', 'CIV', 'NIVEL 1', '2022-07-21', '2022-07-21', 25.76, 1.5),
(2, 'CLARO MASIVOS POSPAGO NUEVOS', 'CIV', 'NIVEL 1', '2022-07-21', '2022-07-21', 25.9, 1.5),
(3, 'CLARO MASIVOS POSPAGO RETENIDOS', 'CIV', 'NIVEL 1', '2022-07-21', '2022-07-21', 26.27, 1.5),
(4, 'CLARO MASIVOS HOGARES EVOLUCIONADOS', 'CIV', 'NIVEL 1', '2022-07-21', '2022-07-21', 18.1, 1.5),
(5, 'CLARO MASIVOS HOGARES NUEVOS', 'CIV', 'NIVEL 1', '2022-07-21', '2022-07-21', 21.8, 1.5),
(6, 'CLARO MASIVOS HOGARES RETENIDOS', 'CIV', 'NIVEL 1', '2022-07-21', '2022-07-21', 22.5, 1.5),
(7, 'CLARO MASIVOS PREPAGO EVOLUCIONADOS', 'CIV', 'NIVEL 1', '2022-07-21', '2022-07-21', 25.9, 1.5),
(8, 'CLARO MASIVOS PREPAGO NUEVOS\n', 'CIV', 'NIVEL 1', '2022-07-21', '2022-07-21', 28.9, 1),
(9, 'CLARO MASIVOS PREPAGO INACTIVO', 'CIV', 'NIVEL 1', '2022-07-21', '2022-07-21', 19.1, 1.5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productividad`
--

CREATE TABLE `productividad` (
  `id_productividad` int(11) NOT NULL,
  `agente_prod` int(11) NOT NULL,
  `estudio_prod` int(11) NOT NULL,
  `meta_prod` int(11) NOT NULL,
  `enc_realizadas_prod` int(11) NOT NULL,
  `hora_ini_prod` time NOT NULL,
  `hora_fin_prod` time NOT NULL,
  `tiempo_muerto_prod` time NOT NULL,
  `total_horas_trabajadas_prod` int(11) NOT NULL,
  `porcentaje_prod` int(11) NOT NULL,
  `-` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuario`
--

CREATE TABLE `tipousuario` (
  `idtipousuario` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_bin NOT NULL,
  `descripcion` varchar(45) COLLATE utf8_bin NOT NULL,
  `fechacreada` datetime NOT NULL,
  `idusuario` varchar(45) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `tipousuario`
--

INSERT INTO `tipousuario` (`idtipousuario`, `nombre`, `descripcion`, `fechacreada`, `idusuario`) VALUES
(1, 'Administrador', 'Con priviliegios de gestionar todo el sistema', '2020-01-18 00:00:00', '1'),
(2, 'DIRECTOR', '', '2020-01-19 00:30:13', '1'),
(3, 'SUPERVISOR', '', '2022-07-21 18:40:26', '1'),
(4, 'LIDER', '', '2022-07-21 18:40:36', '1'),
(5, 'CAPACITADOR', '', '2022-07-21 18:40:47', '1'),
(6, 'AGENTE', '', '2022-07-26 08:00:52', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `apellidos` varchar(45) COLLATE utf8_bin NOT NULL,
  `cedula` int(45) NOT NULL,
  `login` varchar(45) COLLATE utf8_bin NOT NULL,
  `iddepartamento` int(11) NOT NULL,
  `idtipousuario` int(11) NOT NULL,
  `email` varchar(45) COLLATE utf8_bin NOT NULL,
  `password` varchar(64) COLLATE utf8_bin NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  `fechacreado` datetime NOT NULL,
  `usuariocreado` varchar(45) COLLATE utf8_bin NOT NULL,
  `codigo_persona` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `idmensaje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `nombre`, `apellidos`, `cedula`, `login`, `iddepartamento`, `idtipousuario`, `email`, `password`, `estado`, `fechacreado`, `usuariocreado`, `codigo_persona`, `idmensaje`) VALUES
(1, 'admin', '', 12345678, 'admin', 1, 1, 'admin@admin.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 1, '2020-01-18 00:00:00', 'admin', 'admin', 1),
(4, 'Luis', 'Caraballo', 1233827, '1233827', 1, 6, 'lecmbogota@gmail.com', '3ba261c82142c648df955f270a30c5aaee1903be23bde9100615cd6b887e2e4f', 1, '2022-08-02 13:17:14', 'Luis', '1233827', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asignacionestudio`
--
ALTER TABLE `asignacionestudio`
  ADD PRIMARY KEY (`id_asig`);

--
-- Indices de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD PRIMARY KEY (`idasistencia`);

--
-- Indices de la tabla `capacitacion`
--
ALTER TABLE `capacitacion`
  ADD PRIMARY KEY (`id_capacitacion`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`iddepartamento`);

--
-- Indices de la tabla `estudios`
--
ALTER TABLE `estudios`
  ADD PRIMARY KEY (`id_Estudio`);

--
-- Indices de la tabla `productividad`
--
ALTER TABLE `productividad`
  ADD PRIMARY KEY (`id_productividad`),
  ADD KEY `agente_prod` (`agente_prod`),
  ADD KEY `estudio_prod` (`estudio_prod`),
  ADD KEY `meta_prod` (`meta_prod`);

--
-- Indices de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`idtipousuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`),
  ADD UNIQUE KEY `login` (`login`),
  ADD UNIQUE KEY `codigo_persona` (`codigo_persona`),
  ADD KEY `fk_departamento` (`iddepartamento`),
  ADD KEY `fk_tiposusario` (`idtipousuario`),
  ADD KEY `nombre` (`nombre`),
  ADD KEY `nombre_2` (`nombre`),
  ADD KEY `cedula` (`cedula`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asignacionestudio`
--
ALTER TABLE `asignacionestudio`
  MODIFY `id_asig` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  MODIFY `idasistencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT de la tabla `capacitacion`
--
ALTER TABLE `capacitacion`
  MODIFY `id_capacitacion` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `iddepartamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `estudios`
--
ALTER TABLE `estudios`
  MODIFY `id_Estudio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `productividad`
--
ALTER TABLE `productividad`
  MODIFY `id_productividad` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  MODIFY `idtipousuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`iddepartamento`) REFERENCES `departamento` (`iddepartamento`),
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`idtipousuario`) REFERENCES `tipousuario` (`idtipousuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
