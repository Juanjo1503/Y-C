-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-10-2024 a las 00:20:48
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbcafepuerto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tclientes`
--

CREATE TABLE `tclientes` (
  `nClienteID` int(11) NOT NULL,
  `cNombre` varchar(35) NOT NULL,
  `cApellido` varchar(35) NOT NULL,
  `cDocumento` varchar(10) NOT NULL,
  `cCelular` varchar(15) DEFAULT NULL,
  `dRegistro` date DEFAULT current_timestamp(),
  `lEstado` tinyint(4) DEFAULT 1,
  `nTipoID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tclientes`
--

INSERT INTO `tclientes` (`nClienteID`, `cNombre`, `cApellido`, `cDocumento`, `cCelular`, `dRegistro`, `lEstado`, `nTipoID`) VALUES
(1, 'Will', 'Duran', '1001', '3001234567', '2024-10-14', 1, 1),
(2, 'Oscar', 'Rojas', '1002', '3007654321', '2024-10-14', 1, 2),
(3, 'Mayra', 'Calderon', '1003', '3012345678', '2024-10-14', 1, 3),
(4, 'Angela', 'Caldero', '1004', '3023456789', '2024-10-14', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ttipocliente`
--

CREATE TABLE `ttipocliente` (
  `nTipoID` int(11) NOT NULL,
  `cTipo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ttipocliente`
--

INSERT INTO `ttipocliente` (`nTipoID`, `cTipo`) VALUES
(1, 'START'),
(2, 'VIP'),
(3, 'PLATINUM');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vclientes`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vclientes` (
`codigo` int(11)
,`nombre` varchar(35)
,`apellido` varchar(35)
,`documento` varchar(10)
,`celular` varchar(15)
,`estado` tinyint(4)
,`tipo` varchar(45)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vindicadores`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vindicadores` (
`clientes_activos` bigint(21)
,`clientes_retirados` bigint(21)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `vclientes`
--
DROP TABLE IF EXISTS `vclientes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vclientes`  AS SELECT `tclientes`.`nClienteID` AS `codigo`, `tclientes`.`cNombre` AS `nombre`, `tclientes`.`cApellido` AS `apellido`, `tclientes`.`cDocumento` AS `documento`, `tclientes`.`cCelular` AS `celular`, `tclientes`.`lEstado` AS `estado`, (select `ttipocliente`.`cTipo` from `ttipocliente` where `ttipocliente`.`nTipoID` = `tclientes`.`nTipoID`) AS `tipo` FROM `tclientes` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vindicadores`
--
DROP TABLE IF EXISTS `vindicadores`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vindicadores`  AS SELECT (select count(0) from `tclientes` where `tclientes`.`lEstado` = 1) AS `clientes_activos`, (select count(0) from `tclientes` where `tclientes`.`lEstado` = 0) AS `clientes_retirados` ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tclientes`
--
ALTER TABLE `tclientes`
  ADD PRIMARY KEY (`nClienteID`),
  ADD UNIQUE KEY `cDocumento` (`cDocumento`),
  ADD KEY `nTipoID` (`nTipoID`);

--
-- Indices de la tabla `ttipocliente`
--
ALTER TABLE `ttipocliente`
  ADD PRIMARY KEY (`nTipoID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tclientes`
--
ALTER TABLE `tclientes`
  MODIFY `nClienteID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `ttipocliente`
--
ALTER TABLE `ttipocliente`
  MODIFY `nTipoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tclientes`
--
ALTER TABLE `tclientes`
  ADD CONSTRAINT `tclientes_ibfk_1` FOREIGN KEY (`nTipoID`) REFERENCES `ttipocliente` (`nTipoID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
