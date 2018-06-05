-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-06-2018 a las 09:04:57
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
-- Estructura de tabla para la tabla `games`
--

CREATE TABLE `games` (
  `id` int(11) NOT NULL,
  `id_champ` int(11) NOT NULL DEFAULT '1',
  `id_club_1` int(11) DEFAULT NULL,
  `nombre_club_1` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `resultado_club_1` int(11) NOT NULL DEFAULT '0',
  `id_club_2` int(11) DEFAULT NULL,
  `nombre_club_2` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `resultado_club_2` int(11) NOT NULL DEFAULT '0',
  `fase` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ELIMINATORIAS',
  `grupo` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL DEFAULT '2018-06-16',
  `time` time NOT NULL DEFAULT '00:00:00',
  `estadium` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `location` text COLLATE utf8_unicode_ci NOT NULL,
  `estatus` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'SIN INICIAR',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `games`
--

INSERT INTO `games` (`id`, `id_champ`, `id_club_1`, `nombre_club_1`, `resultado_club_1`, `id_club_2`, `nombre_club_2`, `resultado_club_2`, `fase`, `grupo`, `date`, `time`, `estadium`, `location`, `estatus`, `created_at`, `updated_at`) VALUES
(1, 1, 26, 'Rusia', 0, 2, 'Arabia Saudí', 0, 'ELIMINATORIAS', 'A', '2018-06-14', '18:00:00', 'Luzhniki Stadium', 'Moscú', 'SIN INICIAR', '2018-05-26 01:38:46', '2018-06-01 11:32:24'),
(2, 1, 11, 'Egipto', 0, 32, 'Uruguay', 0, 'ELIMINATORIAS', 'A', '2018-06-15', '07:30:00', 'Ekaterinburg Arena', 'Ekaterinburg', 'SIN INICIAR', '2018-05-26 01:38:46', '2018-06-01 11:33:17'),
(3, 1, 17, 'Marruecos', 0, 25, 'RI de Irán', 0, 'ELIMINATORIAS', 'B', '2018-06-15', '18:00:00', 'estadio de San Petersburgo', 'San Petersburgo', 'SIN INICIAR', '2018-05-26 02:08:23', '2018-05-26 02:08:23'),
(4, 1, 23, 'Portugal', 0, 12, 'España', 0, 'ELIMINATORIAS', 'B', '2018-06-15', '21:00:00', 'Fisht Stadium', 'Sochi', 'SIN INICIAR', '2018-05-26 02:08:23', '2018-05-26 02:08:23'),
(5, 1, 13, 'Francia', 5, 4, 'Australia', 5, 'ELIMINATORIAS', 'C', '2018-06-16', '13:00:00', 'Kazan Arena', 'Kazan', 'SIN INICIAR', '2018-05-26 02:08:23', '2018-05-31 05:16:53'),
(6, 1, 3, 'Argentina', 0, 15, 'Islandia', 0, 'ELIMINATORIAS', 'D', '2018-06-16', '16:00:00', 'Spartak Stadium', 'Moscú', 'SIN INICIAR', '2018-05-26 02:08:23', '2018-05-26 02:08:23'),
(7, 1, 21, 'Perú', 0, 10, ' Dinamarca', 0, 'ELIMINATORIAS', 'C', '2018-06-16', '19:00:00', 'Mordovia Arena', 'Saransk', 'SIN INICIAR', '2018-05-26 02:08:23', '2018-05-26 02:08:23'),
(8, 1, 9, 'Croacia', 0, 19, 'Nigeria', 0, 'ELIMINATORIAS', 'D', '2018-06-16', '21:00:00', 'Kaliningrad Stadium', 'Kaliningrado', 'SIN INICIAR', '2018-05-26 03:03:58', '2018-05-26 03:03:58'),
(9, 1, 8, 'Costa Rica', 0, 28, 'Serbia', 0, 'ELIMINATORIAS', 'E', '2018-06-17', '16:00:00', 'Samara Arena', 'Samara', 'SIN INICIAR', '2018-05-26 03:03:58', '2018-05-26 03:03:58'),
(10, 1, 1, 'Alemania', 0, 18, 'México', 0, 'ELIMINATORIAS', 'F', '2018-06-17', '18:00:00', 'Luzhniki Stadium', 'Moscú', 'SIN INICIAR', '2018-05-26 03:03:58', '2018-05-26 03:03:58'),
(11, 1, 6, 'Brasil', 0, 30, 'Suiza', 0, 'ELIMINATORIAS', 'E', '2018-06-17', '21:00:00', 'Rostov Arena', 'Rostov del Don', 'SIN INICIAR', '2018-05-26 03:03:58', '2018-05-26 03:03:58'),
(12, 1, 29, 'Suecia', 0, 24, 'República de Corea', 0, 'ELIMINATORIAS', 'F', '2018-06-18', '15:00:00', 'Nizhny Novgorod Stadium', 'Nizhni Nóvgorod ', 'SIN INICIAR', '2018-05-26 03:03:58', '2018-05-26 03:03:58'),
(13, 1, 5, 'Bélgica', 0, 20, 'Panamá', 0, 'ELIMINATORIAS', 'G', '2018-06-18', '18:00:00', 'Fisht Stadium', 'Sochi', 'SIN INICIAR', '2018-05-26 03:18:02', '2018-05-26 03:18:02'),
(14, 1, 31, 'Túnez', 0, 14, 'Inglaterra', 0, 'ELIMINATORIAS', 'G', '2018-06-18', '21:00:00', 'Volgograd Arena', 'Volgogrado', 'SIN INICIAR', '2018-05-26 03:18:02', '2018-05-26 03:18:02'),
(15, 1, 7, 'Colombia', 0, 16, 'Japón', 0, 'ELIMINATORIAS', 'H', '2018-06-19', '15:00:00', 'Mordovia Arena', 'Saransk', 'SIN INICIAR', '2018-05-26 03:18:02', '2018-05-26 03:18:02'),
(16, 1, 22, 'Polonia', 0, 27, 'Senegal', 0, 'ELIMINATORIAS', 'H', '2018-06-19', '00:00:00', 'Spartak Stadium', 'Moscú', 'SIN INICIAR', '2018-05-26 03:18:02', '2018-05-26 03:18:02'),
(17, 1, 26, 'Rusia', 0, 11, 'Egipto', 0, 'ELIMINATORIAS', 'A', '2018-06-19', '21:00:00', 'estadio de San Petersburgo', 'San Petersburgo', 'SIN INICIAR', '2018-05-26 03:18:02', '2018-05-26 03:18:02'),
(18, 1, 23, 'Portugal', 0, 17, 'Marruecos', 0, 'ELIMINATORIAS', 'B', '2018-06-20', '15:00:00', 'Luzhniki Stadium', 'Moscú', 'SIN INICIAR', '2018-05-26 04:01:30', '2018-05-26 04:01:30'),
(19, 1, 32, 'Uruguay', 0, 2, 'Arabia Saudí', 0, 'ELIMINATORIAS', 'A', '2018-06-20', '18:00:00', 'Rostov Arena', 'Rostov del Don', 'SIN INICIAR', '2018-05-26 04:01:30', '2018-05-26 04:01:30'),
(20, 1, 25, 'RI de Irán', 0, 12, ' España', 0, 'ELIMINATORIAS', 'B', '2018-06-20', '21:00:00', 'Kazan Arena', 'Kazán', 'SIN INICIAR', '2018-05-26 04:01:30', '2018-05-26 04:01:30'),
(21, 1, 10, 'Dinamarca', 0, 4, 'Australia', 0, 'ELIMINATORIAS', 'C', '2018-06-21', '16:00:00', 'Samara Arena', 'Samara', 'SIN INICIAR', '2018-05-26 04:01:30', '2018-05-26 04:01:30'),
(22, 1, 13, 'Francia', 0, 21, ' Perú', 0, 'ELIMINATORIAS', 'C', '2018-06-21', '20:00:00', 'Ekaterinburg Arena', 'Ekaterimburgo', 'SIN INICIAR', '2018-05-26 04:01:30', '2018-05-26 04:01:30'),
(23, 1, 3, 'Argentina', 0, 9, 'Croacia', 0, 'ELIMINATORIAS', 'D', '2018-06-21', '21:00:00', 'Nizhny Novgorod Stadium', 'Nizhni Nóvgorod ', 'SIN INICIAR', '2018-05-26 04:15:32', '2018-05-26 04:15:32'),
(24, 1, 6, 'Brasil', 0, 8, 'Costa Rica', 0, 'ELIMINATORIAS', 'E', '2018-06-22', '15:00:00', 'estadio de San Petersburgo', 'San Petersburgo', 'SIN INICIAR', '2018-05-26 04:15:32', '2018-05-26 04:15:32'),
(25, 1, 19, 'Nigeria', 0, 15, ' Islandia', 0, 'ELIMINATORIAS', 'D', '2018-06-22', '18:00:00', 'Volgograd Arena', 'Volgogrado', 'SIN INICIAR', '2018-05-26 04:15:32', '2018-05-26 04:15:32'),
(26, 1, 28, 'Serbia', 0, 30, 'Suiza', 0, 'ELIMINATORIAS', 'E', '2018-06-22', '20:00:00', 'Kaliningrad Stadium', 'Kaliningrado', 'SIN INICIAR', '2018-05-26 04:15:32', '2018-05-26 04:15:32'),
(27, 1, 5, 'Bélgica', 0, 31, 'Túnez', 0, 'ELIMINATORIAS', 'G', '2018-06-23', '15:00:00', 'Spartak Stadium', 'Moscú', 'SIN INICIAR', '2018-05-26 04:15:32', '2018-05-26 04:15:32'),
(28, 1, 24, 'República de Corea', 0, 18, 'México', 0, 'ELIMINATORIAS', 'F', '2018-06-23', '18:00:00', 'Rostov Arena', 'Rostov del Don', 'SIN INICIAR', '2018-05-26 04:39:12', '2018-05-26 04:39:12'),
(29, 1, 1, 'Alemania', 0, 29, 'Suecia', 0, 'ELIMINATORIAS', 'F', '2018-06-23', '21:00:00', 'Fisht Stadium', 'Sochi', 'SIN INICIAR', '2018-05-26 04:39:12', '2018-05-26 04:39:12'),
(30, 1, 14, 'Inglaterra', 0, 20, ' Panamá', 0, 'ELIMINATORIAS', 'G', '2018-06-24', '15:00:00', 'Nizhny Novgorod Stadium', 'Nizhni Nóvgorod ', 'SIN INICIAR', '2018-05-26 04:39:12', '2018-05-26 04:39:12'),
(31, 1, 16, 'Japón', 0, 27, 'Senegal', 0, 'ELIMINATORIAS', 'H', '2018-06-24', '20:00:00', 'Ekaterinburg Arena', 'Ekaterimburgo', 'SIN INICIAR', '2018-05-26 04:39:12', '2018-05-26 04:39:12'),
(32, 1, 22, 'Polonia', 0, 7, 'Colombia', 0, 'ELIMINATORIAS', 'H', '2018-06-24', '21:00:00', 'Kazan Arena', 'Kazán', 'SIN INICIAR', '2018-05-26 04:39:12', '2018-05-26 04:39:12'),
(33, 1, 32, 'Uruguay', 0, 26, ' Rusia', 0, 'ELIMINATORIAS', 'A', '2018-06-25', '18:00:00', 'Samara Arena', 'Samara', 'SIN INICIAR', '2018-05-26 04:59:06', '2018-05-26 04:59:06'),
(34, 1, 2, 'Arabia Saudí', 0, 11, 'Egipto', 0, 'ELIMINATORIAS', 'A', '2018-06-25', '17:00:00', 'Volgograd Arena', 'Volgogrado', 'SIN INICIAR', '2018-05-26 04:59:06', '2018-05-26 04:59:06'),
(35, 1, 12, 'España', 0, 17, 'Marruecos', 0, 'ELIMINATORIAS', 'B', '2018-06-25', '20:00:00', 'Kaliningrad Stadium', 'Kaliningrado', 'SIN INICIAR', '2018-05-26 04:59:06', '2018-05-26 04:59:06'),
(36, 1, 25, 'RI de Irán', 0, 23, 'Portugal', 0, 'ELIMINATORIAS', 'B', '2018-06-25', '21:00:00', 'Mordovia Arena', 'Saransk', 'SIN INICIAR', '2018-05-26 04:59:06', '2018-05-26 04:59:06'),
(37, 1, 4, 'Australia', 0, 21, 'Perú', 0, 'ELIMINATORIAS', 'C', '2018-06-16', '00:00:00', 'Fisht Stadium', 'Sochi', 'SIN INICIAR', '2018-05-26 04:59:06', '2018-05-26 04:59:06'),
(38, 1, 10, 'Dinamarca', 0, 13, 'Francia', 0, 'ELIMINATORIAS', 'C', '2018-06-26', '17:00:00', 'Luzhniki Stadium', 'Moscú', 'SIN INICIAR', '2018-05-26 05:37:01', '2018-05-26 05:37:01'),
(39, 1, 19, 'Nigeria', 0, 3, ' Argentina', 0, 'ELIMINATORIAS', 'D', '2018-06-26', '21:00:00', 'estadio de San Petersburgo', 'San Petersburgo', 'SIN INICIAR', '2018-05-26 05:37:01', '2018-05-26 05:37:01'),
(40, 1, 15, 'Islandia', 0, 9, 'Croacia', 0, 'ELIMINATORIAS', 'D', '2018-06-26', '21:00:00', 'Rostov Arena', 'Rostov del Don', 'SIN INICIAR', '2018-05-26 05:37:01', '2018-05-26 05:37:01'),
(41, 1, 24, 'República de Corea', 0, 1, 'Alemania', 0, 'ELIMINATORIAS', 'F', '2018-06-27', '17:00:00', 'Kazan Arena', 'Kazán', 'SIN INICIAR', '2018-05-26 05:37:01', '2018-05-26 05:37:01'),
(42, 1, 18, 'México', 0, 29, 'Suecia', 0, 'ELIMINATORIAS', 'F', '2018-06-27', '19:00:00', 'Ekaterinburg Arena', 'Ekaterimburgo', 'SIN INICIAR', '2018-05-26 05:37:01', '2018-05-26 05:37:01'),
(43, 1, 28, 'Serbia', 0, 6, 'Brasil', 0, 'ELIMINATORIAS', 'E', '2018-06-27', '21:00:00', 'Spartak Stadium', 'Moscú', 'SIN INICIAR', '2018-05-26 05:46:08', '2018-05-26 05:46:08'),
(44, 1, 30, 'Suiza', 0, 8, 'Costa Rica', 0, 'ELIMINATORIAS', 'E', '2018-06-21', '21:00:00', 'Nizhny Novgorod Stadium', 'Nizhni Nóvgorod ', 'SIN INICIAR', '2018-05-26 05:46:08', '2018-05-26 05:46:08'),
(45, 1, 16, 'Japón', 0, 22, 'Polonia', 0, 'ELIMINATORIAS', 'H', '2018-06-28', '17:00:00', 'Volgograd Arena', 'Volgogrado', 'SIN INICIAR', '2018-05-26 05:46:08', '2018-05-26 05:46:08'),
(46, 1, 27, 'Senegal', 0, 7, 'Colombia', 0, 'ELIMINATORIAS', 'H', '2018-06-28', '18:00:00', 'Samara Arena', 'Samara', 'SIN INICIAR', '2018-05-26 05:46:08', '2018-05-26 05:46:08'),
(47, 1, 20, 'Panamá', 0, 31, 'Túnez', 0, 'ELIMINATORIAS', 'G', '2018-06-28', '21:00:00', 'Mordovia Arena', 'Saransk', 'SIN INICIAR', '2018-05-26 05:46:08', '2018-05-26 05:46:08'),
(48, 1, 14, 'Inglaterra', 0, 5, 'Bélgica', 0, 'ELIMINATORIAS', 'G', '2018-06-28', '20:00:00', 'Kaliningrad Stadium', 'Kaliningrado', 'SIN INICIAR', '2018-05-26 05:46:08', '2018-05-26 05:46:08');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
