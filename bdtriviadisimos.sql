--
-- Base de datos: `bdtriviadisimos`
--

CREATE DATABASE IF NOT EXISTS `bdtriviadisimos`;
USE `bdtriviadisimos`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `ID_Categoria` int(15) NOT NULL,
  `ID_Mundo` int(15) NOT NULL,
  `Nombre_Categoria` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`ID_Categoria`, `ID_Mundo`, `Nombre_Categoria`) VALUES
(1, 1, 'Ciencia'),
(2, 1, 'Historia'),
(3, 1, 'Arte y literatura'),
(4, 1, 'Espectáculos'),
(5, 1, 'Deportes'),
(6, 1, 'Geografía'),
(7, 2, 'Maravilloso mundo de Disney'),
(8, 2, 'Monstruos y villanos'),
(9, 2, 'Héroes y heroínas'),
(10, 2, 'Lugares y objetos'),
(11, 2, 'Estrellas secundarias'),
(12, 2, 'Había una vez');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadistica`
--

CREATE TABLE IF NOT EXISTS `estadistica` (
  `ID_Jugador` int(15) NOT NULL,
  `ID_Categoria` int(15) NOT NULL,
  `Numero_Acertadas` int(15) NOT NULL,
  `Numero_Falladas` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `estadistica`
--

INSERT INTO `estadistica` (`ID_Jugador`, `ID_Categoria`, `Numero_Acertadas`, `Numero_Falladas`) VALUES
(2, 1, 1, 1),
(2, 2, 1, 1),
(2, 3, 2, 0),
(2, 4, 1, 0),
(2, 5, 3, 0),
(2, 6, 4, 3),
(2, 7, 3, 0),
(2, 8, 2, 0),
(2, 9, 1, 0),
(2, 10, 2, 0),
(2, 11, 1, 0),
(2, 12, 1, 0),
(4, 2, 1, 3),
(4, 3, 0, 1),
(4, 4, 1, 1),
(4, 6, 0, 1),
(4, 7, 0, 1),
(4, 8, 3, 0),
(4, 9, 1, 1),
(4, 10, 2, 0),
(4, 11, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `intervencion`
--

CREATE TABLE IF NOT EXISTS `intervencion` (
  `Acertada` int(1) NOT NULL COMMENT 'Si(1) / No(0)',
  `ID_Participacion` int(15) NOT NULL,
  `ID_Pregunta` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `intervencion`
--

INSERT INTO `intervencion` (`Acertada`, `ID_Participacion`, `ID_Pregunta`) VALUES
(0, 41, 13),
(1, 46, 33),
(1, 46, 89),
(1, 46, 90),
(0, 46, 87),
(1, 43, 139),
(1, 43, 165),
(0, 43, 121),
(1, 47, 69),
(1, 47, 119),
(1, 47, 142),
(1, 47, 153),
(1, 47, 170),
(1, 47, 171),
(1, 47, 151),
(1, 47, 147),
(1, 47, 153),
(1, 47, 98),
(0, 41, 111),
(0, 42, 86),
(0, 46, 85),
(1, 48, 12),
(0, 48, 87),
(1, 41, 111),
(0, 41, 114),
(0, 42, 110),
(1, 46, 81),
(1, 46, 41),
(1, 46, 53),
(1, 46, 108),
(1, 46, 85),
(1, 46, 3),
(0, 46, 26),
(1, 44, 177),
(1, 44, 66),
(1, 44, 144),
(1, 44, 123),
(1, 44, 166),
(0, 44, 162),
(0, 48, 117),
(1, 41, 57),
(0, 41, 50),
(1, 46, 32),
(1, 46, 31);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugador`
--

