-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-05-2018 a las 03:54:19
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `xportgoldbd_pruebas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clubs`
--

CREATE TABLE `clubs` (
  `id_club` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `imagen_bandera` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `imagen_logo` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `clubs`
--

INSERT INTO `clubs` (`id_club`, `nombre`, `imagen_bandera`, `imagen_logo`) VALUES
(1, 'Alemania', '', ''),
(2, 'Arabia Saudí', '', ''),
(3, 'Argentina', '', ''),
(4, 'Australia', '', ''),
(5, 'Bélgica', '', ''),
(6, 'Brasil', '', ''),
(7, 'Colombia', '', ''),
(8, 'Costa Rica', '', ''),
(9, 'Croacia', '', ''),
(10, 'Dinamarca', '', ''),
(11, 'Egipto', '', ''),
(12, 'España', '', ''),
(13, 'Francia', '', ''),
(14, 'Inglaterra', '', ''),
(15, 'Islandia', '', ''),
(16, 'Japón', '', ''),
(17, 'Marruecos', '', ''),
(18, 'México', '', ''),
(19, 'Nigeria', '', ''),
(20, 'Panamá', '', ''),
(21, 'Perú', '', ''),
(22, 'Polonia', '', ''),
(23, 'Portugal', '', ''),
(24, 'República de Corea', '', ''),
(25, 'RI de Irán', '', ''),
(26, 'Rusia', '', ''),
(27, 'Senegal', '', ''),
(28, 'Serbia', '', ''),
(29, 'Suecia', '', ''),
(30, 'Suiza', '', ''),
(31, 'Túnez', '', ''),
(32, 'Uruguay', '', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`id_club`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clubs`
--
ALTER TABLE `clubs`
  MODIFY `id_club` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
