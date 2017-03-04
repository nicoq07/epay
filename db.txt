-- phpMyAdmin SQL Dump
-- version 4.6.5.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 04-03-2017 a las 01:31:06
-- Versión del servidor: 5.6.34
-- Versión de PHP: 7.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `pay_db`
--
CREATE DATABASE IF NOT EXISTS `pay_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_spanish_ci;
USE `pay_db`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carteras`
--

CREATE TABLE `carteras` (
  `Id` int(11) NOT NULL,
  `descripcion` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `empresa_id` int(11) NOT NULL,
  `active` tinyint(4) DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deudas`
--

CREATE TABLE `deudas` (
  `Id` int(11) NOT NULL,
  `deudor_id` int(11) NOT NULL,
  `cartera_id` int(11) NOT NULL,
  `producto` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  `capital_inicial` decimal(30,2) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `numero_producto` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `total` decimal(30,2) DEFAULT NULL,
  `fecha_mora` datetime DEFAULT NULL,
  `dias_mora` int(10) UNSIGNED DEFAULT NULL,
  `estado_id` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deudas_gestiones`
--

CREATE TABLE `deudas_gestiones` (
  `Id` int(11) NOT NULL,
  `deuda_id` int(11) NOT NULL,
  `descripcion` text COLLATE latin1_spanish_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deudores`
--

CREATE TABLE `deudores` (
  `Id` int(11) NOT NULL,
  `calificacion` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `direccion` varchar(80) COLLATE latin1_spanish_ci NOT NULL,
  `dni` int(13) UNSIGNED NOT NULL,
  `nombre` varchar(80) COLLATE latin1_spanish_ci DEFAULT NULL,
  `provincia` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `localidad` varchar(40) COLLATE latin1_spanish_ci DEFAULT NULL,
  `laboral` varchar(30) COLLATE latin1_spanish_ci DEFAULT NULL,
  `cantidad` varchar(30) COLLATE latin1_spanish_ci DEFAULT NULL,
  `categoria` varchar(30) COLLATE latin1_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deudores_telefonos`
--

CREATE TABLE `deudores_telefonos` (
  `Id` int(11) NOT NULL,
  `deudor_id` int(11) NOT NULL,
  `telefono` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `descripcion` varchar(30) COLLATE latin1_spanish_ci DEFAULT 'secundario'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `Id` int(11) NOT NULL,
  `descripcion` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `cuit` varchar(30) COLLATE latin1_spanish_ci DEFAULT NULL,
  `direccion` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados_deudas`
--

CREATE TABLE `estados_deudas` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `Id` int(11) NOT NULL,
  `descripcion` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `comentario` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `password` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `nombre` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `apellido` varchar(50) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carteras`
--
ALTER TABLE `carteras`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `empresa_cartera_idx` (`empresa_id`);

--
-- Indices de la tabla `deudas`
--
ALTER TABLE `deudas`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `deudor_deuda_idx` (`deudor_id`),
  ADD KEY `cartera_deuda_idx` (`cartera_id`),
  ADD KEY `usuario_deuda` (`usuario_id`),
  ADD KEY `estados_deuda` (`estado_id`);

--
-- Indices de la tabla `deudas_gestiones`
--
ALTER TABLE `deudas_gestiones`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `deudas_gestiones` (`deuda_id`);

--
-- Indices de la tabla `deudores`
--
ALTER TABLE `deudores`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `dni` (`dni`);

--
-- Indices de la tabla `deudores_telefonos`
--
ALTER TABLE `deudores_telefonos`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `deudor_telefono` (`deudor_id`);

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `estados_deudas`
--
ALTER TABLE `estados_deudas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuarios_roles` (`role_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carteras`
--
ALTER TABLE `carteras`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `deudas`
--
ALTER TABLE `deudas`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=375;
--
-- AUTO_INCREMENT de la tabla `deudas_gestiones`
--
ALTER TABLE `deudas_gestiones`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `deudores`
--
ALTER TABLE `deudores`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=308;
--
-- AUTO_INCREMENT de la tabla `deudores_telefonos`
--
ALTER TABLE `deudores_telefonos`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=375;
--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `estados_deudas`
--
ALTER TABLE `estados_deudas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carteras`
--
ALTER TABLE `carteras`
  ADD CONSTRAINT `empresa_cartera` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `deudas`
--
ALTER TABLE `deudas`
  ADD CONSTRAINT `cartera_deuda` FOREIGN KEY (`cartera_id`) REFERENCES `carteras` (`Id`),
  ADD CONSTRAINT `deudor_deuda` FOREIGN KEY (`deudor_id`) REFERENCES `deudores` (`Id`),
  ADD CONSTRAINT `estados_deuda` FOREIGN KEY (`estado_id`) REFERENCES `estados_deudas` (`id`),
  ADD CONSTRAINT `usuario_deuda` FOREIGN KEY (`usuario_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `deudas_gestiones`
--
ALTER TABLE `deudas_gestiones`
  ADD CONSTRAINT `deudas_gestiones` FOREIGN KEY (`deuda_id`) REFERENCES `deudas` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `deudores_telefonos`
--
ALTER TABLE `deudores_telefonos`
  ADD CONSTRAINT `deudor_telefono` FOREIGN KEY (`deudor_id`) REFERENCES `deudores` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `usuarios_roles` FOREIGN KEY (`role_id`) REFERENCES `roles` (`Id`);
