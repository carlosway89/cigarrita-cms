-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 11-08-2015 a las 10:16:56
-- Versión del servidor: 5.5.44-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.11

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
(1, 'Cigarrita Worker - Web Designer & Developer', 'files/file2015-05-24-11-10-34word_yc.png', 'Web Design and Develop we build the best web app, desarrollo y diseño web construimos las mejores web app', 'es');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=285 ;

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
(276, 'update:Content', 'prueba', '127.0.0.1', '2015-05-17 17:37:54'),
(277, 'update:Menu', 'admin', '127.0.0.1', '2015-05-27 19:14:04'),
(278, 'update:Content', 'admin', '127.0.0.1', '2015-05-27 19:14:05'),
(279, 'update:Configuration', 'admin', '127.0.0.1', '2015-05-27 19:17:51'),
(280, 'update:Menu', 'admin', '127.0.0.1', '2015-07-05 17:48:08'),
(281, 'update:Content', 'admin', '127.0.0.1', '2015-07-05 17:48:09'),
(282, 'update:Post', 'admin', '127.0.0.1', '2015-08-06 10:19:11'),
(283, 'update:', 'admin', '127.0.0.1', '2015-08-06 10:30:58'),
(284, 'create:', 'admin', '127.0.0.1', '2015-08-06 10:34:24');

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
