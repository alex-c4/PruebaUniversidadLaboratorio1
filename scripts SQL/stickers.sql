-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-05-2018 a las 01:42:56
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
-- Estructura de tabla para la tabla `stickers`
--

DROP TABLE IF EXISTS `stickers`;
CREATE TABLE `stickers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `album_id` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `stickers`
--

INSERT INTO `stickers` (`id`, `user_id`, `number`, `quantity`, `album_id`, `updated_at`, `created_at`) VALUES
(1, 1, 4, 6, 1, '2018-04-26 06:01:39', '2018-04-26 05:26:57'),
(2, 1, 2, 4, 1, '2018-04-26 05:55:29', '2018-04-26 05:55:29'),
(3, 1, 7, 1, 1, '2018-04-26 06:05:52', '2018-04-26 05:55:46'),
(4, 1, 21, 1, 1, '2018-04-26 06:06:13', '2018-04-26 06:00:58'),
(5, 1, 24, 3, 1, '2018-04-26 06:06:45', '2018-04-26 06:06:28'),
(6, 2, 3, 9, 1, '2018-04-29 07:45:50', '2018-04-29 07:45:50'),
(7, 2, 8, 5, 1, '2018-04-29 07:47:07', '2018-04-29 07:47:07'),
(8, 2, 6, 90, 1, '2018-04-29 07:49:14', '2018-04-29 07:49:14'),
(9, 2, 57, 1, 1, '2018-04-29 07:49:45', '2018-04-29 07:49:45'),
(10, 2, 1, 1, 1, '2018-04-29 15:36:40', '2018-04-29 15:36:40');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `stickers`
--
ALTER TABLE `stickers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `stickers`
--
ALTER TABLE `stickers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
