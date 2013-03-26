-- Adminer 3.6.3 MySQL dump

SET NAMES utf8;
SET foreign_key_checks = 0;
SET time_zone = 'SYSTEM';
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `asignaciones`;
CREATE TABLE `asignaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `encuesta_id` int(11) NOT NULL,
  `grupo_id` int(11) NOT NULL,
  `activo` tinyint(1) DEFAULT '0',
  `fecha_inicio` date DEFAULT NULL,
  `fecha_finalizacion` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_encuestas_has_encuestados_encuestas1_idx` (`encuesta_id`),
  KEY `fk_asignaciones_grupos1_idx` (`grupo_id`),
  CONSTRAINT `fk_encuestas_has_encuestados_encuestas1` FOREIGN KEY (`encuesta_id`) REFERENCES `encuestas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_asignaciones_grupos1` FOREIGN KEY (`grupo_id`) REFERENCES `grupos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `encuestas`;
CREATE TABLE `encuestas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `encuesta_titulo` varchar(120) DEFAULT NULL,
  `descripcion` text,
  `fecha_creacion` varchar(45) DEFAULT NULL,
  `usuario_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_encuestas_usuarios1` (`usuario_id`),
  CONSTRAINT `fk_encuestas_usuarios1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `grupos`;
CREATE TABLE `grupos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grupo_nombre` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `inscriptos`;
CREATE TABLE `inscriptos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dni` varchar(8) DEFAULT NULL,
  `nombres` varchar(120) NOT NULL,
  `apellidos` varchar(120) NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `organizacion` varchar(225) DEFAULT NULL,
  `fecha_registro` datetime DEFAULT NULL,
  `certificado` tinyint(1) DEFAULT NULL COMMENT '0 -> no quiere certificado\n1 -> con certificado',
  `asistencia` tinyint(1) DEFAULT NULL COMMENT '0 -> no asistio\n1->asistio al evento',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `opciones`;
CREATE TABLE `opciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `opcion_respuesta` varchar(45) DEFAULT NULL,
  `pregunta_id` int(11) NOT NULL,
  `votos` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_opciones_preguntas1_idx` (`pregunta_id`),
  CONSTRAINT `fk_opciones_preguntas1` FOREIGN KEY (`pregunta_id`) REFERENCES `preguntas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `preguntas`;
CREATE TABLE `preguntas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `formulacion_pregunta` varchar(225) DEFAULT NULL,
  `obligatoria` tinyint(1) DEFAULT NULL,
  `encuesta_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_preguntas_encuestas_idx` (`encuesta_id`),
  CONSTRAINT `fk_preguntas_encuestas` FOREIGN KEY (`encuesta_id`) REFERENCES `encuestas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `publicaciones`;
CREATE TABLE `publicaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(120) NOT NULL,
  `descripcion` text,
  `imagen_portada` varchar(120) DEFAULT NULL,
  `fecha_registro` datetime DEFAULT NULL,
  `fecha_edicion` datetime DEFAULT NULL,
  `etiquetas` varchar(225) DEFAULT NULL,
  `usuario_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_publicaciones_usuarios1` (`usuario_id`),
  CONSTRAINT `fk_publicaciones_usuarios1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `publicaciones` (`id`, `titulo`, `descripcion`, `imagen_portada`, `fecha_registro`, `fecha_edicion`, `etiquetas`, `usuario_id`) VALUES
(1,	'SOBRE FLISOL',	'<h4>&iquest;Qu&eacute; es el FLISOL?</h4>\r\n\r\n<p>El Festival Latinoamericano de Instalaci&oacute;n de Software Libre (FLISoL) es el evento de difusi&oacute;n de Software Libre m&aacute;s grande en Latinoam&eacute;rica. Se realiza desde el a&ntilde;o 2005 y desde el 2008 se adopt&oacute; su realizaci&oacute;n el 4to S&aacute;bado de abril de cada a&ntilde;o. Su principal objetivo es promover el uso del software libre, dando a conocer al p&uacute;blico en general su filosof&iacute;a, alcances, avances y desarrollo. A tal fin, las diversas comunidades locales de software libre (en cada pa&iacute;s/ciudad/localidad), organizan simult&aacute;neamente eventos en los que se instala, de manera gratuita y totalmente legal, software libre en las computadoras que llevan los asistentes.</p>\r\n\r\n<h4>&iquest;Qui&eacute;nes lo organizan?</h4>\r\n\r\n<p>El evento esta siendo organizado principalmente por la Comunidad de Software Libre BASADRINUX, sin embargo todas las universidades, comunidades de software libre, particulares interesados en el tema, etc., se encuentran cordialmente invitados a organizar y a formar parte del evento.</p>\r\n\r\n<h4>&iquest;A qui&eacute;n est&aacute; dirigido?</h4>\r\n\r\n<p>El evento est&aacute; dirigido a todo tipo de p&uacute;blico: estudiantes, acad&eacute;micos, empresarios, trabajadores, funcionarios p&uacute;blicos, entusiastas y a cualquier persona interesada en el tema de software libre.</p>\r\n\r\n<h4>&iquest;Cu&aacute;nto cuesta?</h4>\r\n\r\n<p>La asistencia y la participaci&oacute;n al evento es totalmente libre y gratuita.</p>\r\n\r\n<h4>&iquest;Qu&eacute; puedo aprender en el evento?</h4>\r\n\r\n<ul>\r\n	<li>Conocer&aacute; que es el software libre.</li>\r\n	<li>Tendr&aacute; la oportunidad de instalar software libre en su computadora personal.</li>\r\n	<li>Conocer&aacute; sobre la filosof&iacute;a, cultura y organizaci&oacute;n alrededor del software libre.</li>\r\n	<li>Conocer&aacute; sobre modelos de negocios de software libre.</li>\r\n	<li>Conocer&aacute; alternativas libres al software privativo tradicional.</li>\r\n</ul>\r\n\r\n<h4>&iquest;Que actividades se llevar&aacute;n a cabo en el evento?</h4>\r\n\r\n<ul>\r\n	<li>Podr&aacute; obtener CD&rsquo;s y DVD&rsquo;s con software libre en los stands dedicados a las Distribuciones GNU/Linux y Software Libre m&aacute;s populares.</li>\r\n	<li>Espacios donde los visitantes podr&aacute;n acercarse con sus computadoras personales a instalar software libre.</li>\r\n	<li>Ponencias sobre temas y proyectos relacionados al software libre.</li>\r\n	<li>Mesa de juegos libres multijugador.</li>\r\n	<li>Rifas de art&iacute;culos promocionales.</li>\r\n</ul>\r\n',	NULL,	'2013-03-15 17:06:54',	NULL,	NULL,	1);

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `email` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `usuarios` (`id`, `username`, `password`, `email`) VALUES
(1,	'admin',	'e10adc3949ba59abbe56e057f20f883e',	NULL);

-- 2013-03-25 20:25:52
