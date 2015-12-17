-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-12-2015 a las 18:46:28
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `u866575402_ejerc`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `BorrarCliente`(IN `pid` BIGINT)
    NO SQL
Delete from cliente where id = pid$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertarCliente`(IN `pdni` BIGINT, IN `pfechanacimiento` DATE, IN `psexo` VARCHAR(1), IN `papeynom` VARCHAR(255), IN `pidprovincia` INT, IN `plocalidad` VARCHAR(255), IN `pdomicilio` VARCHAR(255), IN `ptcelular` VARCHAR(100), IN `pmail` VARCHAR(100), IN `ptfijo` VARCHAR(100), IN `pttrabajo` VARCHAR(100))
    NO SQL
INSERT into cliente 
(dni,fechanacimiento,sexo,apeynom,idprovincia,localidad,domicilio,tcelular,
 mail,tfijo,ttrabajo)
values 					                    
(pdni,pfechanacimiento,psexo,papeynom,pidprovincia,plocalidad,pdomicilio,
 ptcelular,pmail,ptfijo,pttrabajo)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ModificarCliente`(IN `pid` BIGINT, IN `pdni` BIGINT, IN `pfechanacimiento` DATE, IN `psexo` VARCHAR(1), IN `papeynom` VARCHAR(255), IN `pidprovincia` INT, IN `plocalidad` VARCHAR(255), IN `pdomicilio` VARCHAR(255), IN `ptcelular` VARCHAR(100), IN `pmail` VARCHAR(100), IN `ptfijo` VARCHAR(100), IN `pttrabajo` VARCHAR(100))
    NO SQL
UPDATE cliente set dni=pdni,fechanacimiento=pfechanacimiento,sexo=psexo,
apeynom=papeynom,idprovincia=pidprovincia,localidad=plocalidad,
domicilio=pdomicilio,tcelular=ptcelular,mail=pmail,
tfijo=ptfijo,ttrabajo=pttrabajo
WHERE id = pid$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `TraerTodosLosClientes`()
    NO SQL
select * from cliente order by dni$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `TraerUnCliente`(IN `pid` BIGINT)
    NO SQL
select * from cliente where id = pid$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `TraerUnClientePorDNI`(IN `pdni` BIGINT)
    NO SQL
select * from cliente where dni = pdni$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `TraerUsuarioRol`(IN `prol` VARCHAR(100))
    NO SQL
select * from usuario where rol= prol$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `id` bigint(20) NOT NULL,
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
  `ttrabajo` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `dni`, `fechanacimiento`, `sexo`, `apeynom`, `idprovincia`, `localidad`, `domicilio`, `tcelular`, `mail`, `tfijo`, `ttrabajo`) VALUES
(1, 24567890, '1927-02-25', 'F', 'Legrand, Mirtha', 21, 'Villa Cañas', 'Av. 50 41', '1543250987', 'chiquita@almuerzos.com', '4301-5434', '4301-4444'),
(2, 23444446, '1966-06-06', 'M', 'Mesa, Juan Carlos', 1, 'Avellaneda', 'Mitre 750', '1566666666', 'jcm@mesadenoticias.com', '4301-5434', '45678901'),
(3, 5678900, '1980-08-23', 'M', 'Tapia, Ricardo', 3, 'Resistencia', 'Rivadavia 413', '1543250987', 'rtapia@baticueva.com', '', ''),
(4, 21098765, '1984-05-11', 'M', 'Kent, Clark', 1, 'Bahia Blanca', 'San Martin 150', '1509871234', 'ckent@metropolis.com', '', ''),
(6, 23444445, '1960-04-01', 'M', 'Tinelli, Marcelo', 1, 'San Carlos de Bolívar', 'Ramon Carrillo 30', '', 'mtinelli@showmatch.com', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
  `id` bigint(20) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `preciounitario` double NOT NULL,
  `foto` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `descripcion`, `preciounitario`, `foto`) VALUES
