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
  `URL_ImagenMundo` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_Mundo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `mundo`
--

INSERT INTO `mundo` (`ID_Mundo`, `Nombre_Mundo`, `URL_ImagenMundo`) VALUES
(NULL, 'Normal', '/mundoNormal.png'),
(NULL, 'Disney', '/mundoDisney.png');

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
  `URL_ImagenJugador` varchar(255) NOT NULL,
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

INSERT INTO `jugador` (`ID_Jugador`, `Nick`, `Nombre`, `Apellidos`, `Contraseña`, `Email`, `URL_ImagenJugador`, `Partidas_Ganadas`, `Partidas_Perdidas`, `ID_Privilegio`, `ID_Nivel`) VALUES
(1, 'Carlos342', 'Carlos', 'Tenorio Pérez', 'carlos342admin', 'carlos342@gmail.com', 'Carlos342', 0, 0, 2, 4),
(2, 'joan', 'joan', 'martin', 'hola', 'joan@hotmail.com', 'joan', 0, 0, 2, 4),
(3, 'Espe22', 'Espe', 'espe', 'jaja', 'jaja@hotmail.com', 'Espe22', 0, 0, 2, 4);

-- --------------------------------------------------------






--
-- Estructura de tabla para la tabla `partida`
--

CREATE TABLE IF NOT EXISTS `partida` (
  `ID_Partida` int(15) NOT NULL AUTO_INCREMENT,
  `Fecha_Inicio` timestamp DEFAULT CURRENT_TIMESTAMP,
  `Fecha_Final` timestamp DEFAULT NULL,
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
(NULL, '2015-11-09', '2015-11-11', '08:00:00', 0, 2),
(NULL, '2015-11-26', '2015-11-27', '04:00:00', 1, 1),
(NULL, '2015-11-27', '2015-11-28', '02:00:00', 1, 1);

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
(1, 2, 1, 1, 1),
(2, 1, 1, 1, 0),
(3, 2, 2, 1, 0),
(4, 1, 2, 1, 1),
(5, 2, 3, 1, 0),
(6, 1, 3, 1, 1),
(7, 3, 4, 1, 1),
(8, 2, 4, 1, 0),
(9, 2, 5, 1, 0),
(10, 1, 5, 1, 1);

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
(1, 'Conjunto de polvo, gas y estrellas de miles de parsecs de diámetro', 1),
(2, 'Derivada de 100', 1),
(3, 'Filósofo griego fundador de la filosofía científica', 1),
(4, 'Inventor del pararrayos', 1),
(5, 'Número siguiente a la sucesión: 1-1-2-3-5-8-13', 1),
(6, '¿En qué mes se produce el equinoccio de primavera?', 1),
(7, '¿Qué planeta del Sistema Solar es el cuarto más cercano al Sol?', 1),
(8, '¿Qué fenómeno atmosférico es el que se produce más frecuentemente en la Luna?', 1),
(9, '¿A dónde fueron deportados los judíos tras la conquista de Jerusalén por Nabucodonosor?', 2),
(10, '¿A dónde se traslada la Casa de la Contratación en 1717 desde Sevilla?', 2),
(11, '¿A qué ciudad actual corresponde la romana Gades?', 2),
(12, '¿Qué faraón murió en el año 1325 a.C.?', 2),
(13, '¿A quién era atribuido "El coloso"?', 3),
(14, '¿A qué estilo pertenecen San Salvador de Valdediós y San Miguel de Lillo?', 3),
(15, '¿En qué destacó Filippo Brunelleschi?', 3),
(16, '¿Cómo se llama la película dirigida por Kubrick ambientada en la I Guerra Mundial?', 4),
(17, '¿Cómo se llama la primera película de Harry Potter?', 4),
(18, '¿En qué película Julia Roberts ejerce la profesión "más antigua del mundo"?', 4),
(19, '¿Quién ganó el trofeo Zamora en la temporada 1986/87?', 5),
(20, '¿A qué jugador del Madrid partió por la mitad Romario con su regate de cola de vaca?', 5),
(21, '¡¡¡Vacaciones en Polinesia!!! ¿En qué continente estoy?', 6),
(22, '¿A cuántos países pertenece la selva del Amazonas?', 6),
(23, '¿A dónde llegó el explorador noruego Roald Amundsen en 1911?', 6);

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
(1, 1, 'Galaxia', 1),
(2, 1, 'Sistema solar', 0),
(3, 1, 'Cinturón de asteroides', 0),
(4, 1, 'Nebulosa', 0),
(5, 2, '0', 1),
(6, 2, 'x', 0),
(7, 2, '10', 0),
(8, 2, '-1', 0),
(9, 3, 'Aristóteles', 1),
(10, 3, 'Platón', 0),
(11, 3, 'Kant', 0),
(12, 3, 'Sócrates', 0),
(13, 4, 'Benjamin Franklin', 1),
(14, 4, 'Isaac Newton', 0),
(15, 4, 'Albert Einstein', 0),
(16, 4, 'Nikola Tesla', 0),
(17, 5, '21', 1),
(18, 5, '13', 0),
(19, 5, '14', 0),
(20, 5, '16', 0),
(21, 6, 'Marzo', 1),
(22, 6, 'Abril', 0),
(23, 6, 'Mayo', 0),
(24, 6, 'Diciembre', 0),
(25, 7, 'Marte', 1),
(26, 7, 'La Tierra', 0),
(27, 7, 'Júpiter', 0),
(28, 7, 'Mercurio', 0),
(29, 8, 'Ninguno', 1),
(30, 8, 'Viento', 0),
(31, 8, 'Lluvia', 0),
(32, 8, 'Colisión de meteoritos', 0),
(33, 9, 'Babilonia', 1),
(34, 9, 'Asiria', 0),
(35, 9, 'Egipto', 0),
(36, 9, 'Mesopotamia', 0),
(37, 10, 'Cádiz', 1),
(38, 10, 'Málaga', 0),
(39, 10, 'Almería', 0),
(40, 10, 'Badajoz', 0),
(41, 11, 'Cádiz', 1),
(42, 11, 'Málaga', 0),
(43, 11, 'Sevilla', 0),
(44, 11, 'Segovia', 0),
(45, 12, 'Tutankamon', 1),
(46, 12, 'Cleopatra', 0),
(47, 12, 'Ramses II', 0),
(48, 12, 'Nefertiti', 0),
(49, 13, 'Francisco de Goya', 1),
(50, 13, 'Pablo Picasso', 0),
(51, 13, 'José Domínguez Bécquer', 0),
(52, 13, 'Federico Madrazo', 0),
(53, 14, 'Prerrománico', 1),
(54, 14, 'Románico', 0),
(55, 14, 'Gótico', 0),
(56, 14, 'Islámico', 0),
(57, 15, 'Arquitectura', 1),
(58, 15, 'Pintura', 0),
(59, 15, 'Música', 0),
(60, 15, 'Escritura', 0),
(61, 16, 'Senderos de gloria', 1),
(62, 16, 'La gran ilusion', 0),
(63, 16, 'El sargento York', 0),
(64, 16, 'Capitán Conan', 0),
(65, 17, 'Harry Potter y la priedra filosofal', 1),
(66, 17, 'Harry Potter', 0),
(67, 17, 'Harry Potter y la cámara secreta', 0),
(68, 17, 'Harry Potter y el cáliz de fuego', 0),
(69, 18, 'Pretty Woman', 1),
(70, 18, 'Secret in their eyes', 0),
(71, 18, 'Nothing Hill', 0),
(72, 18, 'Come, reza, ama', 0),
(73, 19, 'Andoni Zubizarreta', 1),
(74, 19, 'Juan Carlos Ablanedo', 0),
(75, 19, 'Paco Buyo', 0),
(76, 19, 'Abel Resino', 0),
(77, 20, 'Rafael Alkorta', 1),
(78, 20, 'Sergio Ramos', 0),
(79, 20, 'Fernando Hierro', 0),
(80, 20, 'Mikel Goikoetxea', 0),
(81, 21, 'Oceanía', 1),
(82, 21, 'Europa', 0),
(83, 21, 'Asia', 0),
(84, 21, 'América', 0),
(85, 22, '8', 1),
(86, 22, '1', 0),
(87, 22, '6', 0),
(88, 22, '5', 0),
(89, 23, 'Polo Sur', 1),
(90, 23, 'Polo Norte', 0),
(91, 23, 'Australia', 0),
(92, 23, 'A la cima del Monte Everest', 0);

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

--
-- Volcado de datos para la tabla `intervencion`
--

INSERT INTO `intervencion` (`Acertada`, `ID_Participacion`, `ID_Pregunta`) VALUES
(0, 2, 1),
(1, 2, 2),
(0, 2, 1),
(1, 3, 1),
(0, 3, 2),
(0, 4, 2),
(1, 2, 2),
(0, 3, 1),
(1, 7, 1),
(1, 8, 2),
(1, 7, 3),
(0, 3, 16),
(1, 1, 19),
(1, 1, 20),
(1, 1, 7),
(1, 1, 19),
(1, 1, 23),
(1, 1, 4),
(1, 1, 16),
(0, 1, 16);
-- --------------------------------------------------------