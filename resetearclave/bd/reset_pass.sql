-- Base de datos 'ejemplobd'
-- Estructura de tabla para la tabla `users`
--
CREATE TABLE IF NOT EXISTS `tblreseteopass` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
`idusuario` int(10) unsigned NOT NULL,
`username` varchar(15) NOT NULL,
`token` varchar(64) NOT NULL,
`creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
PRIMARY KEY (`id`),
UNIQUE KEY `idusuario` (`idusuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
 
--
-- Estructura de tabla para la tabla `users`
--
 
CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
`nombre` varchar(60) NOT NULL,
`username` varchar(15) NOT NULL,
`password` varchar(64) NOT NULL,
`email` varchar(70) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;