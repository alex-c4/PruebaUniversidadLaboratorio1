-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-05-2018 a las 08:09:41
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
-- Base de datos: `xportgoldb_pruebas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `games`
--

CREATE TABLE `games` (
  `id_game` int(11) NOT NULL,
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
  `update_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `games`
--

INSERT INTO `games` (`id_game`, `id_club_1`, `nombre_club_1`, `resultado_club_1`, `id_club_2`, `nombre_club_2`, `resultado_club_2`, `fase`, `grupo`, `date`, `time`, `estadium`, `location`, `estatus`, `created_at`, `update_at`) VALUES
(1, NULL, 'Rusia', 0, NULL, 'Arabia Saudí', 0, 'ELIMINATORIAS', 'A', '2018-06-14', '18:00:00', 'Luzhniki Stadium', 'Moscú', 'SIN INICIAR', '2018-05-26 01:38:46', '2018-05-26 01:38:46'),
(2, NULL, 'Egipto', 0, NULL, 'Uruguay', 0, 'ELIMINATORIAS', 'A', '2018-06-15', '07:30:00', 'Ekaterinburg Arena', 'Ekaterinburg', 'SIN INICIAR', '2018-05-26 01:38:46', '2018-05-26 01:38:46'),
(3, NULL, 'Marruecos', 0, NULL, 'RI de Irán', 0, 'ELIMINATORIAS', 'B', '2018-06-15', '18:00:00', 'estadio de San Petersburgo', 'San Petersburgo', 'SIN INICIAR', '2018-05-26 02:08:23', '2018-05-26 02:08:23'),
(4, NULL, 'Portugal', 0, NULL, 'España', 0, 'ELIMINATORIAS', 'B', '2018-06-15', '21:00:00', 'Fisht Stadium', 'Sochi', 'SIN INICIAR', '2018-05-26 02:08:23', '2018-05-26 02:08:23'),
(5, NULL, 'Francia', 0, NULL, 'Australia', 0, 'ELIMINATORIAS', 'C', '2018-06-16', '13:00:00', 'Kazan Arena', 'Kazan', 'SIN INICIAR', '2018-05-26 02:08:23', '2018-05-26 02:08:23'),
(6, NULL, 'Argentina', 0, NULL, 'Islandia', 0, 'ELIMINATORIAS', 'D', '2018-06-16', '16:00:00', 'Spartak Stadium', 'Moscú', 'SIN INICIAR', '2018-05-26 02:08:23', '2018-05-26 02:08:23'),
(7, NULL, 'Perú', 0, NULL, ' Dinamarca', 0, 'ELIMINATORIAS', 'C', '2018-06-16', '19:00:00', 'Mordovia Arena', 'Saransk', 'SIN INICIAR', '2018-05-26 02:08:23', '2018-05-26 02:08:23'),
(8, NULL, 'Croacia', 0, NULL, 'Nigeria', 0, 'ELIMINATORIAS', 'D', '2018-06-16', '21:00:00', 'Kaliningrad Stadium', 'Kaliningrado', 'SIN INICIAR', '2018-05-26 03:03:58', '2018-05-26 03:03:58'),
(9, NULL, 'Costa Rica', 0, NULL, 'Serbia', 0, 'ELIMINATORIAS', 'E', '2018-06-17', '16:00:00', 'Samara Arena', 'Samara', 'SIN INICIAR', '2018-05-26 03:03:58', '2018-05-26 03:03:58'),
(10, NULL, 'Alemania', 0, NULL, 'México', 0, 'ELIMINATORIAS', 'F', '2018-06-17', '18:00:00', 'Luzhniki Stadium', 'Moscú', 'SIN INICIAR', '2018-05-26 03:03:58', '2018-05-26 03:03:58'),
(11, NULL, 'Brasil', 0, NULL, 'Suiza', 0, 'ELIMINATORIAS', 'E', '2018-06-17', '21:00:00', 'Rostov Arena', 'Rostov del Don', 'SIN INICIAR', '2018-05-26 03:03:58', '2018-05-26 03:03:58'),
(12, NULL, 'Suecia', 0, NULL, 'República de Corea', 0, 'ELIMINATORIAS', 'F', '2018-06-18', '15:00:00', 'Nizhny Novgorod Stadium', 'Nizhni Nóvgorod ', 'SIN INICIAR', '2018-05-26 03:03:58', '2018-05-26 03:03:58'),
(13, NULL, 'Bélgica', 0, NULL, 'Panamá', 0, 'ELIMINATORIAS', 'G', '2018-06-18', '18:00:00', 'Fisht Stadium', 'Sochi', 'SIN INICIAR', '2018-05-26 03:18:02', '2018-05-26 03:18:02'),
(14, NULL, 'Túnez', 0, NULL, 'Inglaterra', 0, 'ELIMINATORIAS', 'G', '2018-06-18', '21:00:00', 'Volgograd Arena', 'Volgogrado', 'SIN INICIAR', '2018-05-26 03:18:02', '2018-05-26 03:18:02'),
(15, NULL, 'Colombia', 0, NULL, 'Japón', 0, 'ELIMINATORIAS', 'H', '2018-06-19', '15:00:00', 'Mordovia Arena', 'Saransk', 'SIN INICIAR', '2018-05-26 03:18:02', '2018-05-26 03:18:02'),
(16, NULL, 'Polonia', 0, NULL, 'Senegal', 0, 'ELIMINATORIAS', 'H', '2018-06-19', '00:00:00', 'Spartak Stadium', 'Moscú', 'SIN INICIAR', '2018-05-26 03:18:02', '2018-05-26 03:18:02'),
(17, NULL, 'Rusia', 0, NULL, 'Egipto', 0, 'ELIMINATORIAS', 'A', '2018-06-19', '21:00:00', 'estadio de San Petersburgo', 'San Petersburgo', 'SIN INICIAR', '2018-05-26 03:18:02', '2018-05-26 03:18:02'),
(18, NULL, 'Portugal', 0, NULL, 'Marruecos', 0, 'ELIMINATORIAS', 'B', '2018-06-20', '15:00:00', 'Luzhniki Stadium', 'Moscú', 'SIN INICIAR', '2018-05-26 04:01:30', '2018-05-26 04:01:30'),
(19, NULL, 'Uruguay', 0, NULL, 'Arabia Saudí', 0, 'ELIMINATORIAS', 'A', '2018-06-20', '18:00:00', 'Rostov Arena', 'Rostov del Don', 'SIN INICIAR', '2018-05-26 04:01:30', '2018-05-26 04:01:30'),
(20, NULL, 'RI de Irán', 0, NULL, ' España', 0, 'ELIMINATORIAS', 'B', '2018-06-20', '21:00:00', 'Kazan Arena', 'Kazán', 'SIN INICIAR', '2018-05-26 04:01:30', '2018-05-26 04:01:30'),
(21, NULL, 'Dinamarca', 0, NULL, 'Australia', 0, 'ELIMINATORIAS', 'C', '2018-06-21', '16:00:00', 'Samara Arena', 'Samara', 'SIN INICIAR', '2018-05-26 04:01:30', '2018-05-26 04:01:30'),
(22, NULL, 'Francia', 0, NULL, ' Perú', 0, 'ELIMINATORIAS', 'C', '2018-06-21', '20:00:00', 'Ekaterinburg Arena', 'Ekaterimburgo', 'SIN INICIAR', '2018-05-26 04:01:30', '2018-05-26 04:01:30'),
(23, NULL, 'Argentina', 0, NULL, 'Croacia', 0, 'ELIMINATORIAS', 'D', '2018-06-21', '21:00:00', 'Nizhny Novgorod Stadium', 'Nizhni Nóvgorod ', 'SIN INICIAR', '2018-05-26 04:15:32', '2018-05-26 04:15:32'),
(24, NULL, 'Brasil', 0, NULL, 'Costa Rica', 0, 'ELIMINATORIAS', 'E', '2018-06-22', '15:00:00', 'estadio de San Petersburgo', 'San Petersburgo', 'SIN INICIAR', '2018-05-26 04:15:32', '2018-05-26 04:15:32'),
(25, NULL, 'Nigeria', 0, NULL, ' Islandia', 0, 'ELIMINATORIAS', 'D', '2018-06-22', '18:00:00', 'Volgograd Arena', 'Volgogrado', 'SIN INICIAR', '2018-05-26 04:15:32', '2018-05-26 04:15:32'),
(26, NULL, 'Serbia', 0, NULL, 'Suiza', 0, 'ELIMINATORIAS', 'E', '2018-06-22', '20:00:00', 'Kaliningrad Stadium', 'Kaliningrado', 'SIN INICIAR', '2018-05-26 04:15:32', '2018-05-26 04:15:32'),
(27, NULL, 'Bélgica', 0, NULL, 'Túnez', 0, 'ELIMINATORIAS', 'G', '2018-06-23', '15:00:00', 'Spartak Stadium', 'Moscú', 'SIN INICIAR', '2018-05-26 04:15:32', '2018-05-26 04:15:32'),
(28, NULL, 'República de Corea', 0, NULL, 'México', 0, 'ELIMINATORIAS', 'F', '2018-06-23', '18:00:00', 'Rostov Arena', 'Rostov del Don', 'SIN INICIAR', '2018-05-26 04:39:12', '2018-05-26 04:39:12'),
(29, NULL, 'Alemania', 0, NULL, 'Suecia', 0, 'ELIMINATORIAS', 'F', '2018-06-23', '21:00:00', 'Fisht Stadium', 'Sochi', 'SIN INICIAR', '2018-05-26 04:39:12', '2018-05-26 04:39:12'),
(30, NULL, 'Inglaterra', 0, NULL, ' Panamá', 0, 'ELIMINATORIAS', 'G', '2018-06-24', '15:00:00', 'Nizhny Novgorod Stadium', 'Nizhni Nóvgorod ', 'SIN INICIAR', '2018-05-26 04:39:12', '2018-05-26 04:39:12'),
(31, NULL, 'Japón', 0, NULL, '', 0, 'ELIMINATORIAS', 'H', '2018-06-24', '20:00:00', 'Ekaterinburg Arena', 'Ekaterimburgo', 'SIN INICIAR', '2018-05-26 04:39:12', '2018-05-26 04:39:12'),
(32, NULL, 'Polonia', 0, NULL, 'Colombia', 0, 'ELIMINATORIAS', 'H', '2018-06-24', '21:00:00', 'Kazan Arena', 'Kazán', 'SIN INICIAR', '2018-05-26 04:39:12', '2018-05-26 04:39:12'),
(33, NULL, 'Uruguay', 0, NULL, ' Rusia', 0, 'ELIMINATORIAS', 'A', '2018-06-25', '18:00:00', 'Samara Arena', 'Samara', 'SIN INICIAR', '2018-05-26 04:59:06', '2018-05-26 04:59:06'),
(34, NULL, 'Arabia Saudí', 0, NULL, 'Egipto', 0, 'ELIMINATORIAS', 'A', '2018-06-25', '17:00:00', 'Volgograd Arena', 'Volgogrado', 'SIN INICIAR', '2018-05-26 04:59:06', '2018-05-26 04:59:06'),
(35, NULL, 'España', 0, NULL, 'Marruecos', 0, 'ELIMINATORIAS', 'B', '2018-06-25', '20:00:00', 'Kaliningrad Stadium', 'Kaliningrado', 'SIN INICIAR', '2018-05-26 04:59:06', '2018-05-26 04:59:06'),
(36, NULL, 'RI de Irán', 0, NULL, 'Portugal', 0, 'ELIMINATORIAS', 'B', '2018-06-25', '21:00:00', 'Mordovia Arena', 'Saransk', 'SIN INICIAR', '2018-05-26 04:59:06', '2018-05-26 04:59:06'),
(37, NULL, 'Australia', 0, NULL, 'Perú', 0, 'ELIMINATORIAS', 'C', '2018-06-16', '00:00:00', 'Fisht Stadium', 'Sochi', 'SIN INICIAR', '2018-05-26 04:59:06', '2018-05-26 04:59:06'),
(38, NULL, 'Dinamarca', 0, NULL, 'Francia', 0, 'ELIMINATORIAS', 'C', '2018-06-26', '17:00:00', 'Luzhniki Stadium', 'Moscú', 'SIN INICIAR', '2018-05-26 05:37:01', '2018-05-26 05:37:01'),
(39, NULL, 'Nigeria', 0, NULL, ' Argentina', 0, 'ELIMINATORIAS', 'D', '2018-06-26', '21:00:00', 'estadio de San Petersburgo', 'San Petersburgo', 'SIN INICIAR', '2018-05-26 05:37:01', '2018-05-26 05:37:01'),
(40, NULL, 'Islandia', 0, NULL, 'Croacia', 0, 'ELIMINATORIAS', 'D', '2018-06-26', '21:00:00', 'Rostov Arena', 'Rostov del Don', 'SIN INICIAR', '2018-05-26 05:37:01', '2018-05-26 05:37:01'),
(41, NULL, 'República de Corea', 0, NULL, 'Alemania', 0, 'ELIMINATORIAS', 'F', '2018-06-27', '17:00:00', 'Kazan Arena', 'Kazán', 'SIN INICIAR', '2018-05-26 05:37:01', '2018-05-26 05:37:01'),
(42, NULL, 'México', 0, NULL, 'Suecia', 0, 'ELIMINATORIAS', 'F', '2018-06-27', '19:00:00', 'Ekaterinburg Arena', 'Ekaterimburgo', 'SIN INICIAR', '2018-05-26 05:37:01', '2018-05-26 05:37:01'),
(43, NULL, 'Serbia', 0, NULL, 'Brasil', 0, 'ELIMINATORIAS', 'E', '2018-06-27', '21:00:00', 'Spartak Stadium', 'Moscú', 'SIN INICIAR', '2018-05-26 05:46:08', '2018-05-26 05:46:08'),
(44, NULL, 'Suiza', 0, NULL, 'Costa Rica', 0, 'ELIMINATORIAS', 'E', '2018-06-21', '21:00:00', 'Nizhny Novgorod Stadium', 'Nizhni Nóvgorod ', 'SIN INICIAR', '2018-05-26 05:46:08', '2018-05-26 05:46:08'),
(45, NULL, 'Japón', 0, NULL, 'Polonia', 0, 'ELIMINATORIAS', 'H', '2018-06-28', '17:00:00', 'Volgograd Arena', 'Volgogrado', 'SIN INICIAR', '2018-05-26 05:46:08', '2018-05-26 05:46:08'),
(46, NULL, 'Senegal', 0, NULL, 'Colombia', 0, 'ELIMINATORIAS', 'H', '2018-06-28', '18:00:00', 'Samara Arena', 'Samara', 'SIN INICIAR', '2018-05-26 05:46:08', '2018-05-26 05:46:08'),
(47, NULL, 'Panamá', 0, NULL, 'Túnez', 0, 'ELIMINATORIAS', 'G', '2018-06-28', '21:00:00', 'Mordovia Arena', 'Saransk', 'SIN INICIAR', '2018-05-26 05:46:08', '2018-05-26 05:46:08'),
(48, NULL, 'Inglaterra', 0, NULL, 'Bélgica', 0, 'ELIMINATORIAS', 'G', '2018-06-28', '20:00:00', 'Kaliningrad Stadium', 'Kaliningrado', 'SIN INICIAR', '2018-05-26 05:46:08', '2018-05-26 05:46:08');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id_game`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `games`
--
ALTER TABLE `games`
  MODIFY `id_game` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
