-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-05-2018 a las 06:21:23
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
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `id_mensaje` int(10) NOT NULL,
  `id_remitente` int(10) NOT NULL,
  `id_destinatario` int(10) NOT NULL,
  `id_intercambio` int(10) NOT NULL,
  `texto` varchar(300) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`id_mensaje`, `id_remitente`, `id_destinatario`, `id_intercambio`, `texto`, `fecha`, `hora`, `updated_at`, `created_at`) VALUES
(1, 99, 2021, 56, ' primer mesaje bueas tardes amigo estoy interesado en intercambia la barajita que tienes rpetida, por favor comuncate comigo etc etc etc bla bla bla bla bla bla bla bla bla bla bla bla gracias...', '2018-04-22', '09:22:45', '2018-04-26 01:26:15', '2018-04-22 13:22:45'),
(2, 99, 2021, 56, 'segundo mensaje', '2018-04-24', '04:30:03', '2018-04-24 08:30:03', '2018-04-24 08:30:03'),
(3, 2021, 99, 56, 'tercer mensaje\r\na er', '2018-04-24', '04:30:32', '2018-04-26 01:26:53', '2018-04-24 08:30:32'),
(4, 99, 2021, 56, 'cuartomensajede la coneversasion', '2018-04-24', '04:30:54', '2018-04-24 08:30:54', '2018-04-24 08:30:54'),
(5, 99, 2021, 56, 'cuarto mensaje de la conversación', '2018-04-24', '04:31:24', '2018-04-24 08:31:24', '2018-04-24 08:31:24'),
(6, 2021, 99, 56, 'quino mensaje de la conversación', '2018-04-24', '04:31:52', '2018-04-25 21:07:49', '2018-04-24 08:31:52'),
(7, 99, 2021, 56, 'a ver si funciona', '2018-04-26', '06:48:11', '2018-04-26 06:48:53', '2018-04-26 10:48:11'),
(8, 99, 2021, 689, 'aver si mando el id intercambio correctoyqresulta', '2018-04-26', '08:54:55', '2018-04-26 12:54:55', '2018-04-26 12:54:55'),
(9, 99, 2021, 57, 'saludos, aun tiene disponiblidad de labarajita', '2018-04-26', '09:09:49', '2018-04-26 13:09:49', '2018-04-26 13:09:49'),
(10, 99, 2021, 57, 'buenas espero respuesta gacias', '2018-04-26', '09:12:40', '2018-04-26 13:12:40', '2018-04-26 13:12:40'),
(11, 99, 2021, 57, 'buenas espero respuesta gacias', '2018-04-26', '09:20:09', '2018-04-26 13:20:09', '2018-04-26 13:20:09'),
(12, 99, 2021, 57, 'buenas espero respuesta gacias', '2018-04-26', '09:21:13', '2018-04-26 13:21:13', '2018-04-26 13:21:13'),
(13, 99, 2021, 57, 'buenas espero respuesta gacias', '2018-04-26', '09:21:24', '2018-04-26 13:21:24', '2018-04-26 13:21:24'),
(14, 99, 2021, 57, 'buenas espero respuesta gacias', '2018-04-26', '09:21:52', '2018-04-26 13:21:52', '2018-04-26 13:21:52'),
(15, 99, 2022, 61, 'señor robertoaun tienedisponibilidad????', '2018-04-26', '09:22:58', '2018-04-26 13:22:58', '2018-04-26 13:22:58'),
(16, 99, 2021, 56, 'mensaje con validcion desCTIVADA', '2018-04-26', '21:55:38', '2018-04-27 01:55:38', '2018-04-27 01:55:38'),
(17, 99, 2021, 56, 'FUNCION', '2018-04-26', '21:56:20', '2018-04-27 01:56:20', '2018-04-27 01:56:20'),
(18, 99, 2021, 56, 'registro delpues de fallade pull', '2018-04-27', '02:02:50', '2018-04-27 06:02:50', '2018-04-27 06:02:50'),
(19, 99, 2021, 56, 'mensaje jueves', '2018-04-27', '05:10:51', '2018-04-27 09:10:51', '2018-04-27 09:10:51'),
(20, 99, 2021, 56, 'cwec', '2018-04-27', '06:04:50', '2018-04-27 10:04:50', '2018-04-27 10:04:50'),
(21, 99, 2021, 56, 'cwec', '2018-04-27', '06:05:42', '2018-04-27 10:05:42', '2018-04-27 10:05:42'),
(22, 99, 2021, 56, 'cualkier cosa', '2018-04-29', '21:50:03', '2018-04-30 01:50:03', '2018-04-30 01:50:03'),
(23, 99, 2022, 61, 'fghfhgf', '2018-04-29', '23:28:19', '2018-04-30 03:28:19', '2018-04-30 03:28:19'),
(24, 99, 2022, 61, 'fghfhgfhghjgjhgj', '2018-04-29', '23:28:44', '2018-04-30 03:28:44', '2018-04-30 03:28:44'),
(25, 99, 2022, 61, 'hhhh', '2018-04-29', '23:36:04', '2018-04-30 03:36:04', '2018-04-30 03:36:04');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id_mensaje`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id_mensaje` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
