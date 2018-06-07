-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-06-2018 a las 13:05:03
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `xportgoldbd`
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
(1, 'Alemania', 'Alemania.png', ''),
(2, 'Arabia Saudí', 'ArabiaSaudita.png', ''),
(3, 'Argentina', 'Argentina.png', ''),
(4, 'Australia', 'Australia.png', ''),
(5, 'Bélgica', 'Belgica.png', ''),
(6, 'Brasil', 'Brasil.png', ''),
(7, 'Colombia', 'Colombia.png', ''),
(8, 'Costa Rica', 'CostaRica.png', ''),
(9, 'Croacia', 'Croacia.png', ''),
(10, 'Dinamarca', 'Dinamarca.png', ''),
(11, 'Egipto', 'Egipto.png', ''),
(12, 'España', 'Espana.png', ''),
(13, 'Francia', 'Francia.png', ''),
(14, 'Inglaterra', 'Inglaterra.png', ''),
(15, 'Islandia', 'Islandia.png', ''),
(16, 'Japón', 'Japon.png', ''),
(17, 'Marruecos', 'Marruecos.png', ''),
(18, 'México', 'Mexico.png', ''),
(19, 'Nigeria', 'Nigeria.png', ''),
(20, 'Panamá', 'Panama.png', ''),
(21, 'Perú', 'Peru.png', ''),
(22, 'Polonia', 'Polonia.png', ''),
(23, 'Portugal', 'Portugal.png', ''),
(24, 'República de Corea', 'CoreaDelSur.png', ''),
(25, 'RI de Irán', 'Iran.png', ''),
(26, 'Rusia', 'Rusia.png', ''),
(27, 'Senegal', 'Senegal.png', ''),
(28, 'Serbia', 'Serbia.png', ''),
(29, 'Suecia', 'Suecia.png', ''),
(30, 'Suiza', 'Suiza.png', ''),
(31, 'Túnez', 'Tunez.png', ''),
(32, 'Uruguay', 'Uruguay.png', '');

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
