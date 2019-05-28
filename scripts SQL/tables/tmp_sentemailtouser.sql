-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-05-2019 a las 04:21:02
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
-- Estructura de tabla para la tabla `tmp_sentemailtouser`
--

CREATE TABLE `tmp_sentemailtouser` (
  `id` int(11) NOT NULL,
  `nameCurrUser` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `lastNameCurrUser` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `nameUser` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `lastNameUser` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `stickerId` int(11) NOT NULL,
  `stickerNumber` int(11) NOT NULL,
  `enviado` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tmp_sentemailtouser`
--

INSERT INTO `tmp_sentemailtouser` (`id`, `nameCurrUser`, `lastNameCurrUser`, `user_id`, `nameUser`, `lastNameUser`, `stickerId`, `stickerNumber`, `enviado`) VALUES
(1, 'alex', 'peñaloza', 337, 'Alex', 'peñaloza', 51, 12, 0),
(2, 'Daniel', 'Luna', 337, 'Alex', 'peñaloza', 51, 12, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tmp_sentemailtouser`
--
ALTER TABLE `tmp_sentemailtouser`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tmp_sentemailtouser`
--
ALTER TABLE `tmp_sentemailtouser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
