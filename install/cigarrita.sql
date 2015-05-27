-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 27-05-2015 a las 20:58:24
-- Versión del servidor: 5.5.43-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `cigarrita`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `AuthAssignment`
--

CREATE TABLE IF NOT EXISTS `AuthAssignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `AuthAssignment`
--

INSERT INTO `AuthAssignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
('standar', 'prueba', NULL, NULL),
('webmaster', 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `AuthItem`
--

CREATE TABLE IF NOT EXISTS `AuthItem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `AuthItem`
--

INSERT INTO `AuthItem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('standar', 2, 'change content and add new posts', NULL, NULL),
('webmaster', 1, 'allow to access everything and everywere', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `AuthItemChild`
--

CREATE TABLE IF NOT EXISTS `AuthItemChild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuration`
--

CREATE TABLE IF NOT EXISTS `configuration` (
  `idconfig` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `logo` varchar(200) NOT NULL,
  `description` varchar(400) NOT NULL,
  `language` varchar(5) NOT NULL,
  PRIMARY KEY (`idconfig`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `configuration`
--

INSERT INTO `configuration` (`idconfig`, `title`, `logo`, `description`, `language`) VALUES
(1, 'Yenth Ccora Surfboards', 'files/file2015-05-24-11-10-34word_yc.png', 'Local de Huanchaco que participó en diferentes competencias se dedica a fabricar surfboard y maneja una escuela de surf.', 'es');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `content`
--

CREATE TABLE IF NOT EXISTS `content` (
  `idcontent` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(45) DEFAULT NULL,
  `background` varchar(200) DEFAULT NULL,
  `header` varchar(100) DEFAULT NULL,
  `subheader` varchar(700) DEFAULT NULL,
  `template` varchar(45) DEFAULT NULL,
  `idmenu` varchar(45) DEFAULT NULL,
  `estado` int(11) DEFAULT '1',
  `language` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`idcontent`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Volcado de datos para la tabla `content`
--

INSERT INTO `content` (`idcontent`, `tipo`, `background`, `header`, `subheader`, `template`, `idmenu`, `estado`, `language`) VALUES
(1, 'slider', '', 'principal', 'height:500px;background-image: -webkit-linear-gradient(rgba(0, 4, 18, 0.38), rgba(168, 9, 186, 0.0)), url(''../img/portada_new.jpg'');background-image: -o-linear-gradient(rgba(0, 4, 18, 0.38), rgba(168, 9, 186, 0.0)), url(''../img/portada_new.jpg'');background-image: linear-gradient(rgba(0, 4, 18, 0.38), rgba(168, 9, 186, 0.0)), url(''../img/portada_new.jpg'');background-attachment: scroll, fixed;background-position: center ;background-size: cover;padding-top:200px;', 'principal', '13', 1, 'es'),
(2, 'entrada', '', 'Creamos Novedosas y Poderosas Aplicaciones.', 'Facilitamos la manera de construir tu Proyecto o Idea', 'services', '1', 1, 'es'),
(4, 'entrada', '', 'Ultimos Proyectos', 'Lo ultimo que hemos realizado', 'projects', '2', 1, 'es'),
(5, 'footer', '', 'Cigarrita Worker © Copyright 2015', '', 'about', '5', 1, 'es'),
(6, 'formulario', 'files/file2015-05-16-21-10-57subscribe.png', 'Cuéntanos Sobre Lo que tienes en Mente', '\n<div class="field"><span class="font15">Email de Contacto</span><input id="email" class="font15 form-values" placeholder="email..." style="height:50px" required="" type="email"> </div>\n\n<div class="field"> <span class="font15">Tu Idea, Proyecto o Consulta</span><textarea id="subject" class="font15 form-values" placeholder="cuentanos lo que necesitas" required=""></textarea></div>\n\n<button type="submit" class="ui green button">Enviar</button>\n', 'contact', '4', 1, 'es'),
(10, NULL, '', 'Wir bieten Neuheiten und eindrucksvolle Apps ', 'Wir unterstützen dich bei der Umsetzung deines Projektes oder deiner Idee. ', 'services', '9', 1, 'de'),
(11, NULL, '', 'Neueste Projekte', 'Daran haben wir zuletzt gearbeitet.', 'projects', '10', 1, 'de'),
(12, NULL, 'img/subscribe.png', 'Teile uns jetzt deine Ideen mit', '<form class="ui form form_contact"><div class="field"><span class="font15">Email</span><input id="email" class="font15 form-values" placeholder="email..." type="email" style="height:50px" required>\r\n</div><div class="field">    <span class="font15">Deine Idee, dein Projekt oder dein Anliegen</span><textarea id="subject" class="font15 form-values" placeholder="Dein Anliegen" required></textarea></div><button type="submit" class="ui green button">Senden</button></form>	', 'contact', '11', 1, 'de'),
(13, NULL, '', '', '', 'about', '12', 1, 'de'),
(14, NULL, 'principal', 'principal', 'principal', 'principal', '14', 1, 'de'),
(15, NULL, '', 'Nuestros clientes', 'Nuestros Clientes nos recomiendan y siempre confían en nosotros.', 'costumer', '3', 0, 'es'),
(16, NULL, 'costumer', '', '', 'costumer', '6', 0, 'en'),
(18, 'blog', '', 'blog', 'blog', 'blog', '15', 0, 'en'),
(20, '', '', 'Mi Blog', 'Bienvenido a mi blog aqui pondre todo lo referente con la nueva aplicacion CMS cigarrita y novedades tecnologicas<br>', 'blog', '17', 1, 'es'),
(35, 'entrada', '', 'Creamos Novedosas y Poderosas Aplicaciones.', 'Facilitamos la manera de construir tu Proyecto o Idea', 'services', '57', 1, 'pe'),
(36, 'entrada', '', 'Ultimos Proyectos', 'Lo ultimo que hemos realizado', 'projects', '58', 1, 'pe'),
(37, NULL, '', 'Nuestros clientes', 'Nuestros Clientes nos recomiendan y siempre confían en nosotros.', 'costumer', '59', 0, 'pe'),
(38, 'formulario', 'files/file2015-05-16-21-10-57subscribe.png', 'Cuéntanos Sobre Lo que tienes en Mente', '\n<div class="field"><span class="font15">Email de Contacto</span><input id="email" class="font15 form-values" placeholder="email..." style="height:50px" required="" type="email"> </div>\n\n<div class="field"> <span class="font15">Tu Idea, Proyecto o Consulta</span><textarea id="subject" class="font15 form-values" placeholder="cuentanos lo que necesitas" required=""></textarea></div>\n\n<button type="submit" class="ui green button">Enviar</button>\n', 'contact', '60', 1, 'pe'),
(39, 'footer', '', 'Cigarrita Worker © Copyright 2015', '', 'about', '61', 1, 'pe'),
(40, 'slider', '', 'principal', 'height:500px;background-image: -webkit-linear-gradient(rgba(0, 4, 18, 0.38), rgba(168, 9, 186, 0.0)), url(''../img/portada_new.jpg'');background-image: -o-linear-gradient(rgba(0, 4, 18, 0.38), rgba(168, 9, 186, 0.0)), url(''../img/portada_new.jpg'');background-image: linear-gradient(rgba(0, 4, 18, 0.38), rgba(168, 9, 186, 0.0)), url(''../img/portada_new.jpg'');background-attachment: scroll, fixed;background-position: center ;background-size: cover;padding-top:200px;', 'principal', '62', 1, 'pe'),
(41, '', '', 'Mi Blog', 'Bienvenido a mi blog aqui pondre todo lo referente con la nueva aplicacion CMS cigarrita y novedades tecnologicas<br>', 'blog', '63', 1, 'pe'),
(42, 'entrada', '', 'Creamos Novedosas y Poderosas Aplicaciones.', 'Facilitamos la manera de construir tu Proyecto o Idea', 'services', '64', 1, 'en'),
(43, 'entrada', '', 'Ultimos Proyectos', 'Lo ultimo que hemos realizado', 'projects', '65', 1, 'en'),
(44, NULL, '', 'Nuestros clientes', 'Nuestros Clientes nos recomiendan y siempre confían en nosotros.', 'costumer', '66', 0, 'en'),
(45, 'formulario', 'files/file2015-05-16-21-10-57subscribe.png', 'Cuéntanos Sobre Lo que tienes en Mente', '\n<div class="field"><span class="font15">Email de Contacto</span><input id="email" class="font15 form-values" placeholder="email..." style="height:50px" required="" type="email"> </div>\n\n<div class="field"> <span class="font15">Tu Idea, Proyecto o Consulta</span><textarea id="subject" class="font15 form-values" placeholder="cuentanos lo que necesitas" required=""></textarea></div>\n\n<button type="submit" class="ui green button">Enviar</button>\n', 'contact', '67', 1, 'en'),
(46, 'footer', '', 'Cigarrita Worker © Copyright 2015', '', 'about', '68', 1, 'en'),
(47, 'slider', '', 'principal', 'height:500px;background-image: -webkit-linear-gradient(rgba(0, 4, 18, 0.38), rgba(168, 9, 186, 0.0)), url(''../img/portada_new.jpg'');background-image: -o-linear-gradient(rgba(0, 4, 18, 0.38), rgba(168, 9, 186, 0.0)), url(''../img/portada_new.jpg'');background-image: linear-gradient(rgba(0, 4, 18, 0.38), rgba(168, 9, 186, 0.0)), url(''../img/portada_new.jpg'');background-attachment: scroll, fixed;background-position: center ;background-size: cover;padding-top:200px;', 'principal', '69', 1, 'en'),
(48, NULL, '', 'Nuestros clientes', 'Nuestros Clientes nos recomiendan y siempre confían en nosotros.', 'costumer', '70', 0, 'de'),
(49, '', '', 'Mi Blog', 'Bienvenido a mi blog aqui pondre todo lo referente con la nueva aplicacion CMS cigarrita y novedades tecnologicas<br>', 'blog', '71', 1, 'de');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `content_post`
--

CREATE TABLE IF NOT EXISTS `content_post` (
  `idcontent_post` int(11) NOT NULL,
  `idcontent` int(11) NOT NULL,
  `idpost` int(11) NOT NULL,
  `language` varchar(3) NOT NULL DEFAULT 'es',
  `header` varchar(300) NOT NULL,
  `subheader` varchar(300) NOT NULL,
  `background` varchar(100) NOT NULL,
  PRIMARY KEY (`idcontent_post`),
  KEY `fk_content_post_1_idx` (`idcontent`),
  KEY `fk_content_post_2_idx` (`idpost`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `form`
--

CREATE TABLE IF NOT EXISTS `form` (
  `idform` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) DEFAULT NULL,
  `subject` varchar(400) DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `country_name` varchar(45) DEFAULT NULL,
  `browser` varchar(300) DEFAULT NULL,
  `device` varchar(45) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idform`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `form`
--

INSERT INTO `form` (`idform`, `email`, `subject`, `ip_address`, `country_name`, `browser`, `device`, `date`) VALUES
(2, 'carlos@reality-magic.com', 'prueba de que volvi a enviar esta ves con validacion', '1111.111', 'alemania', 'firefox', 'computadora', '2015-02-04 14:27:14'),
(3, 'juanm@wakedocuments.com', 'segunda prubea de envio mvamos a ver con funciones', '127.0.0.1', NULL, 'firefox', 'laptop', '2015-02-04 17:23:50'),
(4, 'juan@test.com', 'sssss ssss', '127.0.0.1', NULL, 'firefox', 'laptop', '2015-02-04 17:29:31'),
(5, 'carlosway89@gmail.com', 'ssasqs swsw wdwdwd dwdwddd', '127.0.0.1', NULL, '', '', '2015-02-07 19:18:01'),
(6, 'B-Decker@web.de', 'babsi no funciona la primera vez pero esta vez tienes que funcionar', '127.0.0.1', 'Reserved', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:35.0) Gecko/20100101 Firefox/35.0', '', '2015-02-10 20:17:16'),
(7, 'ddddd@hotmail.com', 'ddddddd', '127.0.0.1', 'Reserved', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:35.0) Gecko/20100101 Firefox/35.0', '', '2015-02-11 14:46:03'),
(8, 'juan@test.com', 'prueba de envio de formulario', '127.0.0.1', 'Reserved', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:35.0) Gecko/20100101 Firefox/35.0', '', '2015-02-12 21:50:28'),
(9, 'juan@test.com', 'ssssssss', '127.0.0.1', 'Reserved', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:35.0) Gecko/20100101 Firefox/35.0', '', '2015-02-12 22:09:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `language`
--

CREATE TABLE IF NOT EXISTS `language` (
  `idlanguage` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `flag` varchar(45) DEFAULT NULL,
  `estado` int(3) NOT NULL DEFAULT '1',
  `min` varchar(3) NOT NULL,
  PRIMARY KEY (`idlanguage`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Volcado de datos para la tabla `language`
--

INSERT INTO `language` (`idlanguage`, `name`, `flag`, `estado`, `min`) VALUES
(1, 'español', 'es', 1, 'es'),
(2, 'english', 'gb', 1, 'en'),
(3, 'deutsch', 'de', 1, 'de'),
(27, 'peruano', 'pe', 1, 'pe');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `idlog` int(11) NOT NULL AUTO_INCREMENT,
  `action` varchar(600) NOT NULL,
  `user` varchar(100) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idlog`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=277 ;

--
-- Volcado de datos para la tabla `log`
--

INSERT INTO `log` (`idlog`, `action`, `user`, `ip`, `date`) VALUES
(1, 'update:', 'usuario', '127.0.0.1', '2015-02-16 20:40:03'),
(2, 'update:', 'usuario', '127.0.0.1', '2015-02-16 20:40:03'),
(3, 'update:', 'usuario', '127.0.0.1', '2015-02-16 20:40:03'),
(4, 'update:', 'usuario', '127.0.0.1', '2015-02-16 20:41:10'),
(5, 'update:', 'usuario', '127.0.0.1', '2015-02-16 20:41:10'),
(6, 'update:', 'admin', '127.0.0.1', '2015-02-16 20:42:44'),
(7, 'update:', 'admin', '127.0.0.1', '2015-02-16 20:42:44'),
(8, 'update:Menu', 'admin', '127.0.0.1', '2015-02-16 20:47:51'),
(9, 'update:Content', 'admin', '127.0.0.1', '2015-02-16 20:47:52'),
(10, 'update:Menu', 'prueba', '127.0.0.1', '2015-02-16 20:48:46'),
(11, 'update:Content', 'prueba', '127.0.0.1', '2015-02-16 20:48:46'),
(12, 'update:Menu', 'admin', '127.0.0.1', '2015-02-17 11:10:07'),
(13, 'update:Content', 'admin', '127.0.0.1', '2015-02-17 11:10:07'),
(14, 'update:Menu', 'admin', '127.0.0.1', '2015-02-17 11:11:34'),
(15, 'update:Content', 'admin', '127.0.0.1', '2015-02-17 11:11:34'),
(16, 'create:Media', 'admin', '127.0.0.1', '2015-02-18 16:16:22'),
(17, 'create:Media', 'admin', '127.0.0.1', '2015-02-18 16:17:56'),
(18, 'update:Menu', 'admin', '127.0.0.1', '2015-02-18 16:27:16'),
(19, 'update:Content', 'admin', '127.0.0.1', '2015-02-18 16:27:16'),
(20, 'update:Menu', 'admin', '127.0.0.1', '2015-02-18 17:55:45'),
(21, 'update:Content', 'admin', '127.0.0.1', '2015-02-18 17:55:45'),
(22, 'update:Post', 'admin', '127.0.0.1', '2015-02-18 18:41:37'),
(23, 'create:Media', 'admin', '127.0.0.1', '2015-02-18 19:41:30'),
(24, 'create:Media', 'admin', '127.0.0.1', '2015-02-19 13:17:18'),
(25, 'create:Media', 'admin', '127.0.0.1', '2015-02-19 13:18:10'),
(26, 'update:Post', 'admin', '127.0.0.1', '2015-02-19 13:18:26'),
(27, 'update:Post', 'admin', '127.0.0.1', '2015-02-19 13:25:04'),
(28, 'update:Menu', 'admin', '127.0.0.1', '2015-02-19 13:29:19'),
(29, 'update:Content', 'admin', '127.0.0.1', '2015-02-19 13:29:19'),
(30, 'update:Post', 'admin', '127.0.0.1', '2015-02-19 15:00:18'),
(31, 'update:Post', 'admin', '127.0.0.1', '2015-02-19 15:05:36'),
(32, 'update:Post', 'admin', '127.0.0.1', '2015-02-19 15:16:06'),
(33, 'create:Media', 'admin', '127.0.0.1', '2015-02-19 19:48:07'),
(34, 'create:Media', 'admin', '127.0.0.1', '2015-02-19 21:00:54'),
(35, 'create:Media', 'admin', '127.0.0.1', '2015-02-19 21:08:50'),
(36, 'create:Media', 'admin', '127.0.0.1', '2015-02-19 21:11:04'),
(37, 'create:Media', 'admin', '127.0.0.1', '2015-02-19 21:19:07'),
(38, 'create:Media', 'admin', '127.0.0.1', '2015-02-19 21:19:55'),
(39, 'create:Media', 'admin', '127.0.0.1', '2015-02-19 21:27:39'),
(40, 'create:Media', 'admin', '127.0.0.1', '2015-02-19 21:36:08'),
(41, 'create:Media', 'admin', '127.0.0.1', '2015-02-19 21:37:58'),
(42, 'create:Media', 'admin', '127.0.0.1', '2015-02-19 21:38:36'),
(43, 'create:Media', 'admin', '127.0.0.1', '2015-02-23 21:00:28'),
(44, 'create:Media', 'admin', '127.0.0.1', '2015-02-23 21:01:54'),
(45, 'create:Media', 'admin', '127.0.0.1', '2015-02-23 21:02:52'),
(46, 'create:Media', 'admin', '127.0.0.1', '2015-02-23 21:03:20'),
(47, 'create:Media', 'admin', '127.0.0.1', '2015-02-23 21:13:22'),
(48, 'create:Media', 'admin', '127.0.0.1', '2015-02-23 21:14:04'),
(49, 'create:Media', 'admin', '127.0.0.1', '2015-02-23 21:20:48'),
(50, 'create:Media', 'admin', '127.0.0.1', '2015-02-23 21:20:55'),
(51, 'create:Media', 'admin', '127.0.0.1', '2015-02-23 21:21:04'),
(52, 'create:Media', 'admin', '127.0.0.1', '2015-02-23 21:27:19'),
(53, 'create:Media', 'admin', '127.0.0.1', '2015-02-23 21:46:53'),
(54, 'create:Media', 'admin', '127.0.0.1', '2015-02-23 21:53:46'),
(55, 'create:Media', 'admin', '127.0.0.1', '2015-02-23 21:55:43'),
(56, 'create:Media', 'admin', '127.0.0.1', '2015-02-23 22:23:07'),
(57, 'create:Media', 'admin', '127.0.0.1', '2015-02-23 22:26:37'),
(58, 'create:Menu', 'admin', '127.0.0.1', '2015-03-24 20:08:47'),
(59, 'create:Content', 'admin', '127.0.0.1', '2015-03-24 20:08:48'),
(60, 'create:Menu', 'admin', '127.0.0.1', '2015-03-24 20:09:25'),
(61, 'create:Content', 'admin', '127.0.0.1', '2015-03-24 20:09:25'),
(62, 'create:Menu', 'admin', '127.0.0.1', '2015-03-24 20:20:46'),
(63, 'create:Content', 'admin', '127.0.0.1', '2015-03-24 20:20:46'),
(64, 'create:Menu', 'admin', '127.0.0.1', '2015-03-24 20:25:18'),
(65, 'create:Content', 'admin', '127.0.0.1', '2015-03-24 20:25:19'),
(66, 'create:Language', 'admin', '127.0.0.1', '2015-04-08 11:54:42'),
(67, 'update:Menu', 'admin', '127.0.0.1', '2015-04-08 12:05:56'),
(68, 'create:Content', 'admin', '127.0.0.1', '2015-04-08 12:05:57'),
(69, 'update:Menu', 'admin', '127.0.0.1', '2015-04-08 20:52:13'),
(70, 'update:Content', 'admin', '127.0.0.1', '2015-04-08 20:52:13'),
(71, 'create:Menu', 'admin', '127.0.0.1', '2015-04-08 21:46:49'),
(72, 'create:Menu', 'admin', '127.0.0.1', '2015-04-08 21:47:41'),
(73, 'create:Menu', 'admin', '127.0.0.1', '2015-04-08 21:52:21'),
(74, 'create:Content', 'admin', '127.0.0.1', '2015-04-08 21:52:22'),
(75, 'create:Post', 'admin', '127.0.0.1', '2015-04-09 11:13:56'),
(76, 'update:Menu', 'admin', '127.0.0.1', '2015-04-09 16:01:05'),
(77, 'update:Content', 'admin', '127.0.0.1', '2015-04-09 16:01:06'),
(78, 'create:Menu', 'admin', '127.0.0.1', '2015-04-09 16:02:08'),
(79, 'create:Content', 'admin', '127.0.0.1', '2015-04-09 16:02:08'),
(80, 'create:Menu', 'admin', '127.0.0.1', '2015-04-09 16:18:30'),
(81, 'create:Content', 'admin', '127.0.0.1', '2015-04-09 16:18:30'),
(82, 'update:Menu', 'admin', '127.0.0.1', '2015-04-09 16:53:52'),
(83, 'update:Content', 'admin', '127.0.0.1', '2015-04-09 16:53:52'),
(84, 'update:Menu', 'admin', '127.0.0.1', '2015-04-09 16:54:26'),
(85, 'update:Content', 'admin', '127.0.0.1', '2015-04-09 16:54:27'),
(86, 'update:Menu', 'admin', '127.0.0.1', '2015-04-09 16:56:30'),
(87, 'update:Content', 'admin', '127.0.0.1', '2015-04-09 16:56:30'),
(88, 'update:Menu', 'admin', '127.0.0.1', '2015-04-09 16:58:05'),
(89, 'update:Content', 'admin', '127.0.0.1', '2015-04-09 16:58:05'),
(90, 'create:Media', 'admin', '127.0.0.1', '2015-04-10 19:29:44'),
(91, 'create:Post', 'admin', '127.0.0.1', '2015-04-10 19:29:47'),
(92, 'create:Media', 'admin', '127.0.0.1', '2015-04-10 19:36:34'),
(93, 'create:Post', 'admin', '127.0.0.1', '2015-04-10 19:36:36'),
(94, 'update:Menu', 'admin', '127.0.0.1', '2015-04-11 22:46:30'),
(95, 'update:Content', 'admin', '127.0.0.1', '2015-04-11 22:46:30'),
(96, 'create:Menu', 'admin', '127.0.0.1', '2015-04-12 21:01:42'),
(97, 'create:Content', 'admin', '127.0.0.1', '2015-04-12 21:01:43'),
(98, 'update:Language', 'admin', '127.0.0.1', '2015-04-13 23:07:35'),
(99, 'update:Language', 'admin', '127.0.0.1', '2015-04-13 23:07:40'),
(100, 'update:Language', 'admin', '127.0.0.1', '2015-04-13 23:07:42'),
(101, 'update:Language', 'admin', '127.0.0.1', '2015-04-13 23:07:47'),
(102, 'update:Menu', 'admin', '127.0.0.1', '2015-05-14 11:38:26'),
(103, 'update:Content', 'admin', '127.0.0.1', '2015-05-14 11:38:26'),
(104, 'update:Menu', 'prueba', '127.0.0.1', '2015-05-14 11:45:01'),
(105, 'update:Content', 'prueba', '127.0.0.1', '2015-05-14 11:45:01'),
(106, 'update:Menu', 'prueba', '127.0.0.1', '2015-05-14 11:47:52'),
(107, 'update:Content', 'prueba', '127.0.0.1', '2015-05-14 11:47:53'),
(108, 'update:Menu', 'prueba', '127.0.0.1', '2015-05-14 11:48:59'),
(109, 'update:Content', 'prueba', '127.0.0.1', '2015-05-14 11:49:00'),
(110, 'create:Media', 'prueba', '127.0.0.1', '2015-05-14 11:55:29'),
(111, 'update:Menu', 'prueba', '127.0.0.1', '2015-05-14 11:55:45'),
(112, 'update:Content', 'prueba', '127.0.0.1', '2015-05-14 11:55:45'),
(113, 'update:Menu', 'prueba', '127.0.0.1', '2015-05-14 12:00:31'),
(114, 'update:Content', 'prueba', '127.0.0.1', '2015-05-14 12:00:31'),
(115, 'update:Menu', 'prueba', '127.0.0.1', '2015-05-14 12:00:54'),
(116, 'update:Content', 'prueba', '127.0.0.1', '2015-05-14 12:00:54'),
(117, 'create:Media', 'prueba', '127.0.0.1', '2015-05-14 12:01:10'),
(118, 'update:Menu', 'prueba', '127.0.0.1', '2015-05-14 12:01:13'),
(119, 'update:Content', 'prueba', '127.0.0.1', '2015-05-14 12:01:13'),
(120, 'update:Menu', 'prueba', '127.0.0.1', '2015-05-14 12:01:34'),
(121, 'update:Content', 'prueba', '127.0.0.1', '2015-05-14 12:01:34'),
(122, 'create:Media', 'prueba', '127.0.0.1', '2015-05-14 12:04:20'),
(123, 'update:Menu', 'prueba', '127.0.0.1', '2015-05-14 12:04:23'),
(124, 'update:Content', 'prueba', '127.0.0.1', '2015-05-14 12:04:24'),
(125, 'update:Menu', 'prueba', '127.0.0.1', '2015-05-14 12:09:34'),
(126, 'update:Content', 'prueba', '127.0.0.1', '2015-05-14 12:09:34'),
(127, 'update:Menu', 'prueba', '127.0.0.1', '2015-05-14 12:12:18'),
(128, 'update:Content', 'prueba', '127.0.0.1', '2015-05-14 12:12:18'),
(129, 'update:Menu', 'prueba', '127.0.0.1', '2015-05-14 12:21:19'),
(130, 'update:Content', 'prueba', '127.0.0.1', '2015-05-14 12:21:19'),
(131, 'create:Media', 'prueba', '127.0.0.1', '2015-05-14 12:22:15'),
(132, 'update:Menu', 'prueba', '127.0.0.1', '2015-05-14 12:22:18'),
(133, 'update:Content', 'prueba', '127.0.0.1', '2015-05-14 12:22:18'),
(134, 'update:Menu', 'prueba', '127.0.0.1', '2015-05-14 12:22:32'),
(135, 'update:Content', 'prueba', '127.0.0.1', '2015-05-14 12:22:32'),
(136, 'update:Menu', 'prueba', '127.0.0.1', '2015-05-14 12:22:49'),
(137, 'update:Content', 'prueba', '127.0.0.1', '2015-05-14 12:22:49'),
(138, 'update:Post', 'prueba', '127.0.0.1', '2015-05-14 12:24:10'),
(139, 'create:Media', 'prueba', '127.0.0.1', '2015-05-14 12:24:34'),
(140, 'update:Post', 'prueba', '127.0.0.1', '2015-05-14 12:25:03'),
(141, 'update:Post', 'prueba', '127.0.0.1', '2015-05-14 12:26:16'),
(142, 'update:Post', 'prueba', '127.0.0.1', '2015-05-14 12:29:23'),
(143, 'update:Post', 'prueba', '127.0.0.1', '2015-05-14 12:29:39'),
(144, 'update:Post', 'admin', '127.0.0.1', '2015-05-15 19:47:12'),
(145, 'update:Post', 'admin', '127.0.0.1', '2015-05-15 19:57:31'),
(146, 'update:Post', 'admin', '127.0.0.1', '2015-05-15 20:06:00'),
(147, 'update:Post', 'admin', '127.0.0.1', '2015-05-15 20:28:55'),
(148, 'update:Post', 'admin', '127.0.0.1', '2015-05-15 20:31:28'),
(149, 'update:Post', 'admin', '127.0.0.1', '2015-05-15 20:40:09'),
(150, 'update:Post', 'admin', '127.0.0.1', '2015-05-15 20:41:45'),
(151, 'update:Post', 'admin', '127.0.0.1', '2015-05-15 20:44:45'),
(152, 'update:Post', 'admin', '127.0.0.1', '2015-05-15 20:44:57'),
(153, 'update:Menu', 'admin', '127.0.0.1', '2015-05-15 20:58:56'),
(154, 'update:Content', 'admin', '127.0.0.1', '2015-05-15 20:58:57'),
(155, 'update:Menu', 'admin', '127.0.0.1', '2015-05-15 21:00:04'),
(156, 'update:Content', 'admin', '127.0.0.1', '2015-05-15 21:00:04'),
(157, 'update:Menu', 'admin', '127.0.0.1', '2015-05-15 21:01:50'),
(158, 'update:Content', 'admin', '127.0.0.1', '2015-05-15 21:01:50'),
(159, 'update:Menu', 'admin', '127.0.0.1', '2015-05-15 21:04:05'),
(160, 'update:Content', 'admin', '127.0.0.1', '2015-05-15 21:04:05'),
(161, 'update:Menu', 'admin', '127.0.0.1', '2015-05-15 21:17:04'),
(162, 'update:Content', 'admin', '127.0.0.1', '2015-05-15 21:17:04'),
(163, 'update:Menu', 'admin', '127.0.0.1', '2015-05-15 21:26:42'),
(164, 'update:Content', 'admin', '127.0.0.1', '2015-05-15 21:26:42'),
(165, 'update:Menu', 'admin', '127.0.0.1', '2015-05-15 21:26:56'),
(166, 'update:Content', 'admin', '127.0.0.1', '2015-05-15 21:26:56'),
(167, 'update:Menu', 'admin', '127.0.0.1', '2015-05-15 21:27:29'),
(168, 'update:Content', 'admin', '127.0.0.1', '2015-05-15 21:27:29'),
(169, 'update:Menu', 'admin', '127.0.0.1', '2015-05-15 21:28:21'),
(170, 'update:Content', 'admin', '127.0.0.1', '2015-05-15 21:28:21'),
(171, 'update:Menu', 'admin', '127.0.0.1', '2015-05-15 22:01:57'),
(172, 'update:Content', 'admin', '127.0.0.1', '2015-05-15 22:01:58'),
(173, 'update:Menu', 'admin', '127.0.0.1', '2015-05-15 22:03:07'),
(174, 'update:Content', 'admin', '127.0.0.1', '2015-05-15 22:03:07'),
(175, 'create:Menu', 'admin', '127.0.0.1', '2015-05-15 22:33:49'),
(176, 'create:Menu', 'admin', '127.0.0.1', '2015-05-15 22:36:26'),
(177, 'create:Menu', 'admin', '127.0.0.1', '2015-05-15 22:40:47'),
(178, 'create:Content', 'admin', '127.0.0.1', '2015-05-15 22:40:47'),
(179, 'create:Menu', 'admin', '127.0.0.1', '2015-05-15 22:46:07'),
(180, 'create:Content', 'admin', '127.0.0.1', '2015-05-15 22:46:07'),
(181, 'create:Menu', 'admin', '127.0.0.1', '2015-05-16 17:41:42'),
(182, 'create:Content', 'admin', '127.0.0.1', '2015-05-16 17:41:42'),
(183, 'create:Menu', 'admin', '127.0.0.1', '2015-05-16 17:49:27'),
(184, 'create:Content', 'admin', '127.0.0.1', '2015-05-16 17:49:27'),
(185, 'create:Menu', 'admin', '127.0.0.1', '2015-05-16 17:56:34'),
(186, 'create:Content', 'admin', '127.0.0.1', '2015-05-16 17:56:34'),
(187, 'create:Menu', 'admin', '127.0.0.1', '2015-05-16 17:59:11'),
(188, 'create:Content', 'admin', '127.0.0.1', '2015-05-16 17:59:11'),
(189, 'create:Menu', 'admin', '127.0.0.1', '2015-05-16 18:13:51'),
(190, 'create:Content', 'admin', '127.0.0.1', '2015-05-16 18:13:51'),
(191, 'create:Menu', 'admin', '127.0.0.1', '2015-05-16 18:17:46'),
(192, 'create:Content', 'admin', '127.0.0.1', '2015-05-16 18:17:46'),
(193, 'create:Menu', 'admin', '127.0.0.1', '2015-05-16 18:23:06'),
(194, 'create:Content', 'admin', '127.0.0.1', '2015-05-16 18:23:06'),
(195, 'create:Menu', 'admin', '127.0.0.1', '2015-05-16 18:26:05'),
(196, 'create:Content', 'admin', '127.0.0.1', '2015-05-16 18:26:05'),
(197, 'create:Menu', 'admin', '127.0.0.1', '2015-05-16 18:29:17'),
(198, 'create:Content', 'admin', '127.0.0.1', '2015-05-16 18:29:17'),
(199, 'create:Post', 'admin', '127.0.0.1', '2015-05-16 18:33:39'),
(200, 'create:Post', 'admin', '127.0.0.1', '2015-05-16 18:46:05'),
(201, 'create:Post', 'admin', '127.0.0.1', '2015-05-16 18:51:03'),
(202, 'update:Menu', 'admin', '127.0.0.1', '2015-05-16 19:11:20'),
(203, 'update:Content', 'admin', '127.0.0.1', '2015-05-16 19:11:20'),
(204, 'update:Menu', 'admin', '127.0.0.1', '2015-05-16 19:22:37'),
(205, 'update:Content', 'admin', '127.0.0.1', '2015-05-16 19:22:37'),
(206, 'update:Menu', 'admin', '127.0.0.1', '2015-05-16 19:23:03'),
(207, 'update:Content', 'admin', '127.0.0.1', '2015-05-16 19:23:03'),
(208, 'update:Menu', 'admin', '127.0.0.1', '2015-05-16 20:28:37'),
(209, 'update:Content', 'admin', '127.0.0.1', '2015-05-16 20:28:37'),
(210, 'update:Menu', 'admin', '127.0.0.1', '2015-05-16 20:29:43'),
(211, 'update:Content', 'admin', '127.0.0.1', '2015-05-16 20:29:43'),
(212, 'update:Post', 'admin', '127.0.0.1', '2015-05-16 20:30:23'),
(213, 'update:Language', 'admin', '127.0.0.1', '2015-05-17 06:57:44'),
(214, 'update:Language', 'admin', '127.0.0.1', '2015-05-17 06:58:17'),
(215, 'update:Language', 'admin', '127.0.0.1', '2015-05-17 06:59:17'),
(216, 'update:Language', 'admin', '127.0.0.1', '2015-05-17 07:02:22'),
(217, 'update:Language', 'admin', '127.0.0.1', '2015-05-17 07:02:41'),
(218, 'update:Language', 'admin', '127.0.0.1', '2015-05-17 07:04:54'),
(219, 'update:Language', 'admin', '127.0.0.1', '2015-05-17 07:07:45'),
(220, 'update:Language', 'admin', '127.0.0.1', '2015-05-17 07:09:26'),
(221, 'update:Language', 'admin', '127.0.0.1', '2015-05-17 07:09:38'),
(222, 'create:Language', 'admin', '127.0.0.1', '2015-05-17 07:20:55'),
(223, 'create:Language', 'admin', '127.0.0.1', '2015-05-17 07:24:01'),
(224, 'update:Language', 'admin', '127.0.0.1', '2015-05-17 07:28:11'),
(225, 'create:Language', 'admin', '127.0.0.1', '2015-05-17 07:28:31'),
(226, 'update:Language', 'admin', '127.0.0.1', '2015-05-17 07:30:08'),
(227, 'update:Language', 'admin', '127.0.0.1', '2015-05-17 09:15:13'),
(228, 'update:Language', 'admin', '127.0.0.1', '2015-05-17 09:15:16'),
(229, 'update:Post', 'admin', '127.0.0.1', '2015-05-17 09:26:17'),
(230, 'update:Post', 'admin', '127.0.0.1', '2015-05-17 09:38:40'),
(231, 'update:Menu', 'admin', '127.0.0.1', '2015-05-17 10:15:00'),
(232, 'update:Content', 'admin', '127.0.0.1', '2015-05-17 10:15:00'),
(233, 'update:Menu', 'admin', '127.0.0.1', '2015-05-17 10:15:13'),
(234, 'update:Content', 'admin', '127.0.0.1', '2015-05-17 10:15:13'),
(235, 'update:Menu', 'admin', '127.0.0.1', '2015-05-17 10:24:44'),
(236, 'update:Content', 'admin', '127.0.0.1', '2015-05-17 10:24:45'),
(237, 'update:Menu', 'admin', '127.0.0.1', '2015-05-17 10:25:59'),
(238, 'update:Content', 'admin', '127.0.0.1', '2015-05-17 10:25:59'),
(239, 'create:Menu', 'admin', '127.0.0.1', '2015-05-17 10:57:02'),
(240, 'create:Content', 'admin', '127.0.0.1', '2015-05-17 10:57:02'),
(241, 'create:Menu', 'admin', '127.0.0.1', '2015-05-17 11:03:13'),
(242, 'create:Content', 'admin', '127.0.0.1', '2015-05-17 11:03:13'),
(243, 'create:Menu', 'admin', '127.0.0.1', '2015-05-17 11:06:27'),
(244, 'create:Content', 'admin', '127.0.0.1', '2015-05-17 11:06:27'),
(245, 'create:Menu', 'admin', '127.0.0.1', '2015-05-17 11:12:25'),
(246, 'create:Content', 'admin', '127.0.0.1', '2015-05-17 11:12:26'),
(247, 'create:Menu', 'admin', '127.0.0.1', '2015-05-17 11:14:21'),
(248, 'create:Content', 'admin', '127.0.0.1', '2015-05-17 11:14:21'),
(249, 'update:Menu', 'admin', '127.0.0.1', '2015-05-17 11:19:56'),
(250, 'update:Content', 'admin', '127.0.0.1', '2015-05-17 11:19:57'),
(251, 'create:Language', 'admin', '127.0.0.1', '2015-05-17 12:43:41'),
(252, 'update:Language', 'admin', '127.0.0.1', '2015-05-17 13:06:06'),
(253, 'update:Menu', 'prueba', '127.0.0.1', '2015-05-17 13:14:56'),
(254, 'update:Content', 'prueba', '127.0.0.1', '2015-05-17 13:14:57'),
(255, 'update:Post', 'prueba', '127.0.0.1', '2015-05-17 13:15:13'),
(256, 'update:Post', 'prueba', '127.0.0.1', '2015-05-17 13:18:03'),
(257, 'update:Post', 'prueba', '127.0.0.1', '2015-05-17 16:36:50'),
(258, 'update:Menu', 'prueba', '127.0.0.1', '2015-05-17 16:38:40'),
(259, 'update:Content', 'prueba', '127.0.0.1', '2015-05-17 16:38:41'),
(260, 'update:Content', 'prueba', '127.0.0.1', '2015-05-17 16:40:51'),
(261, 'update:Menu', 'prueba', '127.0.0.1', '2015-05-17 16:40:51'),
(262, 'update:Menu', 'prueba', '127.0.0.1', '2015-05-17 16:41:43'),
(263, 'update:Content', 'prueba', '127.0.0.1', '2015-05-17 16:41:43'),
(264, 'update:Menu', 'prueba', '127.0.0.1', '2015-05-17 16:46:25'),
(265, 'update:Content', 'prueba', '127.0.0.1', '2015-05-17 16:46:25'),
(266, 'update:Menu', 'prueba', '127.0.0.1', '2015-05-17 16:47:22'),
(267, 'update:Content', 'prueba', '127.0.0.1', '2015-05-17 16:47:22'),
(268, 'update:Menu', 'prueba', '127.0.0.1', '2015-05-17 16:55:33'),
(269, 'create:Content', 'prueba', '127.0.0.1', '2015-05-17 16:55:33'),
(270, 'update:Menu', 'prueba', '127.0.0.1', '2015-05-17 16:59:55'),
(271, 'create:Content', 'prueba', '127.0.0.1', '2015-05-17 16:59:55'),
(272, 'update:Language', 'prueba', '127.0.0.1', '2015-05-17 17:20:48'),
(273, 'create:Language', 'prueba', '127.0.0.1', '2015-05-17 17:23:40'),
(274, 'create:Language', 'prueba', '127.0.0.1', '2015-05-17 17:32:22'),
(275, 'update:Menu', 'prueba', '127.0.0.1', '2015-05-17 17:37:54'),
(276, 'update:Content', 'prueba', '127.0.0.1', '2015-05-17 17:37:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `media`
--

CREATE TABLE IF NOT EXISTS `media` (
  `link` varchar(200) NOT NULL,
  `name` varchar(100) NOT NULL,
  `estado` int(2) NOT NULL DEFAULT '1',
  `idmedia` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idmedia`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Volcado de datos para la tabla `media`
--

INSERT INTO `media` (`link`, `name`, `estado`, `idmedia`) VALUES
('img/subscribe.png', 'subscribe', 1, 1),
('img/yenth-home.png', 'yenth', 1, 2),
('files/file2015-02-23-22-00-27IMG_2947.JPG', 'IMG_2947.JPG', 1, 3),
('files/file2015-02-23-22-01-54IMG_2968.JPG', 'IMG_2968.JPG', 1, 4),
('files/file2015-02-23-22-02-52yonisasa.jpg', 'yonisasa.jpg', 1, 5),
('files/file2015-02-23-22-03-19IMG_2949.JPG', 'IMG_2949.JPG', 1, 6),
('files/file2015-02-23-22-13-22yenth.png', 'yenth.png', 1, 7),
('files/file2015-02-23-22-14-04yenth.png', 'yenth.png', 1, 8),
('files/file2015-02-23-22-20-48surfhostel.png', 'surfhostel.png', 1, 9),
('files/file2015-02-23-22-21-03sunset-surf.jpg', 'sunset-surf.jpg', 1, 10),
('files/file2015-02-23-22-27-19IMG_2947.JPG', 'IMG_2947.JPG', 1, 11),
('files/file2015-02-23-22-46-53yenth.png', 'yenth.png', 1, 12),
('files/file2015-02-23-22-55-43yo_expo.jpg', 'yo_expo.jpg', 1, 13),
('files/file2015-02-23-23-23-06yoni.jpg', 'yoni.jpg', 1, 14),
('files/file2015-02-23-23-26-37yoni.jpg', 'yoni.jpg', 1, 15),
('files/file2015-04-10-21-29-4375969_558313060875267_1428882545_n.jpg', '75969_558313060875267_1428882545_n.jpg', 1, 16),
('files/file2015-04-10-21-36-34Be-Proactive.jpg', 'Be-Proactive.jpg', 1, 17),
('files/file2015-05-14-13-55-29subscribe.png', 'subscribe.png', 1, 18),
('files/file2015-05-14-14-01-10subscribe_new.jpg', 'subscribe_new.jpg', 1, 19),
('files/file2015-05-14-14-04-20_subscribe.jpg', '_subscribe.jpg', 1, 20),
('files/file2015-05-14-14-22-14_subscribe.jpg', '_subscribe.jpg', 1, 21),
('files/file2015-05-14-14-24-34chartup.png', 'chartup.png', 1, 22);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `idmenu` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `url` varchar(45) DEFAULT NULL,
  `estado` int(11) NOT NULL,
  `language` varchar(4) DEFAULT 'es',
  `minimal` tinyint(1) NOT NULL,
  `position` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idmenu`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=72 ;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`idmenu`, `name`, `url`, `estado`, `language`, `minimal`, `position`, `is_deleted`) VALUES
(1, 'Servicios', '/services', 1, 'es', 1, 2, 0),
(2, 'Proyectos', '/projects', 1, 'es', 1, 3, 0),
(3, 'Clientes', '/costumer', 0, 'es', 1, 6, 0),
(4, 'Contacto', '/contact', 1, 'es', 1, 4, 0),
(5, 'Nosotros', '/about', 1, 'es', 1, 5, 0),
(6, 'Equipo', '/team', 0, 'en', 1, 2, 0),
(9, 'Service', '/services', 1, 'de', 1, 2, 0),
(10, 'Projekte ', '/projects', 1, 'de', 1, 3, 0),
(11, 'Kontakt', '/contact', 1, 'de', 0, 5, 0),
(12, 'Über uns ', '/about', 1, 'de', 0, 4, 0),
(13, 'Principal', '#', 1, 'es', 1, 1, 0),
(14, 'Home', '#', 1, 'de', 1, 1, 0),
(15, 'blog', '/blog', 0, 'en', 0, 3, 0),
(17, 'Blog', '/blog', 1, 'es', 0, 7, 0),
(57, 'pe-Servicios', '/services', 1, 'pe', 1, 200018, 0),
(58, 'pe-Proyectos', '/projects', 1, 'pe', 1, 300058, 0),
(59, 'pe-Clientes', '/costumer', 0, 'pe', 1, 600059, 0),
(60, 'pe-Contacto', '/contact', 1, 'pe', 1, 400060, 0),
(61, 'pe-Nosotros', '/about', 1, 'pe', 1, 500061, 0),
(62, 'Principal', '#', 1, 'pe', 1, 100062, 0),
(63, 'pe-Blog', '/blog', 1, 'pe', 0, 700063, 0),
(64, 'en-Servicios', '/services', 1, 'en', 1, 200064, 0),
(65, 'en-Proyectos', '/projects', 1, 'en', 1, 300065, 0),
(66, 'en-Clientes', '/costumer', 0, 'en', 1, 600066, 0),
(67, 'en-Contacto', '/contact', 1, 'en', 1, 400067, 0),
(68, 'en-Nosotros', '/about', 1, 'en', 1, 500068, 0),
(69, 'en-Principal', '#', 1, 'en', 1, 100069, 0),
(70, 'de-Clientes', '/costumer', 0, 'de', 1, 600070, 0),
(71, 'de-Blog', '/blog', 1, 'de', 0, 700071, 0);

--
-- Disparadores `menu`
--
DROP TRIGGER IF EXISTS `position`;
DELIMITER //
CREATE TRIGGER `position` BEFORE INSERT ON `menu`
 FOR EACH ROW begin
	DECLARE ultimo_id, proximo_id INT default 0;
    SELECT idmenu INTO ultimo_id FROM menu ORDER BY idmenu DESC LIMIT 1;
    SET proximo_id = ultimo_id+1;
    SET NEW.position = CONCAT(NEW.position, LPAD(proximo_id, 5, '0'));
end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu_sub_menu`
--

CREATE TABLE IF NOT EXISTS `menu_sub_menu` (
  `idsub_menu` int(11) DEFAULT NULL,
  `idmenu` int(11) DEFAULT NULL,
  KEY `fk_menu_sub_menu_1_idx` (`idmenu`),
  KEY `fk_menu_sub_menu_2_idx` (`idsub_menu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `idpost` int(11) NOT NULL AUTO_INCREMENT,
  `background` varchar(45) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `header` varchar(100) DEFAULT NULL,
  `subheader` varchar(700) DEFAULT 'none',
  `link` varchar(45) DEFAULT '#',
  `estado` int(11) DEFAULT '1',
  `idcontent` varchar(10) NOT NULL,
  `language` varchar(10) NOT NULL DEFAULT 'es',
  `class` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idpost`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=92 ;

--
-- Volcado de datos para la tabla `post`
--

INSERT INTO `post` (`idpost`, `background`, `image`, `header`, `subheader`, `link`, `estado`, `idcontent`, `language`, `class`) VALUES
(1, '', 'img/growup.png', 'Quieres ver Crecer tu Proyecto en Internet?', 'none', '#', 1, '1', 'es', NULL),
(4, '', 'img/tellus.png', 'Cuéntanos sobre tus Proyectos', 'none', '#', 1, '1', 'es', ''),
(5, '', 'img/money.png', 'Quieres Obtener más ingresos en tu Negocio?', '<p><br></p>', '#', 1, '1', 'es', ''),
(6, '', 'files/file2015-05-14-14-24-34chartup.png', 'Crece y Obten mas clientes', 'Posicionamos tu Web(SEO) haciendo que tu negocio crezca obteniendo mas Leads y se posicione en Internet rápidamente.', '#', 1, '2', 'es', 'clase'),
(7, '', 'img/mobile.png', 'Diseños Adaptable', 'Los diseños, Aplicaciones y Sistemas Web son adaptativo para cualquier dispositivo con un intuitivo y buena experiencia de usuario.', '#', 1, '2', 'es', ''),
(8, '', 'img/global.png', 'Trabajo Remoto', 'Nuestra forma de trabajo es Remoto entonces no te preocupes por tu agenda, puedes contactarnos desde donde estes.', '#', 1, '2', 'es', 'none'),
(9, '', 'img/portafolio.png', 'Portafolio y Asesoria', 'Tenemos una amplia carta y portafolio ajustable a tu bolsillo, con asesoria gratuita para mejorar tu proyecto o hacer crecer tu negocio.', '#', 1, '2', 'es', NULL),
(10, '', 'img/papelidea.png', 'Haz Realidad tu Idea', 'Contruimos y Virtualizamos Cualquier idea o Proyecto&nbsp; haciéndolo realidad.', '#', 1, '2', 'es', NULL),
(11, '', 'img/security.png', 'PayPal/Payonner Pagos', 'La forma de pago es segura ya que utilizamos plataformas como PayPal o Payonner para transacciones por Internet.', '#', 1, '2', 'es', 'none'),
(12, '', 'img/negotiation.png', 'Entrega Digital', 'Entregas y Sesiones por medios virtuales como Emails, Skype para reiterar la conformidad de nuestros cliente en cada paso del proyecto.', '#', 1, '2', 'es', NULL),
(13, '', 'img/cms.png', 'Sistema de Administracion', 'Incluye nuestro Intuitivo y Propio Sistema de Administracion(CMS) para que puedas realizar cualquier cambio.', '#', 1, '2', 'es', 'none'),
(14, '', NULL, 'Información', '<p class="text-white">Construimos y realizamos aplicaciones, sistemas, o diseños bajo plataforma web adaptativo a cualquier pantalla o dispositivo con un propio sistema de administración.</p>				<p class="text-white">Trabajamos de forma remota y nos adecuamos a tu horario de trabajo</p>', '#', 1, '5', 'es', NULL),
(15, '', NULL, 'Sobre Nosotros', '<p class="text-white">somos una startup, dedicada al desarrollo de aplicaciones, sistemas y diseño web por medio de trabajo remoto( e-Lancer) adaptandonos a cualquier tipo de proyecto o negocio haciendolo crecer rapidamente y posicionandolo en la web.</p>', '#', 1, '5', 'es', NULL),
(16, '', NULL, 'Contáctanos', '<ul class="list-unstyled">\r\n				<li>(DE) +49-15158381539</li>\r\n				<li>(PE) +51-949882401</li>\r\n				<li>contacto@cigarrita-worker.pe.hu</li>\r\n				<li>94315 Straubing, Deutschland</li>\r\n			</ul>', '#', 1, '5', 'es', 'col-xs-6'),
(17, '', '', 'Conéctate', '<ul class="list-unstyled"><li style="margin-bottom:5px"><a href="https://www.facebook.com/cigarritaworker" class="text-white"><i class=" circular inverted icon facebook medium"></i>Facebook</a></li><li style="margin-bottom:5px"><a href="#" class="text-white"><i class="circular inverted icon twitter medium"></i>Twitter</a></li><li style="margin-bottom:5px"><a href="#" class="text-white"><i class="circular inverted icon google plus medium"></i>Google+</a></li><li style="margin-bottom:5px"><a href="#" class="text-white"><i class="circular inverted icon youtube medium"></i>Youtube</a></li></ul>', '#', 1, '5', 'es', 'col-xs-6'),
(18, '', 'img/yenth-home.png', 'Yenth Ccora SurfBoards', '<p style="font-size:12px">Sito Web diseñado para el Shaper de Surfboards Yenth Ccora en Huanchaco adaptable en cualquier dispositivo</p><a href="http://yenthccora.com" class="link-portafolio" target="_blank">www.yenthccora.com</a>', '#', 1, '4', 'es', 'photo'),
(19, '', 'img/home_surfhostel.png', 'Surf Hostel Meri', '<p style="font-size:12px">Sito Web diseñado para Hostel Meri en Huanchaco con un panel administrativo(CMS) y adaptable en cualquier dispositivo </p>\n				    				<a href="http://surfhostelmeri.com" class="link-portafolio" target="_blank">www.surfhostelmeri.com</a>', '#', 1, '4', 'es', 'hand up'),
(20, '', '', 'Solo Canchas', '<p style="font-size:12px">Aplicaciones Web, Guia electronica que te permite reservar canchas online en las principales ciudades de Perú</p>\n				    				<a href="http://solocanchas.com" class="link-portafolio" target="_blank">www.solocanchas.com</a>', '#', 1, '4', 'es', 'book basic'),
(21, '', 'img/home-moreno.png', 'Moreno y Asociados S.C', '<p style="font-size:12px">Sito web Moreno y ASociados Consultora ofrciendo sus servicios de Contabilidad, constitucion de empresas, etc. con un diseño adaptativo y un panel de adminstracion (CMS)</p><a href="http://www.morenoyasociados.pe.hu" class="link-portafolio" target="_blank">morenoyasociados.pe.hu</a>', '#', 1, '4', 'es', 'empty wrench'),
(22, '', '', '', 'Al Introducir tus datos se te afiliará, serás notificado automáticamente y se te responderá lo mas pronto posible', '#', 1, '6', 'es', ''),
(23, '', '', 'blog uno', 'prueba de blog entrada uno<br>', '#', 1, '18', 'es', ''),
(24, '', 'files/file2015-04-10-21-29-4375969_558313060875267_1428882545_n.jpg', 'Cute Dogie', '<p>This is a cute dogs come in a variety of shapes and sizes. Some cute dogs are cute for their adorable faces, others for their tiny stature, and even others for their massive size.</p>\n			        <p>Many people also have their own barometers for what makes a cute dog.</p>', '#ver', 1, '20', 'es', ''),
(25, '', 'files/file2015-04-10-21-36-34Be-Proactive.jpg', 'dog post 2', '<p>Cute dogs come in a variety of shapes and sizes. Some cute dogs are cute for their adorable faces, others for their tiny stature, and even others for their massive size.</p><p>Many people also have their own barometers for what makes a cute dog.</p>', '#ver2', 1, '20', 'es', ''),
(48, '', 'files/file2015-05-14-14-24-34chartup.png', 'Crece y Obten mas clientes', 'Posicionamos tu Web(SEO) haciendo que tu negocio crezca obteniendo mas Leads y se posicione en Internet rápidamente.', '#', 1, '35', 'pe', NULL),
(49, '', 'img/mobile.png', 'Diseños Adaptable', 'Los diseños, Aplicaciones y Sistemas Web son adaptativo para cualquier dispositivo con un intuitivo y buena experiencia de usuario.', '#', 1, '35', 'pe', NULL),
(50, '', 'img/global.png', 'Trabajo Remoto', 'Nuestra forma de trabajo es Remoto entonces no te preocupes por tu agenda, puedes contactarnos desde donde estes.', '#', 1, '35', 'pe', NULL),
(51, '', 'img/portafolio.png', 'Portafolio y Asesoria', 'Tenemos una amplia carta y portafolio ajustable a tu bolsillo, con asesoria gratuita para mejorar tu proyecto o hacer crecer tu negocio.', '#', 1, '35', 'pe', NULL),
(52, '', 'img/papelidea.png', 'Haz Realidad tu Idea', 'Contruimos y Virtualizamos Cualquier idea o Proyecto&nbsp; haciéndolo realidad.', '#', 1, '35', 'pe', NULL),
(53, '', 'img/security.png', 'PayPal/Payonner Pagos', 'La forma de pago es segura ya que utilizamos plataformas como PayPal o Payonner para transacciones por Internet.', '#', 1, '35', 'pe', NULL),
(54, '', 'img/negotiation.png', 'Entrega Digital', 'Entregas y Sesiones por medios virtuales como Emails, Skype para reiterar la conformidad de nuestros cliente en cada paso del proyecto.', '#', 1, '35', 'pe', NULL),
(55, '', 'img/cms.png', 'Sistema de Administracion', 'Incluye nuestro Intuitivo y Propio Sistema de Administracion(CMS) para que puedas realizar cualquier cambio.', '#', 1, '35', 'pe', NULL),
(56, '', 'img/yenth-home.png', 'Yenth Ccora SurfBoards', '<p style="font-size:12px">Sito Web diseñado para el Shaper de Surfboards Yenth Ccora en Huanchaco adaptable en cualquier dispositivo</p><a href="http://yenthccora.com" class="link-portafolio" target="_blank">www.yenthccora.com</a>', '#', 1, '36', 'pe', NULL),
(57, '', 'img/home_surfhostel.png', 'Surf Hostel Meri', '<p style="font-size:12px">Sito Web diseñado para Hostel Meri en Huanchaco con un panel administrativo(CMS) y adaptable en cualquier dispositivo </p>\n				    				<a href="http://surfhostelmeri.com" class="link-portafolio" target="_blank">www.surfhostelmeri.com</a>', '#', 1, '36', 'pe', NULL),
(58, '', '', 'Solo Canchas', '<p style="font-size:12px">Aplicaciones Web, Guia electronica que te permite reservar canchas online en las principales ciudades de Perú</p>\n				    				<a href="http://solocanchas.com" class="link-portafolio" target="_blank">www.solocanchas.com</a>', '#', 1, '36', 'pe', NULL),
(59, '', 'img/home-moreno.png', 'Moreno y Asociados S.C', '<p style="font-size:12px">Sito web Moreno y ASociados Consultora ofrciendo sus servicios de Contabilidad, constitucion de empresas, etc. con un diseño adaptativo y un panel de adminstracion (CMS)</p><a href="http://www.morenoyasociados.pe.hu" class="link-portafolio" target="_blank">morenoyasociados.pe.hu</a>', '#', 1, '36', 'pe', NULL),
(60, '', '', '', 'Al Introducir tus datos se te afiliará, serás notificado automáticamente y se te responderá lo mas pronto posible', '#', 1, '38', 'pe', NULL),
(61, '', NULL, 'Información', '<p class="text-white">Construimos y realizamos aplicaciones, sistemas, o diseños bajo plataforma web adaptativo a cualquier pantalla o dispositivo con un propio sistema de administración.</p>				<p class="text-white">Trabajamos de forma remota y nos adecuamos a tu horario de trabajo</p>', '#', 1, '39', 'pe', NULL),
(62, '', NULL, 'Sobre Nosotros', '<p class="text-white">somos una startup, dedicada al desarrollo de aplicaciones, sistemas y diseño web por medio de trabajo remoto( e-Lancer) adaptandonos a cualquier tipo de proyecto o negocio haciendolo crecer rapidamente y posicionandolo en la web.</p>', '#', 1, '39', 'pe', NULL),
(63, '', NULL, 'Contáctanos', '<ul class="list-unstyled">\r\n				<li>(DE) +49-15158381539</li>\r\n				<li>(PE) +51-949882401</li>\r\n				<li>contacto@cigarrita-worker.pe.hu</li>\r\n				<li>94315 Straubing, Deutschland</li>\r\n			</ul>', '#', 1, '39', 'pe', NULL),
(64, '', '', 'Conéctate', '<ul class="list-unstyled"><li style="margin-bottom:5px"><a href="https://www.facebook.com/cigarritaworker" class="text-white"><i class=" circular inverted icon facebook medium"></i>Facebook</a></li><li style="margin-bottom:5px"><a href="#" class="text-white"><i class="circular inverted icon twitter medium"></i>Twitter</a></li><li style="margin-bottom:5px"><a href="#" class="text-white"><i class="circular inverted icon google plus medium"></i>Google+</a></li><li style="margin-bottom:5px"><a href="#" class="text-white"><i class="circular inverted icon youtube medium"></i>Youtube</a></li></ul>', '#', 1, '39', 'pe', NULL),
(65, '', 'img/growup.png', 'Quieres ver Crecer tu Proyecto en Internet?', 'none', '#', 1, '40', 'pe', NULL),
(66, '', 'img/tellus.png', 'Cuéntanos sobre tus Proyectos', 'none', '#', 1, '40', 'pe', NULL),
(67, '', 'img/money.png', 'Quieres Obtener más ingresos en tu Negocio?', '<p><br></p>', '#', 1, '40', 'pe', NULL),
(68, '', 'files/file2015-04-10-21-29-4375969_558313060875267_1428882545_n.jpg', 'Cute Dogie', '<p>This is a cute dogs come in a variety of shapes and sizes. Some cute dogs are cute for their adorable faces, others for their tiny stature, and even others for their massive size.</p>\n			        <p>Many people also have their own barometers for what makes a cute dog.</p>', '#ver', 1, '41', 'pe', NULL),
(69, '', 'files/file2015-04-10-21-36-34Be-Proactive.jpg', 'dog post 2', '<p>Cute dogs come in a variety of shapes and sizes. Some cute dogs are cute for their adorable faces, others for their tiny stature, and even others for their massive size.</p><p>Many people also have their own barometers for what makes a cute dog.</p>', '#ver2', 1, '41', 'pe', NULL),
(70, '', 'files/file2015-05-14-14-24-34chartup.png', 'Crece y Obten mas clientes', 'Posicionamos tu Web(SEO) haciendo que tu negocio crezca obteniendo mas Leads y se posicione en Internet rápidamente.', '#', 1, '42', 'en', NULL),
(71, '', 'img/mobile.png', 'Diseños Adaptable', 'Los diseños, Aplicaciones y Sistemas Web son adaptativo para cualquier dispositivo con un intuitivo y buena experiencia de usuario.', '#', 1, '42', 'en', NULL),
(72, '', 'img/global.png', 'Trabajo Remoto', 'Nuestra forma de trabajo es Remoto entonces no te preocupes por tu agenda, puedes contactarnos desde donde estes.', '#', 1, '42', 'en', NULL),
(73, '', 'img/portafolio.png', 'Portafolio y Asesoria', 'Tenemos una amplia carta y portafolio ajustable a tu bolsillo, con asesoria gratuita para mejorar tu proyecto o hacer crecer tu negocio.', '#', 1, '42', 'en', NULL),
(74, '', 'img/papelidea.png', 'Haz Realidad tu Idea', 'Contruimos y Virtualizamos Cualquier idea o Proyecto&nbsp; haciéndolo realidad.', '#', 1, '42', 'en', NULL),
(75, '', 'img/security.png', 'PayPal/Payonner Pagos', 'La forma de pago es segura ya que utilizamos plataformas como PayPal o Payonner para transacciones por Internet.', '#', 1, '42', 'en', NULL),
(76, '', 'img/negotiation.png', 'Entrega Digital', 'Entregas y Sesiones por medios virtuales como Emails, Skype para reiterar la conformidad de nuestros cliente en cada paso del proyecto.', '#', 1, '42', 'en', NULL),
(77, '', 'img/cms.png', 'Sistema de Administracion', 'Incluye nuestro Intuitivo y Propio Sistema de Administracion(CMS) para que puedas realizar cualquier cambio.', '#', 1, '42', 'en', NULL),
(78, '', 'img/yenth-home.png', 'Yenth Ccora SurfBoards', '<p style="font-size:12px">Sito Web diseñado para el Shaper de Surfboards Yenth Ccora en Huanchaco adaptable en cualquier dispositivo</p><a href="http://yenthccora.com" class="link-portafolio" target="_blank">www.yenthccora.com</a>', '#', 1, '43', 'en', NULL),
(79, '', 'img/home_surfhostel.png', 'Surf Hostel Meri', '<p style="font-size:12px">Sito Web diseñado para Hostel Meri en Huanchaco con un panel administrativo(CMS) y adaptable en cualquier dispositivo </p>\n				    				<a href="http://surfhostelmeri.com" class="link-portafolio" target="_blank">www.surfhostelmeri.com</a>', '#', 1, '43', 'en', NULL),
(80, '', '', 'Solo Canchas', '<p style="font-size:12px">Aplicaciones Web, Guia electronica que te permite reservar canchas online en las principales ciudades de Perú</p>\n				    				<a href="http://solocanchas.com" class="link-portafolio" target="_blank">www.solocanchas.com</a>', '#', 1, '43', 'en', NULL),
(81, '', 'img/home-moreno.png', 'Moreno y Asociados S.C', '<p style="font-size:12px">Sito web Moreno y ASociados Consultora ofrciendo sus servicios de Contabilidad, constitucion de empresas, etc. con un diseño adaptativo y un panel de adminstracion (CMS)</p><a href="http://www.morenoyasociados.pe.hu" class="link-portafolio" target="_blank">morenoyasociados.pe.hu</a>', '#', 1, '43', 'en', NULL),
(82, '', '', '', 'Al Introducir tus datos se te afiliará, serás notificado automáticamente y se te responderá lo mas pronto posible', '#', 1, '45', 'en', NULL),
(83, '', NULL, 'Información', '<p class="text-white">Construimos y realizamos aplicaciones, sistemas, o diseños bajo plataforma web adaptativo a cualquier pantalla o dispositivo con un propio sistema de administración.</p>				<p class="text-white">Trabajamos de forma remota y nos adecuamos a tu horario de trabajo</p>', '#', 1, '46', 'en', NULL),
(84, '', NULL, 'Sobre Nosotros', '<p class="text-white">somos una startup, dedicada al desarrollo de aplicaciones, sistemas y diseño web por medio de trabajo remoto( e-Lancer) adaptandonos a cualquier tipo de proyecto o negocio haciendolo crecer rapidamente y posicionandolo en la web.</p>', '#', 1, '46', 'en', NULL),
(85, '', NULL, 'Contáctanos', '<ul class="list-unstyled">\r\n				<li>(DE) +49-15158381539</li>\r\n				<li>(PE) +51-949882401</li>\r\n				<li>contacto@cigarrita-worker.pe.hu</li>\r\n				<li>94315 Straubing, Deutschland</li>\r\n			</ul>', '#', 1, '46', 'en', NULL),
(86, '', '', 'Conéctate', '<ul class="list-unstyled"><li style="margin-bottom:5px"><a href="https://www.facebook.com/cigarritaworker" class="text-white"><i class=" circular inverted icon facebook medium"></i>Facebook</a></li><li style="margin-bottom:5px"><a href="#" class="text-white"><i class="circular inverted icon twitter medium"></i>Twitter</a></li><li style="margin-bottom:5px"><a href="#" class="text-white"><i class="circular inverted icon google plus medium"></i>Google+</a></li><li style="margin-bottom:5px"><a href="#" class="text-white"><i class="circular inverted icon youtube medium"></i>Youtube</a></li></ul>', '#', 1, '46', 'en', NULL),
(87, '', 'img/growup.png', 'Quieres ver Crecer tu Proyecto en Internet?', 'none', '#', 1, '47', 'en', NULL),
(88, '', 'img/tellus.png', 'Cuéntanos sobre tus Proyectos', 'none', '#', 1, '47', 'en', NULL),
(89, '', 'img/money.png', 'Quieres Obtener más ingresos en tu Negocio?', '<p><br></p>', '#', 1, '47', 'en', NULL),
(90, '', 'files/file2015-04-10-21-29-4375969_558313060875267_1428882545_n.jpg', 'Cute Dogie', '<p>This is a cute dogs come in a variety of shapes and sizes. Some cute dogs are cute for their adorable faces, others for their tiny stature, and even others for their massive size.</p>\n			        <p>Many people also have their own barometers for what makes a cute dog.</p>', '#ver', 1, '49', 'de', NULL),
(91, '', 'files/file2015-04-10-21-36-34Be-Proactive.jpg', 'dog post 2', '<p>Cute dogs come in a variety of shapes and sizes. Some cute dogs are cute for their adorable faces, others for their tiny stature, and even others for their massive size.</p><p>Many people also have their own barometers for what makes a cute dog.</p>', '#ver2', 1, '49', 'de', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sub_menu`
--

CREATE TABLE IF NOT EXISTS `sub_menu` (
  `idsub_menu` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `url` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idsub_menu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `template`
--

CREATE TABLE IF NOT EXISTS `template` (
  `name` varchar(200) NOT NULL,
  `idtemplate` int(11) NOT NULL AUTO_INCREMENT,
  `estado` int(2) NOT NULL DEFAULT '1',
  `code` varchar(600) NOT NULL,
  PRIMARY KEY (`idtemplate`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `template`
--

INSERT INTO `template` (`name`, `idtemplate`, `estado`, `code`) VALUES
('about', 1, 1, ''),
('projects', 2, 1, ''),
('services', 3, 1, ''),
('contact', 4, 1, ''),
('costumer', 5, 1, ''),
('principal', 6, 1, ''),
('blog', 7, 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `estado` int(11) DEFAULT '1',
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`iduser`, `username`, `password`, `estado`) VALUES
(1, 'admin', 'c33367701511b4f6020ec61ded352059', 1),
(2, 'prueba', 'c33367701511b4f6020ec61ded352059', 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `AuthAssignment`
--
ALTER TABLE `AuthAssignment`
  ADD CONSTRAINT `fk_AuthAssignment_1` FOREIGN KEY (`itemname`) REFERENCES `AuthItem` (`name`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `AuthItemChild`
--
ALTER TABLE `AuthItemChild`
  ADD CONSTRAINT `fk_AuthItemChild_1` FOREIGN KEY (`parent`) REFERENCES `AuthItem` (`name`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_AuthItemChild_2` FOREIGN KEY (`child`) REFERENCES `AuthItem` (`name`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `content_post`
--
ALTER TABLE `content_post`
  ADD CONSTRAINT `fk_content_post_1` FOREIGN KEY (`idcontent`) REFERENCES `content` (`idcontent`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_content_post_2` FOREIGN KEY (`idpost`) REFERENCES `post` (`idpost`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `menu_sub_menu`
--
ALTER TABLE `menu_sub_menu`
  ADD CONSTRAINT `fk_menu_sub_menu_1` FOREIGN KEY (`idmenu`) REFERENCES `menu` (`idmenu`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_menu_sub_menu_2` FOREIGN KEY (`idsub_menu`) REFERENCES `sub_menu` (`idsub_menu`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
