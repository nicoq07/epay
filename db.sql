-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-03-2017 a las 14:36:38
-- Versión del servidor: 5.7.9
-- Versión de PHP: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pay_db`
--
CREATE DATABASE IF NOT EXISTS `pay_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_spanish_ci;
USE `pay_db`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carteras`
--

DROP TABLE IF EXISTS `carteras`;
CREATE TABLE IF NOT EXISTS `carteras` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `empresa_id` int(11) NOT NULL,
  `active` tinyint(1) DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `empresa_cartera_idx` (`empresa_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `carteras`
--

INSERT INTO `carteras` (`Id`, `descripcion`, `empresa_id`, `active`, `created`, `modified`) VALUES
(8, 'Cartera Banco Hipotecario ', 5, 1, '2017-03-04 00:19:06', '2017-03-04 00:19:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deudas`
--

DROP TABLE IF EXISTS `deudas`;
CREATE TABLE IF NOT EXISTS `deudas` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `deudor_id` int(11) NOT NULL,
  `cartera_id` int(11) NOT NULL,
  `producto` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  `capital_inicial` decimal(30,2) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `numero_producto` varchar(80) COLLATE latin1_spanish_ci NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `total` decimal(30,2) DEFAULT NULL,
  `fecha_mora` datetime DEFAULT NULL,
  `dias_mora` int(10) UNSIGNED DEFAULT NULL,
  `estado_id` int(11) NOT NULL DEFAULT '1',
  `contactado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id`),
  KEY `deudor_deuda_idx` (`deudor_id`),
  KEY `cartera_deuda_idx` (`cartera_id`),
  KEY `usuario_deuda` (`usuario_id`),
  KEY `estados_deuda` (`estado_id`)
) ENGINE=InnoDB AUTO_INCREMENT=453 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `deudas`
--

