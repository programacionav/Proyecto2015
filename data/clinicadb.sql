-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-04-2015 a las 01:15:42
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `clinicadb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrativos`
--

CREATE TABLE IF NOT EXISTS `administrativos` (
  `idEmpleado` int(11) NOT NULL,
  `idSector` int(11) NOT NULL,
  PRIMARY KEY (`idEmpleado`),
  KEY `idSector` (`idSector`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ambulancias`
--

CREATE TABLE IF NOT EXISTS `ambulancias` (
  `Patente` varchar(6) NOT NULL,
  `Marca` varchar(50) NOT NULL,
  `Modelo` varchar(50) NOT NULL,
  `NroMotor` int(11) NOT NULL,
  `idEmpleado` int(11) NOT NULL,
  PRIMARY KEY (`Patente`),
  KEY `idEmpleado` (`idEmpleado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE IF NOT EXISTS `articulos` (
  `idArticulo` int(11) NOT NULL AUTO_INCREMENT,
  `Codigo` varchar(10) NOT NULL,
  `Titulo` varchar(250) NOT NULL,
  `Texto` text NOT NULL,
  `FechaAlta` date NOT NULL,
  `idEstado` int(11) NOT NULL,
  `idEmpleado` int(11) NOT NULL,
  PRIMARY KEY (`idArticulo`),
  KEY `idEstado` (`idEstado`),
  KEY `idEmpleado` (`idEmpleado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `capacitaciones`
--

CREATE TABLE IF NOT EXISTS `capacitaciones` (
  `idCapacitacion` int(11) NOT NULL,
  `Nombre` varchar(250) NOT NULL,
  `Descripcion` text NOT NULL,
  `Fecha` date NOT NULL,
  `DuracionHoras` int(11) NOT NULL,
  `idCapacitador` int(11) NOT NULL,
  PRIMARY KEY (`idCapacitacion`),
  KEY `idCapacitador` (`idCapacitador`),
  KEY `idCapacitador_2` (`idCapacitador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `capacitacionesdoctores`
--

CREATE TABLE IF NOT EXISTS `capacitacionesdoctores` (
  `idCD` int(11) NOT NULL,
  `idDoctor` int(11) NOT NULL,
  `idCapacitacion` int(11) NOT NULL,
  `Resultado` varchar(500) NOT NULL,
  PRIMARY KEY (`idCD`),
  UNIQUE KEY `idDoctor` (`idDoctor`,`idCapacitacion`),
  KEY `idDoctor_2` (`idDoctor`),
  KEY `idCapacitacion` (`idCapacitacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `capacitadores`
--

CREATE TABLE IF NOT EXISTS `capacitadores` (
  `idCapacitador` int(11) NOT NULL,
  `idEmpresaCapacitadora` int(11) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `idEspecialidad` int(11) NOT NULL,
  PRIMARY KEY (`idCapacitador`),
  KEY `idEmpresaCapacitadora` (`idEmpresaCapacitadora`),
  KEY `idEspecialidad` (`idEspecialidad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultas`
--

CREATE TABLE IF NOT EXISTS `consultas` (
  `idConsulta` int(11) NOT NULL AUTO_INCREMENT,
  `FechaHora` datetime NOT NULL,
  `idDoctor` int(11) NOT NULL,
  `idPaciente` int(11) NOT NULL,
  `Diagnostico` text NOT NULL,
  `Tratamiento` text NOT NULL,
  `idObraSocial` int(11) DEFAULT NULL,
  PRIMARY KEY (`idConsulta`),
  KEY `idDoctor` (`idDoctor`),
  KEY `idPaciente` (`idPaciente`),
  KEY `idObraSocial` (`idObraSocial`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `convenios`
--

CREATE TABLE IF NOT EXISTS `convenios` (
  `idConvenio` int(11) NOT NULL AUTO_INCREMENT,
  `idObraSocial` int(11) NOT NULL,
  `FechaInicio` date NOT NULL,
  `FechaFin` date NOT NULL,
  `ValorConsulta` decimal(10,2) NOT NULL,
  `ValorPractica` decimal(10,2) NOT NULL,
  PRIMARY KEY (`idConvenio`),
  KEY `idObraSocial` (`idObraSocial`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctores`
--

CREATE TABLE IF NOT EXISTS `doctores` (
  `idDoctor` int(11) NOT NULL,
  `idEspecialidad` int(11) NOT NULL,
  `Matricula` varchar(20) NOT NULL,
  PRIMARY KEY (`idDoctor`),
  KEY `idEspecialidad` (`idEspecialidad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE IF NOT EXISTS `empleados` (
  `idEmpleado` int(11) NOT NULL AUTO_INCREMENT,
  `Apellido` varchar(50) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `DNI` int(11) NOT NULL,
  `NroEmpleado` int(11) NOT NULL,
  `FechaIngreso` date NOT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Activo` tinyint(1) NOT NULL DEFAULT '1',
  `FechaBaja` date DEFAULT NULL,
  PRIMARY KEY (`idEmpleado`),
  UNIQUE KEY `DNI` (`DNI`),
  UNIQUE KEY `NroEmpleado` (`NroEmpleado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresascapacitadoras`
--

CREATE TABLE IF NOT EXISTS `empresascapacitadoras` (
  `idEmpresa` int(11) NOT NULL AUTO_INCREMENT,
  `Cuit` varchar(15) NOT NULL,
  `RazonSocial` varchar(100) NOT NULL,
  `Direccion` varchar(250) DEFAULT NULL,
  `Telefono` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idEmpresa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enfermeros`
--

CREATE TABLE IF NOT EXISTS `enfermeros` (
  `idEnfermero` int(11) NOT NULL,
  `idEspecialidad` int(11) NOT NULL,
  PRIMARY KEY (`idEnfermero`),
  KEY `idArea` (`idEspecialidad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidades`
--

CREATE TABLE IF NOT EXISTS `especialidades` (
  `idEspecialidad` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`idEspecialidad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadosarticulos`
--

CREATE TABLE IF NOT EXISTS `estadosarticulos` (
  `idestado` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`idestado`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `estadosarticulos`
--

INSERT INTO `estadosarticulos` (`idestado`, `Descripcion`) VALUES
(1, 'Vigente'),
(2, 'Historico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadoslicencias`
--

CREATE TABLE IF NOT EXISTS `estadoslicencias` (
  `idEstado` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`idEstado`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `estadoslicencias`
--

INSERT INTO `estadoslicencias` (`idEstado`, `Descripcion`) VALUES
(1, 'Aprobada'),
(2, 'Rechazada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horariosatencion`
--

CREATE TABLE IF NOT EXISTS `horariosatencion` (
  `idHorario` int(11) NOT NULL AUTO_INCREMENT,
  `idDoctor` int(11) NOT NULL,
  `DiaSemana` varchar(15) NOT NULL,
  `HoraInicio` time NOT NULL,
  `HoraFin` time NOT NULL,
  PRIMARY KEY (`idHorario`),
  KEY `idDoctor` (`idDoctor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insumos`
--

CREATE TABLE IF NOT EXISTS `insumos` (
  `idInsumo` int(11) NOT NULL AUTO_INCREMENT,
  `NroSerie` int(11) NOT NULL,
  `idProveedor` int(11) NOT NULL,
  `FechaVencimiento` date NOT NULL,
  `Descripcion` varchar(250) NOT NULL,
  `Precio` decimal(10,2) NOT NULL,
  `Stock` int(11) NOT NULL,
  PRIMARY KEY (`idInsumo`),
  UNIQUE KEY `NroSerie` (`NroSerie`),
  KEY `idProveedor` (`idProveedor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `internaciones`
--

CREATE TABLE IF NOT EXISTS `internaciones` (
  `idInternacion` int(11) NOT NULL AUTO_INCREMENT,
  `idPaciente` int(11) NOT NULL,
  `idDoctor` int(11) NOT NULL,
  `NroHabitacion` varchar(10) NOT NULL,
  `FechaHoraIngreso` datetime NOT NULL,
  `FechaHoraEgreso` datetime DEFAULT NULL,
  `Diagnostico` text NOT NULL,
  `Observaciones` text,
  PRIMARY KEY (`idInternacion`),
  KEY `idPaciente` (`idPaciente`),
  KEY `idDoctor` (`idDoctor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `itemspartesalida`
--

CREATE TABLE IF NOT EXISTS `itemspartesalida` (
  `idItem` int(11) NOT NULL AUTO_INCREMENT,
  `idParte` int(11) NOT NULL,
  `idInsumo` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  PRIMARY KEY (`idItem`),
  KEY `idParte` (`idParte`),
  KEY `idInsumo` (`idInsumo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `itemspedidocompra`
--

CREATE TABLE IF NOT EXISTS `itemspedidocompra` (
  `idItem` int(11) NOT NULL AUTO_INCREMENT,
  `idPedido` int(11) NOT NULL,
  `idInsumo` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  PRIMARY KEY (`idItem`),
  KEY `idPedido` (`idPedido`),
  KEY `idInsumo` (`idInsumo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `licencias`
--

CREATE TABLE IF NOT EXISTS `licencias` (
  `idLicencia` int(11) NOT NULL AUTO_INCREMENT,
  `idTipoLicencia` int(11) NOT NULL,
  `idEmpleado` int(11) NOT NULL,
  `FechaInicio` date NOT NULL,
  `FechaFin` date NOT NULL,
  `idEstado` int(11) NOT NULL,
  PRIMARY KEY (`idLicencia`),
  KEY `idTipoLicencia` (`idTipoLicencia`),
  KEY `idEmpleado` (`idEmpleado`),
  KEY `idEstado` (`idEstado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `liquidacionesobrasocial`
--

CREATE TABLE IF NOT EXISTS `liquidacionesobrasocial` (
  `idLiquidacion` int(11) NOT NULL AUTO_INCREMENT,
  `idObraSocial` int(11) NOT NULL,
  `Mes` int(11) NOT NULL,
  `Anio` int(11) NOT NULL,
  `FechaGeneracion` date NOT NULL,
  `TotalPagar` decimal(10,2) NOT NULL,
  `Pagada` tinyint(1) NOT NULL DEFAULT '0',
  `FechaPago` date DEFAULT NULL,
  PRIMARY KEY (`idLiquidacion`),
  KEY `idObraSocial` (`idObraSocial`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `liquidacionmensual`
--

CREATE TABLE IF NOT EXISTS `liquidacionmensual` (
  `idliquidacion` int(11) NOT NULL AUTO_INCREMENT,
  `Mes` int(11) NOT NULL,
  `Anio` int(11) NOT NULL,
  `Total` decimal(10,2) NOT NULL,
  `idEmpleado` int(11) NOT NULL,
  `Pagada` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idliquidacion`),
  KEY `idEmpleado` (`idEmpleado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localidades`
--

CREATE TABLE IF NOT EXISTS `localidades` (
  `idLocalidad` int(11) NOT NULL,
  `idProvincia` int(11) NOT NULL,
  `Descripcion` varchar(100) NOT NULL,
  PRIMARY KEY (`idLocalidad`),
  KEY `idProvincia` (`idProvincia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `localidades`
--

INSERT INTO `localidades` (`idLocalidad`, `idProvincia`, `Descripcion`) VALUES
(1, 1, 'Aguada San Roque'),
(2, 1, 'Aluminé'),
(3, 1, 'Andacollo'),
(4, 1, 'Añelo'),
(5, 1, 'Bajada del Agrio'),
(6, 1, 'Barrancas'),
(7, 1, 'Buta Ranquil'),
(8, 1, 'Neuquén Capital'),
(9, 1, 'Caviahué'),
(10, 1, 'Centenario'),
(11, 1, 'Chorriaca'),
(12, 1, 'Chos Malal'),
(14, 1, 'Covunco Abajo'),
(15, 1, 'Coyuco Cochico'),
(16, 1, 'Cutral Có'),
(17, 1, 'El Cholar'),
(18, 1, 'El Huecú'),
(19, 1, 'El Sauce'),
(20, 1, 'Guañacos'),
(21, 1, 'Huinganco'),
(22, 1, 'Las Coloradas'),
(23, 1, 'Las Lajas'),
(24, 1, 'Las Ovejas'),
(25, 1, 'Loncopué'),
(26, 1, 'Los Catutos'),
(27, 1, 'Los Chihuidos'),
(28, 1, 'Los Miches'),
(29, 1, 'Manzano Amargo'),
(30, 1, '16'),
(31, 1, 'Octavio Pico'),
(32, 1, 'Paso Aguerre'),
(33, 1, 'Picún Leufú'),
(34, 1, 'Piedra del Aguila'),
(35, 1, 'Pilo Lil'),
(36, 1, 'Plaza Huincul'),
(37, 1, 'Plottier'),
(38, 1, 'Quili Malal'),
(39, 1, 'Ramón Castro'),
(40, 1, 'R. de Los Sauces'),
(41, 1, 'S. M. de Los Andes'),
(42, 1, 'S. P. del Chañar'),
(43, 1, 'Santo Tomás'),
(44, 1, 'Sauzal Bonito'),
(45, 1, 'Senillosa'),
(46, 1, 'Taquimilán'),
(47, 1, 'Tricao Malal'),
(48, 1, 'Varvarco'),
(49, 1, 'Villa Curí Leuvu'),
(50, 1, 'Villa del Nahueve'),
(51, 1, 'Villa P. Picún Leuvú'),
(52, 1, 'Villa El Chocón'),
(53, 1, 'Villa La Angostura'),
(54, 1, 'Villa Pehuenia'),
(55, 1, 'Villa Traful'),
(56, 1, 'Vista Alegre'),
(57, 1, 'Zapala'),
(58, 2, 'Aguada Cecilio'),
(59, 2, 'Aguada de Guerra'),
(60, 2, 'Allén'),
(61, 2, 'Arroyo de La Ventana'),
(62, 2, 'Arroyo Los Berros'),
(63, 2, 'S.C de Bariloche'),
(64, 2, 'Calte. Cordero'),
(65, 2, 'Campo Grande'),
(66, 2, 'Catriel'),
(67, 2, 'Cerro Policía'),
(68, 2, 'Cervantes'),
(69, 2, 'Chelforo'),
(70, 2, 'Chimpay'),
(71, 2, 'Chinchinales'),
(72, 2, 'Chipauquil'),
(73, 2, 'Choele Choel'),
(74, 2, 'Cinco Saltos'),
(75, 2, 'Cipolletti'),
(76, 2, 'Clemente Onelli'),
(77, 2, 'Colán Conhue'),
(78, 2, 'Comallo'),
(79, 2, 'Comicó'),
(80, 2, 'Cona Niyeu'),
(81, 2, 'Coronel Belisle'),
(82, 2, 'Cubanea'),
(83, 2, 'Darwin'),
(84, 2, 'Dina Huapi'),
(85, 2, 'El Bolsón'),
(86, 2, 'El Caín'),
(87, 2, 'El Manso'),
(88, 2, 'Gral. Conesa'),
(89, 2, 'Gral. Enrique Godoy'),
(90, 2, 'Gral. Fernandez Oro'),
(91, 2, 'Gral. Roca'),
(92, 2, 'Guardia Mitre'),
(93, 2, 'Ing. Huergo'),
(94, 2, 'Ing. Jacobacci'),
(95, 2, 'Laguna Blanca'),
(96, 2, 'Lamarque'),
(97, 2, 'Las Grutas'),
(98, 2, 'Los Menucos'),
(99, 2, 'Luis Beltrán'),
(100, 2, 'Mainqué'),
(101, 2, 'Mamuel Choique'),
(102, 2, 'Maquinchao'),
(103, 2, 'Mencué'),
(104, 2, 'Mtro. Ramos Mexia'),
(105, 2, 'Nahuel Niyeu'),
(106, 2, 'Naupa Huen'),
(107, 2, 'Ñorquinco'),
(108, 2, 'Ojos de Agua'),
(109, 2, 'Paso de Agua'),
(110, 2, 'Paso Flores'),
(111, 2, 'Peñas Blancas'),
(112, 2, 'Pichi Mahuida'),
(113, 2, 'Pilcaniyeu'),
(114, 2, 'Pomona'),
(115, 2, 'Prahuaniyeu'),
(116, 2, 'Rincón Treneta'),
(117, 2, 'Río Chico'),
(118, 2, 'Río Colorado'),
(119, 2, 'Roca'),
(120, 2, 'San Antonio Oeste'),
(121, 2, 'San Javier'),
(122, 2, 'Sierra Colorada'),
(123, 2, 'Sierra Grande'),
(124, 2, 'Sierra Pailemán'),
(125, 2, 'Valcheta'),
(126, 2, 'Valle Azul'),
(127, 2, 'Viedma'),
(128, 2, 'Villa Llanquín'),
(129, 2, 'Villa Mascardi'),
(130, 2, 'Villa Regina'),
(131, 2, 'Yaminué'),
(134, 1, 'J. de los Andes'),
(136, 3, '25 de Mayo'),
(137, 3, '3 de febrero'),
(138, 3, 'A. Alsina'),
(139, 3, 'A. Gonzáles Cháves'),
(140, 3, 'Aguas Verdes'),
(141, 3, 'Alberti'),
(142, 3, 'Arrecifes'),
(143, 3, 'Ayacucho'),
(144, 3, 'Azul'),
(145, 3, 'Bahía Blanca'),
(146, 3, 'Balcarce'),
(147, 3, 'Baradero'),
(148, 3, 'Benito Juárez'),
(149, 3, 'Berisso'),
(150, 3, 'Bolívar'),
(151, 3, 'Bragado'),
(152, 3, 'Brandsen'),
(153, 3, 'Campana'),
(154, 3, 'Cañuelas'),
(155, 3, 'Capilla del Señor'),
(156, 3, 'Capitán Sarmiento'),
(157, 3, 'Carapachay'),
(158, 3, 'Carhue'),
(159, 3, 'Cariló'),
(160, 3, 'Carlos Casares'),
(161, 3, 'Carlos Tejedor'),
(162, 3, 'Carmen de Areco'),
(163, 3, 'Carmen de Patagones'),
(164, 3, 'Castelli'),
(165, 3, 'Chacabuco'),
(166, 3, 'Chascomús'),
(167, 3, 'Chivilcoy'),
(168, 3, 'Colón'),
(169, 3, 'Coronel Dorrego'),
(170, 3, 'Coronel Pringles'),
(171, 3, 'Coronel Rosales'),
(172, 3, 'Coronel Suarez'),
(173, 3, 'Costa Azul'),
(174, 3, 'Costa Chica'),
(175, 3, 'Costa del Este'),
(176, 3, 'Costa Esmeralda'),
(177, 3, 'Daireaux'),
(178, 3, 'Darregueira'),
(179, 3, 'Del Viso'),
(180, 3, 'Dolores'),
(181, 3, 'Don Torcuato'),
(182, 3, 'Ensenada'),
(183, 3, 'Escobar'),
(184, 3, 'Exaltación de la Cruz'),
(185, 3, 'Florentino Ameghino'),
(186, 3, 'Garín'),
(187, 3, 'Gral. Alvarado'),
(188, 3, 'Gral. Alvear'),
(189, 3, 'Gral. Arenales'),
(190, 3, 'Gral. Belgrano'),
(191, 3, 'Gral. Guido'),
(192, 3, 'Gral. Lamadrid'),
(193, 3, 'Gral. Las Heras'),
(194, 3, 'Gral. Lavalle'),
(195, 3, 'Gral. Madariaga'),
(196, 3, 'Gral. Pacheco'),
(197, 3, 'Gral. Paz'),
(198, 3, 'Gral. Pinto'),
(199, 3, 'Gral. Pueyrredón'),
(200, 3, 'Gral. Rodríguez'),
(201, 3, 'Gral. Viamonte'),
(202, 3, 'Gral. Villegas'),
(203, 3, 'Guaminí'),
(204, 3, 'Guernica'),
(205, 3, 'Hipólito Yrigoyen'),
(206, 3, 'Ing. Maschwitz'),
(207, 3, 'Junín'),
(208, 3, 'La Plata'),
(209, 3, 'Laprida'),
(210, 3, 'Las Flores'),
(211, 3, 'Las Toninas'),
(212, 3, 'Leandro N. Alem'),
(213, 3, 'Lincoln'),
(214, 3, 'Loberia'),
(215, 3, 'Lobos'),
(216, 3, 'Los Cardales'),
(217, 3, 'Los Toldos'),
(218, 3, 'Lucila del Mar'),
(219, 3, 'Luján'),
(220, 3, 'Magdalena'),
(221, 3, 'Maipú'),
(222, 3, 'Mar Chiquita'),
(223, 3, 'Mar de Ajó'),
(224, 3, 'Mar de las Pampas'),
(225, 3, 'Mar del Plata'),
(226, 3, 'Mar del Tuyú'),
(227, 3, 'Marcos Paz'),
(228, 3, 'Mercedes'),
(229, 3, 'Miramar'),
(230, 3, 'Monte'),
(231, 3, 'Monte Hermoso'),
(232, 3, 'Munro'),
(233, 3, 'Navarro'),
(234, 3, 'Necochea'),
(235, 3, 'Olavarría'),
(236, 3, 'Partido de la Costa'),
(237, 3, 'Pehuajó'),
(238, 3, 'Pellegrini'),
(239, 3, 'Pergamino'),
(240, 3, 'Pigüé'),
(241, 3, 'Pila'),
(242, 3, 'Pilar'),
(243, 3, 'Pinamar'),
(244, 3, 'Pinar del Sol'),
(245, 3, 'Polvorines'),
(246, 3, 'Pte. Perón'),
(247, 3, 'Puán'),
(248, 3, 'Punta Indio'),
(249, 3, 'Ramallo'),
(250, 3, 'Rauch'),
(251, 3, 'Rivadavia'),
(252, 3, 'Rojas'),
(253, 3, 'Roque Pérez'),
(254, 3, 'Saavedra'),
(255, 3, 'Saladillo'),
(256, 3, 'Salliqueló'),
(257, 3, 'Salto'),
(258, 3, 'San Andrés de Giles'),
(259, 3, 'San Antonio de Areco'),
(260, 3, 'San Antonio de Padua'),
(261, 3, 'San Bernardo'),
(262, 3, 'San Cayetano'),
(263, 3, 'San Clemente del Tuyú'),
(264, 3, 'San Nicolás'),
(265, 3, 'San Pedro'),
(266, 3, 'San Vicente'),
(267, 3, 'Santa Teresita'),
(268, 3, 'Suipacha'),
(269, 3, 'Tandil'),
(270, 3, 'Tapalqué'),
(271, 3, 'Tordillo'),
(272, 3, 'Tornquist'),
(273, 3, 'Trenque Lauquen'),
(274, 3, 'Tres Lomas'),
(275, 3, 'Villa Gesell'),
(276, 3, 'Villarino'),
(277, 3, 'Zárate'),
(278, 3, '11 de Septiembre'),
(279, 3, '20 de Junio'),
(280, 3, '25 de Mayo'),
(281, 3, 'Acassuso'),
(282, 3, 'Adrogué'),
(283, 3, 'Aldo Bonzi'),
(284, 3, 'Cinturón Ecológico'),
(285, 3, 'Avellaneda'),
(286, 3, 'Banfield'),
(287, 3, 'Barrio Parque'),
(288, 3, 'Barrio Santa Teresita'),
(289, 3, 'Beccar'),
(290, 3, 'Bella Vista'),
(291, 3, 'Berazategui'),
(292, 3, 'Bernal Este'),
(293, 3, 'Bernal Oeste'),
(294, 3, 'Billinghurst'),
(295, 3, 'Boulogne'),
(296, 3, 'Burzaco'),
(297, 3, 'Carapachay'),
(298, 3, 'Caseros'),
(299, 3, 'Castelar'),
(300, 3, 'Churruca'),
(301, 3, 'Ciudad Evita'),
(302, 3, 'Ciudad Madero'),
(303, 3, 'Ciudadela'),
(304, 3, 'Claypole'),
(305, 3, 'Crucecita'),
(306, 3, 'Dock Sud'),
(307, 3, 'Don Bosco'),
(308, 3, 'Don Orione'),
(309, 3, 'El Jagüel'),
(310, 3, 'El Libertador'),
(311, 3, 'El Palomar'),
(312, 3, 'El Tala'),
(313, 3, 'El Trébol'),
(314, 3, 'Ezeiza'),
(315, 3, 'Ezpeleta'),
(316, 3, 'Florencio Varela'),
(317, 3, 'Florida'),
(318, 3, 'Francisco Álvarez'),
(319, 3, 'Gerli'),
(320, 3, 'Glew'),
(321, 3, 'González Catán'),
(322, 3, 'Gral. Lamadrid'),
(323, 3, 'Grand Bourg'),
(324, 3, 'Gregorio de Laferrere'),
(325, 3, 'G. E. Hudson'),
(326, 3, 'Haedo'),
(327, 3, 'Hurlingham'),
(328, 3, 'Ing. Sourdeaux'),
(329, 3, 'Isidro Casanova'),
(330, 3, 'Ituzaingó'),
(331, 3, 'José C. Paz'),
(332, 3, 'José Ingenieros'),
(333, 3, 'José Marmol'),
(334, 3, 'La Lucila'),
(335, 3, 'La Reja'),
(336, 3, 'La Tablada'),
(337, 3, 'Lanús'),
(338, 3, 'Llavallol'),
(339, 3, 'Loma Hermosa'),
(340, 3, 'Lomas de Zamora'),
(341, 3, 'Lomas del Millón'),
(342, 3, 'Lomas del Mirador'),
(343, 3, 'Longchamps'),
(344, 3, 'Los Polvorines'),
(345, 3, 'Luis Guillón'),
(346, 3, 'Malvinas Argentinas'),
(347, 3, 'Martín Coronado'),
(348, 3, 'Martínez'),
(349, 3, 'Merlo'),
(350, 3, 'Ministro Rivadavia'),
(351, 3, 'Monte Chingolo'),
(352, 3, 'Monte Grande'),
(353, 3, 'Moreno'),
(354, 3, 'Morón'),
(355, 3, 'Muñiz'),
(356, 3, 'Olivos'),
(357, 3, 'Pablo Nogués'),
(358, 3, 'Pablo Podestá'),
(359, 3, 'Paso del Rey'),
(360, 3, 'Pereyra'),
(361, 3, 'Piñeiro'),
(362, 3, 'Plátanos'),
(363, 3, 'Pontevedra'),
(364, 3, 'Quilmes'),
(365, 3, 'Rafael Calzada'),
(366, 3, 'Rafael Castillo'),
(367, 3, 'Ramos Mejía'),
(368, 3, 'Ranelagh'),
(369, 3, 'Remedios de Escalada'),
(370, 3, 'Sáenz Peña'),
(371, 3, 'San Antonio de Padua'),
(372, 3, 'San Fernando'),
(373, 3, 'San Francisco Solano'),
(374, 3, 'San Isidro'),
(375, 3, 'San José'),
(376, 3, 'San Justo'),
(377, 3, 'San Martín'),
(378, 3, 'San Miguel'),
(379, 3, 'Santos Lugares'),
(380, 3, 'Sarandí'),
(381, 3, 'Sourigues'),
(382, 3, 'Tapiales'),
(383, 3, 'Temperley'),
(384, 3, 'Tigre'),
(385, 3, 'Tortuguitas'),
(386, 3, 'Tristán Suárez'),
(387, 3, 'Trujui'),
(388, 3, 'Turdera'),
(389, 3, 'Valentín Alsina'),
(390, 3, 'Vicente López'),
(391, 3, 'Villa Adelina'),
(392, 3, 'Villa Ballester'),
(393, 3, 'Villa Bosch'),
(394, 3, 'Villa Caraza'),
(395, 3, 'Villa Celina'),
(396, 3, 'Villa Centenario'),
(397, 3, 'Villa de Mayo'),
(398, 3, 'Villa Diamante'),
(399, 3, 'Villa Domínico'),
(400, 3, 'Villa España'),
(401, 3, 'Villa Fiorito'),
(402, 3, 'Villa Guillermina'),
(403, 3, 'Villa Insuperable'),
(404, 3, 'Villa José León Suárez'),
(405, 3, 'Villa La Florida'),
(406, 3, 'Villa Luzuriaga'),
(407, 3, 'Villa Martelli'),
(408, 3, 'Villa Obrera'),
(409, 3, 'Villa Progreso'),
(410, 3, 'Villa Raffo'),
(411, 3, 'Villa Sarmiento'),
(412, 3, 'Villa Tesei'),
(413, 3, 'Villa Udaondo'),
(414, 3, 'Virrey del Pino'),
(415, 3, 'Wilde'),
(416, 3, 'William Morris'),
(417, 3, 'Agronomía'),
(418, 3, 'Almagro'),
(419, 3, 'Balvanera'),
(420, 3, 'Barracas'),
(421, 3, 'Belgrano'),
(422, 3, 'Boca'),
(423, 3, 'Boedo'),
(424, 3, 'Caballito'),
(425, 3, 'Chacarita'),
(426, 3, 'Coghlan'),
(427, 3, 'Colegiales'),
(428, 3, 'Constitución'),
(429, 3, 'Flores'),
(430, 3, 'Floresta'),
(431, 3, 'La Paternal'),
(432, 3, 'Liniers'),
(433, 3, 'Mataderos'),
(434, 3, 'Monserrat'),
(435, 3, 'Monte Castro'),
(436, 3, 'Nueva Pompeya'),
(437, 3, 'Núñez'),
(438, 3, 'Palermo'),
(439, 3, 'Parque Avellaneda'),
(440, 3, 'Parque Chacabuco'),
(441, 3, 'Parque Chas'),
(442, 3, 'Parque Patricios'),
(443, 3, 'Puerto Madero'),
(444, 3, 'Recoleta'),
(445, 3, 'Retiro'),
(446, 3, 'Saavedra'),
(447, 3, 'San Cristóbal'),
(448, 3, 'San Nicolás'),
(449, 3, 'San Telmo'),
(450, 3, 'Vélez Sársfield'),
(451, 3, 'Versalles'),
(452, 3, 'Villa Crespo'),
(453, 3, 'Villa del Parque'),
(454, 3, 'Villa Devoto'),
(455, 3, 'Villa Gral. Mitre'),
(456, 3, 'Villa Lugano'),
(457, 3, 'Villa Luro'),
(458, 3, 'Villa Ortúzar'),
(459, 3, 'Villa Pueyrredón'),
(460, 3, 'Villa Real'),
(461, 3, 'Villa Riachuelo'),
(462, 3, 'Villa Santa Rita'),
(463, 3, 'Villa Soldati'),
(464, 3, 'Villa Urquiza'),
(465, 6, 'Aconquija'),
(466, 6, 'Ancasti'),
(467, 6, 'Andalgalá'),
(468, 6, 'Antofagasta'),
(469, 6, 'Belén'),
(470, 6, 'Capayán'),
(471, 6, 'Capital'),
(472, 6, '4'),
(473, 6, 'Corral Quemado'),
(474, 6, 'El Alto'),
(475, 6, 'El Rodeo'),
(476, 6, 'F.Mamerto Esquiú'),
(477, 6, 'Fiambalá'),
(478, 6, 'Hualfín'),
(479, 6, 'Huillapima'),
(480, 6, 'Icaño'),
(481, 6, 'La Puerta'),
(482, 6, 'Las Juntas'),
(483, 6, 'Londres'),
(484, 6, 'Los Altos'),
(485, 6, 'Los Varela'),
(486, 6, 'Mutquín'),
(487, 6, 'Paclín'),
(488, 6, 'Poman'),
(489, 6, 'Pozo de La Piedra'),
(490, 6, 'Puerta de Corral'),
(491, 6, 'Puerta San José'),
(492, 6, 'Recreo'),
(493, 6, 'S.F.V de 4'),
(494, 6, 'San Fernando'),
(495, 6, 'San Fernando del Valle'),
(496, 6, 'San José'),
(497, 6, 'Santa María'),
(498, 6, 'Santa Rosa'),
(499, 6, 'Saujil'),
(500, 6, 'Tapso'),
(501, 6, 'Tinogasta'),
(502, 6, 'Valle Viejo'),
(503, 6, 'Villa Vil'),
(504, 7, 'Aviá Teraí'),
(505, 7, 'Barranqueras'),
(506, 7, 'Basail'),
(507, 7, 'Campo Largo'),
(508, 7, 'Capital'),
(509, 7, 'Capitán Solari'),
(510, 7, 'Charadai'),
(511, 7, 'Charata'),
(512, 7, 'Chorotis'),
(513, 7, 'Ciervo Petiso'),
(514, 7, 'Cnel. Du Graty'),
(515, 7, 'Col. Benítez'),
(516, 7, 'Col. Elisa'),
(517, 7, 'Col. Popular'),
(518, 7, 'Colonias Unidas'),
(519, 7, 'Concepción'),
(520, 7, 'Corzuela'),
(521, 7, 'Cote Lai'),
(522, 7, 'El Sauzalito'),
(523, 7, 'Enrique Urien'),
(524, 7, 'Fontana'),
(525, 7, 'Fte. Esperanza'),
(526, 7, 'Gancedo'),
(527, 7, 'Gral. Capdevila'),
(528, 7, 'Gral. Pinero'),
(529, 7, 'Gral. San Martín'),
(530, 7, 'Gral. Vedia'),
(531, 7, 'Hermoso Campo'),
(532, 7, 'I. del Cerrito'),
(533, 7, 'J.J. Castelli'),
(534, 7, 'La Clotilde'),
(535, 7, 'La Eduvigis'),
(536, 7, 'La Escondida'),
(537, 7, 'La Leonesa'),
(538, 7, 'La Tigra'),
(539, 7, 'La Verde'),
(540, 7, 'Laguna Blanca'),
(541, 7, 'Laguna Limpia'),
(542, 7, 'Lapachito'),
(543, 7, 'Las Breñas'),
(544, 7, 'Las Garcitas'),
(545, 7, 'Las Palmas'),
(546, 7, 'Los Frentones'),
(547, 7, 'Machagai'),
(548, 7, 'Makallé'),
(549, 7, 'Margarita Belén'),
(550, 7, 'Miraflores'),
(551, 7, 'Misión N. Pompeya'),
(552, 7, 'Napenay'),
(553, 7, 'Pampa Almirón'),
(554, 7, 'Pampa del Indio'),
(555, 7, 'Pampa del Infierno'),
(556, 7, 'Pdcia. de La Plaza'),
(557, 7, 'Pdcia. Roca'),
(558, 7, 'Pdcia. Roque Sáenz Peña'),
(559, 7, 'Pto. Bermejo'),
(560, 7, 'Pto. Eva Perón'),
(561, 7, 'Puero Tirol'),
(562, 7, 'Puerto Vilelas'),
(563, 7, 'Quitilipi'),
(564, 7, 'Resistencia'),
(565, 7, 'Sáenz Peña'),
(566, 7, 'Samuhú'),
(567, 7, 'San Bernardo'),
(568, 7, 'Santa Sylvina'),
(569, 7, 'Taco Pozo'),
(570, 7, 'Tres Isletas'),
(571, 7, 'Villa Ángela'),
(572, 7, 'Villa Berthet'),
(573, 7, 'Villa R. Bermejito'),
(574, 8, 'Aldea Apeleg'),
(575, 8, 'Aldea Beleiro'),
(576, 8, 'Aldea Epulef'),
(577, 8, 'Alto Río Sengerr'),
(578, 8, 'Buen Pasto'),
(579, 8, 'Camarones'),
(580, 8, 'Carrenleufú'),
(581, 8, 'Cholila'),
(582, 8, 'Co. Centinela'),
(583, 8, 'Colan Conhué'),
(584, 8, 'Comodoro Rivadavia'),
(585, 8, 'Corcovado'),
(586, 8, 'Cushamen'),
(587, 8, 'Dique F. Ameghino'),
(588, 8, 'Dolavón'),
(589, 8, 'Dr. R. Rojas'),
(590, 8, 'El Hoyo'),
(591, 8, 'El Maitén'),
(592, 8, 'Epuyén'),
(593, 8, 'Esquel'),
(594, 8, 'Facundo'),
(595, 8, 'Gaimán'),
(596, 8, 'Gan Gan'),
(597, 8, 'Gastre'),
(598, 8, 'Gdor. Costa'),
(599, 8, 'Gualjaina'),
(600, 8, 'J. de San Martín'),
(601, 8, 'Lago Blanco'),
(602, 8, 'Lago Puelo'),
(603, 8, 'Lagunita Salada'),
(604, 8, 'Las Plumas'),
(605, 8, 'Los Altares'),
(606, 8, 'Paso de los Indios'),
(607, 8, 'Paso del Sapo'),
(608, 8, 'Pto. Madryn'),
(609, 8, 'Pto. Pirámides'),
(610, 8, 'Rada Tilly'),
(611, 8, 'Rawson'),
(612, 8, 'Río Mayo'),
(613, 8, 'Río Pico'),
(614, 8, 'Sarmiento'),
(615, 8, 'Tecka'),
(616, 8, 'Telsen'),
(617, 8, 'Trelew'),
(618, 8, 'Trevelin'),
(619, 8, 'Veintiocho de Julio'),
(620, 9, 'Achiras'),
(621, 9, 'Adelia Maria'),
(622, 9, 'Agua de Oro'),
(623, 9, 'Alcira Gigena'),
(624, 9, 'Aldea Santa Maria'),
(625, 9, 'Alejandro Roca'),
(626, 9, 'Alejo Ledesma'),
(627, 9, 'Alicia'),
(628, 9, 'Almafuerte'),
(629, 9, 'Alpa Corral'),
(630, 9, 'Alta Gracia'),
(631, 9, 'Alto Alegre'),
(632, 9, 'Alto de Los Quebrachos'),
(633, 9, 'Altos de Chipion'),
(634, 9, 'Amboy'),
(635, 9, 'Ambul'),
(636, 9, 'Ana Zumaran'),
(637, 9, 'Anisacate'),
(638, 9, 'Arguello'),
(639, 9, 'Arias'),
(640, 9, 'Arroyito'),
(641, 9, 'Arroyo Algodon'),
(642, 9, 'Arroyo Cabral'),
(643, 9, 'Arroyo Los Patos'),
(644, 9, 'Assunta'),
(645, 9, 'Atahona'),
(646, 9, 'Ausonia'),
(647, 9, 'Avellaneda'),
(648, 9, 'Ballesteros'),
(649, 9, 'Ballesteros Sud'),
(650, 9, 'Balnearia'),
(651, 9, 'Bañado de Soto'),
(652, 9, 'Bell Ville'),
(653, 9, 'Bengolea'),
(654, 9, 'Benjamin Gould'),
(655, 9, 'Berrotaran'),
(656, 9, 'Bialet Masse'),
(657, 9, 'Bouwer'),
(658, 9, 'Brinkmann'),
(659, 9, 'Buchardo'),
(660, 9, 'Bulnes'),
(661, 9, 'Cabalango'),
(662, 9, 'Calamuchita'),
(663, 9, 'Calchin'),
(664, 9, 'Calchin Oeste'),
(665, 9, 'Calmayo'),
(666, 9, 'Camilo Aldao'),
(667, 9, 'Caminiaga'),
(668, 9, 'Cañada de Luque'),
(669, 9, 'Cañada de Machado'),
(670, 9, 'Cañada de Rio Pinto'),
(671, 9, 'Cañada del Sauce'),
(672, 9, 'Canals'),
(673, 9, 'Candelaria Sud'),
(674, 9, 'Capilla de Remedios'),
(675, 9, 'Capilla de Siton'),
(676, 9, 'Capilla del Carmen'),
(677, 9, 'Capilla del Monte'),
(678, 9, 'Capital'),
(679, 9, 'Capitan Gral B. O´Higgins'),
(680, 9, 'Carnerillo'),
(681, 9, 'Carrilobo'),
(682, 9, 'Casa Grande'),
(683, 9, 'Cavanagh'),
(684, 9, 'Cerro Colorado'),
(685, 9, 'Chaján'),
(686, 9, 'Chalacea'),
(687, 9, 'Chañar Viejo'),
(688, 9, 'Chancaní'),
(689, 9, 'Charbonier'),
(690, 9, 'Charras'),
(691, 9, 'Chazón'),
(692, 9, 'Chilibroste'),
(693, 9, 'Chucul'),
(694, 9, 'Chuña'),
(695, 9, 'Chuña Huasi'),
(696, 9, 'Churqui Cañada'),
(697, 9, 'Cienaga Del Coro'),
(698, 9, 'Cintra'),
(699, 9, 'Col. Almada'),
(700, 9, 'Col. Anita'),
(701, 9, 'Col. Barge'),
(702, 9, 'Col. Bismark'),
(703, 9, 'Col. Bremen'),
(704, 9, 'Col. Caroya'),
(705, 9, 'Col. Italiana'),
(706, 9, 'Col. Iturraspe'),
(707, 9, 'Col. Las Cuatro Esquinas'),
(708, 9, 'Col. Las Pichanas'),
(709, 9, 'Col. Marina'),
(710, 9, 'Col. Prosperidad'),
(711, 9, 'Col. San Bartolome'),
(712, 9, 'Col. San Pedro'),
(713, 9, 'Col. Tirolesa'),
(714, 9, 'Col. Vicente Aguero'),
(715, 9, 'Col. Videla'),
(716, 9, 'Col. Vignaud'),
(717, 9, 'Col. Waltelina'),
(718, 9, 'Colazo'),
(719, 9, 'Comechingones'),
(720, 9, 'Conlara'),
(721, 9, 'Copacabana'),
(722, 9, '7'),
(723, 9, 'Coronel Baigorria'),
(724, 9, 'Coronel Moldes'),
(725, 9, 'Corral de Bustos'),
(726, 9, 'Corralito'),
(727, 9, 'Cosquín'),
(728, 9, 'Costa Sacate'),
(729, 9, 'Cruz Alta'),
(730, 9, 'Cruz de Caña'),
(731, 9, 'Cruz del Eje'),
(732, 9, 'Cuesta Blanca'),
(733, 9, 'Dean Funes'),
(734, 9, 'Del Campillo'),
(735, 9, 'Despeñaderos'),
(736, 9, 'Devoto'),
(737, 9, 'Diego de Rojas'),
(738, 9, 'Dique Chico'),
(739, 9, 'El Arañado'),
(740, 9, 'El Brete'),
(741, 9, 'El Chacho'),
(742, 9, 'El Crispín'),
(743, 9, 'El Fortín'),
(744, 9, 'El Manzano'),
(745, 9, 'El Rastreador'),
(746, 9, 'El Rodeo'),
(747, 9, 'El Tío'),
(748, 9, 'Elena'),
(749, 9, 'Embalse'),
(750, 9, 'Esquina'),
(751, 9, 'Estación Gral. Paz'),
(752, 9, 'Estación Juárez Celman'),
(753, 9, 'Estancia de Guadalupe'),
(754, 9, 'Estancia Vieja'),
(755, 9, 'Etruria'),
(756, 9, 'Eufrasio Loza'),
(757, 9, 'Falda del Carmen'),
(758, 9, 'Freyre'),
(759, 9, 'Gral. Baldissera'),
(760, 9, 'Gral. Cabrera'),
(761, 9, 'Gral. Deheza'),
(762, 9, 'Gral. Fotheringham'),
(763, 9, 'Gral. Levalle'),
(764, 9, 'Gral. Roca'),
(765, 9, 'Guanaco Muerto'),
(766, 9, 'Guasapampa'),
(767, 9, 'Guatimozin'),
(768, 9, 'Gutenberg'),
(769, 9, 'Hernando'),
(770, 9, 'Huanchillas'),
(771, 9, 'Huerta Grande'),
(772, 9, 'Huinca Renanco'),
(773, 9, 'Idiazabal'),
(774, 9, 'Impira'),
(775, 9, 'Inriville'),
(776, 9, 'Isla Verde'),
(777, 9, 'Italó'),
(778, 9, 'James Craik'),
(779, 9, 'Jesús María'),
(780, 9, 'Jovita'),
(781, 9, 'Justiniano Posse'),
(782, 9, 'Km 658'),
(783, 9, 'L. V. Mansilla'),
(784, 9, 'La Batea'),
(785, 9, 'La Calera'),
(786, 9, 'La Carlota'),
(787, 9, 'La Carolina'),
(788, 9, 'La Cautiva'),
(789, 9, 'La Cesira'),
(790, 9, 'La Cruz'),
(791, 9, 'La Cumbre'),
(792, 9, 'La Cumbrecita'),
(793, 9, 'La Falda'),
(794, 9, 'La Francia'),
(795, 9, 'La Granja'),
(796, 9, 'La Higuera'),
(797, 9, 'La Laguna'),
(798, 9, 'La Paisanita'),
(799, 9, 'La Palestina'),
(800, 9, '12'),
(801, 9, 'La Paquita'),
(802, 9, 'La Para'),
(803, 9, 'La Paz'),
(804, 9, 'La Playa'),
(805, 9, 'La Playosa'),
(806, 9, 'La Población'),
(807, 9, 'La Posta'),
(808, 9, 'La Puerta'),
(809, 9, 'La Quinta'),
(810, 9, 'La Rancherita'),
(811, 9, 'La Rinconada'),
(812, 9, 'La Serranita'),
(813, 9, 'La Tordilla'),
(814, 9, 'Laborde'),
(815, 9, 'Laboulaye'),
(816, 9, 'Laguna Larga'),
(817, 9, 'Las Acequias'),
(818, 9, 'Las Albahacas'),
(819, 9, 'Las Arrias'),
(820, 9, 'Las Bajadas'),
(821, 9, 'Las Caleras'),
(822, 9, 'Las Calles'),
(823, 9, 'Las Cañadas'),
(824, 9, 'Las Gramillas'),
(825, 9, 'Las Higueras'),
(826, 9, 'Las Isletillas'),
(827, 9, 'Las Junturas'),
(828, 9, 'Las Palmas'),
(829, 9, 'Las Peñas'),
(830, 9, 'Las Peñas Sud'),
(831, 9, 'Las Perdices'),
(832, 9, 'Las Playas'),
(833, 9, 'Las Rabonas'),
(834, 9, 'Las Saladas'),
(835, 9, 'Las Tapias'),
(836, 9, 'Las Varas'),
(837, 9, 'Las Varillas'),
(838, 9, 'Las Vertientes'),
(839, 9, 'Leguizamón'),
(840, 9, 'Leones'),
(841, 9, 'Los Cedros'),
(842, 9, 'Los Cerrillos'),
(843, 9, 'Los Chañaritos (C.E)'),
(844, 9, 'Los Chanaritos (R.S)'),
(845, 9, 'Los Cisnes'),
(846, 9, 'Los Cocos'),
(847, 9, 'Los Cóndores'),
(848, 9, 'Los Hornillos'),
(849, 9, 'Los Hoyos'),
(850, 9, 'Los Mistoles'),
(851, 9, 'Los Molinos'),
(852, 9, 'Los Pozos'),
(853, 9, 'Los Reartes'),
(854, 9, 'Los Surgentes'),
(855, 9, 'Los Talares'),
(856, 9, 'Los Zorros'),
(857, 9, 'Lozada'),
(858, 9, 'Luca'),
(859, 9, 'Luque'),
(860, 9, 'Luyaba'),
(861, 9, 'Malagueño'),
(862, 9, 'Malena'),
(863, 9, 'Malvinas Argentinas'),
(864, 9, 'Manfredi'),
(865, 9, 'Maquinista Gallini'),
(866, 9, 'Marcos Juárez'),
(867, 9, 'Marull'),
(868, 9, 'Matorrales'),
(869, 9, 'Mattaldi'),
(870, 9, 'Mayu Sumaj'),
(871, 9, 'Media Naranja'),
(872, 9, 'Melo'),
(873, 9, 'Mendiolaza'),
(874, 9, 'Mi Granja'),
(875, 9, 'Mina Clavero'),
(876, 9, 'Miramar'),
(877, 9, 'Morrison'),
(878, 9, 'Morteros'),
(879, 9, 'Mte. Buey'),
(880, 9, 'Mte. Cristo'),
(881, 9, 'Mte. De Los Gauchos'),
(882, 9, 'Mte. Leña'),
(883, 9, 'Mte. Maíz'),
(884, 9, 'Mte. Ralo'),
(885, 9, 'Nicolás Bruzone'),
(886, 9, 'Noetinger'),
(887, 9, 'Nono'),
(888, 9, 'Nueva 7'),
(889, 9, 'Obispo Trejo'),
(890, 9, 'Olaeta'),
(891, 9, 'Oliva'),
(892, 9, 'Olivares San Nicolás'),
(893, 9, 'Onagolty'),
(894, 9, 'Oncativo'),
(895, 9, 'Ordoñez'),
(896, 9, 'Pacheco De Melo'),
(897, 9, 'Pampayasta N.'),
(898, 9, 'Pampayasta S.'),
(899, 9, 'Panaholma'),
(900, 9, 'Pascanas'),
(901, 9, 'Pasco'),
(902, 9, 'Paso del Durazno'),
(903, 9, 'Paso Viejo'),
(904, 9, 'Pilar'),
(905, 9, 'Pincén'),
(906, 9, 'Piquillín'),
(907, 9, 'Plaza de Mercedes'),
(908, 9, 'Plaza Luxardo'),
(909, 9, 'Porteña'),
(910, 9, 'Potrero de Garay'),
(911, 9, 'Pozo del Molle'),
(912, 9, 'Pozo Nuevo'),
(913, 9, 'Pueblo Italiano'),
(914, 9, 'Puesto de Castro'),
(915, 9, 'Punta del Agua'),
(916, 9, 'Quebracho Herrado'),
(917, 9, 'Quilino'),
(918, 9, 'Rafael García'),
(919, 9, 'Ranqueles'),
(920, 9, 'Rayo Cortado'),
(921, 9, 'Reducción'),
(922, 9, 'Rincón'),
(923, 9, 'Río Bamba'),
(924, 9, 'Río Ceballos'),
(925, 9, 'Río Cuarto'),
(926, 9, 'Río de Los Sauces'),
(927, 9, 'Río Primero'),
(928, 9, 'Río Segundo'),
(929, 9, 'Río Tercero'),
(930, 9, 'Rosales'),
(931, 9, 'Rosario del Saladillo'),
(932, 9, 'Sacanta'),
(933, 9, 'Sagrada Familia'),
(934, 9, 'Saira'),
(935, 9, 'Saladillo'),
(936, 9, 'Saldán'),
(937, 9, 'Salsacate'),
(938, 9, 'Salsipuedes'),
(939, 9, 'Sampacho'),
(940, 9, 'San Agustín'),
(941, 9, 'San Antonio de Arredondo'),
(942, 9, 'San Antonio de Litín'),
(943, 9, 'San Basilio'),
(944, 9, 'San Carlos Minas'),
(945, 9, 'San Clemente'),
(946, 9, 'San Esteban'),
(947, 9, 'San Francisco'),
(948, 9, 'San Ignacio'),
(949, 9, 'San Javier'),
(950, 9, 'San Jerónimo'),
(951, 9, 'San Joaquín'),
(952, 9, 'San José de La Dormida'),
(953, 9, 'San José de Las Salinas'),
(954, 9, 'San Lorenzo'),
(955, 9, 'San Marcos Sierras'),
(956, 9, 'San Marcos Sud'),
(957, 9, 'San Pedro'),
(958, 9, 'San Pedro N.'),
(959, 9, 'San Roque'),
(960, 9, 'San Vicente'),
(961, 9, 'Santa Catalina'),
(962, 9, 'Santa Elena'),
(963, 9, 'Santa Eufemia'),
(964, 9, 'Santa Maria'),
(965, 9, 'Sarmiento'),
(966, 9, 'Saturnino M.Laspiur'),
(967, 9, 'Sauce Arriba'),
(968, 9, 'Sebastián Elcano'),
(969, 9, 'Seeber'),
(970, 9, 'Segunda Usina'),
(971, 9, 'Serrano'),
(972, 9, 'Serrezuela'),
(973, 9, 'Sgo. Temple'),
(974, 9, 'Silvio Pellico'),
(975, 9, 'Simbolar'),
(976, 9, 'Sinsacate'),
(977, 9, 'Sta. Rosa de Calamuchita'),
(978, 9, 'Sta. Rosa de Río Primero'),
(979, 9, 'Suco'),
(980, 9, 'Tala Cañada'),
(981, 9, 'Tala Huasi'),
(982, 9, 'Talaini'),
(983, 9, 'Tancacha'),
(984, 9, 'Tanti'),
(985, 9, 'Ticino'),
(986, 9, 'Tinoco'),
(987, 9, 'Tío Pujio'),
(988, 9, 'Toledo'),
(989, 9, 'Toro Pujio'),
(990, 9, 'Tosno'),
(991, 9, 'Tosquita'),
(992, 9, 'Tránsito'),
(993, 9, 'Tuclame'),
(994, 9, 'Tutti'),
(995, 9, 'Ucacha'),
(996, 9, 'Unquillo'),
(997, 9, 'Valle de Anisacate'),
(998, 9, 'Valle Hermoso'),
(999, 9, 'Vélez Sarfield'),
(1000, 9, 'Viamonte'),
(1001, 9, 'Vicuña Mackenna'),
(1002, 9, 'Villa Allende'),
(1003, 9, 'Villa Amancay'),
(1004, 9, 'Villa Ascasubi'),
(1005, 9, 'Villa Candelaria N.'),
(1006, 9, 'Villa Carlos Paz'),
(1007, 9, 'Villa Cerro Azul'),
(1008, 9, 'Villa Ciudad de América'),
(1009, 9, 'Villa Ciudad Pque Los Reartes'),
(1010, 9, 'Villa Concepción del Tío'),
(1011, 9, 'Villa Cura Brochero'),
(1012, 9, 'Villa de Las Rosas'),
(1013, 9, 'Villa de María'),
(1014, 9, 'Villa de Pocho'),
(1015, 9, 'Villa de Soto'),
(1016, 9, 'Villa del Dique'),
(1017, 9, 'Villa del Prado'),
(1018, 9, 'Villa del Rosario'),
(1019, 9, 'Villa del Totoral'),
(1020, 9, 'Villa Dolores'),
(1021, 9, 'Villa El Chancay'),
(1022, 9, 'Villa Elisa'),
(1023, 9, 'Villa Flor Serrana'),
(1024, 9, 'Villa Fontana'),
(1025, 9, 'Villa Giardino'),
(1026, 9, 'Villa Gral. Belgrano'),
(1027, 9, 'Villa Gutierrez'),
(1028, 9, 'Villa Huidobro'),
(1029, 9, 'Villa La Bolsa'),
(1030, 9, 'Villa Los Aromos'),
(1031, 9, 'Villa Los Patos'),
(1032, 9, 'Villa María'),
(1033, 9, 'Villa Nueva'),
(1034, 9, 'Villa Pque. Santa Ana'),
(1035, 9, 'Villa Pque. Siquiman'),
(1036, 9, 'Villa Quillinzo'),
(1037, 9, 'Villa Rossi'),
(1038, 9, 'Villa Rumipal'),
(1039, 9, 'Villa San Esteban'),
(1040, 9, 'Villa San Isidro'),
(1041, 9, 'Villa 21'),
(1042, 9, 'Villa Sarmiento (G.R)'),
(1043, 9, 'Villa Sarmiento (S.A)'),
(1044, 9, 'Villa Tulumba'),
(1045, 9, 'Villa Valeria'),
(1046, 9, 'Villa Yacanto'),
(1047, 9, 'Washington'),
(1048, 9, 'Wenceslao Escalante'),
(1049, 9, 'Ycho Cruz Sierras'),
(1050, 10, 'Alvear'),
(1051, 10, 'Bella Vista'),
(1052, 10, 'Berón de Astrada'),
(1053, 10, 'Bonpland'),
(1054, 10, 'Caá Cati'),
(1055, 10, 'Capital'),
(1056, 10, 'Chavarría'),
(1057, 10, 'Col. C. Pellegrini'),
(1058, 10, 'Col. Libertad'),
(1059, 10, 'Col. Liebig'),
(1060, 10, 'Col. Sta Rosa'),
(1061, 10, 'Concepción'),
(1062, 10, 'Cruz de Los Milagros'),
(1063, 10, 'Curuzú-Cuatiá'),
(1064, 10, 'Empedrado'),
(1065, 10, 'Esquina'),
(1066, 10, 'Estación Torrent'),
(1067, 10, 'Felipe Yofré'),
(1068, 10, 'Garruchos'),
(1069, 10, 'Gdor. Agrónomo'),
(1070, 10, 'Gdor. Martínez'),
(1071, 10, 'Goya'),
(1072, 10, 'Guaviravi'),
(1073, 10, 'Herlitzka'),
(1074, 10, 'Ita-Ibate'),
(1075, 10, 'Itatí'),
(1076, 10, 'Ituzaingó'),
(1077, 10, 'José Rafael Gómez'),
(1078, 10, 'Juan Pujol'),
(1079, 10, 'La Cruz'),
(1080, 10, 'Lavalle'),
(1081, 10, 'Lomas de Vallejos'),
(1082, 10, 'Loreto'),
(1083, 10, 'Mariano I. Loza'),
(1084, 10, 'Mburucuyá'),
(1085, 10, 'Mercedes'),
(1086, 10, 'Mocoretá'),
(1087, 10, 'Mte. Caseros'),
(1088, 10, 'Nueve de Julio'),
(1089, 10, 'Palmar Grande'),
(1090, 10, 'Parada Pucheta'),
(1091, 10, 'Paso de La Patria'),
(1092, 10, 'Paso de Los Libres'),
(1093, 10, 'Pedro R. Fernandez'),
(1094, 10, 'Perugorría'),
(1095, 10, 'Pueblo Libertador'),
(1096, 10, 'Ramada Paso'),
(1097, 10, 'Riachuelo'),
(1098, 10, 'Saladas'),
(1099, 10, 'San Antonio'),
(1100, 10, 'San Carlos'),
(1101, 10, 'San Cosme'),
(1102, 10, 'San Lorenzo'),
(1103, 10, '20 del Palmar'),
(1104, 10, 'San Miguel'),
(1105, 10, 'San Roque'),
(1106, 10, 'Santa Ana'),
(1107, 10, 'Santa Lucía'),
(1108, 10, 'Santo Tomé'),
(1109, 10, 'Sauce'),
(1110, 10, 'Tabay'),
(1111, 10, 'Tapebicuá'),
(1112, 10, 'Tatacua'),
(1113, 10, 'Virasoro'),
(1114, 10, 'Yapeyú'),
(1115, 10, 'Yataití Calle'),
(1116, 11, 'Alarcón'),
(1117, 11, 'Alcaraz'),
(1118, 11, 'Alcaraz N.'),
(1119, 11, 'Alcaraz S.'),
(1120, 11, 'Aldea Asunción'),
(1121, 11, 'Aldea Brasilera'),
(1122, 11, 'Aldea Elgenfeld'),
(1123, 11, 'Aldea Grapschental'),
(1124, 11, 'Aldea Ma. Luisa'),
(1125, 11, 'Aldea Protestante'),
(1126, 11, 'Aldea Salto'),
(1127, 11, 'Aldea San Antonio (G)'),
(1128, 11, 'Aldea San Antonio (P)'),
(1129, 11, 'Aldea 19'),
(1130, 11, 'Aldea San Miguel'),
(1131, 11, 'Aldea San Rafael'),
(1132, 11, 'Aldea Spatzenkutter'),
(1133, 11, 'Aldea Sta. María'),
(1134, 11, 'Aldea Sta. Rosa'),
(1135, 11, 'Aldea Valle María'),
(1136, 11, 'Altamirano Sur'),
(1137, 11, 'Antelo'),
(1138, 11, 'Antonio Tomás'),
(1139, 11, 'Aranguren'),
(1140, 11, 'Arroyo Barú'),
(1141, 11, 'Arroyo Burgos'),
(1142, 11, 'Arroyo Clé'),
(1143, 11, 'Arroyo Corralito'),
(1144, 11, 'Arroyo del Medio'),
(1145, 11, 'Arroyo Maturrango'),
(1146, 11, 'Arroyo Palo Seco'),
(1147, 11, 'Banderas'),
(1148, 11, 'Basavilbaso'),
(1149, 11, 'Betbeder'),
(1150, 11, 'Bovril'),
(1151, 11, 'Caseros'),
(1152, 11, 'Ceibas'),
(1153, 11, 'Cerrito'),
(1154, 11, 'Chajarí'),
(1155, 11, 'Chilcas'),
(1156, 11, 'Clodomiro Ledesma'),
(1157, 11, 'Col. Alemana'),
(1158, 11, 'Col. Avellaneda'),
(1159, 11, 'Col. Avigdor'),
(1160, 11, 'Col. Ayuí'),
(1161, 11, 'Col. Baylina'),
(1162, 11, 'Col. Carrasco'),
(1163, 11, 'Col. Celina'),
(1164, 11, 'Col. Cerrito'),
(1165, 11, 'Col. Crespo'),
(1166, 11, 'Col. Elia'),
(1167, 11, 'Col. Ensayo'),
(1168, 11, 'Col. Gral. Roca'),
(1169, 11, 'Col. La Argentina'),
(1170, 11, 'Col. Merou'),
(1171, 11, 'Col. Oficial Nª3'),
(1172, 11, 'Col. Oficial Nº13'),
(1173, 11, 'Col. Oficial Nº14'),
(1174, 11, 'Col. Oficial Nº5'),
(1175, 11, 'Col. Reffino'),
(1176, 11, 'Col. Tunas'),
(1177, 11, 'Col. Viraró'),
(1178, 11, 'Colón'),
(1179, 11, 'Concepción del Uruguay'),
(1180, 11, 'Concordia'),
(1181, 11, 'Conscripto Bernardi'),
(1182, 11, 'Costa Grande'),
(1183, 11, 'Costa San Antonio'),
(1184, 11, 'Costa Uruguay N.'),
(1185, 11, 'Costa Uruguay S.'),
(1186, 11, 'Crespo'),
(1187, 11, 'Crucecitas 3ª'),
(1188, 11, 'Crucecitas 7ª'),
(1189, 11, 'Crucecitas 8ª'),
(1190, 11, 'Cuchilla Redonda'),
(1191, 11, 'Curtiembre'),
(1192, 11, 'Diamante'),
(1193, 11, 'Distrito 6º'),
(1194, 11, 'Distrito Chañar'),
(1195, 11, 'Distrito Chiqueros'),
(1196, 11, 'Distrito Cuarto'),
(1197, 11, 'Distrito Diego López'),
(1198, 11, 'Distrito Pajonal'),
(1199, 11, 'Distrito Sauce'),
(1200, 11, 'Distrito Tala'),
(1201, 11, 'Distrito Talitas'),
(1202, 11, 'Don Cristóbal 1ª Sección'),
(1203, 11, 'Don Cristóbal 2ª Sección'),
(1204, 11, 'Durazno'),
(1205, 11, 'El Cimarrón'),
(1206, 11, 'El Gramillal'),
(1207, 11, 'El Palenque'),
(1208, 11, 'El Pingo'),
(1209, 11, 'El Quebracho'),
(1210, 11, 'El Redomón'),
(1211, 11, 'El Solar'),
(1212, 11, 'Enrique Carbo'),
(1213, 11, '9'),
(1214, 11, 'Espinillo N.'),
(1215, 11, 'Estación Campos'),
(1216, 11, 'Estación Escriña'),
(1217, 11, 'Estación Lazo'),
(1218, 11, 'Estación Raíces'),
(1219, 11, 'Estación Yerúa'),
(1220, 11, 'Estancia Grande'),
(1221, 11, 'Estancia Líbaros'),
(1222, 11, 'Estancia Racedo'),
(1223, 11, 'Estancia Solá'),
(1224, 11, 'Estancia Yuquerí'),
(1225, 11, 'Estaquitas'),
(1226, 11, 'Faustino M. Parera'),
(1227, 11, 'Febre'),
(1228, 11, 'Federación'),
(1229, 11, 'Federal'),
(1230, 11, 'Gdor. Echagüe'),
(1231, 11, 'Gdor. Mansilla'),
(1232, 11, 'Gilbert'),
(1233, 11, 'González Calderón'),
(1234, 11, 'Gral. Almada'),
(1235, 11, 'Gral. Alvear'),
(1236, 11, 'Gral. Campos'),
(1237, 11, 'Gral. Galarza'),
(1238, 11, 'Gral. Ramírez'),
(1239, 11, 'Gualeguay'),
(1240, 11, 'Gualeguaychú'),
(1241, 11, 'Gualeguaycito'),
(1242, 11, 'Guardamonte'),
(1243, 11, 'Hambis'),
(1244, 11, 'Hasenkamp'),
(1245, 11, 'Hernandarias'),
(1246, 11, 'Hernández'),
(1247, 11, 'Herrera'),
(1248, 11, 'Hinojal'),
(1249, 11, 'Hocker'),
(1250, 11, 'Ing. Sajaroff'),
(1251, 11, 'Irazusta'),
(1252, 11, 'Isletas'),
(1253, 11, 'J.J De Urquiza'),
(1254, 11, 'Jubileo'),
(1255, 11, 'La Clarita'),
(1256, 11, 'La Criolla'),
(1257, 11, 'La Esmeralda'),
(1258, 11, 'La Florida'),
(1259, 11, 'La Fraternidad'),
(1260, 11, 'La Hierra'),
(1261, 11, 'La Ollita'),
(1262, 11, 'La Paz'),
(1263, 11, 'La Picada'),
(1264, 11, 'La Providencia'),
(1265, 11, 'La Verbena'),
(1266, 11, 'Laguna Benítez'),
(1267, 11, 'Larroque'),
(1268, 11, 'Las Cuevas'),
(1269, 11, 'Las Garzas'),
(1270, 11, 'Las Guachas'),
(1271, 11, 'Las Mercedes'),
(1272, 11, 'Las Moscas'),
(1273, 11, 'Las Mulitas'),
(1274, 11, 'Las Toscas'),
(1275, 11, 'Laurencena'),
(1276, 11, 'Libertador San Martín'),
(1277, 11, 'Loma Limpia'),
(1278, 11, 'Los Ceibos'),
(1279, 11, 'Los Charruas'),
(1280, 11, 'Los Conquistadores'),
(1281, 11, 'Lucas González'),
(1282, 11, 'Lucas N.'),
(1283, 11, 'Lucas S. 1ª'),
(1284, 11, 'Lucas S. 2ª'),
(1285, 11, 'Maciá'),
(1286, 11, 'María Grande'),
(1287, 11, 'María Grande 2ª'),
(1288, 11, 'Médanos'),
(1289, 11, 'Mojones N.'),
(1290, 11, 'Mojones S.'),
(1291, 11, 'Molino Doll'),
(1292, 11, 'Monte Redondo'),
(1293, 11, 'Montoya'),
(1294, 11, 'Mulas Grandes'),
(1295, 11, 'Ñancay'),
(1296, 11, 'Nogoyá'),
(1297, 11, 'Nueva Escocia'),
(1298, 11, 'Nueva Vizcaya'),
(1299, 11, 'Ombú'),
(1300, 11, 'Oro Verde'),
(1301, 11, 'Paraná'),
(1302, 11, 'Pasaje Guayaquil'),
(1303, 11, 'Pasaje Las Tunas'),
(1304, 11, 'Paso de La Arena'),
(1305, 11, 'Paso de La Laguna'),
(1306, 11, 'Paso de Las Piedras'),
(1307, 11, 'Paso Duarte'),
(1308, 11, 'Pastor Britos'),
(1309, 11, 'Pedernal'),
(1310, 11, 'Perdices'),
(1311, 11, 'Picada Berón'),
(1312, 11, 'Piedras Blancas'),
(1313, 11, 'Primer Distrito Cuchilla'),
(1314, 11, 'Primero de Mayo'),
(1315, 11, 'Pronunciamiento'),
(1316, 11, 'Pto. Algarrobo'),
(1317, 11, 'Pto. Ibicuy'),
(1318, 11, 'Pueblo Brugo'),
(1319, 11, 'Pueblo Cazes'),
(1320, 11, 'Pueblo Gral. Belgrano'),
(1321, 11, 'Pueblo Liebig'),
(1322, 11, 'Puerto Yeruá'),
(1323, 11, 'Punta del Monte'),
(1324, 11, 'Quebracho'),
(1325, 11, 'Quinto Distrito'),
(1326, 11, 'Raices Oeste'),
(1327, 11, 'Rincón de Nogoyá'),
(1328, 11, 'Rincón del Cinto'),
(1329, 11, 'Rincón del Doll'),
(1330, 11, 'Rincón del Gato'),
(1331, 11, 'Rocamora'),
(1332, 11, 'Rosario del Tala'),
(1333, 11, 'San Benito'),
(1334, 11, 'San Cipriano'),
(1335, 11, 'San Ernesto'),
(1336, 11, 'San Gustavo'),
(1337, 11, 'San Jaime'),
(1338, 11, 'San José'),
(1339, 11, 'San José de Feliciano'),
(1340, 11, 'San Justo'),
(1341, 11, 'San Marcial'),
(1342, 11, 'San Pedro'),
(1343, 11, 'San Ramírez'),
(1344, 11, 'San Ramón'),
(1345, 11, 'San Roque'),
(1346, 11, 'San Salvador'),
(1347, 11, 'San Víctor'),
(1348, 11, 'Santa Ana'),
(1349, 11, 'Santa Anita'),
(1350, 11, 'Santa Elena'),
(1351, 11, 'Santa Lucía'),
(1352, 11, 'Santa Luisa'),
(1353, 11, 'Sauce de Luna'),
(1354, 11, 'Sauce Montrull'),
(1355, 11, 'Sauce Pinto'),
(1356, 11, 'Sauce Sur'),
(1357, 11, 'Seguí'),
(1358, 11, 'Sir Leonard'),
(1359, 11, 'Sosa'),
(1360, 11, 'Tabossi'),
(1361, 11, 'Tezanos Pinto'),
(1362, 11, 'Ubajay'),
(1363, 11, 'Urdinarrain'),
(1364, 11, 'Veinte de Septiembre'),
(1365, 11, 'Viale'),
(1366, 11, 'Victoria'),
(1367, 11, 'Villa Clara'),
(1368, 11, 'Villa del Rosario'),
(1369, 11, 'Villa Domínguez'),
(1370, 11, 'Villa Elisa'),
(1371, 11, 'Villa Fontana'),
(1372, 11, 'Villa Gdor. Etchevehere'),
(1373, 11, 'Villa Mantero'),
(1374, 11, 'Villa Paranacito'),
(1375, 11, 'Villa Urquiza'),
(1376, 11, 'Villaguay'),
(1377, 11, 'Walter Moss'),
(1378, 11, 'Yacaré'),
(1379, 11, 'Yeso Oeste'),
(1380, 12, 'Buena Vista'),
(1381, 12, 'Clorinda'),
(1382, 12, 'Col. Pastoril'),
(1383, 12, 'Cte. Fontana'),
(1384, 12, 'El Colorado'),
(1385, 12, 'El Espinillo'),
(1386, 12, 'Estanislao Del Campo'),
(1387, 12, '10'),
(1388, 12, 'Fortín Lugones'),
(1389, 12, 'Gral. Lucio V. Mansilla'),
(1390, 12, 'Gral. Manuel Belgrano'),
(1391, 12, 'Gral. Mosconi'),
(1392, 12, 'Gran Guardia'),
(1393, 12, 'Herradura'),
(1394, 12, 'Ibarreta'),
(1395, 12, 'Ing. Juárez'),
(1396, 12, 'Laguna Blanca'),
(1397, 12, 'Laguna Naick Neck'),
(1398, 12, 'Laguna Yema'),
(1399, 12, 'Las Lomitas'),
(1400, 12, 'Los Chiriguanos'),
(1401, 12, 'Mayor V. Villafañe'),
(1402, 12, 'Misión San Fco.'),
(1403, 12, 'Palo Santo'),
(1404, 12, 'Pirané'),
(1405, 12, 'Pozo del Maza'),
(1406, 12, 'Riacho He-He'),
(1407, 12, 'San Hilario'),
(1408, 12, 'San Martín II'),
(1409, 12, 'Siete Palmas'),
(1410, 12, 'Subteniente Perín'),
(1411, 12, 'Tres Lagunas'),
(1412, 12, 'Villa Dos Trece'),
(1413, 12, 'Villa Escolar'),
(1414, 12, 'Villa Gral. Güemes'),
(1415, 13, 'Abdon Castro Tolay'),
(1416, 13, 'Abra Pampa'),
(1417, 13, 'Abralaite'),
(1418, 13, 'Aguas Calientes'),
(1419, 13, 'Arrayanal'),
(1420, 13, 'Barrios'),
(1421, 13, 'Caimancito'),
(1422, 13, 'Calilegua'),
(1423, 13, 'Cangrejillos'),
(1424, 13, 'Caspala'),
(1425, 13, 'Catuá'),
(1426, 13, 'Cieneguillas'),
(1427, 13, 'Coranzulli'),
(1428, 13, 'Cusi-Cusi'),
(1429, 13, 'El Aguilar'),
(1430, 13, 'El Carmen'),
(1431, 13, 'El Cóndor'),
(1432, 13, 'El Fuerte'),
(1433, 13, 'El Piquete'),
(1434, 13, 'El Talar'),
(1435, 13, 'Fraile Pintado'),
(1436, 13, 'Hipólito Yrigoyen'),
(1437, 13, 'Huacalera'),
(1438, 13, 'Humahuaca'),
(1439, 13, 'La Esperanza'),
(1440, 13, 'La Mendieta'),
(1441, 13, 'La Quiaca'),
(1442, 13, 'Ledesma'),
(1443, 13, 'Libertador Gral. San Martin'),
(1444, 13, 'Maimara'),
(1445, 13, 'Mina Pirquitas'),
(1446, 13, 'Monterrico'),
(1447, 13, 'Palma Sola'),
(1448, 13, 'Palpalá'),
(1449, 13, 'Pampa Blanca'),
(1450, 13, 'Pampichuela'),
(1451, 13, 'Perico'),
(1452, 13, 'Puesto del Marqués'),
(1453, 13, 'Puesto Viejo'),
(1454, 13, 'Pumahuasi'),
(1455, 13, 'Purmamarca'),
(1456, 13, 'Rinconada'),
(1457, 13, 'Rodeitos'),
(1458, 13, 'Rosario de Río Grande'),
(1459, 13, 'San Antonio'),
(1460, 13, 'San Francisco'),
(1461, 13, 'San Pedro'),
(1462, 13, 'San Rafael'),
(1463, 13, 'San Salvador'),
(1464, 13, 'Santa Ana'),
(1465, 13, 'Santa Catalina'),
(1466, 13, 'Santa Clara'),
(1467, 13, 'Susques'),
(1468, 13, 'Tilcara'),
(1469, 13, 'Tres Cruces'),
(1470, 13, 'Tumbaya'),
(1471, 13, 'Valle Grande'),
(1472, 13, 'Vinalito'),
(1473, 13, 'Volcán'),
(1474, 13, 'Yala'),
(1475, 13, 'Yaví'),
(1476, 13, 'Yuto'),
(1477, 14, 'Abramo'),
(1478, 14, 'Adolfo Van Praet'),
(1479, 14, 'Agustoni'),
(1480, 14, 'Algarrobo del Aguila'),
(1481, 14, 'Alpachiri'),
(1482, 14, 'Alta Italia'),
(1483, 14, 'Anguil'),
(1484, 14, 'Arata'),
(1485, 14, 'Ataliva Roca'),
(1486, 14, 'Bernardo Larroude'),
(1487, 14, 'Bernasconi'),
(1488, 14, 'Caleufú'),
(1489, 14, 'Carro Quemado'),
(1490, 14, 'Catriló'),
(1491, 14, 'Ceballos'),
(1492, 14, 'Chacharramendi'),
(1493, 14, 'Col. Barón'),
(1494, 14, 'Col. Santa María'),
(1495, 14, 'Conhelo'),
(1496, 14, 'Coronel Hilario Lagos'),
(1497, 14, 'Cuchillo-Có'),
(1498, 14, 'Doblas'),
(1499, 14, 'Dorila'),
(1500, 14, 'Eduardo Castex'),
(1501, 14, 'Embajador Martini'),
(1502, 14, 'Falucho'),
(1503, 14, 'Gral. Acha'),
(1504, 14, 'Gral. Manuel Campos'),
(1505, 14, 'Gral. Pico'),
(1506, 14, 'Guatraché'),
(1507, 14, 'Ing. Luiggi'),
(1508, 14, 'Intendente Alvear'),
(1509, 14, 'Jacinto Arauz'),
(1510, 14, 'La Adela'),
(1511, 14, 'La Humada'),
(1512, 14, 'La Maruja'),
(1513, 14, '12'),
(1514, 14, 'La Reforma'),
(1515, 14, 'Limay Mahuida'),
(1516, 14, 'Lonquimay'),
(1517, 14, 'Loventuel'),
(1518, 14, 'Luan Toro'),
(1519, 14, 'Macachín'),
(1520, 14, 'Maisonnave'),
(1521, 14, 'Mauricio Mayer'),
(1522, 14, 'Metileo'),
(1523, 14, 'Miguel Cané'),
(1524, 14, 'Miguel Riglos'),
(1525, 14, 'Monte Nievas'),
(1526, 14, 'Parera'),
(1527, 14, 'Perú'),
(1528, 14, 'Pichi-Huinca'),
(1529, 14, 'Puelches'),
(1530, 14, 'Puelén'),
(1531, 14, 'Quehue'),
(1532, 14, 'Quemú Quemú'),
(1533, 14, 'Quetrequén'),
(1534, 14, 'Rancul'),
(1535, 14, 'Realicó'),
(1536, 14, 'Relmo'),
(1537, 14, 'Rolón'),
(1538, 14, 'Rucanelo'),
(1539, 14, 'Sarah'),
(1540, 14, 'Speluzzi'),
(1541, 14, 'Sta. Isabel'),
(1542, 14, 'Sta. Rosa'),
(1543, 14, 'Sta. Teresa'),
(1544, 14, 'Telén'),
(1545, 14, 'Toay'),
(1546, 14, 'Tomas M. de Anchorena'),
(1547, 14, 'Trenel'),
(1548, 14, 'Unanue'),
(1549, 14, 'Uriburu'),
(1550, 14, 'Veinticinco de Mayo'),
(1551, 14, 'Vertiz'),
(1552, 14, 'Victorica'),
(1553, 14, 'Villa Mirasol'),
(1554, 14, 'Winifreda'),
(1555, 15, 'Arauco'),
(1556, 15, 'Capital'),
(1557, 15, 'Castro Barros'),
(1558, 15, 'Chamical'),
(1559, 15, 'Chilecito'),
(1560, 15, 'Coronel F. Varela'),
(1561, 15, 'Famatina'),
(1562, 15, 'Gral. A.V.Peñaloza'),
(1563, 15, 'Gral. Belgrano'),
(1564, 15, 'Gral. J.F. Quiroga'),
(1565, 15, 'Gral. Lamadrid'),
(1566, 15, 'Gral. Ocampo'),
(1567, 15, 'Gral. San Martín'),
(1568, 15, 'Independencia'),
(1569, 15, 'Rosario Penaloza'),
(1570, 15, 'San Blas de Los Sauces'),
(1571, 15, 'Sanagasta'),
(1572, 15, 'Vinchina'),
(1573, 16, 'Capital'),
(1574, 16, 'Chacras de Coria'),
(1575, 16, 'Dorrego'),
(1576, 16, 'Gllen'),
(1577, 16, 'Godoy Cruz'),
(1578, 16, 'Gral. Alvear'),
(1579, 16, 'Guaymallén'),
(1580, 16, 'Junín'),
(1581, 16, 'La Paz'),
(1582, 16, 'Las Heras'),
(1583, 16, 'Lavalle'),
(1584, 16, 'Luján'),
(1585, 16, 'Luján De Cuyo'),
(1586, 16, 'Maipú'),
(1587, 16, 'Malargüe'),
(1588, 16, 'Rivadavia'),
(1589, 16, 'San Carlos'),
(1590, 16, 'San Martín'),
(1591, 16, 'San Rafael'),
(1592, 16, 'Sta. Rosa'),
(1593, 16, 'Tunuyán'),
(1594, 16, 'Tupungato'),
(1595, 16, 'Villa Nueva'),
(1596, 17, 'Alba Posse'),
(1597, 17, 'Almafuerte'),
(1598, 17, 'Apóstoles'),
(1599, 17, 'Aristóbulo Del Valle'),
(1600, 17, 'Arroyo Del Medio'),
(1601, 17, 'Azara'),
(1602, 17, 'Bdo. De Irigoyen'),
(1603, 17, 'Bonpland'),
(1604, 17, 'Caá Yari'),
(1605, 17, 'Campo Grande'),
(1606, 17, 'Campo Ramón'),
(1607, 17, 'Campo Viera'),
(1608, 17, 'Candelaria'),
(1609, 17, 'Capioví'),
(1610, 17, 'Caraguatay'),
(1611, 17, 'Cdte. Guacurarí'),
(1612, 17, 'Cerro Azul'),
(1613, 17, 'Cerro Corá'),
(1614, 17, 'Col. Alberdi'),
(1615, 17, 'Col. Aurora'),
(1616, 17, 'Col. Delicia'),
(1617, 17, 'Col. Polana'),
(1618, 17, 'Col. Victoria'),
(1619, 17, 'Col. Wanda'),
(1620, 17, 'Concepción De La Sierra'),
(1621, 17, 'Corpus'),
(1622, 17, 'Dos Arroyos'),
(1623, 17, 'Dos de Mayo'),
(1624, 17, 'El Alcázar'),
(1625, 17, 'El Dorado'),
(1626, 17, 'El Soberbio'),
(1627, 17, 'Esperanza'),
(1628, 17, 'F. Ameghino'),
(1629, 17, 'Fachinal'),
(1630, 17, 'Garuhapé'),
(1631, 17, 'Garupá'),
(1632, 17, 'Gdor. López'),
(1633, 17, 'Gdor. Roca'),
(1634, 17, 'Gral. Alvear'),
(1635, 17, 'Gral. Urquiza'),
(1636, 17, 'Guaraní'),
(1637, 17, 'H. Yrigoyen'),
(1638, 17, 'Iguazú'),
(1639, 17, 'Itacaruaré'),
(1640, 17, 'Jardín América'),
(1641, 17, 'Leandro N. Alem'),
(1642, 17, 'Libertad'),
(1643, 17, 'Loreto'),
(1644, 17, 'Los Helechos'),
(1645, 17, 'Mártires'),
(1646, 17, '15'),
(1647, 17, 'Mojón Grande'),
(1648, 17, 'Montecarlo'),
(1649, 17, 'Nueve de Julio'),
(1650, 17, 'Oberá'),
(1651, 17, 'Olegario V. Andrade'),
(1652, 17, 'Panambí'),
(1653, 17, 'Posadas'),
(1654, 17, 'Profundidad'),
(1655, 17, 'Pto. Iguazú'),
(1656, 17, 'Pto. Leoni'),
(1657, 17, 'Pto. Piray'),
(1658, 17, 'Pto. Rico'),
(1659, 17, 'Ruiz de Montoya'),
(1660, 17, 'San Antonio'),
(1661, 17, 'San Ignacio'),
(1662, 17, 'San Javier'),
(1663, 17, 'San José'),
(1664, 17, 'San Martín'),
(1665, 17, 'San Pedro'),
(1666, 17, 'San Vicente'),
(1667, 17, 'Santiago De Liniers'),
(1668, 17, 'Santo Pipo'),
(1669, 17, 'Sta. Ana'),
(1670, 17, 'Sta. María'),
(1671, 17, 'Tres Capones'),
(1672, 17, 'Veinticinco de Mayo'),
(1673, 17, 'Wanda'),
(1674, 18, 'A. Saravia'),
(1675, 18, 'Aguaray'),
(1676, 18, 'Angastaco'),
(1677, 18, 'Animaná'),
(1678, 18, 'Cachi'),
(1679, 18, 'Cafayate'),
(1680, 18, 'Campo Quijano'),
(1681, 18, 'Campo Santo'),
(1682, 18, 'Capital'),
(1683, 18, 'Cerrillos'),
(1684, 18, 'Chicoana'),
(1685, 18, 'Col. Sta. Rosa'),
(1686, 18, 'Coronel Moldes'),
(1687, 18, 'El Bordo'),
(1688, 18, 'El Carril'),
(1689, 18, 'El Galpón'),
(1690, 18, 'El Jardín'),
(1691, 18, 'El Potrero'),
(1692, 18, 'El Quebrachal'),
(1693, 18, 'El Tala'),
(1694, 18, 'Embarcación'),
(1695, 18, 'Gral. Ballivian'),
(1696, 18, 'Gral. Güemes'),
(1697, 18, 'Gral. Mosconi'),
(1698, 18, 'Gral. Pizarro'),
(1699, 18, 'Guachipas'),
(1700, 18, 'Hipólito Yrigoyen'),
(1701, 18, 'Iruyá'),
(1702, 18, 'Isla De Cañas'),
(1703, 18, 'J. V. Gonzalez'),
(1704, 18, 'La Caldera'),
(1705, 18, 'La Candelaria'),
(1706, 18, 'La Merced'),
(1707, 18, 'La Poma'),
(1708, 18, 'La Viña'),
(1709, 18, 'Las Lajitas'),
(1710, 18, 'Los Toldos'),
(1711, 18, 'Metán'),
(1712, 18, 'Molinos'),
(1713, 18, 'Nazareno'),
(1714, 18, 'Orán'),
(1715, 18, 'Payogasta'),
(1716, 18, 'Pichanal'),
(1717, 18, 'Prof. S. Mazza'),
(1718, 18, 'Río Piedras'),
(1719, 18, 'Rivadavia Banda Norte'),
(1720, 18, 'Rivadavia Banda Sur'),
(1721, 18, 'Rosario de La Frontera'),
(1722, 18, 'Rosario de Lerma'),
(1723, 18, 'Saclantás'),
(1724, 18, '18'),
(1725, 18, 'San Antonio'),
(1726, 18, 'San Carlos'),
(1727, 18, 'San José De Metán'),
(1728, 18, 'San Ramón'),
(1729, 18, 'Santa Victoria E.'),
(1730, 18, 'Santa Victoria O.'),
(1731, 18, 'Tartagal'),
(1732, 18, 'Tolar Grande'),
(1733, 18, 'Urundel'),
(1734, 18, 'Vaqueros'),
(1735, 18, 'Villa San Lorenzo'),
(1736, 19, 'Albardón'),
(1737, 19, 'Angaco'),
(1738, 19, 'Calingasta'),
(1739, 19, 'Capital'),
(1740, 19, 'Caucete'),
(1741, 19, 'Chimbas'),
(1742, 19, 'Iglesia'),
(1743, 19, 'Jachal'),
(1744, 19, 'Nueve de Julio'),
(1745, 19, 'Pocito'),
(1746, 19, 'Rawson'),
(1747, 19, 'Rivadavia'),
(1748, 19, '19'),
(1749, 19, 'San Martín'),
(1750, 19, 'Santa Lucía'),
(1751, 19, 'Sarmiento'),
(1752, 19, 'Ullum'),
(1753, 19, 'Valle Fértil'),
(1754, 19, 'Veinticinco de Mayo'),
(1755, 19, 'Zonda'),
(1756, 20, 'Alto Pelado'),
(1757, 20, 'Alto Pencoso'),
(1758, 20, 'Anchorena'),
(1759, 20, 'Arizona'),
(1760, 20, 'Bagual'),
(1761, 20, 'Balde'),
(1762, 20, 'Batavia'),
(1763, 20, 'Beazley'),
(1764, 20, 'Buena Esperanza'),
(1765, 20, 'Candelaria'),
(1766, 20, 'Capital'),
(1767, 20, 'Carolina'),
(1768, 20, 'Carpintería'),
(1769, 20, 'Concarán'),
(1770, 20, 'Cortaderas'),
(1771, 20, 'El Morro'),
(1772, 20, 'El Trapiche'),
(1773, 20, 'El Volcán'),
(1774, 20, 'Fortín El Patria'),
(1775, 20, 'Fortuna'),
(1776, 20, 'Fraga'),
(1777, 20, 'Juan Jorba'),
(1778, 20, 'Juan Llerena'),
(1779, 20, 'Juana Koslay'),
(1780, 20, 'Justo Daract'),
(1781, 20, 'La Calera'),
(1782, 20, 'La Florida'),
(1783, 20, 'La Punilla'),
(1784, 20, 'La Toma'),
(1785, 20, 'Lafinur'),
(1786, 20, 'Las Aguadas'),
(1787, 20, 'Las Chacras'),
(1788, 20, 'Las Lagunas'),
(1789, 20, 'Las Vertientes'),
(1790, 20, 'Lavaisse'),
(1791, 20, 'Leandro N. Alem'),
(1792, 20, 'Los Molles'),
(1793, 20, 'Luján'),
(1794, 20, 'Mercedes'),
(1795, 20, 'Merlo'),
(1796, 20, 'Naschel'),
(1797, 20, 'Navia'),
(1798, 20, 'Nogolí'),
(1799, 20, 'Nueva Galia'),
(1800, 20, 'Papagayos'),
(1801, 20, 'Paso Grande'),
(1802, 20, 'Potrero de Los Funes'),
(1803, 20, 'Quines'),
(1804, 20, 'Renca'),
(1805, 20, 'Saladillo'),
(1806, 20, 'San Francisco'),
(1807, 20, 'San Gerónimo'),
(1808, 20, 'San Martín'),
(1809, 20, 'San Pablo'),
(1810, 20, 'Santa Rosa de Conlara'),
(1811, 20, 'Talita'),
(1812, 20, 'Tilisarao'),
(1813, 20, 'Unión'),
(1814, 20, 'Villa de La Quebrada'),
(1815, 20, 'Villa de Praga'),
(1816, 20, 'Villa del Carmen'),
(1817, 20, 'Villa Gral. Roca'),
(1818, 20, 'Villa Larca'),
(1819, 20, 'Villa Mercedes'),
(1820, 20, 'Zanjitas'),
(1821, 21, 'Calafate'),
(1822, 21, 'Caleta Olivia'),
(1823, 21, 'Cañadón Seco'),
(1824, 21, 'Comandante Piedrabuena'),
(1825, 21, 'El Calafate'),
(1826, 21, 'El Chaltén'),
(1827, 21, 'Gdor. Gregores'),
(1828, 21, 'Hipólito Yrigoyen'),
(1829, 21, 'Jaramillo'),
(1830, 21, 'Koluel Kaike'),
(1831, 21, 'Las Heras'),
(1832, 21, 'Los Antiguos'),
(1833, 21, 'Perito Moreno'),
(1834, 21, 'Pico Truncado'),
(1835, 21, 'Pto. Deseado'),
(1836, 21, 'Pto. San Julián'),
(1837, 21, 'Pto. 21'),
(1838, 21, 'Río Cuarto'),
(1839, 21, 'Río Gallegos'),
(1840, 21, 'Río Turbio'),
(1841, 21, 'Tres Lagos'),
(1842, 21, 'Veintiocho De Noviembre'),
(1843, 22, 'Aarón Castellanos'),
(1844, 22, 'Acebal'),
(1845, 22, 'Aguará Grande'),
(1846, 22, 'Albarellos'),
(1847, 22, 'Alcorta'),
(1848, 22, 'Aldao'),
(1849, 22, 'Alejandra'),
(1850, 22, 'Álvarez'),
(1851, 22, 'Ambrosetti'),
(1852, 22, 'Amenábar'),
(1853, 22, 'Angélica'),
(1854, 22, 'Angeloni'),
(1855, 22, 'Arequito'),
(1856, 22, 'Arminda'),
(1857, 22, 'Armstrong'),
(1858, 22, 'Arocena'),
(1859, 22, 'Arroyo Aguiar'),
(1860, 22, 'Arroyo Ceibal'),
(1861, 22, 'Arroyo Leyes'),
(1862, 22, 'Arroyo Seco'),
(1863, 22, 'Arrufó'),
(1864, 22, 'Arteaga'),
(1865, 22, 'Ataliva'),
(1866, 22, 'Aurelia'),
(1867, 22, 'Avellaneda'),
(1868, 22, 'Barrancas'),
(1869, 22, 'Bauer Y Sigel'),
(1870, 22, 'Bella Italia'),
(1871, 22, 'Berabevú'),
(1872, 22, 'Berna'),
(1873, 22, 'Bernardo de Irigoyen'),
(1874, 22, 'Bigand'),
(1875, 22, 'Bombal'),
(1876, 22, 'Bouquet'),
(1877, 22, 'Bustinza'),
(1878, 22, 'Cabal'),
(1879, 22, 'Cacique Ariacaiquin'),
(1880, 22, 'Cafferata'),
(1881, 22, 'Calchaquí'),
(1882, 22, 'Campo Andino'),
(1883, 22, 'Campo Piaggio'),
(1884, 22, 'Cañada de Gómez'),
(1885, 22, 'Cañada del Ucle'),
(1886, 22, 'Cañada Rica'),
(1887, 22, 'Cañada Rosquín'),
(1888, 22, 'Candioti'),
(1889, 22, 'Capital'),
(1890, 22, 'Capitán Bermúdez'),
(1891, 22, 'Capivara'),
(1892, 22, 'Carcarañá'),
(1893, 22, 'Carlos Pellegrini'),
(1894, 22, 'Carmen'),
(1895, 22, 'Carmen Del Sauce'),
(1896, 22, 'Carreras'),
(1897, 22, 'Carrizales'),
(1898, 22, 'Casalegno'),
(1899, 22, 'Casas'),
(1900, 22, 'Casilda'),
(1901, 22, 'Castelar'),
(1902, 22, 'Castellanos'),
(1903, 22, 'Cayastá'),
(1904, 22, 'Cayastacito'),
(1905, 22, 'Centeno'),
(1906, 22, 'Cepeda'),
(1907, 22, 'Ceres'),
(1908, 22, 'Chabás'),
(1909, 22, 'Chañar Ladeado'),
(1910, 22, 'Chapuy'),
(1911, 22, 'Chovet'),
(1912, 22, 'Christophersen'),
(1913, 22, 'Classon'),
(1914, 22, 'Cnel. Arnold'),
(1915, 22, 'Cnel. Bogado'),
(1916, 22, 'Cnel. Dominguez'),
(1917, 22, 'Cnel. Fraga'),
(1918, 22, 'Col. Aldao'),
(1919, 22, 'Col. Ana'),
(1920, 22, 'Col. Belgrano'),
(1921, 22, 'Col. Bicha'),
(1922, 22, 'Col. Bigand'),
(1923, 22, 'Col. Bossi'),
(1924, 22, 'Col. Cavour'),
(1925, 22, 'Col. Cello'),
(1926, 22, 'Col. Dolores'),
(1927, 22, 'Col. Dos Rosas'),
(1928, 22, 'Col. Durán'),
(1929, 22, 'Col. Iturraspe'),
(1930, 22, 'Col. Margarita'),
(1931, 22, 'Col. Mascias'),
(1932, 22, 'Col. Raquel'),
(1933, 22, 'Col. Rosa'),
(1934, 22, 'Col. San José'),
(1935, 22, 'Constanza'),
(1936, 22, 'Coronda'),
(1937, 22, 'Correa'),
(1938, 22, 'Crispi'),
(1939, 22, 'Cululú'),
(1940, 22, 'Curupayti'),
(1941, 22, 'Desvio Arijón'),
(1942, 22, 'Diaz'),
(1943, 22, 'Diego de Alvear'),
(1944, 22, 'Egusquiza'),
(1945, 22, 'El Arazá'),
(1946, 22, 'El Rabón'),
(1947, 22, 'El Sombrerito'),
(1948, 22, 'El Trébol'),
(1949, 22, 'Elisa'),
(1950, 22, 'Elortondo'),
(1951, 22, 'Emilia'),
(1952, 22, 'Empalme San Carlos'),
(1953, 22, 'Empalme Villa Constitucion'),
(1954, 22, 'Esmeralda'),
(1955, 22, 'Esperanza'),
(1956, 22, 'Estación Alvear'),
(1957, 22, 'Estacion Clucellas'),
(1958, 22, 'Esteban Rams'),
(1959, 22, 'Esther'),
(1960, 22, 'Esustolia'),
(1961, 22, 'Eusebia'),
(1962, 22, 'Felicia'),
(1963, 22, 'Fidela'),
(1964, 22, 'Fighiera'),
(1965, 22, 'Firmat'),
(1966, 22, 'Florencia'),
(1967, 22, 'Fortín Olmos'),
(1968, 22, 'Franck'),
(1969, 22, 'Fray Luis Beltrán'),
(1970, 22, 'Frontera'),
(1971, 22, 'Fuentes'),
(1972, 22, 'Funes'),
(1973, 22, 'Gaboto'),
(1974, 22, 'Galisteo'),
(1975, 22, 'Gálvez'),
(1976, 22, 'Garabalto'),
(1977, 22, 'Garibaldi'),
(1978, 22, 'Gato Colorado'),
(1979, 22, 'Gdor. Crespo'),
(1980, 22, 'Gessler'),
(1981, 22, 'Godoy'),
(1982, 22, 'Golondrina'),
(1983, 22, 'Gral. Gelly'),
(1984, 22, 'Gral. Lagos'),
(1985, 22, 'Granadero Baigorria'),
(1986, 22, 'Gregoria Perez De Denis'),
(1987, 22, 'Grutly'),
(1988, 22, 'Guadalupe N.'),
(1989, 22, 'Gödeken'),
(1990, 22, 'Helvecia'),
(1991, 22, 'Hersilia'),
(1992, 22, 'Hipatía'),
(1993, 22, 'Huanqueros'),
(1994, 22, 'Hugentobler'),
(1995, 22, 'Hughes'),
(1996, 22, 'Humberto 1º'),
(1997, 22, 'Humboldt'),
(1998, 22, 'Ibarlucea'),
(1999, 22, 'Ing. Chanourdie'),
(2000, 22, 'Intiyaco'),
(2001, 22, 'Ituzaingó'),
(2002, 22, 'Jacinto L. Aráuz'),
(2003, 22, 'Josefina'),
(2004, 22, 'Juan B. Molina'),
(2005, 22, 'Juan de Garay'),
(2006, 22, 'Juncal'),
(2007, 22, 'La Brava'),
(2008, 22, 'La Cabral'),
(2009, 22, 'La Camila'),
(2010, 22, 'La Chispa'),
(2011, 22, 'La Clara'),
(2012, 22, 'La Criolla'),
(2013, 22, 'La Gallareta'),
(2014, 22, 'La Lucila'),
(2015, 22, 'La Pelada'),
(2016, 22, 'La Penca'),
(2017, 22, 'La Rubia'),
(2018, 22, 'La Sarita'),
(2019, 22, 'La Vanguardia'),
(2020, 22, 'Labordeboy'),
(2021, 22, 'Laguna Paiva'),
(2022, 22, 'Landeta'),
(2023, 22, 'Lanteri'),
(2024, 22, 'Larrechea'),
(2025, 22, 'Las Avispas'),
(2026, 22, 'Las Bandurrias'),
(2027, 22, 'Las Garzas'),
(2028, 22, 'Las Palmeras'),
(2029, 22, 'Las Parejas'),
(2030, 22, 'Las Petacas'),
(2031, 22, 'Las Rosas'),
(2032, 22, 'Las Toscas'),
(2033, 22, 'Las Tunas'),
(2034, 22, 'Lazzarino'),
(2035, 22, 'Lehmann'),
(2036, 22, 'Llambi Campbell'),
(2037, 22, 'Logroño'),
(2038, 22, 'Loma Alta'),
(2039, 22, 'López'),
(2040, 22, 'Los Amores'),
(2041, 22, 'Los Cardos'),
(2042, 22, 'Los Laureles'),
(2043, 22, 'Los Molinos'),
(2044, 22, 'Los Quirquinchos'),
(2045, 22, 'Lucio V. Lopez'),
(2046, 22, 'Luis Palacios'),
(2047, 22, 'Ma. Juana'),
(2048, 22, 'Ma. Luisa'),
(2049, 22, 'Ma. Susana'),
(2050, 22, 'Ma. Teresa'),
(2051, 22, 'Maciel'),
(2052, 22, 'Maggiolo'),
(2053, 22, 'Malabrigo'),
(2054, 22, 'Marcelino Escalada'),
(2055, 22, 'Margarita'),
(2056, 22, 'Matilde'),
(2057, 22, 'Mauá'),
(2058, 22, 'Máximo Paz'),
(2059, 22, 'Melincué'),
(2060, 22, 'Miguel Torres'),
(2061, 22, 'Moisés Ville'),
(2062, 22, 'Monigotes'),
(2063, 22, 'Monje'),
(2064, 22, 'Monte Obscuridad'),
(2065, 22, 'Monte Vera'),
(2066, 22, 'Montefiore'),
(2067, 22, 'Montes de Oca'),
(2068, 22, 'Murphy'),
(2069, 22, 'Ñanducita'),
(2070, 22, 'Naré');
INSERT INTO `localidades` (`idLocalidad`, `idProvincia`, `Descripcion`) VALUES
(2071, 22, 'Nelson'),
(2072, 22, 'Nicanor E. Molinas'),
(2073, 22, 'Nuevo Torino'),
(2074, 22, 'Oliveros'),
(2075, 22, 'Palacios'),
(2076, 22, 'Pavón'),
(2077, 22, 'Pavón Arriba'),
(2078, 22, 'Pedro Gómez Cello'),
(2079, 22, 'Pérez'),
(2080, 22, 'Peyrano'),
(2081, 22, 'Piamonte'),
(2082, 22, 'Pilar'),
(2083, 22, 'Piñero'),
(2084, 22, 'Plaza Clucellas'),
(2085, 22, 'Portugalete'),
(2086, 22, 'Pozo Borrado'),
(2087, 22, 'Progreso'),
(2088, 22, 'Providencia'),
(2089, 22, 'Pte. Roca'),
(2090, 22, 'Pueblo Andino'),
(2091, 22, 'Pueblo Esther'),
(2092, 22, 'Pueblo Gral. San Martín'),
(2093, 22, 'Pueblo Irigoyen'),
(2094, 22, 'Pueblo Marini'),
(2095, 22, 'Pueblo Muñoz'),
(2096, 22, 'Pueblo Uranga'),
(2097, 22, 'Pujato'),
(2098, 22, 'Pujato N.'),
(2099, 22, 'Rafaela'),
(2100, 22, 'Ramayón'),
(2101, 22, 'Ramona'),
(2102, 22, 'Reconquista'),
(2103, 22, 'Recreo'),
(2104, 22, 'Ricardone'),
(2105, 22, 'Rivadavia'),
(2106, 22, 'Roldán'),
(2107, 22, 'Romang'),
(2108, 22, 'Rosario'),
(2109, 22, 'Rueda'),
(2110, 22, 'Rufino'),
(2111, 22, 'Sa Pereira'),
(2112, 22, 'Saguier'),
(2113, 22, 'Saladero M. Cabal'),
(2114, 22, 'Salto Grande'),
(2115, 22, 'San Agustín'),
(2116, 22, 'San Antonio de Obligado'),
(2117, 22, 'San Bernardo (N.J.)'),
(2118, 22, 'San Bernardo (S.J.)'),
(2119, 22, 'San Carlos Centro'),
(2120, 22, 'San Carlos N.'),
(2121, 22, 'San Carlos S.'),
(2122, 22, 'San Cristóbal'),
(2123, 22, 'San Eduardo'),
(2124, 22, 'San Eugenio'),
(2125, 22, 'San Fabián'),
(2126, 22, 'San Fco. de Santa Fé'),
(2127, 22, 'San Genaro'),
(2128, 22, 'San Genaro N.'),
(2129, 22, 'San Gregorio'),
(2130, 22, 'San Guillermo'),
(2131, 22, 'San Javier'),
(2132, 22, 'San Jerónimo del Sauce'),
(2133, 22, 'San Jerónimo N.'),
(2134, 22, 'San Jerónimo S.'),
(2135, 22, 'San Jorge'),
(2136, 22, 'San José de La Esquina'),
(2137, 22, 'San José del Rincón'),
(2138, 22, 'San Justo'),
(2139, 22, 'San Lorenzo'),
(2140, 22, 'San Mariano'),
(2141, 22, 'San Martín de Las Escobas'),
(2142, 22, 'San Martín N.'),
(2143, 22, 'San Vicente'),
(2144, 22, 'Sancti Spititu'),
(2145, 22, 'Sanford'),
(2146, 22, 'Santo Domingo'),
(2147, 22, 'Santo Tomé'),
(2148, 22, 'Santurce'),
(2149, 22, 'Sargento Cabral'),
(2150, 22, 'Sarmiento'),
(2151, 22, 'Sastre'),
(2152, 22, 'Sauce Viejo'),
(2153, 22, 'Serodino'),
(2154, 22, 'Silva'),
(2155, 22, 'Soldini'),
(2156, 22, 'Soledad'),
(2157, 22, 'Soutomayor'),
(2158, 22, 'Sta. Clara de Buena Vista'),
(2159, 22, 'Sta. Clara de Saguier'),
(2160, 22, 'Sta. Isabel'),
(2161, 22, 'Sta. Margarita'),
(2162, 22, 'Sta. Maria Centro'),
(2163, 22, 'Sta. María N.'),
(2164, 22, 'Sta. Rosa'),
(2165, 22, 'Sta. Teresa'),
(2166, 22, 'Suardi'),
(2167, 22, 'Sunchales'),
(2168, 22, 'Susana'),
(2169, 22, 'Tacuarendí'),
(2170, 22, 'Tacural'),
(2171, 22, 'Tartagal'),
(2172, 22, 'Teodelina'),
(2173, 22, 'Theobald'),
(2174, 22, 'Timbúes'),
(2175, 22, 'Toba'),
(2176, 22, 'Tortugas'),
(2177, 22, 'Tostado'),
(2178, 22, 'Totoras'),
(2179, 22, 'Traill'),
(2180, 22, 'Venado Tuerto'),
(2181, 22, 'Vera'),
(2182, 22, 'Vera y Pintado'),
(2183, 22, 'Videla'),
(2184, 22, 'Vila'),
(2185, 22, 'Villa Amelia'),
(2186, 22, 'Villa Ana'),
(2187, 22, 'Villa Cañas'),
(2188, 22, 'Villa Constitución'),
(2189, 22, 'Villa Eloísa'),
(2190, 22, 'Villa Gdor. Gálvez'),
(2191, 22, 'Villa Guillermina'),
(2192, 22, 'Villa Minetti'),
(2193, 22, 'Villa Mugueta'),
(2194, 22, 'Villa Ocampo'),
(2195, 22, 'Villa San José'),
(2196, 22, 'Villa Saralegui'),
(2197, 22, 'Villa Trinidad'),
(2198, 22, 'Villada'),
(2199, 22, 'Virginia'),
(2200, 22, 'Wheelwright'),
(2201, 22, 'Zavalla'),
(2202, 22, 'Zenón Pereira'),
(2203, 23, 'Añatuya'),
(2204, 23, 'Árraga'),
(2205, 23, 'Bandera'),
(2206, 23, 'Bandera Bajada'),
(2207, 23, 'Beltrán'),
(2208, 23, 'Brea Pozo'),
(2209, 23, 'Campo Gallo'),
(2210, 23, 'Capital'),
(2211, 23, 'Chilca Juliana'),
(2212, 23, 'Choya'),
(2213, 23, 'Clodomira'),
(2214, 23, 'Col. Alpina'),
(2215, 23, 'Col. Dora'),
(2216, 23, 'Col. El Simbolar Robles'),
(2217, 23, 'El Bobadal'),
(2218, 23, 'El Charco'),
(2219, 23, 'El Mojón'),
(2220, 23, 'Estación Atamisqui'),
(2221, 23, 'Estación Simbolar'),
(2222, 23, 'Fernández'),
(2223, 23, 'Fortín Inca'),
(2224, 23, 'Frías'),
(2225, 23, 'Garza'),
(2226, 23, 'Gramilla'),
(2227, 23, 'Guardia Escolta'),
(2228, 23, 'Herrera'),
(2229, 23, 'Icaño'),
(2230, 23, 'Ing. Forres'),
(2231, 23, 'La Banda'),
(2232, 23, 'La Cañada'),
(2233, 23, 'Laprida'),
(2234, 23, 'Lavalle'),
(2235, 23, 'Loreto'),
(2236, 23, 'Los Juríes'),
(2237, 23, 'Los Núñez'),
(2238, 23, 'Los Pirpintos'),
(2239, 23, 'Los Quiroga'),
(2240, 23, 'Los Telares'),
(2241, 23, 'Lugones'),
(2242, 23, 'Malbrán'),
(2243, 23, 'Matara'),
(2244, 23, 'Medellín'),
(2245, 23, 'Monte Quemado'),
(2246, 23, 'Nueva Esperanza'),
(2247, 23, 'Nueva Francia'),
(2248, 23, 'Palo Negro'),
(2249, 23, 'Pampa de Los Guanacos'),
(2250, 23, 'Pinto'),
(2251, 23, 'Pozo Hondo'),
(2252, 23, 'Quimilí'),
(2253, 23, 'Real Sayana'),
(2254, 23, 'Sachayoj'),
(2255, 23, 'San Pedro de Guasayán'),
(2256, 23, 'Selva'),
(2257, 23, 'Sol de Julio'),
(2258, 23, 'Sumampa'),
(2259, 23, 'Suncho Corral'),
(2260, 23, 'Taboada'),
(2261, 23, 'Tapso'),
(2262, 23, 'Termas de Rio Hondo'),
(2263, 23, 'Tintina'),
(2264, 23, 'Tomas Young'),
(2265, 23, 'Vilelas'),
(2266, 23, 'Villa Atamisqui'),
(2267, 23, 'Villa La Punta'),
(2268, 23, 'Villa Ojo de Agua'),
(2269, 23, 'Villa Río Hondo'),
(2270, 23, 'Villa Salavina'),
(2271, 23, 'Villa Unión'),
(2272, 23, 'Vilmer'),
(2273, 23, 'Weisburd'),
(2274, 24, 'Río Grande'),
(2275, 24, 'Tolhuin'),
(2276, 24, 'Ushuaia'),
(2277, 25, 'Acheral'),
(2278, 25, 'Agua Dulce'),
(2279, 25, 'Aguilares'),
(2280, 25, 'Alderetes'),
(2281, 25, 'Alpachiri'),
(2282, 25, 'Alto Verde'),
(2283, 25, 'Amaicha del Valle'),
(2284, 25, 'Amberes'),
(2285, 25, 'Ancajuli'),
(2286, 25, 'Arcadia'),
(2287, 25, 'Atahona'),
(2288, 25, 'Banda del Río Sali'),
(2289, 25, 'Bella Vista'),
(2290, 25, 'Buena Vista'),
(2291, 25, 'Burruyacú'),
(2292, 25, 'Capitán Cáceres'),
(2293, 25, 'Cevil Redondo'),
(2294, 25, 'Choromoro'),
(2295, 25, 'Ciudacita'),
(2296, 25, 'Colalao del Valle'),
(2297, 25, 'Colombres'),
(2298, 25, 'Concepción'),
(2299, 25, 'Delfín Gallo'),
(2300, 25, 'El Bracho'),
(2301, 25, 'El Cadillal'),
(2302, 25, 'El Cercado'),
(2303, 25, 'El Chañar'),
(2304, 25, 'El Manantial'),
(2305, 25, 'El Mojón'),
(2306, 25, 'El Mollar'),
(2307, 25, 'El Naranjito'),
(2308, 25, 'El Naranjo'),
(2309, 25, 'El Polear'),
(2310, 25, 'El Puestito'),
(2311, 25, 'El Sacrificio'),
(2312, 25, 'El Timbó'),
(2313, 25, 'Escaba'),
(2314, 25, 'Esquina'),
(2315, 25, 'Estación Aráoz'),
(2316, 25, 'Famaillá'),
(2317, 25, 'Gastone'),
(2318, 25, 'Gdor. Garmendia'),
(2319, 25, 'Gdor. Piedrabuena'),
(2320, 25, 'Graneros'),
(2321, 25, 'Huasa Pampa'),
(2322, 25, 'J. B. Alberdi'),
(2323, 25, 'La Cocha'),
(2324, 25, 'La Esperanza'),
(2325, 25, 'La Florida'),
(2326, 25, 'La Ramada'),
(2327, 25, 'La Trinidad'),
(2328, 25, 'Lamadrid'),
(2329, 25, 'Las Cejas'),
(2330, 25, 'Las Talas'),
(2331, 25, 'Las Talitas'),
(2332, 25, 'Los Bulacio'),
(2333, 25, 'Los Gómez'),
(2334, 25, 'Los Nogales'),
(2335, 25, 'Los Pereyra'),
(2336, 25, 'Los Pérez'),
(2337, 25, 'Los Puestos'),
(2338, 25, 'Los Ralos'),
(2339, 25, 'Los Sarmientos'),
(2340, 25, 'Los Sosa'),
(2341, 25, 'Lules'),
(2342, 25, 'M. García Fernández'),
(2343, 25, 'Manuela Pedraza'),
(2344, 25, 'Medinas'),
(2345, 25, 'Monte Bello'),
(2346, 25, 'Monteagudo'),
(2347, 25, 'Monteros'),
(2348, 25, 'Padre Monti'),
(2349, 25, 'Pampa Mayo'),
(2350, 25, 'Quilmes'),
(2351, 25, 'Raco'),
(2352, 25, 'Ranchillos'),
(2353, 25, 'Río Chico'),
(2354, 25, 'Río Colorado'),
(2355, 25, 'Río Seco'),
(2356, 25, 'Rumi Punco'),
(2357, 25, 'San Andrés'),
(2358, 25, 'San Felipe'),
(2359, 25, 'San Ignacio'),
(2360, 25, 'San Javier'),
(2361, 25, 'San José'),
(2362, 25, 'San Miguel de 25'),
(2363, 25, 'San Pedro'),
(2364, 25, 'San Pedro de Colalao'),
(2365, 25, 'Santa Rosa de Leales'),
(2366, 25, 'Sgto. Moya'),
(2367, 25, 'Siete de Abril'),
(2368, 25, 'Simoca'),
(2369, 25, 'Soldado Maldonado'),
(2370, 25, 'Sta. Ana'),
(2371, 25, 'Sta. Cruz'),
(2372, 25, 'Sta. Lucía'),
(2373, 25, 'Taco Ralo'),
(2374, 25, 'Tafí del Valle'),
(2375, 25, 'Tafí Viejo'),
(2376, 25, 'Tapia'),
(2377, 25, 'Teniente Berdina'),
(2378, 25, 'Trancas'),
(2379, 25, 'Villa Belgrano'),
(2380, 25, 'Villa Benjamín Araoz'),
(2381, 25, 'Villa Chiligasta'),
(2382, 25, 'Villa de Leales'),
(2383, 25, 'Villa Quinteros'),
(2384, 25, 'Yánima'),
(2385, 25, 'Yerba Buena'),
(2386, 3, 'CABA'),
(2387, 1, 'Mariano Moreno'),
(2388, 1, 'Yac. Loma de la Lata'),
(2389, 1, 'Yac. El Portón (BR)'),
(2390, 1, 'Pje. San Cabao'),
(2391, 3, 'La Matanza'),
(2392, 1, 'Pje. Xilca'),
(2393, 3, 'Tres Arroyos'),
(2394, 2, 'Barda del Medio'),
(2395, 2, 'Villa Manzano'),
(2396, 2, 'Guerrico'),
(2397, 2, 'Sargento Vidal'),
(2398, 2, 'San Isidro'),
(2399, 3, 'San Isidro'),
(2400, 2, 'El Cuy');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicacionsuministrada`
--

CREATE TABLE IF NOT EXISTS `medicacionsuministrada` (
  `idMedicacion` int(11) NOT NULL AUTO_INCREMENT,
  `FechaHora` datetime NOT NULL,
  `idInternacion` int(11) NOT NULL,
  `idEnfermero` int(11) NOT NULL,
  `Medicacion` varchar(150) NOT NULL,
  `Dosis` varchar(100) NOT NULL,
  `Observaciones` text,
  PRIMARY KEY (`idMedicacion`),
  KEY `idInternacion` (`idInternacion`),
  KEY `idEnfermero` (`idEnfermero`),
  KEY `idInternacion_2` (`idInternacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
  `idMenu` int(11) NOT NULL AUTO_INCREMENT,
  `Fecha` date NOT NULL,
  `Descripcion` text NOT NULL,
  `Precio` decimal(10,2) NOT NULL,
  PRIMARY KEY (`idMenu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `obrassociales`
--

CREATE TABLE IF NOT EXISTS `obrassociales` (
  `idObraSocial` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(100) NOT NULL,
  PRIMARY KEY (`idObraSocial`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacienteobrasocial`
--

CREATE TABLE IF NOT EXISTS `pacienteobrasocial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idPaciente` int(11) NOT NULL,
  `idObraSocial` int(11) NOT NULL,
  `NroAfiliado` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idPaciente` (`idPaciente`),
  KEY `idObraSocial` (`idObraSocial`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE IF NOT EXISTS `pacientes` (
  `idPaciente` int(11) NOT NULL AUTO_INCREMENT,
  `Apellido` varchar(50) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `DNI` int(11) NOT NULL,
  `idLocalidad` int(11) NOT NULL,
  `Direccion` varchar(200) NOT NULL,
  `FechaNac` date NOT NULL,
  `FechaAlta` date NOT NULL,
  `Email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idPaciente`),
  UNIQUE KEY `DNI` (`DNI`),
  KEY `idLocalidad` (`idLocalidad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partesalida`
--

CREATE TABLE IF NOT EXISTS `partesalida` (
  `idParte` int(11) NOT NULL AUTO_INCREMENT,
  `Fecha` int(11) NOT NULL,
  `idEmpleado` int(11) NOT NULL,
  PRIMARY KEY (`idParte`),
  KEY `idEmpleado` (`idEmpleado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidocompra`
--

CREATE TABLE IF NOT EXISTS `pedidocompra` (
  `idPedido` int(11) NOT NULL AUTO_INCREMENT,
  `Fecha` int(11) NOT NULL,
  `idProveedor` int(11) NOT NULL,
  PRIMARY KEY (`idPedido`),
  KEY `idProveedor` (`idProveedor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `practicasmedicas`
--

CREATE TABLE IF NOT EXISTS `practicasmedicas` (
  `idPractica` int(11) NOT NULL AUTO_INCREMENT,
  `idTipoPractica` int(11) NOT NULL,
  `FechaSolicitud` date NOT NULL,
  `FechaHoraRealizado` datetime NOT NULL,
  `idDoctor` int(11) NOT NULL,
  `idPaciente` int(11) NOT NULL,
  `Resultado` text NOT NULL,
  `idObraSocial` int(11) DEFAULT NULL,
  `Adjunto` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`idPractica`),
  KEY `idTipoPractica` (`idTipoPractica`),
  KEY `idDoctor` (`idDoctor`),
  KEY `idPaciente` (`idPaciente`),
  KEY `idObraSocial` (`idObraSocial`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE IF NOT EXISTS `proveedor` (
  `idProveedor` int(11) NOT NULL AUTO_INCREMENT,
  `RazonSocial` varchar(250) NOT NULL,
  `CUIT` varchar(13) NOT NULL,
  `Direccion` varchar(250) NOT NULL,
  `Telefono` varchar(50) NOT NULL,
  PRIMARY KEY (`idProveedor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincias`
--

CREATE TABLE IF NOT EXISTS `provincias` (
  `idProvincia` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(100) NOT NULL,
  PRIMARY KEY (`idProvincia`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Volcado de datos para la tabla `provincias`
--

INSERT INTO `provincias` (`idProvincia`, `Descripcion`) VALUES
(1, 'Neuquén'),
(2, 'Río Negro'),
(3, 'Buenos Aires'),
(6, 'Catamarca'),
(7, 'Chaco'),
(8, 'Chubut'),
(9, 'Córdoba'),
(10, 'Corrientes'),
(11, 'Entre Ríos'),
(12, 'Formosa'),
(13, 'Jujuy'),
(14, 'La Pampa'),
(15, 'La Rioja'),
(16, 'Mendoza'),
(17, 'Misiones'),
(18, 'Salta'),
(19, 'San Juan'),
(20, 'San Luis'),
(21, 'Santa Cruz'),
(22, 'Santa Fe'),
(23, 'Santiago del Estero'),
(24, 'Tierra del Fuego'),
(25, 'Tucumán');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE IF NOT EXISTS `reservas` (
  `idReserva` int(11) NOT NULL AUTO_INCREMENT,
  `Fecha` int(11) NOT NULL,
  `idMenu` int(11) NOT NULL,
  `idEmpleado` int(11) NOT NULL,
  `Retiro` tinyint(1) NOT NULL DEFAULT '0',
  `Observaciones` text,
  PRIMARY KEY (`idReserva`),
  KEY `idEmpleado` (`idEmpleado`),
  KEY `idMenu` (`idMenu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `revisionestecnicas`
--

CREATE TABLE IF NOT EXISTS `revisionestecnicas` (
  `idRevision` int(11) NOT NULL AUTO_INCREMENT,
  `Patente` varchar(6) NOT NULL,
  `Taller` varchar(50) NOT NULL,
  `FechaCarga` date NOT NULL,
  `FechaVigencia` date NOT NULL,
  `Observaciones` text,
  PRIMARY KEY (`idRevision`),
  KEY `Patente` (`Patente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Rol` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `Rol`) VALUES
(1, 'Administrativo'),
(2, 'Doctor'),
(3, 'Enfermero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sectores`
--

CREATE TABLE IF NOT EXISTS `sectores` (
  `idSector` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`idSector`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `segurosambulancias`
--

CREATE TABLE IF NOT EXISTS `segurosambulancias` (
  `idseguro` int(11) NOT NULL AUTO_INCREMENT,
  `Patente` varchar(6) NOT NULL,
  `NroPoliza` varchar(20) NOT NULL,
  `Aseguradora` varchar(50) NOT NULL,
  `FechaDesde` date NOT NULL,
  `FechaHasta` date NOT NULL,
  `ValorMensual` decimal(10,2) NOT NULL,
  PRIMARY KEY (`idseguro`),
  KEY `Patente` (`Patente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `idTag` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`idTag`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tagsarticulos`
--

CREATE TABLE IF NOT EXISTS `tagsarticulos` (
  `idArticulo` int(11) NOT NULL,
  `idTag` int(11) NOT NULL,
  PRIMARY KEY (`idArticulo`,`idTag`),
  KEY `idTag` (`idTag`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiposlicencias`
--

CREATE TABLE IF NOT EXISTS `tiposlicencias` (
  `idTipoLicencia` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(200) NOT NULL,
  `AntiguedadMinima` int(11) NOT NULL,
  PRIMARY KEY (`idTipoLicencia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipospracticas`
--

CREATE TABLE IF NOT EXISTS `tipospracticas` (
  `idTipoPractica` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(100) NOT NULL,
  PRIMARY KEY (`idTipoPractica`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turnos`
--

CREATE TABLE IF NOT EXISTS `turnos` (
  `idTurno` int(11) NOT NULL AUTO_INCREMENT,
  `FechaHora` datetime NOT NULL,
  `idDoctor` int(11) NOT NULL,
  `idPaciente` int(11) NOT NULL,
  `idObraSocial` int(11) NOT NULL,
  `Asistio` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idTurno`),
  KEY `idDoctor` (`idDoctor`),
  KEY `idPaciente` (`idPaciente`),
  KEY `idObraSocial` (`idObraSocial`),
  KEY `idObraSocial_2` (`idObraSocial`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Usuario` varchar(255) NOT NULL,
  `Clave` varchar(32) NOT NULL,
  `idRol` int(11) NOT NULL,
  `idEmpleado` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Usuario` (`Usuario`),
  KEY `idRol` (`idRol`),
  KEY `idEmpleado` (`idEmpleado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitasinternaciones`
--

CREATE TABLE IF NOT EXISTS `visitasinternaciones` (
  `idVisita` int(11) NOT NULL AUTO_INCREMENT,
  `idInternacion` int(11) NOT NULL,
  `FechaHora` int(11) NOT NULL,
  `idDoctor` int(11) NOT NULL,
  `EstadoPaciente` text NOT NULL,
  `Observaciones` text,
  PRIMARY KEY (`idVisita`),
  KEY `idDoctor` (`idDoctor`),
  KEY `idInternacion` (`idInternacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrativos`
--
ALTER TABLE `administrativos`
  ADD CONSTRAINT `administrativos_ibfk_1` FOREIGN KEY (`idSector`) REFERENCES `sectores` (`idSector`),
  ADD CONSTRAINT `administrativos_ibfk_2` FOREIGN KEY (`idEmpleado`) REFERENCES `empleados` (`idEmpleado`);

--
-- Filtros para la tabla `ambulancias`
--
ALTER TABLE `ambulancias`
  ADD CONSTRAINT `ambulancias_ibfk_1` FOREIGN KEY (`idEmpleado`) REFERENCES `empleados` (`idEmpleado`);

--
-- Filtros para la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD CONSTRAINT `articulos_ibfk_1` FOREIGN KEY (`idEstado`) REFERENCES `estadosarticulos` (`idestado`),
  ADD CONSTRAINT `articulos_ibfk_2` FOREIGN KEY (`idEmpleado`) REFERENCES `empleados` (`idEmpleado`);

--
-- Filtros para la tabla `capacitaciones`
--
ALTER TABLE `capacitaciones`
  ADD CONSTRAINT `capacitaciones_ibfk_1` FOREIGN KEY (`idCapacitador`) REFERENCES `capacitadores` (`idCapacitador`);

--
-- Filtros para la tabla `capacitacionesdoctores`
--
ALTER TABLE `capacitacionesdoctores`
  ADD CONSTRAINT `capacitacionesdoctores_ibfk_2` FOREIGN KEY (`idCapacitacion`) REFERENCES `capacitaciones` (`idCapacitacion`),
  ADD CONSTRAINT `capacitacionesdoctores_ibfk_1` FOREIGN KEY (`idDoctor`) REFERENCES `doctores` (`idDoctor`);

--
-- Filtros para la tabla `capacitadores`
--
ALTER TABLE `capacitadores`
  ADD CONSTRAINT `capacitadores_ibfk_2` FOREIGN KEY (`idEspecialidad`) REFERENCES `especialidades` (`idEspecialidad`),
  ADD CONSTRAINT `capacitadores_ibfk_1` FOREIGN KEY (`idEmpresaCapacitadora`) REFERENCES `empresascapacitadoras` (`idEmpresa`);

--
-- Filtros para la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD CONSTRAINT `consultas_ibfk_2` FOREIGN KEY (`idPaciente`) REFERENCES `pacientes` (`idPaciente`),
  ADD CONSTRAINT `consultas_ibfk_3` FOREIGN KEY (`idObraSocial`) REFERENCES `obrassociales` (`idObraSocial`),
  ADD CONSTRAINT `consultas_ibfk_4` FOREIGN KEY (`idDoctor`) REFERENCES `doctores` (`idDoctor`);

--
-- Filtros para la tabla `convenios`
--
ALTER TABLE `convenios`
  ADD CONSTRAINT `convenios_ibfk_1` FOREIGN KEY (`idObraSocial`) REFERENCES `obrassociales` (`idObraSocial`);

--
-- Filtros para la tabla `doctores`
--
ALTER TABLE `doctores`
  ADD CONSTRAINT `doctores_ibfk_1` FOREIGN KEY (`idDoctor`) REFERENCES `empleados` (`idEmpleado`),
  ADD CONSTRAINT `doctores_ibfk_2` FOREIGN KEY (`idEspecialidad`) REFERENCES `especialidades` (`idEspecialidad`);

--
-- Filtros para la tabla `enfermeros`
--
ALTER TABLE `enfermeros`
  ADD CONSTRAINT `enfermeros_ibfk_1` FOREIGN KEY (`idEnfermero`) REFERENCES `empleados` (`idEmpleado`),
  ADD CONSTRAINT `enfermeros_ibfk_2` FOREIGN KEY (`idEspecialidad`) REFERENCES `especialidades` (`idEspecialidad`);

--
-- Filtros para la tabla `horariosatencion`
--
ALTER TABLE `horariosatencion`
  ADD CONSTRAINT `horariosatencion_ibfk_1` FOREIGN KEY (`idDoctor`) REFERENCES `doctores` (`idDoctor`);

--
-- Filtros para la tabla `insumos`
--
ALTER TABLE `insumos`
  ADD CONSTRAINT `insumos_ibfk_1` FOREIGN KEY (`idProveedor`) REFERENCES `proveedor` (`idProveedor`);

--
-- Filtros para la tabla `internaciones`
--
ALTER TABLE `internaciones`
  ADD CONSTRAINT `internaciones_ibfk_1` FOREIGN KEY (`idPaciente`) REFERENCES `pacientes` (`idPaciente`),
  ADD CONSTRAINT `internaciones_ibfk_2` FOREIGN KEY (`idDoctor`) REFERENCES `doctores` (`idDoctor`);

--
-- Filtros para la tabla `itemspartesalida`
--
ALTER TABLE `itemspartesalida`
  ADD CONSTRAINT `itemspartesalida_ibfk_1` FOREIGN KEY (`idParte`) REFERENCES `partesalida` (`idParte`),
  ADD CONSTRAINT `itemspartesalida_ibfk_2` FOREIGN KEY (`idInsumo`) REFERENCES `insumos` (`idInsumo`);

--
-- Filtros para la tabla `itemspedidocompra`
--
ALTER TABLE `itemspedidocompra`
  ADD CONSTRAINT `itemspedidocompra_ibfk_1` FOREIGN KEY (`idPedido`) REFERENCES `pedidocompra` (`idPedido`),
  ADD CONSTRAINT `itemspedidocompra_ibfk_2` FOREIGN KEY (`idInsumo`) REFERENCES `insumos` (`idInsumo`);

--
-- Filtros para la tabla `licencias`
--
ALTER TABLE `licencias`
  ADD CONSTRAINT `licencias_ibfk_1` FOREIGN KEY (`idTipoLicencia`) REFERENCES `tiposlicencias` (`idTipoLicencia`),
  ADD CONSTRAINT `licencias_ibfk_2` FOREIGN KEY (`idEmpleado`) REFERENCES `empleados` (`idEmpleado`),
  ADD CONSTRAINT `licencias_ibfk_3` FOREIGN KEY (`idEstado`) REFERENCES `estadoslicencias` (`idEstado`);

--
-- Filtros para la tabla `liquidacionesobrasocial`
--
ALTER TABLE `liquidacionesobrasocial`
  ADD CONSTRAINT `liquidacionesobrasocial_ibfk_1` FOREIGN KEY (`idObraSocial`) REFERENCES `obrassociales` (`idObraSocial`);

--
-- Filtros para la tabla `liquidacionmensual`
--
ALTER TABLE `liquidacionmensual`
  ADD CONSTRAINT `liquidacionmensual_ibfk_1` FOREIGN KEY (`idEmpleado`) REFERENCES `empleados` (`idEmpleado`);

--
-- Filtros para la tabla `localidades`
--
ALTER TABLE `localidades`
  ADD CONSTRAINT `localidades_ibfk_1` FOREIGN KEY (`idProvincia`) REFERENCES `provincias` (`idProvincia`);

--
-- Filtros para la tabla `medicacionsuministrada`
--
ALTER TABLE `medicacionsuministrada`
  ADD CONSTRAINT `medicacionsuministrada_ibfk_1` FOREIGN KEY (`idInternacion`) REFERENCES `internaciones` (`idInternacion`),
  ADD CONSTRAINT `medicacionsuministrada_ibfk_2` FOREIGN KEY (`idEnfermero`) REFERENCES `enfermeros` (`idEnfermero`);

--
-- Filtros para la tabla `pacienteobrasocial`
--
ALTER TABLE `pacienteobrasocial`
  ADD CONSTRAINT `pacienteobrasocial_ibfk_1` FOREIGN KEY (`idPaciente`) REFERENCES `pacientes` (`idPaciente`),
  ADD CONSTRAINT `pacienteobrasocial_ibfk_2` FOREIGN KEY (`idObraSocial`) REFERENCES `obrassociales` (`idObraSocial`);

--
-- Filtros para la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD CONSTRAINT `pacientes_ibfk_1` FOREIGN KEY (`idLocalidad`) REFERENCES `localidades` (`idLocalidad`);

--
-- Filtros para la tabla `partesalida`
--
ALTER TABLE `partesalida`
  ADD CONSTRAINT `partesalida_ibfk_1` FOREIGN KEY (`idEmpleado`) REFERENCES `administrativos` (`idEmpleado`);

--
-- Filtros para la tabla `pedidocompra`
--
ALTER TABLE `pedidocompra`
  ADD CONSTRAINT `pedidocompra_ibfk_1` FOREIGN KEY (`idProveedor`) REFERENCES `proveedor` (`idProveedor`);

--
-- Filtros para la tabla `practicasmedicas`
--
ALTER TABLE `practicasmedicas`
  ADD CONSTRAINT `practicasmedicas_ibfk_1` FOREIGN KEY (`idTipoPractica`) REFERENCES `tipospracticas` (`idTipoPractica`),
  ADD CONSTRAINT `practicasmedicas_ibfk_3` FOREIGN KEY (`idPaciente`) REFERENCES `pacientes` (`idPaciente`),
  ADD CONSTRAINT `practicasmedicas_ibfk_4` FOREIGN KEY (`idDoctor`) REFERENCES `doctores` (`idDoctor`);

--
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `reservas_ibfk_1` FOREIGN KEY (`idMenu`) REFERENCES `menus` (`idMenu`),
  ADD CONSTRAINT `reservas_ibfk_2` FOREIGN KEY (`idEmpleado`) REFERENCES `empleados` (`idEmpleado`);

--
-- Filtros para la tabla `revisionestecnicas`
--
ALTER TABLE `revisionestecnicas`
  ADD CONSTRAINT `revisionestecnicas_ibfk_1` FOREIGN KEY (`Patente`) REFERENCES `ambulancias` (`Patente`);

--
-- Filtros para la tabla `segurosambulancias`
--
ALTER TABLE `segurosambulancias`
  ADD CONSTRAINT `segurosambulancias_ibfk_1` FOREIGN KEY (`Patente`) REFERENCES `ambulancias` (`Patente`);

--
-- Filtros para la tabla `tagsarticulos`
--
ALTER TABLE `tagsarticulos`
  ADD CONSTRAINT `tagsarticulos_ibfk_1` FOREIGN KEY (`idArticulo`) REFERENCES `articulos` (`idArticulo`),
  ADD CONSTRAINT `tagsarticulos_ibfk_2` FOREIGN KEY (`idTag`) REFERENCES `tags` (`idTag`);

--
-- Filtros para la tabla `turnos`
--
ALTER TABLE `turnos`
  ADD CONSTRAINT `turnos_ibfk_2` FOREIGN KEY (`idPaciente`) REFERENCES `pacientes` (`idPaciente`),
  ADD CONSTRAINT `turnos_ibfk_3` FOREIGN KEY (`idObraSocial`) REFERENCES `obrassociales` (`idObraSocial`),
  ADD CONSTRAINT `turnos_ibfk_4` FOREIGN KEY (`idDoctor`) REFERENCES `doctores` (`idDoctor`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`idRol`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`idEmpleado`) REFERENCES `empleados` (`idEmpleado`);

--
-- Filtros para la tabla `visitasinternaciones`
--
ALTER TABLE `visitasinternaciones`
  ADD CONSTRAINT `visitasinternaciones_ibfk_1` FOREIGN KEY (`idInternacion`) REFERENCES `internaciones` (`idInternacion`),
  ADD CONSTRAINT `visitasinternaciones_ibfk_2` FOREIGN KEY (`idDoctor`) REFERENCES `doctores` (`idDoctor`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
