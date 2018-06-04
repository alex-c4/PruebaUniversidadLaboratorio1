-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-06-2018 a las 09:04:23
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
-- Estructura de tabla para la tabla `pronostics`
--

CREATE TABLE `pronostics` (
  `id` int(11) NOT NULL,
  `bet_id` int(11) NOT NULL,
  `id_quiniela` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_game` int(11) NOT NULL,
  `pronostic_club_1` int(11) NOT NULL,
  `pronostic_club_2` int(11) NOT NULL,
  `pronostic_score` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `pronostics`
--

INSERT INTO `pronostics` (`id`, `bet_id`, `id_quiniela`, `id_user`, `id_game`, `pronostic_club_1`, `pronostic_club_2`, `pronostic_score`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 2, 4, 0, '2018-06-01 02:08:41', '2018-06-01 11:32:24'),
(2, 2, 1, 2, 1, 5, 0, 0, '2018-06-01 02:08:41', '2018-06-01 11:08:24'),
(3, 3, 1, 3, 1, 3, 3, 0, '2018-06-01 02:11:07', '2018-06-01 11:32:24'),
(4, 4, 1, 4, 1, 5, 6, 0, '2018-06-01 02:11:07', '2018-06-01 11:32:24');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pronostics`
--
ALTER TABLE `pronostics`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pronostics`
--
ALTER TABLE `pronostics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
