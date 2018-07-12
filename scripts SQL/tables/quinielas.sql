-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 08-07-2018 a las 07:57:32
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
-- Estructura de tabla para la tabla `quinielas`
--

CREATE TABLE `quinielas` (
  `id_quiniela` int(11) NOT NULL,
  `id_championship` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_type` int(11) NOT NULL,
  `id_user_creador` int(11) NOT NULL,
  `code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `quinielas`
--

INSERT INTO `quinielas` (`id_quiniela`, `id_championship`, `nombre`, `id_type`, `id_user_creador`, `code`, `isActive`, `created_at`, `updated_at`) VALUES
(1, 1, 'Quiniela Fase Final Rusia 2018', 1, 64, '', 1, '2018-05-27 04:00:00', '2018-05-27 04:00:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `quinielas`
--
ALTER TABLE `quinielas`
  ADD PRIMARY KEY (`id_quiniela`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `quinielas`
--
ALTER TABLE `quinielas`
  MODIFY `id_quiniela` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