INSERT INTO `deudas` (`Id`, `deudor_id`, `cartera_id`, `producto`, `active`, `capital_inicial`, `created`, `modified`, `numero_producto`, `usuario_id`, `total`, `fecha_mora`, `dias_mora`, `estado_id`, `contactado`) VALUES
(375, 308, 8, 'Prestamo Personal', 1, '1672.47', '2017-03-04 02:17:30', '2017-03-09 14:22:43', '5400368758', 4, '11868.08', '2011-10-05 12:00:00', 1947, 1, 1),
(376, 309, 8, 'Prestamo Personal', 1, '4373.17', '2017-03-04 02:17:30', '2017-03-07 20:59:10', '30255565', 5, '19160.94', '2011-05-11 12:00:00', 2094, 7, 1),
(377, 310, 8, 'Prestamo Personal', 1, '773.54', '2017-03-04 02:17:30', '2017-03-07 20:59:10', '130107754', 5, '3559.45', '2011-12-31 12:00:00', 1860, 1, 0),
(378, 311, 8, 'Prestamo Personal', 1, '779.14', '2017-03-04 02:17:30', '2017-03-07 20:59:11', '20448153', 5, '3662.80', '2011-10-11 12:00:00', 1941, 1, 0),
(379, 312, 8, 'Prestamo Personal', 1, '2420.75', '2017-03-04 02:17:30', '2017-03-07 20:59:11', '310083944', 5, '13625.07', '2011-01-11 12:00:00', 2214, 1, 0),
(380, 312, 8, 'Prestamo Personal', 1, '4556.85', '2017-03-04 02:17:30', '2017-03-07 20:59:11', '310088736', 5, '25635.34', '2011-01-11 12:00:00', 2214, 1, 0),
(381, 312, 8, 'Prestamo Personal', 1, '5835.62', '2017-03-04 02:17:30', '2017-03-07 20:59:11', '310096965', 5, '32842.52', '2011-01-11 12:00:00', 2214, 7, 1),
(382, 312, 8, 'Prestamo Personal', 1, '1160.92', '2017-03-04 02:17:30', '2017-03-07 20:59:11', '310097543', 5, '6535.28', '2011-01-11 12:00:00', 2214, 1, 0),
(383, 312, 8, 'Prestamo Personal', 1, '225.63', '2017-03-04 02:17:30', '2017-03-07 20:59:11', '310112012', 5, '1271.02', '2011-01-11 12:00:00', 2212, 8, 0),
(384, 313, 8, 'Prestamo Personal', 1, '346.44', '2017-03-04 02:17:30', '2017-03-07 20:59:11', '11049128', 5, '1661.25', '2010-10-09 12:00:00', 2308, 1, 0),
(385, 313, 8, 'Prestamo Personal', 1, '4953.93', '2017-03-04 02:17:30', '2017-03-07 20:59:11', '140551639', 5, '24037.68', '2010-10-09 12:00:00', 2275, 7, 1),
(386, 313, 8, 'Prestamo Personal', 1, '914.86', '2017-03-04 02:17:30', '2017-03-07 20:59:11', '141013938', 5, '4428.75', '2010-10-09 12:00:00', 2275, 1, 0),
(387, 314, 8, 'Prestamo Personal', 1, '2759.50', '2017-03-04 02:17:30', '2017-03-07 20:59:11', '130063241', 5, '13084.99', '2011-03-11 12:00:00', 2155, 1, 0),
(388, 314, 8, 'Prestamo Personal', 1, '3354.21', '2017-03-04 02:17:30', '2017-03-07 20:59:11', '130096078', 5, '16129.16', '2011-03-11 12:00:00', 2122, 1, 0),
(389, 314, 8, 'Prestamo Personal', 1, '1692.67', '2017-03-04 02:17:30', '2017-03-07 20:59:11', '130109013', 5, '8231.58', '2011-03-11 12:00:00', 2134, 1, 0),
(390, 315, 8, 'Prestamo Personal', 1, '528.14', '2017-03-04 02:17:30', '2017-03-07 20:59:11', '290181413', 5, '4100.58', '2009-10-11 12:00:00', 2671, 1, 0),
(391, 316, 8, 'Prestamo Personal', 1, '1668.96', '2017-03-04 02:17:30', '2017-03-07 20:59:11', '90148245', 5, '7529.45', '2010-09-04 12:00:00', 2336, 1, 0),
(392, 316, 8, 'Prestamo Personal', 1, '1581.33', '2017-03-04 02:17:30', '2017-03-07 20:59:11', '90156113', 5, '7086.43', '2010-09-04 12:00:00', 2336, 1, 0),
(393, 316, 8, 'Prestamo Personal', 1, '1508.72', '2017-03-04 02:17:30', '2017-03-07 20:59:11', '90158317', 5, '6783.37', '2010-09-04 12:00:00', 2336, 1, 0),
(394, 316, 8, 'Prestamo Personal', 1, '624.48', '2017-03-04 02:17:30', '2017-03-07 20:59:11', '90168893', 5, '2848.11', '2010-09-04 12:00:00', 2343, 1, 0),
(395, 316, 8, 'Prestamo Personal', 1, '785.52', '2017-03-04 02:17:30', '2017-03-04 02:17:30', '90172272', NULL, '3621.97', '2010-09-04 12:00:00', 2338, 1, 0),
(396, 316, 8, 'Prestamo Personal', 1, '516.82', '2017-03-04 02:17:30', '2017-03-04 02:17:30', '90172284', NULL, '2382.62', '2010-09-04 12:00:00', 2338, 1, 0),
(397, 317, 8, 'Prestamo Personal', 1, '560.55', '2017-03-04 02:17:30', '2017-03-04 02:17:30', '330105398', NULL, '3562.41', '2010-08-12 12:00:00', 2366, 1, 0),
(398, 318, 8, 'Prestamo Personal', 1, '14219.91', '2017-03-04 02:17:30', '2017-03-04 02:17:30', '90107928', NULL, '39801.25', '2010-12-31 12:00:00', 2183, 1, 0),
(399, 318, 8, 'Prestamo Personal', 1, '736.32', '2017-03-04 02:17:30', '2017-03-04 02:17:30', '90181522', NULL, '2104.83', '2010-12-31 12:00:00', 2225, 1, 0),
(400, 318, 8, 'Prestamo Personal', 1, '155.73', '2017-03-04 02:17:30', '2017-03-04 02:17:30', '90184794', NULL, '444.22', '2010-12-31 12:00:00', 2150, 1, 0),
(401, 319, 8, 'Prestamo Personal', 1, '23300.35', '2017-03-04 02:17:30', '2017-03-04 02:17:30', '140795479', NULL, '70840.04', '2009-08-11 12:00:00', 2732, 1, 0),
(402, 320, 8, 'Prestamo Personal', 1, '9411.36', '2017-03-04 02:17:30', '2017-03-04 02:17:30', '110039169', NULL, '29698.37', '2010-10-11 12:00:00', 2306, 1, 0),
(403, 320, 8, 'Prestamo Personal', 1, '319.51', '2017-03-04 02:17:30', '2017-03-04 02:17:30', '110059494', NULL, '1027.33', '2010-10-11 12:00:00', 2275, 1, 0),
(404, 320, 8, 'Prestamo Personal', 1, '4909.97', '2017-03-04 02:17:30', '2017-03-04 02:17:30', '110063017', NULL, '15375.71', '2010-10-11 12:00:00', 2306, 1, 0),
(405, 321, 8, 'Prestamo Personal', 1, '48375.88', '2017-03-04 02:17:30', '2017-03-04 02:17:30', '310135026', NULL, '23368.41', '2011-11-10 12:00:00', 1911, 1, 0),
(406, 322, 8, 'Prestamo Personal', 1, '3609.47', '2017-03-04 02:17:30', '2017-03-04 02:17:30', '3010254655', NULL, '22931.22', '2010-08-12 12:00:00', 2366, 1, 0),
(407, 323, 8, 'Prestamo Personal', 1, '16656.02', '2017-03-04 02:17:30', '2017-03-04 02:17:30', '140827260', NULL, '86686.82', '2010-02-11 12:00:00', 2548, 1, 0),
(408, 324, 8, 'Prestamo Personal', 1, '620.09', '2017-03-04 02:17:30', '2017-03-04 02:17:30', '11065861', NULL, '2676.63', '2010-12-01 12:00:00', 2255, 1, 0),
(409, 325, 8, 'Prestamo Personal', 1, '4834.32', '2017-03-04 02:17:30', '2017-03-04 02:17:30', '10812204', NULL, '21279.09', '2011-08-11 12:00:00', 1910, 1, 0),
(410, 325, 8, 'Prestamo Personal', 1, '7165.76', '2017-03-04 02:17:30', '2017-03-04 02:17:30', '10852137', NULL, '31493.43', '2011-08-11 12:00:00', 1971, 1, 0),
(411, 325, 8, 'Prestamo Personal', 1, '7009.10', '2017-03-04 02:17:30', '2017-03-04 02:17:30', '10898234', NULL, '30543.90', '2011-08-11 12:00:00', 2002, 1, 0),
(412, 325, 8, 'Prestamo Personal', 1, '189.80', '2017-03-04 02:17:30', '2017-03-04 02:17:30', '11156531', NULL, '828.31', '2011-08-11 12:00:00', 1918, 1, 0),
(413, 326, 8, 'Prestamo Personal', 1, '2434.29', '2017-03-04 02:17:30', '2017-03-04 02:17:30', '5400231242', NULL, '15157.76', '2010-09-05 12:00:00', 2342, 1, 0),
(414, 327, 8, 'Prestamo Personal', 1, '757.88', '2017-03-04 02:17:30', '2017-03-04 02:17:30', '5130031303', NULL, '5257.39', '2010-03-11 12:00:00', 2520, 1, 0),
(415, 328, 8, 'Prestamo Personal', 1, '1543.59', '2017-03-04 02:17:30', '2017-03-04 02:17:30', '10894654', NULL, '15503.51', '2009-11-11 12:00:00', 2640, 1, 0),
(416, 329, 8, 'Prestamo Personal', 1, '786.07', '2017-03-04 02:17:30', '2017-03-04 02:17:30', '160032159', NULL, '3485.20', '2011-11-11 12:00:00', 1910, 1, 0),
(417, 330, 8, 'Prestamo Personal', 1, '4822.23', '2017-03-04 02:17:30', '2017-03-04 02:17:30', '141161620', NULL, '30073.20', '2011-11-10 12:00:00', 1911, 1, 0),
(418, 331, 8, 'Prestamo Personal', 1, '4356.84', '2017-03-04 02:17:30', '2017-03-04 02:17:30', '140398609', NULL, '23714.10', '2010-07-11 12:00:00', 2398, 1, 0),
(419, 331, 8, 'Prestamo Personal', 1, '1656.89', '2017-03-04 02:17:30', '2017-03-04 02:17:30', '140965177', NULL, '9021.42', '2010-07-11 12:00:00', 2394, 1, 0),
(420, 332, 8, 'Prestamo Personal', 1, '18494.07', '2017-03-04 02:17:30', '2017-03-04 02:17:30', '310115222', NULL, '53824.98', '2012-02-01 12:00:00', 1818, 1, 0),
(421, 332, 8, 'Prestamo Personal', 1, '3978.27', '2017-03-04 02:17:30', '2017-03-04 02:17:30', '310140564', NULL, '11877.15', '2012-02-01 12:00:00', 1818, 1, 0),
(422, 332, 8, 'Prestamo Personal', 1, '209.02', '2017-03-04 02:17:30', '2017-03-04 02:17:30', '310142108', NULL, '623.97', '2012-02-01 12:00:00', 1828, 1, 0),
(423, 333, 8, 'Prestamo Personal', 1, '1600.45', '2017-03-04 02:17:30', '2017-03-04 02:17:30', '20548525', NULL, '10366.14', '2011-10-13 12:00:00', 1939, 1, 0),
(424, 334, 8, 'Prestamo Personal', 1, '8346.02', '2017-03-04 02:17:30', '2017-03-04 02:17:30', '7830026614', NULL, '36941.94', '2011-11-23 12:00:00', 1880, 1, 0),
(425, 334, 8, 'Prestamo Personal', 1, '674.11', '2017-03-04 02:17:30', '2017-03-04 02:17:30', '7830034922', NULL, '2983.35', '2011-11-23 12:00:00', 1876, 1, 0),
(426, 334, 8, 'Prestamo Personal', 1, '2063.47', '2017-03-04 02:17:30', '2017-03-04 02:17:30', '7830036396', NULL, '9199.48', '2011-11-23 12:00:00', 1898, 1, 0),
(427, 335, 8, 'Prestamo Personal', 1, '14362.12', '2017-03-04 02:17:30', '2017-03-04 02:17:30', '1002839313', NULL, '74926.14', '2011-07-16 12:00:00', 2028, 1, 0),
(428, 335, 8, 'Prestamo Personal', 1, '6449.92', '2017-03-04 02:17:30', '2017-03-04 02:17:30', '1002997634', NULL, '33645.80', '2011-07-16 12:00:00', 2028, 1, 0),
(429, 335, 8, 'Prestamo Personal', 1, '2457.03', '2017-03-04 02:17:30', '2017-03-04 02:17:30', '1003454421', NULL, '12815.26', '2011-07-16 12:00:00', 2017, 1, 0),
(430, 336, 8, 'Prestamo Personal', 1, '7756.46', '2017-03-04 02:17:30', '2017-03-04 02:17:30', '1001675174', NULL, '39787.06', '2010-05-11 12:00:00', 2459, 1, 0),
(431, 336, 8, 'Prestamo Personal', 1, '984.63', '2017-03-04 02:17:30', '2017-03-04 02:17:30', '1001822870', NULL, '5050.48', '2010-05-11 12:00:00', 2459, 1, 0),
(432, 336, 8, 'Prestamo Personal', 1, '363.15', '2017-03-04 02:17:30', '2017-03-04 02:17:30', '1002504190', NULL, '1852.58', '2010-05-11 12:00:00', 2459, 1, 0),
(433, 337, 8, 'Prestamo Personal', 1, '1338.45', '2017-03-04 02:17:30', '2017-03-04 02:17:30', '1001831053', NULL, '5545.85', '2010-12-08 12:00:00', 2245, 1, 0),
(434, 337, 8, 'Prestamo Personal', 1, '1226.12', '2017-03-04 02:17:30', '2017-03-04 02:17:30', '1003192853', NULL, '5175.10', '2010-12-08 12:00:00', 2248, 1, 0),
(435, 337, 8, 'Prestamo Personal', 1, '5806.08', '2017-03-04 02:17:30', '2017-03-04 02:17:30', '1490010275', NULL, '24132.29', '2010-12-08 12:00:00', 2245, 1, 0),
(436, 337, 8, 'Prestamo Personal', 1, '8809.73', '2017-03-04 02:17:30', '2017-03-04 02:17:30', '1490027759', NULL, '36493.58', '2010-12-08 12:00:00', 2245, 1, 0),
(437, 337, 8, 'Prestamo Personal', 1, '1790.15', '2017-03-04 02:17:30', '2017-03-04 02:17:30', '1490044666', NULL, '7579.84', '2010-12-08 12:00:00', 2233, 1, 0),
(438, 338, 8, 'Prestamo Personal', 1, '12812.18', '2017-03-04 02:17:30', '2017-03-04 02:17:30', '1003227402', NULL, '50014.82', '2011-11-11 12:00:00', 1910, 1, 0),
(439, 339, 8, 'Prestamo Personal', 1, '696.61', '2017-03-04 02:17:30', '2017-03-04 02:17:30', '1003164167', NULL, '8880.74', '2010-11-12 12:00:00', 2274, 1, 0),
(440, 340, 8, 'Prestamo Personal', 1, '808.56', '2017-03-04 02:17:30', '2017-03-04 02:17:30', '1003252287', NULL, '5162.36', '2011-02-03 12:00:00', 2191, 1, 0),
(441, 341, 8, 'Prestamo Personal', 1, '2528.84', '2017-03-04 02:17:30', '2017-03-04 02:17:30', '1002088146', NULL, '16585.15', '2010-05-11 12:00:00', 2459, 1, 0),
(442, 341, 8, 'Prestamo Personal', 1, '21539.99', '2017-03-04 02:17:30', '2017-03-04 02:17:30', '1040166253', NULL, '141599.24', '2010-05-11 12:00:00', 2428, 1, 0),
(443, 342, 8, 'Prestamo Personal', 1, '670.92', '2017-03-04 02:17:30', '2017-03-04 02:17:30', '1040238616', NULL, '4401.53', '2010-11-03 12:00:00', 2283, 1, 0),
(444, 343, 8, 'Prestamo Personal', 1, '7324.65', '2017-03-04 02:17:30', '2017-03-04 02:17:30', '202737', NULL, '12261.54', '2010-09-11 12:00:00', 2336, 1, 0),
(445, 344, 8, 'Prestamo Personal', 1, '4780.32', '2017-03-04 02:17:30', '2017-03-04 02:17:30', '1030336796', NULL, '18797.86', '2011-10-16 12:00:00', 1936, 1, 0),
(446, 345, 8, 'Prestamo Personal', 1, '51235.05', '2017-03-04 02:17:30', '2017-03-04 02:17:30', '1003087773', NULL, '278353.98', '2011-07-06 12:00:00', 2033, 1, 0),
(447, 345, 8, 'Prestamo Personal', 1, '637.03', '2017-03-04 02:17:30', '2017-03-04 02:17:30', '1003425573', NULL, '3450.40', '2011-07-06 12:00:00', 2038, 1, 0),
(448, 345, 8, 'Prestamo Personal', 1, '496.38', '2017-03-04 02:17:30', '2017-03-04 02:17:30', '1003462014', NULL, '2689.93', '2011-07-06 12:00:00', 2010, 1, 0),
(449, 346, 8, 'Prestamo Personal', 1, '2061.61', '2017-03-04 02:17:30', '2017-03-04 02:17:30', '1001802545', NULL, '9901.71', '2010-09-01 12:00:00', 2336, 1, 0),
(450, 346, 8, 'Prestamo Personal', 1, '13978.75', '2017-03-04 02:17:30', '2017-03-04 02:17:30', '1002050979', NULL, '66919.34', '2010-09-01 12:00:00', 2336, 1, 0),
(451, 346, 8, 'Prestamo Personal', 1, '5634.78', '2017-03-04 02:17:30', '2017-03-04 02:17:30', '1002262338', NULL, '27187.46', '2010-09-01 12:00:00', 2336, 1, 0),
(452, 346, 8, 'Prestamo Personal', 1, '1838.79', '2017-03-04 02:17:30', '2017-03-04 02:17:30', '1370091658', NULL, '8979.72', '2010-09-01 12:00:00', 2346, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deudas_gestiones`
--

DROP TABLE IF EXISTS `deudas_gestiones`;
CREATE TABLE IF NOT EXISTS `deudas_gestiones` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `deuda_id` int(11) NOT NULL,
  `descripcion` text COLLATE latin1_spanish_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `deudas_gestiones` (`deuda_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `deudas_gestiones`
--

INSERT INTO `deudas_gestiones` (`Id`, `deuda_id`, `descripcion`, `created`, `modified`) VALUES
(21, 375, 'no debería verse en Juan', '2017-03-09 14:23:07', '2017-03-09 14:23:07'),
(22, 376, 'este sí', '2017-03-09 14:23:46', '2017-03-09 14:23:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deudores`
--

DROP TABLE IF EXISTS `deudores`;
CREATE TABLE IF NOT EXISTS `deudores` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
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
  `categoria` varchar(30) COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `dni` (`dni`)
) ENGINE=InnoDB AUTO_INCREMENT=347 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `deudores`
--

INSERT INTO `deudores` (`Id`, `calificacion`, `active`, `created`, `modified`, `direccion`, `dni`, `nombre`, `provincia`, `localidad`, `laboral`, `cantidad`, `categoria`) VALUES
(308, '', 1, '2017-03-04 02:17:30', '2017-03-04 02:17:30', '1 ENTRE 31 Y PLAZA OLAZABAL 00261', 5383298, 'Juan Carlos Fernandez', 'BUENOS AIRES', 'LA PLATA', 'tiene laboral', 'tiene cantidad', 'tiene categoria'),
(309, '', 1, '2017-03-04 02:17:30', '2017-03-04 02:17:30', 'GRAL SAN MARTIN BO S ANTONIO 00000', 4644243, 'Clelia Scapini', 'MISIONES', 'LIBERTAD', NULL, NULL, NULL),
(310, '', 1, '2017-03-04 02:17:30', '2017-03-04 02:17:30', 'LA PAZ 00050', 13331793, 'Raquel Alicia Berman', 'MISIONES', 'ELDORADO', NULL, NULL, NULL),
(311, '', 1, '2017-03-04 02:17:30', '2017-03-04 02:17:30', 'AV SAN LUIS 00977', 20489666, 'Eleodoro Oscar Escobar', 'MISIONES', 'OBERA', NULL, NULL, NULL),
(312, '', 1, '2017-03-04 02:17:30', '2017-03-04 02:17:30', 'B RIVADAVIA 00431', 3562041, 'Rosa Benigna Jara', 'MISIONES', 'SAN IGNACIO', NULL, NULL, NULL),
(313, '', 1, '2017-03-04 02:17:30', '2017-03-04 02:17:30', '(B QUERENCIA)A NUÑEZ C DE VACA 04237', 4414245, 'Ramona Silva', 'MISIONES', 'POSADAS', NULL, NULL, NULL),
(314, '', 1, '2017-03-04 02:17:30', '2017-03-04 02:17:30', '9 DE JULIO 00015 00 0', 5465760, 'Nelida Elsa Sequeira', 'MISIONES', 'SAN PEDRO', NULL, NULL, NULL),
(315, '', 1, '2017-03-04 02:17:30', '2017-03-04 02:17:30', 'CH 149 EDIF 30 DTO B 00000 00 12', 5648419, 'Marta Maria Luisa Ruez', 'MISIONES', 'POSADAS', NULL, NULL, NULL),
(316, '', 1, '2017-03-04 02:17:30', '2017-03-04 02:17:30', 'ZONA PORTUARIA 00001', 7588064, 'Marino De Lima', 'MISIONES', 'PUERTO IGUAZU', NULL, NULL, NULL),
(317, '', 1, '2017-03-04 02:17:30', '2017-03-04 02:17:30', 'M OCAMPO Y C. DEL DESIERTO 00000 00 0', 8561107, 'Claudio Valentin Matto', 'CORRIENTES', 'GDOR I VIRASORO', NULL, NULL, NULL),
(318, '', 1, '2017-03-04 02:17:30', '2017-03-04 02:17:30', 'BARRIO 300 VIV. EDIF G1 00000 00 2', 10707642, 'Ramona Elvira Lopez', 'MISIONES', 'PUERTO IGUAZU', NULL, NULL, NULL),
(319, '', 1, '2017-03-04 02:17:30', '2017-03-04 02:17:30', 'CH 153 MZ A CASA 00001 0 0', 11313444, 'Victor Hugo Cardozo', 'MISIONES', 'POSADAS', NULL, NULL, NULL),
(320, '', 1, '2017-03-04 02:17:30', '2017-03-04 02:17:30', 'AV 9 DE JULIO 01445', 12416484, 'Felix Ricardo Sucesion De Zubrzycki', 'MISIONES', 'APOSTOLES', NULL, NULL, NULL),
(321, '', 1, '2017-03-04 02:17:30', '2017-03-04 02:17:30', 'PRES J FIGUEROA ALCORTA 00338', 12834126, 'Ema Magdalena Sucesion De Ribas', 'MISIONES', 'SAN IGNACIO', NULL, NULL, NULL),
(322, '', 1, '2017-03-04 02:17:30', '2017-03-04 02:17:30', 'CATAMARCA 00541', 14968832, 'Maria Gloria Danekilde', 'CORDOBA', 'COSQUIN', NULL, NULL, NULL),
(323, '', 1, '2017-03-04 02:17:30', '2017-03-04 02:17:30', 'CH 54 STA CRUZ Y LAVALLE 00000', 16442823, 'Juvencio Segovia', 'MISIONES', 'POSADAS', NULL, NULL, NULL),
(324, '', 1, '2017-03-04 02:17:30', '2017-03-04 02:17:30', '(B ÑU PORA)LINEO Y CATARATAS I 00000', 18283368, 'Elva Beatriz Aranda', 'MISIONES', 'GARUPA', NULL, NULL, NULL),
(325, '', 1, '2017-03-04 02:17:30', '2017-03-04 02:17:30', 'C COLON 01478', 20987099, 'Marta Isabel Kumeresky', 'MISIONES', 'POSADAS', NULL, NULL, NULL),
(326, '', 1, '2017-03-04 02:17:30', '2017-03-04 02:17:30', '(B V L HERMOSA)DIAG RIVADAVIA 05265', 25284155, 'Hector Fabian Vargas', 'BUENOS AIRES', 'JOSE L SUAREZ', NULL, NULL, NULL),
(327, '', 1, '2017-03-04 02:17:30', '2017-03-04 02:17:30', 'MURATURE 05393 00 0', 25706370, 'Daniel Esteban Gomez', 'BUENOS AIRES', 'LANUS', NULL, NULL, NULL),
(328, '', 1, '2017-03-04 02:17:30', '2017-03-04 02:17:30', '(B L PARAISOS) J HERNANDEZ 00000', 29830054, 'Jose Antonio Dominguez', 'MISIONES', 'POSADAS', NULL, NULL, NULL),
(329, '', 1, '2017-03-04 02:17:30', '2017-03-04 02:17:30', 'BO ESPERANZA 00000', 17786628, 'Ramon Salvador Claudino', 'MISIONES', 'CONCEP DE LA SA', NULL, NULL, NULL),
(330, '', 1, '2017-03-04 02:17:30', '2017-03-04 02:17:30', 'AV CHACABUCO 05918', 18592459, 'Pedro Rolando Quiroz', 'MISIONES', 'POSADAS', NULL, NULL, NULL),
(331, '', 1, '2017-03-04 02:17:30', '2017-03-04 02:17:30', 'B FATIMA MZ 69 00005', 18154786, 'Maria Antonia Felicita A Silvero', 'MISIONES', 'GARUPA', NULL, NULL, NULL),
(332, '', 1, '2017-03-04 02:17:30', '2017-03-04 02:17:30', 'URUNDAY 00000', 7540447, 'David Sucesion De Isaac', 'MISIONES', 'SANTA ANA', NULL, NULL, NULL),
(333, '', 1, '2017-03-04 02:17:30', '2017-03-04 02:17:30', 'CALLE 135 05264', 24239725, 'Gloria Raquel Parodi', 'MISIONES', 'POSADAS', NULL, NULL, NULL),
(334, '', 1, '2017-03-04 02:17:30', '2017-03-04 02:17:30', '(BO PQ T QUILM)ZEBALLOS 01859', 20806002, 'Gabriel Gunter Tetlaff', 'BUENOS AIRES', 'BERNAL OESTE', NULL, NULL, NULL),
(335, '', 1, '2017-03-04 02:17:30', '2017-03-04 02:17:30', 'CORDOBA 00255 2 B', 11136443, 'Gloria Gladis Paz', 'SALTA', 'SALTA', NULL, NULL, NULL),
(336, '', 1, '2017-03-04 02:17:30', '2017-03-04 02:17:30', '(B LIMACHE)CAP MENDEZ BL 00002 1 8', 11834714, 'Elva Del Valle Cañizares', 'SALTA', 'SALTA', NULL, NULL, NULL),
(337, '', 1, '2017-03-04 02:17:30', '2017-03-04 02:17:30', 'BO.VTE.SOLA MITRE 02213', 17196845, 'Monica Beatriz Maldonado', 'SALTA', 'SALTA', NULL, NULL, NULL),
(338, '', 1, '2017-03-04 02:17:30', '2017-03-04 02:17:30', '(B 9 DE JULIO)RECONQUISTA 00044', 18229220, 'Carlos Dionisio Contreras Calderon', 'SALTA', 'SALTA', NULL, NULL, NULL),
(339, '', 1, '2017-03-04 02:17:30', '2017-03-04 02:17:30', '20 DE FEBRERO 00830', 6344067, 'Elba Gladis Spezzi', 'SALTA', 'SALTA', NULL, NULL, NULL),
(340, '', 1, '2017-03-04 02:17:30', '2017-03-04 02:17:30', '(B G BELGRANO) ET 4 BLOCK 51 00000 2 5', 3689386, 'Olga Francisca Montenegro', 'SALTA', 'SALTA', NULL, NULL, NULL),
(341, '', 1, '2017-03-04 02:17:30', '2017-03-04 02:17:30', 'CAFAYATE 00101', 12295972, 'Mirta Del Valle Iturre', 'SALTA', 'R D LA FRONTERA', NULL, NULL, NULL),
(342, '', 1, '2017-03-04 02:17:30', '2017-03-04 02:17:30', 'MAHATMA GHANDI 00014 00', 18034432, 'Dante Raul Padilla', 'SALTA', 'R D LA FRONTERA', NULL, NULL, NULL),
(343, '', 1, '2017-03-04 02:17:30', '2017-03-04 02:17:30', 'MONTEVIDEO 00067 PB C', 5129721, 'Osvaldo Marcelino Niella', 'CAPITAL FEDERAL', 'CAPITAL FEDERAL', NULL, NULL, NULL),
(344, '', 1, '2017-03-04 02:17:30', '2017-03-04 02:17:30', 'C PELLEGRINI 00232', 5905827, 'Osmar Leguizamon', 'SALTA', 'S R LA NVA ORAN', NULL, NULL, NULL),
(345, '', 1, '2017-03-04 02:17:30', '2017-03-04 02:17:30', 'V MARIA ESTER LEZAMA 00501 00', 18131747, 'Loli Ruben Castro', 'SALTA', 'SALTA', NULL, NULL, NULL),
(346, '', 1, '2017-03-04 02:17:30', '2017-03-04 02:17:30', 'B LAMADRID PJ ARAMBURU 02949', 21792045, 'Elizabeth Socorro Flores', 'SALTA', 'SALTA', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deudores_telefonos`
--

DROP TABLE IF EXISTS `deudores_telefonos`;
CREATE TABLE IF NOT EXISTS `deudores_telefonos` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `deudor_id` int(11) NOT NULL,
  `telefono` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `descripcion` varchar(30) COLLATE latin1_spanish_ci DEFAULT 'secundario',
  PRIMARY KEY (`Id`),
  KEY `deudor_telefono` (`deudor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=488 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `deudores_telefonos`
--

INSERT INTO `deudores_telefonos` (`Id`, `deudor_id`, `telefono`, `descripcion`) VALUES
(375, 308, '2214241183', 'no viable'),
(376, 308, '49573071', 'secundario'),
(377, 308, '2214241183', 'de la prima'),
(378, 308, '2214241183', 'no viable'),
(379, 309, '3757496055', 'secundario'),
(380, 310, '3751420226', 'secundario'),
(381, 310, '375115449729', 'secundario'),
(382, 310, '3751420226', 'secundario'),
(383, 310, '3751420226', 'secundario'),
(384, 311, '3755407006', 'secundario'),
(385, 312, '3764470143', 'secundario'),
(386, 312, '3764470143', 'secundario'),
(387, 312, '3764470143', 'secundario'),
(388, 313, '3764467850', 'secundario'),
(389, 313, '3764467850', 'secundario'),
(390, 313, '3764467850', 'secundario'),
(391, 314, '3751470189', 'secundario'),
(392, 315, '3764466229', 'secundario'),
(393, 316, '3757421108', 'secundario'),
(394, 316, '3757421108', 'secundario'),
(395, 316, '3757421108', 'secundario'),
(396, 317, '375615611069', 'secundario'),
(397, 317, '375615611069', 'secundario'),
(398, 317, '375615611069', 'secundario'),
(399, 318, '3757421371', 'secundario'),
(400, 319, '3764592735', 'secundario'),
(401, 320, '3758422638', 'secundario'),
(402, 320, '376154578373', 'secundario'),
(403, 320, '3758422638', 'secundario'),
(404, 320, '3758422638', 'secundario'),
(405, 321, '3764470406', 'secundario'),
(406, 321, '376154608186', 'secundario'),
(407, 321, '3764470406', 'secundario'),
(408, 321, '3764470406', 'secundario'),
(409, 322, '354115612478', 'secundario'),
(410, 322, '354115612478', 'secundario'),
(411, 322, '354115612478', 'secundario'),
(412, 323, '376154608675', 'secundario'),
(413, 324, '376154519564', 'secundario'),
(414, 324, '376154274768', 'secundario'),
(415, 324, '376154519564', 'secundario'),
(416, 324, '376154519564', 'secundario'),
(417, 325, '375215276522', 'secundario'),
(418, 326, '1147392034', 'secundario'),
(419, 326, '1148194700', 'secundario'),
(420, 326, '1147392034', 'secundario'),
(421, 326, '1147392034', 'secundario'),
(422, 327, '1142629411', 'secundario'),
(423, 327, '111550232643', 'secundario'),
(424, 327, '1142629411', 'secundario'),
(425, 327, '1142629411', 'secundario'),
(426, 328, '376154739663', 'secundario'),
(427, 328, '3764428914', 'secundario'),
(428, 328, '376154739663', 'secundario'),
(429, 329, '3758470214', 'secundario'),
(430, 329, '3758470214', 'secundario'),
(431, 329, '3758470214', 'secundario'),
(432, 330, '376154355490', 'secundario'),
(433, 330, '3764433468', 'secundario'),
(434, 330, '376154355490', 'secundario'),
(435, 330, '376154355490', 'secundario'),
(436, 331, '376154238251', 'secundario'),
(437, 331, '376154238251', 'secundario'),
(438, 331, '376154238251', 'secundario'),
(439, 332, '3764497194', 'secundario'),
(440, 332, '376154679252', 'secundario'),
(441, 332, '3764497194', 'secundario'),
(442, 332, '3764497194', 'secundario'),
(443, 333, '376154641128', 'secundario'),
(444, 333, '376154641128', 'secundario'),
(445, 333, '376154641128', 'secundario'),
(446, 334, '347615642664', 'secundario'),
(447, 334, '3424541422', 'secundario'),
(448, 334, '347615642664', 'secundario'),
(449, 335, '3874316518', 'secundario'),
(450, 335, '387154685050', 'secundario'),
(451, 335, '3874316518', 'secundario'),
(452, 335, '3874316518', 'secundario'),
(453, 336, '387154743688', 'secundario'),
(454, 336, '387154566313', 'secundario'),
(455, 336, '3814362157', 'secundario'),
(456, 336, '387154743688', 'secundario'),
(457, 337, '3874320300', 'secundario'),
(458, 337, '3874320300', 'secundario'),
(459, 337, '3874320300', 'secundario'),
(460, 338, '3874285087', 'secundario'),
(461, 338, '3874285087', 'secundario'),
(462, 338, '3874285087', 'secundario'),
(463, 339, '3874321264', 'secundario'),
(464, 339, '3874321264', 'secundario'),
(465, 339, '3874321264', 'secundario'),
(466, 340, '3874257637', 'secundario'),
(467, 340, '3874257637', 'secundario'),
(468, 340, '3874257637', 'secundario'),
(469, 341, '3876482867', 'secundario'),
(470, 341, '3876482867', 'secundario'),
(471, 341, '3876483164', 'secundario'),
(472, 341, '3876482867', 'secundario'),
(473, 342, '3876482246', 'secundario'),
(474, 342, '3876482246', 'secundario'),
(475, 342, '3876482246', 'secundario'),
(476, 343, '1143720761', 'secundario'),
(477, 343, '1143720761', 'secundario'),
(478, 343, '1143720761', 'secundario'),
(479, 344, '3878425280', 'secundario'),
(480, 345, '3874234906', 'secundario'),
(481, 345, '387155925864', 'secundario'),
(482, 345, '387155957747', 'secundario'),
(483, 345, '3874234906', 'secundario'),
(484, 346, '3874393830', 'secundario'),
(485, 346, '111565906628', 'secundario'),
(486, 346, '387154849940', 'secundario'),
(487, 346, '3874393830', 'secundario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

DROP TABLE IF EXISTS `empresas`;
CREATE TABLE IF NOT EXISTS `empresas` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `cuit` varchar(30) COLLATE latin1_spanish_ci DEFAULT NULL,
  `direccion` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`Id`, `descripcion`, `created`, `modified`, `cuit`, `direccion`) VALUES
(5, 'Banco Hipotecario', '2017-03-04 00:18:51', '2017-03-04 00:18:51', '987654456', 'no tiene');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados_deudas`
--

DROP TABLE IF EXISTS `estados_deudas`;
CREATE TABLE IF NOT EXISTS `estados_deudas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `estados_deudas`
--

INSERT INTO `estados_deudas` (`id`, `descripcion`, `active`) VALUES
(1, 'Negociando', 1),
(2, 'Mensaje al Compañero', 1),
(3, 'Mensaje en Contestador', 1),
(4, 'Inubicable', 1),
(5, 'Incobrable', 1),
(6, 'Acuerdo de Pago', 1),
(7, 'Contactado', 1),
(8, 'No Contesta', 1),
(9, 'Mensaje a Tercero', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

DROP TABLE IF EXISTS `notificaciones`;
CREATE TABLE IF NOT EXISTS `notificaciones` (
  `id` int(11) NOT NULL,
  `descripcion` text COLLATE latin1_spanish_ci NOT NULL,
  `emisor` int(11) NOT NULL,
  `receptor` int(11) NOT NULL,
  `leida` tinyint(1) NOT NULL DEFAULT '0',
  `broadcast` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_emisor` (`emisor`),
  KEY `user_receptor` (`receptor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `comentario` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`Id`, `descripcion`, `comentario`) VALUES
(1, 'Administrador', 'Administrador total del sistema'),
(2, 'Operador', 'Rol para todos los operadores');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `data` blob,
  `expires` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `data`, `expires`) VALUES
('18s82etqu77dimus5ukk0k4bv7', 0x436f6e6669677c613a313a7b733a343a2274696d65223b693a313438393037303036383b7d417574687c613a313a7b733a343a2255736572223b613a353a7b733a323a226964223b693a333b733a363a226e6f6d627265223b733a373a224e69636f6c6173223b733a383a226170656c6c69646f223b733a373a22517569726f6761223b733a353a22656d61696c223b733a31353a2261646d696e4061646d696e2e636f6d223b733a373a22726f6c655f6964223b693a313b7d7d466c6173687c613a303a7b7d, 1489071508),
('u8jpdajmto6ri4s85sbad05pu2', 0x436f6e6669677c613a313a7b733a343a2274696d65223b693a313438393037303038333b7d417574687c613a313a7b733a343a2255736572223b613a353a7b733a323a226964223b693a353b733a363a226e6f6d627265223b733a343a224a75616e223b733a383a226170656c6c69646f223b733a393a22416c7175697472616e223b733a353a22656d61696c223b733a373a226a40612e636f6d223b733a373a22726f6c655f6964223b693a323b7d7d, 1489071523);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `password` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `nombre` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `apellido` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `usuarios_roles` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role_id`, `created`, `modified`, `active`, `nombre`, `apellido`) VALUES
(3, 'admin@admin.com', '$2y$10$UMn730bRb2zYzt3PNFBgne2nD2i93z0CYndSXf47HQGL1ufqp7xoW', 1, '2017-02-12 18:49:10', '2017-02-12 18:49:10', 1, 'Nicolas', 'Quiroga'),
(4, 'n@gmail.com', '$2y$10$qiaixY4xOsV5Q2/8.ydGNua503T5fAi2XGmKDqqbnoSWwCTY5L6g6', 2, '2017-02-12 19:43:12', '2017-02-12 19:43:12', 1, 'Pichi', 'Sin Permisos'),
(5, 'j@a.com', '$2y$10$ImsFUgALOMRyPB0FSKqaN.hVt/fL2cQCWhXsRzZXAMhfiT0zXzhBG', 2, '2017-02-14 01:36:04', '2017-02-14 01:36:04', 1, 'Juan', 'Alquitran');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_login`
--

DROP TABLE IF EXISTS `user_login`;
CREATE TABLE IF NOT EXISTS `user_login` (
  `user_id` int(14) NOT NULL,
  `fecha_activo` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

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
-- Filtros para la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD CONSTRAINT `user_emisor` FOREIGN KEY (`emisor`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_receptor` FOREIGN KEY (`receptor`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `usuarios_roles` FOREIGN KEY (`role_id`) REFERENCES `roles` (`Id`);

--
-- Filtros para la tabla `user_login`
--
ALTER TABLE `user_login`
  ADD CONSTRAINT `user_login` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
