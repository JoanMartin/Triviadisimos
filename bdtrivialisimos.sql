-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-10-2015 a las 16:31:30
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bdtrivialisimos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
`ID_Categoria` int(255) NOT NULL,
  `ID_Mundo` int(255) NOT NULL,
  `Nombre_Categoria` varchar(9999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadistica`
--

CREATE TABLE IF NOT EXISTS `estadistica` (
  `ID_Jugador` int(255) NOT NULL,
  `ID_Categoria` int(255) NOT NULL,
  `Numero_Acertadas` int(255) NOT NULL,
  `Numero_Falladas` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `intervencion`
--

CREATE TABLE IF NOT EXISTS `intervencion` (
  `Acertada` int(255) NOT NULL COMMENT 'Si(1) / No(0)',
  `ID_Participacion` int(255) NOT NULL,
  `ID_Pregunta` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugador`
--

CREATE TABLE IF NOT EXISTS `jugador` (
`ID_Jugador` int(255) NOT NULL,
  `Nick` varchar(9999) NOT NULL,
  `Nombre` varchar(9999) NOT NULL,
  `Apellidos` varchar(9999) NOT NULL,
  `Contraseña` varchar(9999) NOT NULL,
  `Email` varchar(9999) NOT NULL,
  `URL_Imagen` varchar(9999) NOT NULL,
  `Partidas_Ganadas` int(255) NOT NULL,
  `Partidas_Perdidas` int(255) NOT NULL,
  `ID_Privilegio` int(255) NOT NULL,
  `ID_Nivel` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mundo`
--

CREATE TABLE IF NOT EXISTS `mundo` (
`ID_Mundo` int(255) NOT NULL,
  `Nombre_Mundo` varchar(9999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel`
--

CREATE TABLE IF NOT EXISTS `nivel` (
`ID_Nivel` int(255) NOT NULL,
  `Tipo_Nivel` varchar(9999) NOT NULL,
  `URL_Imagen` varchar(9999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participacion`
--

CREATE TABLE IF NOT EXISTS `participacion` (
`ID_Participacion` int(255) NOT NULL,
  `ID_Jugador` int(255) NOT NULL,
  `ID_Partida` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partida`
--

CREATE TABLE IF NOT EXISTS `partida` (
`ID_Partida` int(255) NOT NULL,
  `Turno` int(255) NOT NULL,
  `Fecha_Inicio` date NOT NULL,
  `Fecha_Final` date NOT NULL,
  `Estado` int(255) NOT NULL COMMENT 'Pendiente(0) / Finalizado(1)'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta`
--

CREATE TABLE IF NOT EXISTS `pregunta` (
`ID_Pregunta` int(255) NOT NULL,
  `Text_Pregunta` int(255) NOT NULL,
  `ID_Mundo` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `privilegio`
--

CREATE TABLE IF NOT EXISTS `privilegio` (
`ID_Privilegio` int(255) NOT NULL,
  `Tipo_Privilegio` varchar(9999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta`
--

CREATE TABLE IF NOT EXISTS `respuesta` (
`ID_Respuesta` int(255) NOT NULL,
  `ID_Pregunta` int(255) NOT NULL,
  `Texto_Respuesta` varchar(9999) NOT NULL,
  `Correcta` int(255) NOT NULL COMMENT 'SI(1) / NO (0)'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
 ADD PRIMARY KEY (`ID_Categoria`);

--
-- Indices de la tabla `estadistica`
--
ALTER TABLE `estadistica`
 ADD PRIMARY KEY (`ID_Jugador`,`ID_Categoria`);

--
-- Indices de la tabla `jugador`
--
ALTER TABLE `jugador`
 ADD PRIMARY KEY (`ID_Jugador`);

--
-- Indices de la tabla `mundo`
--
ALTER TABLE `mundo`
 ADD PRIMARY KEY (`ID_Mundo`);

--
-- Indices de la tabla `nivel`
--
ALTER TABLE `nivel`
 ADD PRIMARY KEY (`ID_Nivel`);

--
-- Indices de la tabla `participacion`
--
ALTER TABLE `participacion`
 ADD PRIMARY KEY (`ID_Participacion`);

--
-- Indices de la tabla `partida`
--
ALTER TABLE `partida`
 ADD PRIMARY KEY (`ID_Partida`);

--
-- Indices de la tabla `pregunta`
--
ALTER TABLE `pregunta`
 ADD PRIMARY KEY (`ID_Pregunta`);

--
-- Indices de la tabla `privilegio`
--
ALTER TABLE `privilegio`
 ADD PRIMARY KEY (`ID_Privilegio`);

--
-- Indices de la tabla `respuesta`
--
ALTER TABLE `respuesta`
 ADD PRIMARY KEY (`ID_Respuesta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
MODIFY `ID_Categoria` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `jugador`
--
ALTER TABLE `jugador`
MODIFY `ID_Jugador` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `mundo`
--
ALTER TABLE `mundo`
MODIFY `ID_Mundo` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `nivel`
--
ALTER TABLE `nivel`
MODIFY `ID_Nivel` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `participacion`
--
ALTER TABLE `participacion`
MODIFY `ID_Participacion` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `partida`
--
ALTER TABLE `partida`
MODIFY `ID_Partida` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pregunta`
--
ALTER TABLE `pregunta`
MODIFY `ID_Pregunta` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `privilegio`
--
ALTER TABLE `privilegio`
MODIFY `ID_Privilegio` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `respuesta`
--
ALTER TABLE `respuesta`
MODIFY `ID_Respuesta` int(255) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
