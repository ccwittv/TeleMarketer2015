
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 04-11-2015 a las 18:27:00
-- Versión del servidor: 5.1.67
-- Versión de PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `u866575402_ejerc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `dni` bigint(20) NOT NULL,
  `fechanacimiento` date NOT NULL,
  `sexo` varchar(1) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `apeynom` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `idprovincia` int(11) NOT NULL,
  `localidad` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `domicilio` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `tcelular` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `mail` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `tfijo` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `ttrabajo` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `preciounitario` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `descripcion`, `preciounitario`) VALUES
(1, 'psncard10', 'Play Station Card de valor U$S 10', 100.5),
(2, 'psncard10', 'Play Station Card de valor U$S 20', 200),
(3, 'psncard30', 'Play Station Card de valor U$S 30', 350.67),
(4, 'Jarron Ming #1', 'Jarron de la dinastía Ming original joya nunca taxi', 50000000),
(5, 'pndKingston16', 'Pendrive Kingston 16 gb', 500);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincias`
--

CREATE TABLE IF NOT EXISTS `provincias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `provincia` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=25 ;

--
-- Volcado de datos para la tabla `provincias`
--

INSERT INTO `provincias` (`id`, `provincia`) VALUES
(1, 'Buenos Aires'),
(2, 'Catamarca'),
(3, 'Chaco'),
(4, 'Chubut'),
(5, 'Ciudad Autónoma de Buenos Aires'),
(6, 'Córdoba'),
(7, 'Corrientes'),
(8, 'Entre Ríos'),
(9, 'Formosa'),
(10, 'Jujuy'),
(11, 'La Pampa'),
(12, 'La Rioja'),
(13, 'Mendoza'),
(14, 'Misiones'),
(15, 'Neuquén'),
(16, 'Río Negro'),
(17, 'Salta'),
(18, 'San Juan'),
(19, 'San Luis'),
(20, 'Santa Cruz'),
(21, 'Santa Fe'),
(22, 'Santiago del Estero'),
(23, 'Tierra del Fuego, Antártida e Islas del Atlántico Sur'),
(24, 'Tucumán');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `sexo` varchar(1) COLLATE utf8_spanish2_ci NOT NULL,
  `idprovincia` int(11) NOT NULL,
  `localidad` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `domicilio` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `fechaingreso` date NOT NULL,
  `mail` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `clave` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `foto` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `rol` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellido`, `sexo`, `idprovincia`, `localidad`, `domicilio`, `fechaingreso`, `mail`, `clave`, `foto`, `rol`) VALUES
(1, 'Roberto', 'Pesto', '', 0, '', 'Infierno del Dante 678', '2015-10-05', 'robert_pest@averno.com', '123456', 'roberto_pesto_666666.jpg', 'supervisor'),
(2, 'vanesa', 'mane', '', 0, '', 'Av. de los Cesares', '2015-10-23', 'vanesa@rockmail.com', 'qwerty', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariosventas`
--

CREATE TABLE IF NOT EXISTS `usuariosventas` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `idusuario` bigint(20) NOT NULL,
  `idventa` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `usuariosventas`
--

INSERT INTO `usuariosventas` (`id`, `idusuario`, `idventa`) VALUES
(1, 1, 1),
(2, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE IF NOT EXISTS `venta` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `idproducto` bigint(20) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `formadepago` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fechaventa` date NOT NULL,
  `idcliente` bigint(20) NOT NULL,
  `provincia` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `localidad` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `domicilio` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sexo` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `dni` bigint(20) NOT NULL,
  `apeynom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefonocelular` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `correoelectronico` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `telefonofijo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `telefonotrabajo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`id`, `idproducto`, `cantidad`, `formadepago`, `fechaventa`, `idcliente`, `provincia`, `localidad`, `domicilio`, `sexo`, `dni`, `apeynom`, `telefonocelular`, `correoelectronico`, `telefonofijo`, `telefonotrabajo`) VALUES
(1, 3, 4, 'Otra forma de pago', '2015-10-27', 0, '1', 'Avellaneda', 'Mitre 750', 'F', 24567890, 'Legrand, Mirtha', '1543216789', 'chiquita@almuerzos.com', '43013333', '43014444'),
(2, 4, 2, 'Transferencia o depósito', '2015-10-27', 0, '17', 'San Lorenzo', 'Alvear 1049', 'M', 23444444, 'Concha del Rio, Nancy', '1543250987', 'concha@yahoo.com', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