(1, 'psncard10', 'Play Station Card de valor U$S 10', 100.5, 'psncard1020151116102224.jpg'),
(2, 'psncard20', 'Play Station Card de valor U$S 20', 200, 'psncard2020151116102212.jpg'),
(3, 'psncard30', 'Play Station Card de valor U$S 30', 350.67, 'psncard3020151116100118.jpg'),
(4, 'Jarron Ming 1', 'Jarron de la dinastía Ming original joya nunca taxi', 50000000, 'JarronMing120151115234936.jpg'),
(7, 'ps3', 'Play Station 3 500 gb', 5000, 'ps320151118215204.jpg'),
(10, 'Kindle Paperwhite', 'El e-reader más avanzado del mundo', 2200.55, 'KindlePaperwhite20151120045308.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincias`
--

CREATE TABLE IF NOT EXISTS `provincias` (
  `id` int(11) NOT NULL,
  `provincia` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
-- Estructura de tabla para la tabla `tblreseteopass`
--

CREATE TABLE IF NOT EXISTS `tblreseteopass` (
  `id` int(10) unsigned NOT NULL,
  `idusuario` bigint(20) unsigned NOT NULL,
  `mail` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` bigint(20) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `sexo` varchar(1) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `idprovincia` int(11) DEFAULT NULL,
  `localidad` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `domicilio` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fechaingreso` date NOT NULL,
  `mail` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `clave` varchar(64) COLLATE utf8_spanish2_ci NOT NULL,
  `foto` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `rol` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellido`, `sexo`, `idprovincia`, `localidad`, `domicilio`, `fechaingreso`, `mail`, `clave`, `foto`, `rol`) VALUES
(1, 'Roberto', 'Pesto', '', 0, '', '', '2015-10-05', 'usuario1@dominio.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '', 'supervisor'),
(2, 'Julio', 'Rizzio', '', 0, '', '', '2015-10-23', 'usuario2@dominio.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '', 'usuario'),
(3, 'Administrador', 'Telemarketer2015', NULL, NULL, NULL, NULL, '2015-11-18', 'mdf@gmail.com', '7baeb07bae30ad748b1c14b1b91c51c33960d13d', NULL, 'webmaster'),
(4, 'Juan', 'Rambo', NULL, NULL, NULL, NULL, '2015-11-19', 'usuario3@dominio.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL, 'usuario'),
(6, 'Bruce', 'Willis', NULL, NULL, NULL, NULL, '2015-11-20', 'usuario4@dominio.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL, 'usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE IF NOT EXISTS `venta` (
  `id` bigint(20) NOT NULL,
  `idproducto` bigint(20) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `formadepago` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fechaventa` date NOT NULL,
  `idcliente` bigint(20) NOT NULL,
  `idusuario` bigint(20) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`id`, `idproducto`, `cantidad`, `formadepago`, `fechaventa`, `idcliente`, `idusuario`) VALUES
(1, 3, 4, 'Otra forma de pago', '2015-10-27', 1, 1),
(2, 4, 2, 'Transferencia o depósito', '2015-10-27', 1, 2),
(3, 7, 1, 'Transferencia o depósito', '2015-11-05', 2, 1),
(4, 4, 2, 'Otra forma de pago', '2015-11-05', 3, 2),
(5, 3, 2, 'Otra forma de pago', '2015-11-19', 4, 2),
(8, 2, 3, 'Otra forma de pago', '2015-12-16', 6, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `provincias`
--
ALTER TABLE `provincias`
  ADD PRIMARY KEY (`id`), ADD KEY `id` (`id`);

--
-- Indices de la tabla `tblreseteopass`
--
ALTER TABLE `tblreseteopass`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `idusuario` (`idusuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `provincias`
--
ALTER TABLE `provincias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `tblreseteopass`
--
ALTER TABLE `tblreseteopass`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
