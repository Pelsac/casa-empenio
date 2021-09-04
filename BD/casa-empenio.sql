-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-09-2021 a las 17:54:33
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `casa-empenio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `cedula` int(11) NOT NULL,
  `nombreC` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `celular` bigint(20) DEFAULT NULL,
  `correo` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `id_producto` int(11) NOT NULL,
  `cedula_cliente` int(11) NOT NULL,
  `total_productos` int(11) NOT NULL,
  `total_pagar` decimal(10,0) NOT NULL,
  `fecha` datetime NOT NULL,
  `detalle` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `cedula` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `celular` bigint(20) DEFAULT NULL,
  `correo` varchar(150) DEFAULT NULL,
  `domicilio` varchar(150) NOT NULL,
  `rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estanteria`
--

CREATE TABLE `estanteria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `capacidad_filas` int(11) DEFAULT NULL,
  `capacidad_columnas` int(11) DEFAULT NULL,
  `filas_ocupadas` int(11) NOT NULL,
  `columnas_ocupadas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estanteria`
--

INSERT INTO `estanteria` (`id`, `nombre`, `capacidad_filas`, `capacidad_columnas`, `filas_ocupadas`, `columnas_ocupadas`) VALUES
(1, 'Tecnologia ', 200, 200, 0, 0),
(2, 'Joyas', 200, 200, 0, 0),
(3, 'Ventas', 100, 100, 0, 0),
(4, 'Electrodoméstico', 200, 200, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago_empenio`
--

CREATE TABLE `pago_empenio` (
  `id` int(11) NOT NULL,
  `valor_pagado` decimal(10,0) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `cedula_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `valor_empenio` decimal(10,0) NOT NULL,
  `precio_venta` decimal(10,0) DEFAULT NULL,
  `estado` varchar(50) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `fecha_inicial` date NOT NULL,
  `fecha_final` date NOT NULL,
  `ubicacion_fila` int(11) NOT NULL,
  `ubicacion_columna` int(11) NOT NULL,
  `cedula_cliente` int(11) NOT NULL,
  `id_estanteria` int(11) NOT NULL,
  `cedula_empleado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `ultima_sesion` datetime DEFAULT NULL,
  `cedula_empleado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cedula`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`cedula_cliente`,`id_producto`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`cedula`);

--
-- Indices de la tabla `estanteria`
--
ALTER TABLE `estanteria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pago_empenio`
--
ALTER TABLE `pago_empenio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cedula_cliente` (`cedula_cliente`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cedula_cliente` (`cedula_cliente`),
  ADD KEY `id_estanteria` (`id_estanteria`),
  ADD KEY `cedula_empleado` (`cedula_empleado`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`username`),
  ADD KEY `cedula_empleado` (`cedula_empleado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pago_empenio`
--
ALTER TABLE `pago_empenio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pago_empenio`
--
ALTER TABLE `pago_empenio`
  ADD CONSTRAINT `pago_empenio_ibfk_1` FOREIGN KEY (`cedula_cliente`) REFERENCES `cliente` (`cedula`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`cedula_cliente`) REFERENCES `cliente` (`cedula`),
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`id_estanteria`) REFERENCES `estanteria` (`id`),
  ADD CONSTRAINT `producto_ibfk_3` FOREIGN KEY (`cedula_empleado`) REFERENCES `empleado` (`cedula`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`cedula_empleado`) REFERENCES `empleado` (`cedula`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
