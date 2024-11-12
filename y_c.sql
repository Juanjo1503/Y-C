-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-10-2024 a las 22:15:58
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `y&c`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `categoria_id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`categoria_id`, `nombre`, `descripcion`) VALUES
(1, 'HOMBRE', NULL),
(2, 'MUJER', NULL),
(3, 'NIÑO(A)', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `marca_id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`marca_id`, `nombre`) VALUES
(1, 'NIKE'),
(2, 'ADIDAS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `producto_id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(10,2) NOT NULL,
  `cantidad` int(11) DEFAULT 0,
  `categoria_id` int(11) DEFAULT NULL,
  `marca_id` int(11) DEFAULT NULL,
  `imagen_url` varchar(255) DEFAULT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`producto_id`, `nombre`, `descripcion`, `precio`, `cantidad`, `categoria_id`, `marca_id`, `imagen_url`, `fecha_creacion`) VALUES
(1, 'camiseta', 'camiseta oversize negra', 45000.00, 1, 1, 1, NULL, '2024-10-27 20:53:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ttipousuario`
--

CREATE TABLE `ttipousuario` (
  `nTipoID` int(11) NOT NULL,
  `uTipo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ttipousuario`
--

INSERT INTO `ttipousuario` (`nTipoID`, `uTipo`) VALUES
(1, 'Admin'),
(2, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tusuarios`
--

CREATE TABLE `tusuarios` (
  `nUsuarioID` int(11) NOT NULL,
  `uNombre` varchar(35) NOT NULL,
  `uApellido` varchar(35) NOT NULL,
  `uDocumento` varchar(10) NOT NULL,
  `uCelular` varchar(15) DEFAULT NULL,
  `dRegistro` date DEFAULT current_timestamp(),
  `lEstado` tinyint(4) DEFAULT 1,
  `nTipoID` int(11) NOT NULL,
  `uCorreo` varchar(50) NOT NULL,
  `uContrasena` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tusuarios`
--

INSERT INTO `tusuarios` (`nUsuarioID`, `uNombre`, `uApellido`, `uDocumento`, `uCelular`, `dRegistro`, `lEstado`, `nTipoID`, `uCorreo`, `uContrasena`) VALUES
(13, 'Laura', 'Villamizar', '9875632', '316565223', '2024-10-27', 0, 2, 'vale@gmail.com', '123465'),
(14, 'Juanjose', 'Villamizar', '1005162420', '3175587025', '2024-10-27', 1, 1, 'juanjo@gmail.com', '1503');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vproductos`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vproductos` (
`producto_id` int(11)
,`nombre_producto` varchar(100)
,`descripcion` text
,`precio` decimal(10,2)
,`cantidad_disponible` int(11)
,`categoria` varchar(50)
,`marca` varchar(50)
,`fecha_creacion` timestamp
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vusuarios`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vusuarios` (
`nUsuarioID` int(11)
,`uNombre` varchar(35)
,`uApellido` varchar(35)
,`uDocumento` varchar(10)
,`uCelular` varchar(15)
,`dRegistro` date
,`lEstado` tinyint(4)
,`nTipoID` int(11)
,`uCorreo` varchar(50)
,`uContrasena` varchar(50)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `vproductos`
--
DROP TABLE IF EXISTS `vproductos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vproductos`  AS SELECT `p`.`producto_id` AS `producto_id`, `p`.`nombre` AS `nombre_producto`, `p`.`descripcion` AS `descripcion`, `p`.`precio` AS `precio`, `p`.`cantidad` AS `cantidad_disponible`, `c`.`nombre` AS `categoria`, `m`.`nombre` AS `marca`, `p`.`fecha_creacion` AS `fecha_creacion` FROM ((`productos` `p` join `categorias` `c` on(`p`.`categoria_id` = `c`.`categoria_id`)) join `marcas` `m` on(`p`.`marca_id` = `m`.`marca_id`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vusuarios`
--
DROP TABLE IF EXISTS `vusuarios`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vusuarios`  AS SELECT `tusuarios`.`nUsuarioID` AS `nUsuarioID`, `tusuarios`.`uNombre` AS `uNombre`, `tusuarios`.`uApellido` AS `uApellido`, `tusuarios`.`uDocumento` AS `uDocumento`, `tusuarios`.`uCelular` AS `uCelular`, `tusuarios`.`dRegistro` AS `dRegistro`, `tusuarios`.`lEstado` AS `lEstado`, `tusuarios`.`nTipoID` AS `nTipoID`, `tusuarios`.`uCorreo` AS `uCorreo`, `tusuarios`.`uContrasena` AS `uContrasena` FROM `tusuarios` ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`categoria_id`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`marca_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`producto_id`),
  ADD KEY `categoria_id` (`categoria_id`),
  ADD KEY `marca_id` (`marca_id`);

--
-- Indices de la tabla `ttipousuario`
--
ALTER TABLE `ttipousuario`
  ADD PRIMARY KEY (`nTipoID`);

--
-- Indices de la tabla `tusuarios`
--
ALTER TABLE `tusuarios`
  ADD PRIMARY KEY (`nUsuarioID`),
  ADD UNIQUE KEY `uDocumento` (`uDocumento`),
  ADD KEY `nTipoID` (`nTipoID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `categoria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `marca_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `producto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ttipousuario`
--
ALTER TABLE `ttipousuario`
  MODIFY `nTipoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tusuarios`
--
ALTER TABLE `tusuarios`
  MODIFY `nUsuarioID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`categoria_id`),
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`marca_id`) REFERENCES `marcas` (`marca_id`);

--
-- Filtros para la tabla `tusuarios`
--
ALTER TABLE `tusuarios`
  ADD CONSTRAINT `tUsuarios_ibfk_1` FOREIGN KEY (`nTipoID`) REFERENCES `ttipousuario` (`nTipoID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
