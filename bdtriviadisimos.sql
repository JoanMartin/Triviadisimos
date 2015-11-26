-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-11-2015 a las 17:14:30
-- Versión del servidor: 5.6.25
-- Versión de PHP: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdtriviadisimos`
--
CREATE DATABASE IF NOT EXISTS bdtriviadisimos;
USE bdtriviadisimos;

-- --------------------------------------------------------


--
-- Estructura de tabla para la tabla `mundo`
--

CREATE TABLE IF NOT EXISTS `mundo` (
  `ID_Mundo` int(15) NOT NULL AUTO_INCREMENT,
  `Nombre_Mundo` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_Mundo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `mundo`
--

INSERT INTO `mundo` (`ID_Mundo`, `Nombre_Mundo`) VALUES
(NULL, 'Normal'),
(NULL, 'Disney');

-- --------------------------------------------------------





--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `ID_Categoria` int(15) NOT NULL AUTO_INCREMENT,
  `ID_Mundo` int(15) NOT NULL,
  `Nombre_Categoria` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_Categoria`),
  FOREIGN KEY (`ID_Mundo`) REFERENCES mundo(`ID_Mundo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`ID_Categoria`, `ID_Mundo`, `Nombre_Categoria`) VALUES
(NULL, 1, 'Ciencia'),
(NULL, 1, 'Historia'),
(NULL, 1, 'Arte y literatura'),
(NULL, 1, 'Espectáculos'),
(NULL, 1, 'Deportes'),
(NULL, 1, 'Geografía'),
(NULL, 2, 'Maravilloso mundo de Disney'),
(NULL, 2, 'Monstruos y villanos'),
(NULL, 2, 'Héroes y heroínas'),
(NULL, 2, 'Lugares y objetos'),
(NULL, 2, 'Estrellas secundarias'),
(NULL, 2, 'Había una vez');

-- --------------------------------------------------------






--
-- Estructura de tabla para la tabla `estadistica`
--

CREATE TABLE IF NOT EXISTS `estadistica` (
  `ID_Jugador` int(15) NOT NULL,
  `ID_Categoria` int(15) NOT NULL,
  `Numero_Acertadas` int(15) NOT NULL,
  `Numero_Falladas` int(15) NOT NULL,
  PRIMARY KEY (`ID_Jugador`, `ID_Categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `estadistica`
--

INSERT INTO `estadistica` (`ID_Jugador`, `ID_Categoria`, `Numero_Acertadas`, `Numero_Falladas`) VALUES
(1, 1, 25, 62),
(1, 3, 25, 2),
(1, 5, 2, 2),
(1, 6, 2, 1),
(1, 7, 24, 52),
(1, 8, 26, 5),
(1, 9, 25, 1),
(1, 10, 23, 3),
(1, 11, 22, 12),
(1, 12, 2, 2),
(1, 13, 55, 5),
(1, 14, 23, 33);

-- --------------------------------------------------------






--
-- Estructura de tabla para la tabla `nivel`
--

CREATE TABLE IF NOT EXISTS `nivel` (
  `ID_Nivel` int(15) NOT NULL AUTO_INCREMENT,
  `Tipo_Nivel` varchar(50) NOT NULL,
  `URL_Imagen` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_Nivel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `privilegio`
--


INSERT INTO `nivel` (`ID_Nivel`, `Tipo_Nivel`, `URL_Imagen`) VALUES 
(NULL, 'Maestro', ''),
(NULL, 'Crack', ''),
(NULL, 'Figura', ''),
(NULL, 'Principiante', ''),
(NULL, 'Fantasma', ''),
(NULL, 'Débil', ''),
(NULL, 'Siguiente', '');

-- --------------------------------------------------------






--
-- Estructura de tabla para la tabla `privilegio`
--

CREATE TABLE IF NOT EXISTS `privilegio` (
  `ID_Privilegio` int(15) NOT NULL AUTO_INCREMENT,
  `Tipo_Privilegio` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_Privilegio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `privilegio`
--

INSERT INTO `privilegio` (`ID_Privilegio`, `Tipo_Privilegio`) VALUES
(NULL, 'admin'),
(NULL, 'user');

-- --------------------------------------------------------







--
-- Estructura de tabla para la tabla `jugador`
--

CREATE TABLE IF NOT EXISTS `jugador` (
  `ID_Jugador` int(15) NOT NULL AUTO_INCREMENT,
  `Nick` varchar(50) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellidos` varchar(50) NOT NULL,
  `Contraseña` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `URL_Imagen` varchar(255) NOT NULL,
  `Partidas_Ganadas` int(15) NOT NULL,
  `Partidas_Perdidas` int(15) NOT NULL,
  `ID_Privilegio` int(15) NOT NULL,
  `ID_Nivel` int(15) NOT NULL,
  PRIMARY KEY (`ID_Jugador`),
  FOREIGN KEY (`ID_Privilegio`) REFERENCES privilegio(`ID_Privilegio`),
  FOREIGN KEY (`ID_Nivel`) REFERENCES nivel(`ID_Nivel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `jugador`
--

INSERT INTO `jugador` (`ID_Jugador`, `Nick`, `Nombre`, `Apellidos`, `Contraseña`, `Email`, `URL_Imagen`, `Partidas_Ganadas`, `Partidas_Perdidas`, `ID_Privilegio`, `ID_Nivel`) VALUES
(NULL, 'Carlos342', 'Carlos', 'Tenorio Pérez', 'carlos342admin', 'carlos342@gmail.com', '', 0, 0, 2, 4),
(NULL, 'joan', 'joan', 'martin', 'hola', 'joan@hotmail.com', '', 0, 0, 2, 4);

-- --------------------------------------------------------






--
-- Estructura de tabla para la tabla `partida`
--

CREATE TABLE IF NOT EXISTS `partida` (
  `ID_Partida` int(15) NOT NULL AUTO_INCREMENT,
  `Fecha_Inicio` date NOT NULL,
  `Fecha_Final` date NOT NULL,
  `Hora_Inicio` time NOT NULL,
  `Estado_Partida` int(1) NOT NULL COMMENT 'Pendiente(0) / Finalizado(1)',
  `ID_Mundo` int(15) NOT NULL,
  PRIMARY KEY (`ID_Partida`),
  FOREIGN KEY (`ID_Mundo`) REFERENCES mundo(`ID_Mundo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `partida`
--

INSERT INTO `partida` (`ID_Partida`, `Fecha_Inicio`, `Fecha_Final`, `Hora_Inicio`, `Estado_Partida`, `ID_Mundo`) VALUES
(NULL, '2015-11-09', '0000-00-00', '05:00:00', 1, 1),
(NULL, '2015-11-09', '2015-11-11', '05:00:00', 1, 1),
(NULL, '2015-11-09', '2015-11-11', '08:00:00', 0, 2);

-- --------------------------------------------------------






--
-- Estructura de tabla para la tabla `participacion`
--

CREATE TABLE IF NOT EXISTS `participacion` (
  `ID_Participacion` int(15) NOT NULL AUTO_INCREMENT,
  `ID_Jugador` int(15) NOT NULL,
  `ID_Partida` int(15) NOT NULL,
  `Estado_Participacion` int(1) NOT NULL,
  `Turno` int(1) NOT NULL,
  PRIMARY KEY (`ID_Participacion`),
  FOREIGN KEY (`ID_Jugador`) REFERENCES jugador(`ID_Jugador`),
  FOREIGN KEY (`ID_Partida`) REFERENCES partida(`ID_Partida`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `participacion`
--

INSERT INTO `participacion` (`ID_Participacion`, `ID_Jugador`, `ID_Partida`, `Estado_Participacion`, `Turno`) VALUES
(NULL, 2, 1, 1, 1),
(NULL, 1, 1, 1, 0),
(NULL, 2, 2, 1, 1),
(NULL, 1, 2, 1, 0),
(NULL, 2, 3, 1, 0),
(NULL, 1, 3, 1, 1);

-- --------------------------------------------------------





--
-- Estructura de tabla para la tabla `pregunta`
--

CREATE TABLE IF NOT EXISTS `pregunta` (
  `ID_Pregunta` int(15) NOT NULL AUTO_INCREMENT,
  `Text_Pregunta` varchar(255) NOT NULL,
  `ID_Categoria` int(15) NOT NULL,
  PRIMARY KEY (`ID_Pregunta`),
  FOREIGN KEY (`ID_Categoria`) REFERENCES categoria(`ID_Categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pregunta`
--

INSERT INTO `pregunta` (`ID_Pregunta`, `Text_Pregunta`, `ID_Categoria`) VALUES
(NULL, 'Conjunto de polvo, gas y estrellas de miles de parsecs de diámetro', 1),
(NULL, 'Derivada de 100', 1);

-- --------------------------------------------------------





--
-- Estructura de tabla para la tabla `respuesta`
--

CREATE TABLE IF NOT EXISTS `respuesta` (
  `ID_Respuesta` int(15) NOT NULL AUTO_INCREMENT,
  `ID_Pregunta` int(15) NOT NULL,
  `Texto_Respuesta` varchar(255) NOT NULL,
  `Correcta` int(15) NOT NULL COMMENT 'SI(1) / NO (0)',
  PRIMARY KEY (`ID_Respuesta`),
  FOREIGN KEY (`ID_Pregunta`) REFERENCES pregunta(`ID_Pregunta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `respuesta`
--

INSERT INTO `respuesta` (`ID_Respuesta`, `ID_Pregunta`, `Texto_Respuesta`, `Correcta`) VALUES
(NULL, 1, 'Galaxia', 1),
(NULL, 1, 'Sistema solar', 0),
(NULL, 1, 'Cinturón de asteroides', 0),
(NULL, 1, 'Nebulosa', 0),
(NULL, 2, '0', 1),
(NULL, 2, 'x', 0),
(NULL, 2, '10', 0),
(NULL, 2, '-1', 0);

-- --------------------------------------------------------




--
-- Estructura de tabla para la tabla `intervencion`
--

CREATE TABLE IF NOT EXISTS `intervencion` (
  `Acertada` int(1) NOT NULL COMMENT 'Si(1) / No(0)',
  `ID_Participacion` int(15) NOT NULL,
  `ID_Pregunta` int(15) NOT NULL,
  FOREIGN KEY (`ID_Participacion`) REFERENCES participacion(`ID_Participacion`),
  FOREIGN KEY (`ID_Pregunta`) REFERENCES pregunta(`ID_Pregunta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------