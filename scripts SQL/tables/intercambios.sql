-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-05-2018 a las 03:27:22
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
-- Base de datos: `xportgoldbd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `intercambios`
--

CREATE TABLE `intercambios` (
  `id_intercambio` int(10) NOT NULL,
  `id_barajita` int(6) NOT NULL COMMENT 'barajita a intercambiar',
  `id_usuario_solicitante` int(10) NOT NULL,
  `estatus` varchar(10) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `intercambios`
--

INSERT INTO `intercambios` (`id_intercambio`, `id_barajita`, `id_usuario_solicitante`, `estatus`, `updated_at`, `created_at`) VALUES
(56, 10, 2023, 'procesando', '2018-05-06 17:40:19', '0000-00-00 00:00:00'),
(57, 11, 2023, 'procesando', '2018-05-06 17:40:19', '0000-00-00 00:00:00'),
(58, 13, 99, 'procesando', '2018-05-06 17:40:19', '0000-00-00 00:00:00'),
(59, 14, 99, 'procesando', '2018-05-06 17:40:19', '0000-00-00 00:00:00'),
(60, 15, 80, 'procesando', '2018-05-06 17:40:19', '0000-00-00 00:00:00'),
(61, 16, 99, 'procesando', '2018-05-06 17:40:19', '0000-00-00 00:00:00'),
(63, 17, 2022, 'procesando', '2018-05-06 17:40:19', '0000-00-00 00:00:00'),
(64, 10, 99, 'EN PROCESO', '2018-05-07 07:19:16', '2018-05-07 07:19:16'),
(65, 10, 99, 'EN PROCESO', '2018-05-07 07:57:36', '2018-05-07 07:57:36'),
(66, 19, 99, 'EN PROCESO', '2018-05-07 07:57:46', '2018-05-07 07:57:46'),
(67, 19, 99, 'EN PROCESO', '2018-05-07 08:00:02', '2018-05-07 08:00:02'),
(68, 199, 99, 'EN PROCESO', '2018-05-07 08:00:18', '2018-05-07 08:00:18'),
(69, 200, 99, 'EN PROCESO', '2018-05-07 08:04:39', '2018-05-07 08:04:39'),
(70, 200, 99, 'EN PROCESO', '2018-05-07 08:05:04', '2018-05-07 08:05:04'),
(71, 10, 99, 'EN PROCESO', '2018-05-07 08:17:26', '2018-05-07 08:17:26'),
(72, 199, 99, 'EN PROCESO', '2018-05-07 08:25:24', '2018-05-07 08:25:24'),
(73, 10, 99, 'EN PROCESO', '2018-05-07 08:36:39', '2018-05-07 08:36:39'),
(74, 10, 99, 'EN PROCESO', '2018-05-07 08:39:37', '2018-05-07 08:39:37'),
(75, 10, 99, 'EN PROCESO', '2018-05-07 08:40:35', '2018-05-07 08:40:35'),
(76, 13, 99, 'EN PROCESO', '2018-05-07 09:03:33', '2018-05-07 09:03:33'),
(77, 16, 2023, 'EN PROCESO', '2018-05-07 09:22:57', '2018-05-07 09:22:57'),
(78, 101, 99, 'EN PROCESO', '2018-05-08 08:41:00', '2018-05-08 08:41:00'),
(79, 17, 2023, 'EN PROCESO', '2018-05-08 11:17:00', '2018-05-08 11:17:00'),
(80, 19, 2023, 'EN PROCESO', '2018-05-08 11:43:02', '2018-05-08 11:43:02');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `intercambios`
--
ALTER TABLE `intercambios`
  ADD PRIMARY KEY (`id_intercambio`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `intercambios`
--
ALTER TABLE `intercambios`
  MODIFY `id_intercambio` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
