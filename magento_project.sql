-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-10-2017 a las 00:10:23
-- Versión del servidor: 10.1.9-MariaDB
-- Versión de PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `magento_project`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `codigo` bigint(250) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `cedula` bigint(150) NOT NULL,
  `profesion` varchar(250) DEFAULT NULL,
  `empresa` varchar(250) DEFAULT NULL,
  `direccion` varchar(250) DEFAULT NULL,
  `barrio` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `telefono` bigint(150) DEFAULT NULL,
  `celular` bigint(150) DEFAULT NULL,
  `fechaNacimiento` int(10) DEFAULT '11',
  `fechaCumple` date DEFAULT '1990-01-01',
  `nohijos` int(10) NOT NULL,
  `sucursal` int(5) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `habeasData` int(10) DEFAULT '0',
  `clubVino` int(10) DEFAULT '0',
  `avvillas` int(10) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`codigo`, `nombre`, `cedula`, `profesion`, `empresa`, `direccion`, `barrio`, `email`, `telefono`, `celular`, `fechaNacimiento`, `fechaCumple`, `nohijos`, `sucursal`, `sexo`, `habeasData`, `clubVino`, `avvillas`) VALUES
(0, 'Super usuario', 2121212, 'Administrador', 'Mercaldas', 'Calle 5ta', 'Algun barrio', 'administrador@hotmail.com', 8880000, 3100000000000, 11, '1990-01-01', 0, 0, 'i', 1, 0, 0),
(0, 'jhon', 8787878, 'Desarrollador', 'Asweb', 'Calle 5ta', 'Sans ebastian ', 'asdasd@hotmail.com', 8887878, 321252525, 1512, '1995-12-15', 0, 15, 'm', 0, 0, 0),
(200000000001212, 'Edisson', 1053841381, 'Desarrollador', 'asweb', 'Calle 48 g2 # 1c - 35', 'San sebastian', 'ebedoya@misena.edu.co', 8852525, 3186168519, 153, '1995-03-15', 0, 0, 'm', 1, 0, 0),
(0, 'Camilo', 10538475151, 'DiseÃ±ador', 'Asweb', 'Calle 6ta', 'Estambul', 'camilo@hotmail.com', 8877878, 3215478989, 11, '1990-01-01', 2, 50, 'm', 1, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientesnuevos`
--

CREATE TABLE `clientesnuevos` (
  `cedula` bigint(150) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `fecha` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientesnuevos`
--

INSERT INTO `clientesnuevos` (`cedula`, `nombre`, `fecha`) VALUES
(10538475151, 'Camilo', 'October 11, 2017, 11:24 pm');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `codArticulo` bigint(150) NOT NULL,
  `nombreArticulo` varchar(250) NOT NULL,
  `proveedor` bigint(150) NOT NULL,
  `vlrNeto` bigint(250) NOT NULL,
  `nombreSeccionCategoria` varchar(250) NOT NULL,
  `nombreTipoSubcategoria` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntos`
--

CREATE TABLE `puntos` (
  `codigo` bigint(150) NOT NULL,
  `cedula` bigint(250) NOT NULL,
  `puntos` bigint(150) DEFAULT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `puntos`
--

INSERT INTO `puntos` (`codigo`, `cedula`, `puntos`, `fecha`) VALUES
(200000000001212, 1053841381, 2000, '2017-10-05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_venta` bigint(20) NOT NULL,
  `cliente` bigint(150) NOT NULL,
  `factura` bigint(250) NOT NULL,
  `codArticulo` bigint(250) NOT NULL,
  `nombreArticulo` varchar(250) NOT NULL,
  `proveedor` bigint(100) NOT NULL,
  `cantidad` decimal(10,0) NOT NULL,
  `vlrBruto` int(20) NOT NULL,
  `porcentajeDcto` decimal(10,0) NOT NULL,
  `valorDcto` decimal(10,0) NOT NULL,
  `porcentajeIva` decimal(10,0) NOT NULL,
  `vlrIva` int(10) NOT NULL,
  `vlrNeto` bigint(150) NOT NULL,
  `fecha` bigint(100) NOT NULL,
  `hora` varchar(20) NOT NULL,
  `caja` int(5) NOT NULL,
  `sucursal` int(5) NOT NULL,
  `nombreSucursal` varchar(250) NOT NULL,
  `seccion` int(10) NOT NULL,
  `nombreSeccion` varchar(250) NOT NULL,
  `tipoProducto` int(10) NOT NULL,
  `nombreTipo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`cedula`);

--
-- Indices de la tabla `clientesnuevos`
--
ALTER TABLE `clientesnuevos`
  ADD PRIMARY KEY (`cedula`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`codArticulo`);

--
-- Indices de la tabla `puntos`
--
ALTER TABLE `puntos`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_venta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_venta` bigint(20) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
