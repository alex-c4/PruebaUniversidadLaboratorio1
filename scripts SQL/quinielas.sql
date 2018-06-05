-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-06-2018 a las 04:30:26
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
-- Estructura de tabla para la tabla `quinielas`
--

CREATE TABLE `quinielas` (
  `id_quiniela` int(11) NOT NULL,
  `id_championship` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_type` int(11) NOT NULL,
  `id_user_creador` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `quinielas`
--

INSERT INTO `quinielas` (`id_quiniela`, `id_championship`, `nombre`, `id_type`, `id_user_creador`, `created_at`, `updated_at`) VALUES
(1, 1, 'Quiniela Publica Rusia 2018', 1, 64, '2018-05-27 04:00:00', '2018-05-27 04:00:00'),
(2, 1, 'Quiniela Privada Rusia 2018', 2, 64, '2018-06-01 04:00:00', '2018-06-01 04:00:00'),
(3, 1, 'Quiniela Privada Rusia 2018 - 2', 2, 7, '2018-06-02 04:00:00', '2018-06-02 04:00:00'),
(4, 2, 'Quiniela Publica UEFA 2019', 1, 64, NULL, NULL);

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
  MODIFY `id_quiniela` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
