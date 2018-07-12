-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 08-07-2018 a las 07:56:04
-- Versión del servidor: 5.6.39
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `xportgol_bd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activephases`
--

CREATE TABLE `activephases` (
  `id` int(11) NOT NULL,
  `championship_id` int(11) NOT NULL,
  `phase` varchar(50) NOT NULL DEFAULT 'eliminatoria' COMMENT 'eliminatoria, octavos, cuartos, semifinal, tercero, final'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `activephases`
--

INSERT INTO `activephases` (`id`, `championship_id`, `phase`) VALUES
(1, 1, 'semifinal');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `activephases`
--
ALTER TABLE `activephases`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `activephases`
--
ALTER TABLE `activephases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
