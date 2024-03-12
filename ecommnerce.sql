-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 12-03-2024 a las 00:33:38
-- Versión del servidor: 8.0.27
-- Versión de PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ecommnerce`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

DROP TABLE IF EXISTS `pedido`;
CREATE TABLE IF NOT EXISTS `pedido` (
  `codped` int NOT NULL AUTO_INCREMENT,
  `codusu` int NOT NULL,
  `codpro` int NOT NULL,
  `fecped` datetime NOT NULL,
  `estado` int NOT NULL,
  `dirusuped` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `telusuped` varchar(12) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`codped`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`codped`, `codusu`, `codpro`, `fecped`, `estado`, `dirusuped`, `telusuped`) VALUES
(12, 1, 3, '2023-06-21 23:43:05', 3, 'hola', 'hola'),
(22, 1, 1, '2023-06-28 12:04:28', 2, 'hola', 'hola'),
(18, 1, 2, '2023-06-27 18:10:49', 2, 'hola', 'hola');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

DROP TABLE IF EXISTS `producto`;
CREATE TABLE IF NOT EXISTS `producto` (
  `codpro` int NOT NULL AUTO_INCREMENT,
  `nompro` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `despro` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `prepro` decimal(6,2) DEFAULT NULL,
  `estado` int DEFAULT NULL,
  `rutimapro` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`codpro`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`codpro`, `nompro`, `despro`, `prepro`, `estado`, `rutimapro`) VALUES
(1, 'Papel Crepe', 'Ideal para decoraci&oacute;n de trabajos escolares', '14.99', 1, 'crepe.jpg'),
(2, 'Papel Bond A4', 'Papel ultra blanco de 180gr', '9.99', 1, 'bonda4.jpg'),
(3, 'Colores Faber Castell', 'Caja de colores x 12 unid. + 2 de regalo', '5.99', 1, 'colores12unid.jpg'),
(4, 'Ecolapices Faber Castell', 'Caja de ecolapices x 60 unid.', '11.99', 1, 'ecolapices60unid.jpg'),
(5, 'Estuche lapices Faber Castell', 'Estuche de lapiceros de colores x 5 unid.', '6.99', 1, 'lapiceros5unid.jpg'),
(6, 'Tempera Artesco 250 ml', 'Frasco de tempera Artesco de 250 ml', '3.99', 1, 'temperaartesco.jpg'),
(7, 'Plastilina Norma', 'Caja con 12 barras plastilinas. 260 gr', '5.99', 1, 'plastilinanorma.jpg'),
(8, 'Cuaderno Standford', 'Cuaderno cuadriculado Standford 100 hojas', '3.49', 1, 'cuadernostandford.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `codusu` int NOT NULL AUTO_INCREMENT,
  `nomusu` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `apeusu` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `emausu` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `pasusu` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `estado` int NOT NULL,
  PRIMARY KEY (`codusu`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`codusu`, `nomusu`, `apeusu`, `emausu`, `pasusu`, `estado`) VALUES
(1, 'Usuario', 'Demo', 'correo@example.com', '123456', 1),
(2, NULL, NULL, 'anthony@gmail.com', '1234', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