CREATE TABLE IF NOT EXISTS `jugador` (
  `ID_Jugador` int(15) NOT NULL,
  `Nick` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Apellidos` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Contraseña` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `URL_ImagenJugador` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Partidas_Ganadas` int(15) NOT NULL,
  `Partidas_Perdidas` int(15) NOT NULL,
  `ID_Privilegio` int(15) NOT NULL DEFAULT '2',
  `ID_Nivel` int(15) NOT NULL DEFAULT '4'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `jugador`
--

INSERT INTO `jugador` (`ID_Jugador`, `Nick`, `Nombre`, `Apellidos`, `Contraseña`, `Email`, `URL_ImagenJugador`, `Partidas_Ganadas`, `Partidas_Perdidas`, `ID_Privilegio`, `ID_Nivel`) VALUES
(1, 'Carlos342', 'Carlos', 'Tenorio Pérez', 'carlos', 'carlos342@gmail.com', 'Carlos342', 0, 0, 1, 4),
(2, 'joan', 'joan', 'martin', 'hola', 'joan@hotmail.com', 'joan', 2, 0, 1, 4),
(3, 'Espe22', 'Espe', 'espe', 'jaja', 'jaja@hotmail.com', 'Espe22', 0, 0, 2, 4),
(4, 'paco', 'paquito', 'guti', 'paquito', 'pacopaco@gmail.com', 'paco', 0, 2, 2, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mundo`
--

CREATE TABLE IF NOT EXISTS `mundo` (
  `ID_Mundo` int(15) NOT NULL,
  `Nombre_Mundo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `URL_ImagenMundo` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `mundo`
--

INSERT INTO `mundo` (`ID_Mundo`, `Nombre_Mundo`, `URL_ImagenMundo`) VALUES
(1, 'Normal', '/mundoNormal.png'),
(2, 'Disney', '/mundoDisney.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel`
--

CREATE TABLE IF NOT EXISTS `nivel` (
  `ID_Nivel` int(15) NOT NULL,
  `Tipo_Nivel` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `URL_Imagen` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `nivel`
--

INSERT INTO `nivel` (`ID_Nivel`, `Tipo_Nivel`, `URL_Imagen`) VALUES
(1, 'Maestro', 'Maestro.png'),
(2, 'Crack', 'Crack.png'),
(3, 'Figura', 'Figura.png'),
(4, 'Principiante', 'Principiante.png'),
(5, 'Fantasma', 'Fantasma.png'),
(6, 'Débil', 'Débil.png'),
(7, 'Siguiente', 'Siguiente.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participacion`
--

CREATE TABLE IF NOT EXISTS `participacion` (
  `ID_Participacion` int(15) NOT NULL,
  `ID_Jugador` int(15) NOT NULL,
  `ID_Partida` int(15) NOT NULL,
  `Turno` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `participacion`
--

INSERT INTO `participacion` (`ID_Participacion`, `ID_Jugador`, `ID_Partida`, `Turno`) VALUES
(41, 4, 23, 0),
(42, 4, 24, 1),
(43, 4, 25, 0),
(44, 4, 26, 0),
(45, 4, 27, 1),
(46, 2, 23, 1),
(47, 2, 25, 1),
(48, 2, 24, 0),
(49, 3, 27, 0),
(50, 3, 26, 1),
(51, 2, 28, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partida`
--

CREATE TABLE IF NOT EXISTS `partida` (
  `ID_Partida` int(15) NOT NULL,
  `Fecha_Inicio` timestamp NULL DEFAULT NULL,
  `Fecha_Final` timestamp NULL DEFAULT NULL,
  `Estado_Partida` enum('En espera','Iniciada','Finalizada') COLLATE utf8_spanish_ci NOT NULL,
  `ID_Mundo` int(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `partida`
--

INSERT INTO `partida` (`ID_Partida`, `Fecha_Inicio`, `Fecha_Final`, `Estado_Partida`, `ID_Mundo`) VALUES
(23, '2016-01-15 15:40:16', '2016-01-15 16:03:55', 'Finalizada', 1),
(24, '2016-01-15 15:40:22', NULL, 'Iniciada', 1),
(25, '2016-01-15 15:40:19', '2016-01-15 15:43:40', 'Finalizada', 2),
(26, '2016-01-15 15:48:25', NULL, 'Iniciada', 2),
(27, '2016-01-15 15:48:23', NULL, 'Iniciada', 1),
(28, NULL, NULL, 'En espera', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta`
--

CREATE TABLE IF NOT EXISTS `pregunta` (
  `ID_Pregunta` int(15) NOT NULL,
  `Text_Pregunta` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `ID_Categoria` int(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=180 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pregunta`
--

INSERT INTO `pregunta` (`ID_Pregunta`, `Text_Pregunta`, `ID_Categoria`) VALUES
(1, '¿A quién era atribuido "El coloso"?', 3),
(2, '¿A qué estilo pertenecen San Salvador de Valdediós y San Miguel de Lillo?', 3),
(3, '¿En qué destacó Filippo Brunelleschi?', 3),
(4, 'Autor de: El rapto de Proserpina', 3),
(5, 'Autor de: El sueño de Jacob.', 3),
(6, 'Autor de: El teatro de máscaras.', 3),
(7, 'Autor de: Tres mendigos.', 3),
(8, '(El Señor de los Anillos) ¿Cuál fue el último cumpleaños que celebró Bilbo Bolsón en Bolsón Cerrado?', 3),
(9, '(Siglo XIV) Autor: "África", poema épico sobre Escipión (Escrita en latín)', 3),
(10, '¿A qué edad escribió Carmen Laforet "Nada"?', 3),
(11, '¿A qué edad murió el poeta gaditano Rafael Alberti?', 3),
(12, '¿A qué época pertenece la literatura de la escolástica?', 3),
(13, '¿A qué generación literaria perteneció Valle-Inclán?', 3),
(14, '¿A qué movimiento literario pertenece Góngora?', 3),
(15, '¿A qué movimiento literario pertenece Quevedo?', 3),
(16, 'Conjunto de polvo, gas y estrellas de miles de parsecs de diámetro', 1),
(17, 'Derivada de 100', 1),
(18, 'Filósofo griego fundador de la filosofía científica', 1),
(19, 'Inventor del pararrayos', 1),
(20, 'Número siguiente a la sucesión: 1-1-2-3-5-8-13', 1),
(21, '¿En qué mes se produce el equinoccio de primavera?', 1),
(22, '¿Qué planeta del Sistema Solar es el cuarto más cercano al Sol?', 1),
(23, '¿Qué fenómeno atmosférico es el que se produce más frecuentemente en la Luna?', 1),
(24, 'Un circuito boost es un...', 1),
(25, 'En la elección de muestras, ¿a qué se le llama N', 1),
(26, 'Acabado que se da a los papeles brillantes secándolos en contacto con una superficie cromada muy pulida y por lo general caliente.', 1),
(27, '¿A cuántos años-luz equivalen un parsec?', 1),
(28, '¿A cuántos grados centígrados está el núcleo del Sol?', 1),
(29, '¿A cuántos grados Kelvin corresponden 0 grados centigrados?', 1),
(30, '¿A cuántos metros del suelo debe situarse una gárita meteorológica para que puedan ser homologadas sus mediciones?', 1),
(31, '¿Quién dijo "se puede aprender mucho de la Tierra mirándola desde el espacio"?', 1),
(32, '¿Quién ganó el trofeo Zamora en la temporada 1986/87?', 5),
(33, '¿A qué jugador del Madrid partió por la mitad Romario con su regate de cola de vaca?', 5),
(34, '¿A qué ciclista español le llamaron El Extraterrestre?', 5),
(35, '¿A qué ciudad se marchó Ronaldo tras dejar el Barcelona?', 5),
(36, '¿A qué corresponden las siglas ATP?', 5),
(37, '¿A qué deporte jugaban en el Mar Valencia cuando se nacionalizaron Vera Samoilova y Natalia Morskova?', 5),
(38, '¿A qué equipo de rugby se les llama los Springboks?', 5),
(39, '¿A qué equipo del fútbol argentino lo llaman "Cuervos"?', 5),
(40, '¿A qué equipo del fútbol argentino lo llaman "El Fortin"?', 5),
(41, '¿A qué equipo francés se marcharon Arteta y De Lucas?', 5),
(42, '¿A qué equipo marchó Paulo Futre después del Atlético de Madrid?', 5),
(43, '¿A qué equipo metió Ronaldo su primer gol después de su desafortunada lesión (Temp. 2001/02)?', 5),
(44, '¿A qué herramienta sustituyó la "shistera" en algunos juegos de pelota?', 5),
(45, '¿A qué llamaban gambeteo los futbolistas argentinos?', 5),
(46, '¿A qué otro deporte es aficionado Michael Jordan?', 5),
(47, '¿Cómo se llama la película dirigida por Kubrick ambientada en la I Guerra Mundial?', 4),
(48, '¿Cómo se llama la primera película de Harry Potter?', 4),
(49, '¿En qué película Julia Roberts ejerce la profesión "más antigua del mundo"?', 4),
(50, 'Completa el nombre: Polanski y...', 4),
(51, 'Ian McCulloch fue vocalista de?', 4),
(52, '¿A qué grupo pertenecía Nacho Goberna?', 4),
(53, '¿A qué cantante acompañaban Los Trogloditas?', 4),
(54, '¿A qué cantante le llamaron "la voz de la generación X"?', 4),
(55, '¿A qué ciudad española dedicó Joaquín Rodrigo su famoso concierto?', 4),
(56, '¿A qué compositor está dedicada la Marcha Fúnebre inserta en el segundo movimiento de la Sinfonía nº 7 de Anton Bruckner (1883), fallecido mientras este la componía?', 4),
(57, 'A qué corresponden las iniciales B. B. de B. B. King?', 4),
(58, '¿A qué edad comenzó con la música Stevie Wonder?', 4),
(59, '¿A qué edad falleció Bob Marley?', 4),
(60, '¿A qué edad falleció Elvis Presley?', 4),
(61, '¿A qué grado de la escala nos referimos si hablamos de una dominante?', 4),
(62, '¿A qué grupo asociarías "Quadrophenia"?', 4),
(63, '¿Qué clase de animales son Reina, Princesa y Duquesa?', 11),
(64, '¿Cuál es el único enanito al que solo se le oye cuando llora y estornuda?', 11),
(65, '¿A quién llama Peter Pan "Bacalao"?', 11),
(66, '¿Quién cambia de forma constantemente debido a que las partes de su cuerpo son móviles?', 11),
(67, '¿De qué se da cuenta Buzz Lightyear cuando ve un anuncio de televión?', 11),
(68, '¿Quién canta "Qué festín"?', 11),
(69, '¿Qué clase de animal es Diana, la mascota de Alicia?', 11),
(70, '¿Qué estaba persiguiendo Dama cuando fue atrapada por el perrero?', 11),
(71, '¿Para qué han ido a África Jane y el profesor Porter?', 11),
(72, '¿Qué es Filoctetes?', 11),
(73, '¿De qué clase de pájaro proviene la pluma "mágica"?', 11),
(74, '¿Quién es el mejor amigo de Abu?', 11),
(75, '¿Qué clase de animal es la mascota de Merlín?', 11),
(76, '¿Para quién firma Timoteo un contrato en Hollywood?', 11),
(77, '¿Qué clase de animal desea Ratigan que piense la gente que es?', 11),
(78, '¡¡¡Vacaciones en Polinesia!!! ¿En qué continente estoy?', 6),
(79, '¿A cuántos países pertenece la selva del Amazonas?', 6),
(80, '¿A dónde llegó el explorador noruego Roald Amundsen en 1911?', 6),
(81, '¿A cuántos kilómetros de Madrid se encuentra la ciudad de Móstoles?', 6),
(82, '¿A cuántos metros sobre el nivel del mar (aproximandamente) está situada la ciudad de Zamora?', 6),
(83, '¿A qué archipiélago pertenece la isla Alegranza?', 6),
(84, '¿A qué archipiélago pertenecen Java, Bali, Timor y las Molucas, entre otras?', 6),
(85, '¿A qué comunidad pertenece el pantano de Tanes?', 6),
(86, '¿A qué continente llegó por primera vez en 1831 el inglés John Biscoe?', 6),
(87, '¿A qué desértico estado norteamericano pertenece la ciudad de Casa Grande?', 6),
(88, '¿A qué dos países pertenece la isla Grande Tierra del Fuego?', 6),
(89, '¿A qué estado de EE.UU. corresponden las siglas ME?', 6),
(90, '¿A qué estado pertenece la ciudad de Eilat junto al mar Rojo?', 6),
(91, 'En Pocahontas, ¿a quién se agarra Miko para poder realizar su gran salto?', 12),
(92, 'En la Bella Durmiente, ¿cómo despierta el principe a la princesa?', 12),
(93, '¿Por qué tiene celos de Blancanieves la Malvada Reina?', 12),
(94, '¿Quién es el amor de Lady Marian?', 12),
(95, '¿De qué color es el pelo de Cruella?', 12),
(96, '¿Cuál fue la primera película en la que participó Buzz Lightyear?', 12),
(97, '¿Qué clase de arma utiliza Tarzán?', 12),
(98, '¿Cuál es el nombre del grupo de mujeres que canta en Hércules?', 12),
(99, '¿Qué ven Dumbo y Timoteo después de beber demasiado champán?', 12),
(100, '¿Cuál es el nombre de la familia de Mulán?', 12),
(101, '¿Quién convierte a Abu en un elefante?', 12),
(102, '¿Qué personaje narra la historia en "El libro de la Selva"?', 12),
(103, '¿Debajo de qué tipo de planta se besan Woody y Betty?', 12),
(104, '¿Qué cualidad conserva Hércules cuando se convierte en humano?', 12),
(105, '¿Cómo se llama el oso protagonista de "El libro de la Selva"?', 12),
(106, '¿A dónde fueron deportados los judíos tras la conquista de Jerusalén por Nabucodonosor?', 2),
(107, '¿A dónde se traslada la Casa de la Contratación en 1717 desde Sevilla?', 2),
(108, '¿A qué ciudad actual corresponde la romana Gades?', 2),
(109, '¿Qué faraón murió en el año 1325 a.C.?', 2),
(110, '¿A favor de qué pretendiente a la corona se puso la nobleza española durante la guerra de Sucesión?', 2),
(111, '¿A la muerte de qué emperador el archiduque Carlos heredó el trono de Austria', 2),
(112, '¿A principios de qué siglo tuvo lugar el reinado de Nabucodonosor II?', 2),
(113, '¿A qué bando se unió Asturias cuando se produjo el levantamiento con el que comienza la Guerra Civil?', 2),
(114, 'A qué ciudad actual corresponde la antigua Mainake (griega)?', 2),
(115, '¿A qué ciudad actual corresponde la romana Gades?', 2),
(116, '¿A qué cultura pertenece el yacimiento de Toscanos?', 2),
(117, '¿A qué dinastía pertenece la esfinge de Gizeh?', 2),
(118, '¿A qué dinastía perteneció Isabel I de Inglaterra?', 2),
(119, '¿Qué le gusta a Miko?', 9),
(120, '¿Cuántos años cumple la Princesa cuando el Hada Buena prepara su fiesta de cumpleaños?', 9),
(121, '¿A qué enanito le obligan a lavarse las manos antes de comer?', 9),
(122, '¿Quién salva a Peter Pan de la bomba del Capitán Garfio?', 9),
(123, '¿Qué clase de animal es la mascota de Yasmín, Rajá?', 9),
(124, '¿Quién intenta rescatar a Buzz del juego de la grúa?', 9),
(125, '¿Por quién se cambia Bella como prisionera en el castillo de Bestia?', 9),
(126, '¿Qué lleva puesto Hércules para que Afrodita crea que puede ser un dios?', 9),
(127, '¿Dónde escribe Mulán algunas notas de su visita a la casamentera?', 9),
(128, '¿Qué tiene Hades en lugar de pelo?', 9),
(129, '¿Qué objeto perteneciente a Penny fue encontrado en la tienda de Madame Medusa?', 9),
(130, '¿Qué intenta robar Aby, y casi provoca que él y Aladdín queden atrapados en la cueva?', 9),
(131, '¿En qué criatura del mar se convierte Merlín cuando Madam Mim se transforma en una serpiente?', 9),
(132, '¿De qué cosa tiene miedo Khan?', 9),
(133, '¿Quién tiene un ama de llaves llamada Carlotta?', 9),
(134, '¿Qué sacan de la mina los enanitos de Blancanieves?', 10),
(135, '¿Qué busca Peter Pan en casa de los Darling?', 10),
(136, 'En Aladdín, ¿cuál es el nombre de la hija del Sultán?', 10),
(137, 'En Toy Story, ¿qué es Hamm?', 10),
(138, '¿Qué clase de gato es el de "Alicia en el país de las maravillas"?', 10),
(139, '¿Qué clase de perro es Dama?', 10),
(140, '¿A quién entrena Filoctetes para que se convierta en estrella?', 10),
(141, '¿Qué nombre recive el perro de Mulán?', 10),
(142, '¿Quién se transforma en elefante en "Aladdín"?', 10),
(143, '¿Cuál es la parte de Kaa que cambia de color cuando hipnotiza Mowgli?', 10),
(144, '¿En qué película se conocen Úrsula y el Rey Tritón?', 10),
(145, '¿A qué héroe intenta destruir Hades?', 10),
(146, '¿Con qué animales baila Baloo "Quiero ser como tú"?', 10),
(147, '¿En que se convierte Madam Mim rompiendo sus propias reglas del juego?', 10),
(148, '¿En qué estación del año está de caza Amos Slade?', 10),
(149, '¿Cuál es el nombre del pájaro amigo de Pocahontas?', 7),
(150, '¿Qué cambia constantemente de color a medida que el Principe y la Princesa bailan al final de la película?', 7),
(151, '¿A qué considera Cruela de Vil su "único y verdadero amor"?', 7),
(152, '¿Cuál es el único de los 7 enanitos que no tiene barba?', 7),
(153, '¿A quién castiga Peter Pan por ser malvada?', 7),
(154, 'Según Buzz Lightyear, ¿quiénes están intentando contactar con él?', 7),
(155, '¿Cómo se llama el padre de Bella?', 7),
(156, '¿A quién hace tropezar el Gato de los Deseos mientras esta haciendo trampas jugando al croquet?', 7),
(157, '¿De qué raza son los gatos que tía Sara lleva con ella?', 7),
(158, '¿Qué clase de animal es Tantor?', 7),
(159, '¿Cómo se aparece el dios Zeus en la tierra?', 7),
(160, '¿Qué animales celebran sus reuniones en la Roca del Consejo?', 7),
(161, '¿A quién pertenece la voz que roba Úrsula?', 7),
(162, '¿En casa de quién entra Grillo para escapar del halcón?', 7),
(163, '¿Cuál es el animal cuya forma tiene el trono del Sultán?', 7),
(164, 'En Pocahontas, ¿qué clase de animal es Miko?', 8),
(165, '¿Cómo se llama el Principe de la Bella Durmiente?', 8),
(166, '¿Cómo se llama el enanito que usa gafas?', 8),
(167, '¿Cómo se llama la luminosa amiga de Peter Pan?', 8),
(168, '¿Qué canción cantan Aladdín y Yasmín sobre la alfombra mágica?', 8),
(169, '¿Qué celebra Andy cuando le regalan a Buzz?', 8),
(170, 'Según Gastón, ¿qué debe hacer Bella para liberar a su padre?', 8),
(171, '¿Cuál es la última parte en desaparecer de todo el cuerpo de El Gato de los Deseos?', 8),
(172, '¿Cuántos cachorros tienen Dama y Vagabundo?', 8),
(173, '¿A quién lleva Timoteo a ver a Dumbo cuando necesita cariño?', 8),
(174, '¿Quél personaje llega al palacio del Sultán montado en un elefante?', 8),
(175, '¿Dónde se encuentra Grillo por primera vez con Merlín?', 8),
(176, '¿Qué es Shere Khan?', 8),
(177, '¿De qué color es la pluma de Dumbo?', 8),
(178, '¿A quién llama Bagheera "holgazán de la selva"?', 8),
(179, '¿De quién es el disco "Mind Games"?', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `privilegio`
--

CREATE TABLE IF NOT EXISTS `privilegio` (
  `ID_Privilegio` int(15) NOT NULL,
  `Tipo_Privilegio` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `privilegio`
--

INSERT INTO `privilegio` (`ID_Privilegio`, `Tipo_Privilegio`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta`
--

CREATE TABLE IF NOT EXISTS `respuesta` (
  `ID_Respuesta` int(15) NOT NULL,
  `ID_Pregunta` int(15) NOT NULL,
  `Texto_Respuesta` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Correcta` int(15) NOT NULL COMMENT 'SI(1) / NO (0)'
) ENGINE=InnoDB AUTO_INCREMENT=717 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `respuesta`
--

INSERT INTO `respuesta` (`ID_Respuesta`, `ID_Pregunta`, `Texto_Respuesta`, `Correcta`) VALUES
(1, 1, 'Francisco de Goya', 1),
(2, 1, 'Pablo Picasso', 0),
(3, 1, 'José Domínguez Bécquer', 0),
(4, 1, 'Federico Madrazo', 0),
(5, 2, 'Prerrománico', 1),
(6, 2, 'Románico', 0),
(7, 2, 'Gótico', 0),
(8, 2, 'Islámico', 0),
(9, 3, 'Arquitectura', 1),
(10, 3, 'Pintura', 0),
(11, 3, 'Música', 0),
(12, 3, 'Escritura', 0),
(13, 4, 'Petrus Paulus Rubens', 1),
(14, 4, 'Andre Derain', 0),
(15, 4, 'Goya', 0),
(16, 4, 'Pieter Brueguel', 0),
(17, 5, 'Josep de Ribera', 1),
(18, 5, 'Petrus Paulus Rubens', 0),
(19, 5, 'Goya', 0),
(20, 5, 'Pieter Brueguel', 0),
(21, 6, 'James Ensor', 1),
(22, 6, 'Petrus Paulus Rubens', 0),
(23, 6, 'Goya', 0),
(24, 6, 'Pieter Brueguel', 0),
(25, 7, 'Giacomo Ceruti', 1),
(26, 7, 'Goya', 0),
(27, 7, 'Lucio Fontana', 0),
(28, 7, 'Tiziano', 0),
(29, 8, 'Centesimodecimoprimero', 1),
(30, 8, 'Centesimodecimosegundorimero', 0),
(31, 8, 'Centesimodecimotercero', 0),
(32, 8, 'Centesimodecimocuarto', 0),
(33, 9, 'Petrarca', 1),
(34, 9, 'Giovanni Boccaccio', 0),
(35, 9, 'Alfonso IV', 0),
(36, 9, 'Aguilar', 0),
(37, 10, '23', 1),
(38, 10, '58', 0),
(39, 10, '63', 0),
(40, 10, '74', 0),
(41, 11, '96', 1),
(42, 11, '45', 0),
(43, 11, '50', 0),
(44, 11, '47', 0),
(45, 12, 'Baja Edad Media', 1),
(46, 12, 'Griega', 0),
(47, 12, 'Romana', 0),
(48, 12, 'Egipcia', 0),
(49, 13, 'Del 98', 1),
(50, 13, 'Del 27', 0),
(51, 13, 'Del 52', 0),
(52, 13, 'Del 36', 0),
(53, 14, 'Barroco', 1),
(54, 14, 'Romanticismo', 0),
(55, 14, 'Impresionismo', 0),
(56, 14, 'Ilustrismo', 0),
(57, 15, 'Barroco', 1),
(58, 15, 'Romanticismo', 0),
(59, 15, 'Impresionismo', 0),
(60, 15, 'Ilustrismo', 0),
(61, 16, 'Galaxia', 1),
(62, 16, 'Sistema solar', 0),
(63, 16, 'Cinturón de asteroides', 0),
(64, 16, 'Nebulosa', 0),
(65, 17, '0', 1),
(66, 17, 'x', 0),
(67, 17, '10', 0),
(68, 17, '-1', 0),
(69, 18, 'Aristóteles', 1),
(70, 18, 'Platón', 0),
(71, 18, 'Kant', 0),
(72, 18, 'Sócrates', 0),
(73, 19, 'Benjamin Franklin', 1),
(74, 19, 'Isaac Newton', 0),
(75, 19, 'Albert Einstein', 0),
(76, 19, 'Nikola Tesla', 0),
(77, 20, '21', 1),
(78, 20, '13', 0),
(79, 20, '14', 0),
(80, 20, '16', 0),
(81, 21, 'Marzo', 1),
(82, 21, 'Abril', 0),
(83, 21, 'Mayo', 0),
(84, 21, 'Diciembre', 0),
(85, 22, 'Marte', 1),
(86, 22, 'La Tierra', 0),
(87, 22, 'Júpiter', 0),
(88, 22, 'Mercurio', 0),
(89, 23, 'Ninguno', 1),
(90, 23, 'Viento', 0),
(91, 23, 'Lluvia', 0),
(92, 23, 'Colisión de meteoritos', 0),
(93, 24, 'Elevador', 1),
(94, 24, 'Microondas', 0),
(95, 24, 'Rampa', 0),
(96, 24, 'Resistencia', 0),
(97, 25, 'Total Poblacional', 1),
(98, 25, 'El conjunto activo', 0),
(99, 25, 'La moda', 0),
(100, 25, 'Ninguna de las otras', 0),
(101, 26, 'Esmaltado', 1),
(102, 26, 'Alumbrado', 0),
(103, 26, 'Abrillantado', 0),
(104, 26, 'Coso', 0),
(105, 27, '3,26', 1),
(106, 27, '5', 0),
(107, 27, '8,2', 0),
(108, 27, '91', 0),
(109, 28, '40000000', 1),
(110, 28, '2000', 0),
(111, 28, '50005', 0),
(112, 28, '8888878', 0),
(113, 29, '273', 1),
(114, 29, '372', 0),
(115, 29, '384', 0),
(116, 29, '33', 0),
(117, 30, '1,5', 1),
(118, 30, '5', 0),
(119, 30, '25', 0),
(120, 30, '3,3', 0),
(121, 31, 'Carl Sagan', 1),
(122, 31, 'Stephen Hawking', 0),
(123, 31, 'Neil Amstrong', 0),
(124, 31, 'Buzz Aldrin', 0),
(125, 32, 'Andoni Zubizarreta', 1),
(126, 32, 'Juan Carlos Ablanedo', 0),
(127, 32, 'Paco Buyo', 0),
(128, 32, 'Abel Resino', 0),
(129, 33, 'Rafael Alkorta', 1),
(130, 33, 'Sergio Ramos', 0),
(131, 33, 'Fernando Hierro', 0),
(132, 33, 'Mikel Goikoetxea', 0),
(133, 34, 'Miguel Indurain', 1),
(134, 34, 'Eddy Mercks', 0),
(135, 34, 'Alberto contador', 0),
(136, 34, 'Bernard Hinault', 0),
(137, 35, 'Milan', 1),
(138, 35, 'Paris', 0),
(139, 35, 'Portugal', 0),
(140, 35, 'Francia', 0),
(141, 36, 'Asociacion Tenistas Profesionales', 1),
(142, 36, 'Asociacion Tenistas Paralímpicos', 0),
(143, 36, 'Asociacion de tangas pequeños', 0),
(144, 36, 'Asociación de triatletas profesionales', 0),
(145, 37, 'Balonmano', 1),
(146, 37, 'Tenis', 0),
(147, 37, 'Futbol', 0),
(148, 37, 'Hockey', 0),
(149, 38, 'Sudáfrica', 1),
(150, 38, 'Reino Unido', 0),
(151, 38, 'Australia', 0),
(152, 38, 'Alemania', 0),
(153, 39, 'Club Atletico San Lorenzo de almagro', 1),
(154, 39, 'Club Atlético Boca Juniors', 0),
(155, 39, 'Club Atlético River Plate', 0),
(156, 39, 'Club Atlético Independiente', 0),
(157, 40, 'Club Atletico Velez Sarsfield', 1),
(158, 40, 'Club Atletico San Lorenzo de almagro', 0),
(159, 40, 'Club Atlético Boca Juniors', 0),
(160, 40, 'Club Atlético River Plate', 0),
(161, 41, 'Paris Saint Germain', 1),
(162, 41, 'Paris FC?', 0),
(163, 41, 'RCF Paris', 0),
(164, 41, 'Gallia Club Paris', 0),
(165, 42, 'Benfica', 1),
(166, 42, 'Fútbol Club Barcelona', 0),
(167, 42, 'Madrid', 0),
(168, 42, 'Paris Saint Germain', 0),
(169, 43, 'Brescia', 1),
(170, 43, 'Fútbol Club Barcelona', 0),
(171, 43, 'Madrid', 0),
(172, 43, 'Club Atletico San Lorenzo de almagro', 0),
(173, 44, 'Guante', 1),
(174, 44, 'Carrito', 0),
(175, 44, 'Escoba', 0),
(176, 44, 'Trapo', 0),
(177, 45, 'Regate', 1),
(178, 45, 'Caño', 0),
(179, 45, 'Bicicleta', 0),
(180, 45, 'Gol', 0),
(181, 46, 'Golf', 1),
(182, 46, 'Futbol americano', 0),
(183, 46, 'VolleyBall', 0),
(184, 46, 'Natación', 0),
(185, 47, 'Senderos de gloria', 1),
(186, 47, 'La gran ilusion', 0),
(187, 47, 'El sargento York', 0),
(188, 47, 'Capitán Conan', 0),
(189, 48, 'Harry Potter y la priedra filosofal', 1),
(190, 48, 'Harry Potter', 0),
(191, 48, 'Harry Potter y la cámara secreta', 0),
(192, 48, 'Harry Potter y el cáliz de fuego', 0),
(193, 49, 'Pretty Woman', 1),
(194, 49, 'Secret in their eyes', 0),
(195, 49, 'Nothing Hill', 0),
(196, 49, 'Come, reza, ama', 0),
(197, 50, 'El ardor', 1),
(198, 50, 'La broma', 0),
(199, 50, 'La ilusión', 0),
(200, 50, 'El reto', 0),
(201, 51, 'Echo and The Bunnymen', 1),
(202, 51, 'Riot Die', 0),
(203, 51, 'Guns and Roses', 0),
(204, 51, 'Black Violets', 0),
(205, 52, 'La dama se esconde', 1),
(206, 52, 'Uno más', 0),
(207, 52, 'El perro que ladra', 0),
(208, 52, 'Viento gris', 0),
(209, 53, 'Loquillo', 1),
(210, 53, 'Fito', 0),
(211, 53, 'Manuel Carrasco', 0),
(212, 53, 'Camarón', 0),
(213, 54, 'Kurt Cobain', 1),
(214, 54, 'Elvis', 0),
(215, 54, 'Lady Gaga', 0),
(216, 54, 'Madonna', 0),
(217, 55, 'Aranjuez', 1),
(218, 55, 'Sevilla', 0),
(219, 55, 'Toledo', 0),
(220, 55, 'Palma de Mallorca', 0),
(221, 56, 'Richard Wagner', 1),
(222, 56, 'Johann Sebastian Bach', 0),
(223, 56, 'Ludwig van Beethoven', 0),
(224, 56, 'Wolfgang Amadeus Mozart', 0),
(225, 57, 'Blues Boy', 1),
(226, 57, 'Blue Baby', 0),
(227, 57, 'Baby Baby', 0),
(228, 57, 'Blue Boy', 0),
(229, 58, '10', 1),
(230, 58, '15', 0),
(231, 58, '21', 0),
(232, 58, '5', 0),
(233, 59, '36', 1),
(234, 59, '23', 0),
(235, 59, '58', 0),
(236, 59, '75', 0),
(237, 60, '42', 1),
(238, 60, '35', 0),
(239, 60, '28', 0),
(240, 60, '55', 0),
(241, 61, 'Quinto', 1),
(242, 61, 'Cuarto', 0),
(243, 61, 'Segundo', 0),
(244, 61, 'Primero', 0),
(245, 62, 'The Who', 1),
(246, 62, 'Nirvana', 0),
(247, 62, 'Queen', 0),
(248, 62, 'Guns and Roses', 0),
(249, 63, 'Vacas', 1),
(250, 63, 'Perros', 0),
(251, 63, 'Gatos', 0),
(252, 63, 'Ratones', 0),
(253, 64, 'Mudito', 1),
(254, 64, 'Gruños', 0),
(255, 64, 'Dormilón', 0),
(256, 64, 'Sabiondo', 0),
(257, 65, 'Al Capitán Garfio', 1),
(258, 65, 'A Campanilla', 0),
(259, 65, 'A Wendy', 0),
(260, 65, 'A Nibs', 0),
(261, 66, 'Sr. Patata', 1),
(262, 66, 'Sheriff Woody', 0),
(263, 66, 'Buzz Lightyear', 0),
(264, 66, 'Rex', 0),
(265, 67, 'De que es un juguete', 1),
(266, 67, 'De que es un marciano', 0),
(267, 67, 'De que no puede volar', 0),
(268, 67, 'De que es verde', 0),
(269, 68, 'Lumiere', 1),
(270, 68, 'La bella', 0),
(271, 68, 'La bestia', 0),
(272, 68, 'Gastón', 0),
(273, 69, 'Un gatito', 1),
(274, 69, 'Un conejo', 0),
(275, 69, 'Una oruga', 0),
(276, 69, 'Una liebre', 0),
(277, 70, 'Gallinas', 1),
(278, 70, 'Gatos', 0),
(279, 70, 'Ratones', 0),
(280, 70, 'Perros', 0),
(281, 71, 'Para estudiar a los gorilas', 1),
(282, 71, 'Por turismo', 0),
(283, 71, 'Para secuestrar animales', 0),
(284, 71, 'Para conocer a Tarzán', 0),
(285, 72, 'Un sátiro', 1),
(286, 72, 'Un cíclope', 0),
(287, 72, 'Una musa', 0),
(288, 72, 'Un duende', 0),
(289, 73, 'De un cuervo', 1),
(290, 73, 'De un gorrión', 0),
(291, 73, 'De un águila', 0),
(292, 73, 'De una cacatúa', 0),
(293, 74, 'Aladdín', 1),
(294, 74, 'Yasmín', 0),
(295, 74, 'El sultán', 0),
(296, 74, 'El genio', 0),
(297, 75, 'Un búho', 1),
(298, 75, 'Un pez', 0),
(299, 75, 'Un gato', 0),
(300, 75, 'Un perro', 0),
(301, 76, 'Para Dumbo', 1),
(302, 76, 'Para la madre de Dumbo', 0),
(303, 76, 'Para el cuervo Jim', 0),
(304, 76, 'Para la elefanta Giddy', 0),
(305, 77, 'Un ratón', 1),
(306, 77, 'Un perro', 0),
(307, 77, 'Un gato', 0),
(308, 77, 'Un pez', 0),
(309, 78, 'Oceanía', 1),
(310, 78, 'Europa', 0),
(311, 78, 'Asia', 0),
(312, 78, 'América', 0),
(313, 79, '8', 1),
(314, 79, '1', 0),
(315, 79, '6', 0),
(316, 79, '5', 0),
(317, 80, 'Polo Sur', 1),
(318, 80, 'Polo Norte', 0),
(319, 80, 'Australia', 0),
(320, 80, 'A la cima del Monte Everest', 0),
(321, 81, '18', 1),
(322, 81, '23', 0),
(323, 81, '125', 0),
(324, 81, '85', 0),
(325, 82, '650', 1),
(326, 82, '258', 0),
(327, 82, '350', 0),
(328, 82, '880', 0),
(329, 83, 'Islas Canarias', 1),
(330, 83, 'Islas baleares', 0),
(331, 83, 'Isla de San Martín', 0),
(332, 83, 'Isla Antigua', 0),
(333, 84, 'Indonesia', 1),
(334, 84, 'Antillas', 0),
(335, 84, 'Islas Seychelles', 0),
(336, 84, 'Islas Baleares', 0),
(337, 85, 'Asturias', 1),
(338, 85, 'Galicia', 0),
(339, 85, 'Vigo', 0),
(340, 85, 'Cuenca', 0),
(341, 86, 'Antártida', 1),
(342, 86, 'Europa', 0),
(343, 86, 'América', 0),
(344, 86, 'Oceanía', 0),
(345, 87, 'Arizona', 1),
(346, 87, 'Texas', 0),
(347, 87, 'Nueva York', 0),
(348, 87, 'Conetica', 0),
(349, 88, 'Argentina y Chile', 1),
(350, 88, 'Panama y Chile', 0),
(351, 88, 'Chile y México', 0),
(352, 88, 'Argentina y Urugay', 0),
(353, 89, 'Maine', 1),
(354, 89, 'Texas', 0),
(355, 89, 'Minesota', 0),
(356, 89, 'Cansas', 0),
(357, 90, 'Israel', 1),
(358, 90, 'España', 0),
(359, 90, 'Portugal', 0),
(360, 90, 'Egipto', 0),
(361, 91, 'A Flit', 1),
(362, 91, 'A Pocahontas', 0),
(363, 91, 'A John Smith', 0),
(364, 91, 'A la abuela Sauce', 0),
(365, 92, 'Besándola', 1),
(366, 92, 'Convirtiéndose en sapo', 0),
(367, 92, 'Matando al dragón', 0),
(368, 92, 'Regalándole un anillo', 0),
(369, 93, 'Porque es más hermosa que ella', 1),
(370, 93, 'Porque es más alta que ella', 0),
(371, 93, 'Porque es más fea que ella', 0),
(372, 93, 'Porque no le gustan las manzanas', 0),
(373, 94, 'Robin Hood', 1),
(374, 94, 'Sheriff Woody', 0),
(375, 94, 'Tarzán', 0),
(376, 94, 'Hércules', 0),
(377, 95, 'Una mitad blanco y la otra negro', 1),
(378, 95, 'Blanco', 0),
(379, 95, 'Negro', 0),
(380, 95, 'Azul', 0),
(381, 96, 'Toy Story', 1),
(382, 96, 'Toy Story 2', 0),
(383, 96, 'Toy Story 3', 0),
(384, 96, 'ET', 0),
(385, 97, 'Una lanza', 1),
(386, 97, 'Un martillo', 0),
(387, 97, 'Una pistola', 0),
(388, 97, 'Un hacha', 0),
(389, 98, 'Las Musas', 1),
(390, 98, 'Las Blueses', 0),
(391, 98, 'Las Cruisers', 0),
(392, 98, 'Las Lupis', 0),
(393, 99, 'Elefantes rosas', 1),
(394, 99, 'Perros verdes', 0),
(395, 99, 'Ratones gigantes', 0),
(396, 99, 'Gatos azules', 0),
(397, 100, 'Fa', 1),
(398, 100, 'La', 0),
(399, 100, 'Ka', 0),
(400, 100, 'Pa', 0),
(401, 101, 'El Genio', 1),
(402, 101, 'Aladdín', 0),
(403, 101, 'Yasmín', 0),
(404, 101, 'La Alfombra', 0),
(405, 102, 'Bagheera', 1),
(406, 102, 'Baloo', 0),
(407, 102, 'Mowgli', 0),
(408, 102, 'Kaa', 0),
(409, 103, 'De muérdago', 1),
(410, 103, 'De geranios', 0),
(411, 103, 'De margaritas', 0),
(412, 103, 'De rosas', 0),
(413, 104, 'Su fuerza', 1),
(414, 104, 'Su belleza', 0),
(415, 104, 'Superpoderes', 0),
(416, 104, 'Saltar muy alto', 0),
(417, 105, 'Baloo', 1),
(418, 105, 'Mowgli', 0),
(419, 105, 'Kaa', 0),
(420, 105, 'Bagheera', 0),
(421, 106, 'Babilonia', 1),
(422, 106, 'Asiria', 0),
(423, 106, 'Egipto', 0),
(424, 106, 'Mesopotamia', 0),
(425, 107, 'Cádiz', 1),
(426, 107, 'Málaga', 0),
(427, 107, 'Almería', 0),
(428, 107, 'Badajoz', 0),
(429, 108, 'Cádiz', 1),
(430, 108, 'Málaga', 0),
(431, 108, 'Sevilla', 0),
(432, 108, 'Segovia', 0),
(433, 109, 'Tutankamon', 1),
(434, 109, 'Cleopatra', 0),
(435, 109, 'Ramses II', 0),
(436, 109, 'Nefertiti', 0),
(437, 110, 'Archiduque Carlos', 1),
(438, 110, 'Alfonso X', 0),
(439, 110, 'Victor IV', 0),
(440, 110, 'Carlos II', 0),
(441, 111, 'Jose I', 1),
(442, 111, 'Calos II', 0),
(443, 111, 'Vistor IV', 0),
(444, 111, 'Carlos V', 0),
(445, 112, 'VI A.C', 1),
(446, 112, 'II A.C', 0),
(447, 112, 'II D.C', 0),
(448, 112, 'VI D.C', 0),
(449, 113, 'Republicano', 1),
(450, 113, 'Pistoleros', 0),
(451, 113, 'Fascista', 0),
(452, 113, 'Neutro', 0),
(453, 114, 'Málaga', 1),
(454, 114, 'Sevilla', 0),
(455, 114, 'Ceuta', 0),
(456, 114, 'Mallorca', 0),
(457, 115, 'Cádiz', 1),
(458, 115, 'Madrid', 0),
(459, 115, 'Bilbao', 0),
(460, 115, 'Melilla', 0),
(461, 116, 'Fenicia', 1),
(462, 116, 'Griega', 0),
(463, 116, 'Romana', 0),
(464, 116, 'Ibérica', 0),
(465, 117, 'IV', 1),
(466, 117, 'II', 0),
(467, 117, 'I', 0),
(468, 117, 'V', 0),
(469, 118, 'Tudor', 1),
(470, 118, 'Vulturi', 0),
(471, 118, 'Costas', 0),
(472, 118, 'Felas', 0),
(473, 119, 'Montones de comida', 1),
(474, 119, 'Montones de juguetes', 0),
(475, 119, 'Montones de deportes', 0),
(476, 119, 'Montones de árboles', 0),
(477, 120, '16', 1),
(478, 120, '17', 0),
(479, 120, '18', 0),
(480, 120, '20', 0),
(481, 121, 'A Gruñón', 1),
(482, 121, 'A Mudito', 0),
(483, 121, 'A Sabiondo', 0),
(484, 121, 'A dormilón', 0),
(485, 122, 'Campanilla', 1),
(486, 122, 'Wendy', 0),
(487, 122, 'Los Niños Perdidos', 0),
(488, 122, 'John Darling', 0),
(489, 123, 'Un tigre', 1),
(490, 123, 'Un león', 0),
(491, 123, 'Un elefante', 0),
(492, 123, 'Un mapache', 0),
(493, 124, 'Woody', 1),
(494, 124, 'Slinky', 0),
(495, 124, 'Betty', 0),
(496, 124, 'Rex', 0),
(497, 125, 'Por su padre', 1),
(498, 125, 'Por Gastón', 0),
(499, 125, 'Por Maurice', 0),
(500, 125, 'Por Babette', 0),
(501, 126, 'Un medallón', 1),
(502, 126, 'Un halo', 0),
(503, 126, 'Una corona', 0),
(504, 126, 'Un bastón', 0),
(505, 127, 'En su brazo', 1),
(506, 127, 'En un papel', 0),
(507, 127, 'En una piedra', 0),
(508, 127, 'En arcilla', 0),
(509, 128, 'Llamas', 1),
(510, 128, 'Agua', 0),
(511, 128, 'Nubel', 0),
(512, 128, 'Arcoiris', 0),
(513, 129, 'Un libro', 1),
(514, 129, 'Un osito de peluche', 0),
(515, 129, 'Una cinta de pelo', 0),
(516, 129, 'Un collar', 0),
(517, 130, 'Una gema', 1),
(518, 130, 'Una lámpara', 0),
(519, 130, 'Una alfombra', 0),
(520, 130, 'Un collar', 0),
(521, 131, 'En un cangrejo', 1),
(522, 131, 'En un pez', 0),
(523, 131, 'En un perro', 0),
(524, 131, 'En un gallo', 0),
(525, 132, 'Del fuego', 1),
(526, 132, 'De los bichos', 0),
(527, 132, 'De los humanos', 0),
(528, 132, 'De las serpientes', 0),
(529, 133, 'El Rey Tritón', 1),
(530, 133, 'Úrsula', 0),
(531, 133, 'El Príncipe Eric', 0),
(532, 133, 'Ariel', 0),
(533, 134, 'Diamantes', 1),
(534, 134, 'Carbón', 0),
(535, 134, 'Oro', 0),
(536, 134, 'Manzanas', 0),
(537, 135, 'Su sombra', 1),
(538, 135, 'A Wendy', 0),
(539, 135, 'Al Capitán Garfio', 0),
(540, 135, 'A Campanilla', 0),
(541, 136, 'Yasmín', 1),
(542, 136, 'Esmeralda', 0),
(543, 136, 'Wendy', 0),
(544, 136, 'Aurora', 0),
(545, 137, 'Una hucha con forma de cerdito', 1),
(546, 137, 'Un perro', 0),
(547, 137, 'Un tiranosaurio de plástico', 0),
(548, 137, 'El jefe de la armada de soldados de plástico', 0),
(549, 138, 'El Gato de los Deseos', 1),
(550, 138, 'Un gato persa', 0),
(551, 138, 'Un gato siamés', 0),
(552, 138, 'Un gato bengala', 0),
(553, 139, 'Un cocker spaniel', 1),
(554, 139, 'Un bull terrier', 0),
(555, 139, 'Un perro tejonero', 0),
(556, 139, 'Un chihuahua', 0),
(557, 140, 'A Hércules', 1),
(558, 140, 'A Zeus', 0),
(559, 140, 'A Apolo', 0),
(560, 140, 'A Hades', 0),
(561, 141, 'Hermanito', 1),
(562, 141, 'Perrito', 0),
(563, 141, 'Amiguito', 0),
(564, 141, 'Enanito', 0),
(565, 142, 'Abu', 1),
(566, 142, 'Yafar', 0),
(567, 142, 'Aladdín', 0),
(568, 142, 'El genio', 0),
(569, 143, 'Sus ojos', 1),
(570, 143, 'Su pelo', 0),
(571, 143, 'Su piel', 0),
(572, 143, 'Su nariz', 0),
(573, 144, 'En la Sirenita', 1),
(574, 144, 'En Tarzán', 0),
(575, 144, 'En Aladdín', 0),
(576, 144, 'En Toy Story', 0),
(577, 145, 'A Hércules', 1),
(578, 145, 'A Zeus', 0),
(579, 145, 'A Apolo', 0),
(580, 145, 'A Hermes', 0),
(581, 146, 'Con los monos', 1),
(582, 146, 'Con Kaa', 0),
(583, 146, 'Con Mowgli', 0),
(584, 146, 'Con Bagheera', 0),
(585, 147, 'En un dragón', 1),
(586, 147, 'En un pez', 0),
(587, 147, 'En un perro', 0),
(588, 147, 'En un gato', 0),
(589, 148, 'En invierno', 1),
(590, 148, 'En otoño', 0),
(591, 148, 'En primavera', 0),
(592, 148, 'En verano', 0),
(593, 149, 'Flit', 1),
(594, 149, 'Flirt', 0),
(595, 149, 'Fast', 0),
(596, 149, 'Flot', 0),
(597, 150, 'El vestido de la Bella Durmiente', 1),
(598, 150, 'La corona de la Bella Durmiente', 0),
(599, 150, 'Los zapatos de la Bella Durmiente', 0),
(600, 150, 'La piel de la Bella Durmiente', 0),
(601, 151, 'A los abrigos de piel', 1),
(602, 151, 'A los cachorros', 0),
(603, 151, 'A Pongo', 0),
(604, 151, 'A Nanny', 0),
(605, 152, 'Mudito', 1),
(606, 152, 'Gruñón', 0),
(607, 152, 'Dormilón', 0),
(608, 152, 'Sabiondo', 0),
(609, 153, 'A Campanilla', 1),
(610, 153, 'A Wendy', 0),
(611, 153, 'A los piratas', 0),
(612, 153, 'A los Niños Perdidos', 0),
(613, 154, 'El Comando Espacial', 1),
(614, 154, 'Los Cadetes Espaciales', 0),
(615, 154, 'Los Millennium Bugs', 0),
(616, 154, 'Los Antiguos Astronautas', 0),
(617, 155, 'Maurice', 1),
(618, 155, 'Horacio', 0),
(619, 155, 'Boris', 0),
(620, 155, 'Gastón', 0),
(621, 156, 'A la Reina', 1),
(622, 156, 'A Alicia', 0),
(623, 156, 'A Diana', 0),
(624, 156, 'A la oruga', 0),
(625, 157, 'Siameses', 1),
(626, 157, 'Persas', 0),
(627, 157, 'Bengala', 0),
(628, 157, 'Esfinge', 0),
(629, 158, 'Un elefante', 1),
(630, 158, 'Un perro', 0),
(631, 158, 'Un ratón', 0),
(632, 158, 'Un gato', 0),
(633, 159, 'Como una estatua', 1),
(634, 159, 'Como un animal', 0),
(635, 159, 'Con un humano', 0),
(636, 159, 'Ninguna de las otras', 0),
(637, 160, 'Lobos', 1),
(638, 160, 'Tigres', 0),
(639, 160, 'Monos', 0),
(640, 160, 'Perros', 0),
(641, 161, 'A Ariel', 1),
(642, 161, 'A Sebastián', 0),
(643, 161, 'Al príncipe Eric', 0),
(644, 161, 'Al rey Trintón', 0),
(645, 162, 'De Madam Mim', 1),
(646, 162, 'De Merlín', 0),
(647, 162, 'De Sir Ector', 0),
(648, 162, 'Del Rey Arturo', 0),
(649, 163, 'De elefante', 1),
(650, 163, 'De pájaro', 0),
(651, 163, 'De ratón', 0),
(652, 163, 'De león', 0),
(653, 164, 'Un mapache', 1),
(654, 164, 'Un oso', 0),
(655, 164, 'Un conejo', 0),
(656, 164, 'Un perro', 0),
(657, 165, 'Felipe', 1),
(658, 165, 'Carlos', 0),
(659, 165, 'Andrés', 0),
(660, 165, 'Juan', 0),
(661, 166, 'Sabio', 1),
(662, 166, 'Mudito', 0),
(663, 166, 'Gruñón', 0),
(664, 166, 'Dormilón', 0),
(665, 167, 'Campanilla', 1),
(666, 167, 'Wendy', 0),
(667, 167, 'John', 0),
(668, 167, 'Michael', 0),
(669, 168, 'Un mundo ideal', 1),
(670, 168, 'Una alfombra idea', 0),
(671, 168, 'Un genio genial', 0),
(672, 168, 'El bazar', 0),
(673, 169, 'Su cumpleaños', 1),
(674, 169, 'La Navidad', 0),
(675, 169, 'Los reyes magos', 0),
(676, 169, 'Su santo', 0),
(677, 170, 'Casarse con él', 1),
(678, 170, 'Matar a la Bestia', 0),
(679, 170, 'Darle su herencia', 0),
(680, 170, 'Ninguna de las otras', 0),
(681, 171, 'La sonrisa', 1),
(682, 171, 'Los ojos', 0),
(683, 171, 'Las patas', 0),
(684, 171, 'La cabeza', 0),
(685, 172, 'Cuatro', 1),
(686, 172, 'Dos', 0),
(687, 172, 'Seis', 0),
(688, 172, 'Tres', 0),
(689, 173, 'A su madre', 1),
(690, 173, 'A su padre', 0),
(691, 173, 'A los payasos', 0),
(692, 173, 'Ninguna de las otras', 0),
(693, 174, 'Aladdín', 1),
(694, 174, 'El genio', 0),
(695, 174, 'Abu', 0),
(696, 174, 'Yasmín', 0),
(697, 175, 'En el bosque', 1),
(698, 175, 'En la playa', 0),
(699, 175, 'En una cueva', 0),
(700, 175, 'En una casa', 0),
(701, 176, 'Un tigre', 1),
(702, 176, 'Un león', 0),
(703, 176, 'Un oso', 0),
(704, 176, 'Una serpiente', 0),
(705, 177, 'Negra', 1),
(706, 177, 'Blanca', 0),
(707, 177, 'Azul', 0),
(708, 177, 'Roja', 0),
(709, 178, 'A Baloo', 1),
(710, 178, 'A Mowgli', 0),
(711, 178, 'A Kaa', 0),
(712, 178, 'A Shere Khan', 0),
(713, 179, 'John Lennon', 1),
(714, 179, 'Elvis Presley', 0),
(715, 179, 'Madonna', 0),
(716, 179, 'The Queen', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`ID_Categoria`),
  ADD KEY `ID_Mundo` (`ID_Mundo`);

--
-- Indices de la tabla `estadistica`
--
ALTER TABLE `estadistica`
  ADD PRIMARY KEY (`ID_Jugador`,`ID_Categoria`);

--
-- Indices de la tabla `intervencion`
--
ALTER TABLE `intervencion`
  ADD KEY `ID_Participacion` (`ID_Participacion`),
  ADD KEY `ID_Pregunta` (`ID_Pregunta`);

--
-- Indices de la tabla `jugador`
--
ALTER TABLE `jugador`
  ADD PRIMARY KEY (`ID_Jugador`),
  ADD KEY `ID_Privilegio` (`ID_Privilegio`),
  ADD KEY `ID_Nivel` (`ID_Nivel`);

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
  ADD PRIMARY KEY (`ID_Participacion`),
  ADD KEY `ID_Jugador` (`ID_Jugador`),
  ADD KEY `ID_Partida` (`ID_Partida`);

--
-- Indices de la tabla `partida`
--
ALTER TABLE `partida`
  ADD PRIMARY KEY (`ID_Partida`),
  ADD KEY `ID_Mundo` (`ID_Mundo`);

--
-- Indices de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD PRIMARY KEY (`ID_Pregunta`),
  ADD KEY `ID_Categoria` (`ID_Categoria`);

--
-- Indices de la tabla `privilegio`
--
ALTER TABLE `privilegio`
  ADD PRIMARY KEY (`ID_Privilegio`);

--
-- Indices de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD PRIMARY KEY (`ID_Respuesta`),
  ADD KEY `ID_Pregunta` (`ID_Pregunta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `ID_Categoria` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `jugador`
--
ALTER TABLE `jugador`
  MODIFY `ID_Jugador` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `mundo`
--
ALTER TABLE `mundo`
  MODIFY `ID_Mundo` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `nivel`
--
ALTER TABLE `nivel`
  MODIFY `ID_Nivel` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `participacion`
--
ALTER TABLE `participacion`
  MODIFY `ID_Participacion` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT de la tabla `partida`
--
ALTER TABLE `partida`
  MODIFY `ID_Partida` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  MODIFY `ID_Pregunta` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=180;
--
-- AUTO_INCREMENT de la tabla `privilegio`
--
ALTER TABLE `privilegio`
  MODIFY `ID_Privilegio` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  MODIFY `ID_Respuesta` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=717;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD CONSTRAINT `categoria_ibfk_1` FOREIGN KEY (`ID_Mundo`) REFERENCES `mundo` (`ID_Mundo`);

--
-- Filtros para la tabla `intervencion`
--
ALTER TABLE `intervencion`
  ADD CONSTRAINT `intervencion_ibfk_1` FOREIGN KEY (`ID_Participacion`) REFERENCES `participacion` (`ID_Participacion`),
  ADD CONSTRAINT `intervencion_ibfk_2` FOREIGN KEY (`ID_Pregunta`) REFERENCES `pregunta` (`ID_Pregunta`);

--
-- Filtros para la tabla `jugador`
--
ALTER TABLE `jugador`
  ADD CONSTRAINT `jugador_ibfk_1` FOREIGN KEY (`ID_Privilegio`) REFERENCES `privilegio` (`ID_Privilegio`),
  ADD CONSTRAINT `jugador_ibfk_2` FOREIGN KEY (`ID_Nivel`) REFERENCES `nivel` (`ID_Nivel`);

--
-- Filtros para la tabla `participacion`
--
ALTER TABLE `participacion`
  ADD CONSTRAINT `participacion_ibfk_1` FOREIGN KEY (`ID_Jugador`) REFERENCES `jugador` (`ID_Jugador`),
  ADD CONSTRAINT `participacion_ibfk_2` FOREIGN KEY (`ID_Partida`) REFERENCES `partida` (`ID_Partida`);

--
-- Filtros para la tabla `partida`
--
ALTER TABLE `partida`
  ADD CONSTRAINT `partida_ibfk_1` FOREIGN KEY (`ID_Mundo`) REFERENCES `mundo` (`ID_Mundo`);

--
-- Filtros para la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD CONSTRAINT `pregunta_ibfk_1` FOREIGN KEY (`ID_Categoria`) REFERENCES `categoria` (`ID_Categoria`);

--
-- Filtros para la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD CONSTRAINT `respuesta_ibfk_1` FOREIGN KEY (`ID_Pregunta`) REFERENCES `pregunta` (`ID_Pregunta`);