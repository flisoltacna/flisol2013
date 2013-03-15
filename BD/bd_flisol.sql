-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 15-03-2013 a las 22:22:03
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bd_flisol`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaciones`
--

CREATE TABLE IF NOT EXISTS `asignaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `encuesta_id` int(11) NOT NULL,
  `grupo_id` int(11) NOT NULL,
  `activo` tinyint(1) DEFAULT '0',
  `fecha_inicio` date DEFAULT NULL,
  `fecha_finalizacion` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_encuestas_has_encuestados_encuestas1_idx` (`encuesta_id`),
  KEY `fk_asignaciones_grupos1_idx` (`grupo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuestas`
--

CREATE TABLE IF NOT EXISTS `encuestas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `encuesta_titulo` varchar(120) DEFAULT NULL,
  `descripcion` text,
  `fecha_creacion` varchar(45) DEFAULT NULL,
  `usuario_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_encuestas_usuarios1` (`usuario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE IF NOT EXISTS `grupos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grupo_nombre` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscriptos`
--

CREATE TABLE IF NOT EXISTS `inscriptos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dni` tinyint(8) DEFAULT NULL,
  `nombres` varchar(120) NOT NULL,
  `apellidos` varchar(120) NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `organizacion` varchar(225) DEFAULT NULL,
  `fecha_registro` datetime DEFAULT NULL,
  `certificado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opciones`
--

CREATE TABLE IF NOT EXISTS `opciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `opcion_respuesta` varchar(45) DEFAULT NULL,
  `pregunta_id` int(11) NOT NULL,
  `votos` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_opciones_preguntas1_idx` (`pregunta_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE IF NOT EXISTS `preguntas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `formulacion_pregunta` varchar(225) DEFAULT NULL,
  `obligatoria` tinyint(1) DEFAULT NULL,
  `encuesta_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_preguntas_encuestas_idx` (`encuesta_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE IF NOT EXISTS `publicaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(120) NOT NULL,
  `descripcion` text,
  `imagen_portada` varchar(120) DEFAULT NULL,
  `fecha_registro` datetime DEFAULT NULL,
  `fecha_edicion` datetime DEFAULT NULL,
  `etiquetas` varchar(225) DEFAULT NULL,
  `usuario_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_publicaciones_usuarios1` (`usuario_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `publicaciones`
--

INSERT INTO `publicaciones` (`id`, `titulo`, `descripcion`, `imagen_portada`, `fecha_registro`, `fecha_edicion`, `etiquetas`, `usuario_id`) VALUES
(1, 'SOBRE FLISOL', '<h4>&iquest;Qu&eacute; es el FLISOL?</h4>\r\n\r\n<p>El Festival Latinoamericano de Instalaci&oacute;n de Software Libre (FLISoL) es el evento de difusi&oacute;n de Software Libre m&aacute;s grande en Latinoam&eacute;rica. Se realiza desde el a&ntilde;o 2005 y desde el 2008 se adopt&oacute; su realizaci&oacute;n el 4to S&aacute;bado de abril de cada a&ntilde;o. Su principal objetivo es promover el uso del software libre, dando a conocer al p&uacute;blico en general su filosof&iacute;a, alcances, avances y desarrollo. A tal fin, las diversas comunidades locales de software libre (en cada pa&iacute;s/ciudad/localidad), organizan simult&aacute;neamente eventos en los que se instala, de manera gratuita y totalmente legal, software libre en las computadoras que llevan los asistentes.</p>\r\n\r\n<h4>&iquest;Qui&eacute;nes lo organizan?</h4>\r\n\r\n<p>El evento esta siendo organizado principalmente por la Comunidad de Software Libre BASADRINUX, sin embargo todas las universidades, comunidades de software libre, particulares interesados en el tema, etc., se encuentran cordialmente invitados a organizar y a formar parte del evento.</p>\r\n\r\n<h4>&iquest;A qui&eacute;n est&aacute; dirigido?</h4>\r\n\r\n<p>El evento est&aacute; dirigido a todo tipo de p&uacute;blico: estudiantes, acad&eacute;micos, empresarios, trabajadores, funcionarios p&uacute;blicos, entusiastas y a cualquier persona interesada en el tema de software libre.</p>\r\n\r\n<h4>&iquest;Cu&aacute;nto cuesta?</h4>\r\n\r\n<p>La asistencia y la participaci&oacute;n al evento es totalmente libre y gratuita.</p>\r\n\r\n<h4>&iquest;Qu&eacute; puedo aprender en el evento?</h4>\r\n\r\n<ul>\r\n	<li>Conocer&aacute; que es el software libre.</li>\r\n	<li>Tendr&aacute; la oportunidad de instalar software libre en su computadora personal.</li>\r\n	<li>Conocer&aacute; sobre la filosof&iacute;a, cultura y organizaci&oacute;n alrededor del software libre.</li>\r\n	<li>Conocer&aacute; sobre modelos de negocios de software libre.</li>\r\n	<li>Conocer&aacute; alternativas libres al software privativo tradicional.</li>\r\n</ul>\r\n\r\n<h4>&iquest;Que actividades se llevar&aacute;n a cabo en el evento?</h4>\r\n\r\n<ul>\r\n	<li>Podr&aacute; obtener CD&rsquo;s y DVD&rsquo;s con software libre en los stands dedicados a las Distribuciones GNU/Linux y Software Libre m&aacute;s populares.</li>\r\n	<li>Espacios donde los visitantes podr&aacute;n acercarse con sus computadoras personales a instalar software libre.</li>\r\n	<li>Ponencias sobre temas y proyectos relacionados al software libre.</li>\r\n	<li>Mesa de juegos libres multijugador.</li>\r\n	<li>Rifas de art&iacute;culos promocionales.</li>\r\n</ul>\r\n', NULL, '2013-03-15 17:06:54', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `email` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `password`, `email`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', NULL);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asignaciones`
--
ALTER TABLE `asignaciones`
  ADD CONSTRAINT `fk_encuestas_has_encuestados_encuestas1` FOREIGN KEY (`encuesta_id`) REFERENCES `encuestas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_asignaciones_grupos1` FOREIGN KEY (`grupo_id`) REFERENCES `grupos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `encuestas`
--
ALTER TABLE `encuestas`
  ADD CONSTRAINT `fk_encuestas_usuarios1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `opciones`
--
ALTER TABLE `opciones`
  ADD CONSTRAINT `fk_opciones_preguntas1` FOREIGN KEY (`pregunta_id`) REFERENCES `preguntas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD CONSTRAINT `fk_preguntas_encuestas` FOREIGN KEY (`encuesta_id`) REFERENCES `encuestas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD CONSTRAINT `fk_publicaciones_usuarios1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
