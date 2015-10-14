-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-10-2015 a las 04:25:04
-- Versión del servidor: 5.6.25
-- Versión de PHP: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `votacion`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `Borrarvoto`(IN `idd` INT)
    NO SQL
    DETERMINISTIC
DELETE FROM votos WHERE id = idd$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertarElvoto`(IN `doc` VARCHAR(100), IN `cand` VARCHAR(100), IN `prov` VARCHAR(100), IN `sex` VARCHAR(100), IN `loc` VARCHAR(100), IN `dire` VARCHAR(100))
    NO SQL
    DETERMINISTIC
INSERT INTO votos (dni, candidato, provincia, sexo, localidad, direccion) VALUES (doc, cand, prov, sex, loc, dire)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Modificarvoto`(IN `idd` INT, IN `cand` VARCHAR(100), IN `prov` VARCHAR(100), IN `sex` VARCHAR(100), IN `loc` VARCHAR(100), IN `dire` VARCHAR(100))
    NO SQL
    DETERMINISTIC
UPDATE votos set candidato = cand, provincia = prov, sexo = sex, localidad = loc, direccion = dire
WHERE id = idd$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `TraerTodoLosvotos`()
    NO SQL
    DETERMINISTIC
SELECT * FROM votos$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `TraerUnvoto`(IN `idd` INT)
    NO SQL
    DETERMINISTIC
SELECT * FROM votos WHERE id = idd$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `votos`
--

CREATE TABLE IF NOT EXISTS `votos` (
  `id` int(11) NOT NULL,
  `dni` varchar(40) NOT NULL,
  `candidato` varchar(40) NOT NULL,
  `sexo` varchar(40) NOT NULL,
  `provincia` varchar(100) NOT NULL,
  `localidad` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `votos`
--

INSERT INTO `votos` (`id`, `dni`, `candidato`, `sexo`, `provincia`, `localidad`, `direccion`) VALUES
(25, '32344323', 'Candidato1', 'M', 'Buenos Aires', 'Banfield', 'Cochabamba 102'),
(26, '32344322', 'Candidato2', 'F', 'Buenos Aires', 'Avellaneda', 'Av Mitre 750');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `votos`
--
ALTER TABLE `votos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `votos`
--
ALTER TABLE `votos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
