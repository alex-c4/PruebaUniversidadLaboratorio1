-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-04-2018 a las 04:52:42
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
-- Estructura de tabla para la tabla `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `nameContact` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `emailContact` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `id` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cuerpo` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fuente` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_publicacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id`, `titulo`, `cuerpo`, `fuente`, `fecha_publicacion`, `usuario`) VALUES
(6, 'venezuela va al mundial', 'venezuela clacifica! venezuela clacificavenezuela clacificavenezuela clacificavenezuela clacificavenezuela clacificavenezuela clacificavenezuela clacificavenezuela clacificavenezuela clacificavenezuela clacificavenezuela clacificavenezuela clacifica venezuela clacifica venezuela clacifica venezuela clacifica venezuela clacifica venezuela clacifica venezuela clacifica venezuela clacifica', 'meridiano tv', '2018-04-02 19:11:01', ''),
(7, 'venezuela a cuartos de final', ' venezuela derrota a alemania y pasa a sieguiente ronda venezuela derrota a alemania y pasa a sieguiente ronda venezuela derrota a alemania y pasa a sieguiente ronda venezuela derrota a alemania y pasa a sieguiente ronda venezuela derrota a alemania y pasa a sieguiente ronda venezuela derrota a alemania y pasa a sieguiente ronda venezuela derrota a alemania y pasa a sieguiente ronda!', 'gold noticias', '2018-04-02 19:11:01', ''),
(8, 'nuevo prospecto', 'el nuevo integrante dela selecion.. bla baba creagrandes expectativas en elcampo de juego.', 'rtnoticias', '2018-04-11 05:34:13', 'admin1'),
(9, 'adivinen quien gano', ' cuerpo de ejemplo cuerpo de ejemplo cuerpo de ejemplo cuerpo de ejemplo cuerpo de ejemplo cuerpo de ejemplo cuerpo de ejemplo cuerpo de ejemplo cuerpo de ejemplocuerpo de ejemplo cuerpo de ejemplo', 'diario complicados ', '2018-04-11 05:34:13', 'admin 1'),
(10, '130 am', 'una 30 am la mejor hora paracrear noticias de prueba.una 30 am la mejor hora paracrear noticias deprueba. una 30 am la mejor hora paracrear noticias depruebauna 30 am la mejor hora paracrear noticias deprueba.una 30 am la mejor hora paracrear noticias deprueba.. una 30 am la mejor hora paracrear noticias deprueba. una 30 am la mejor hora paracrear noticias deprueba .una 30 am la mejor hora paracrear noticias deprueba.una 30 am la mejor hora paracrear noticias deprueba', 'complicados tv', '2018-04-11 05:40:34', ''),
(11, 'una noticia mas  ', 'boletin de ultima hora. maradona asume direccion de seleccion argentina. el nuevo uniforme de argenita sera vino tinto??', 'nada que hablar noticias.', '2018-04-11 05:40:34', 'admiin2'),
(12, 'noticia 12', 'cuerpo de la noticia 12cuerpo de la noticia 12cuerpo de la noticia 12cuerpo de la noticia 12cuerpo de la noticia 12cuerpo de la noticia 12cuerpo de la noticia 12cuerpo de la noticia 12cuerpo de la noticia 12cuerpo de la noticia 12cuerpo de la noticia 12cuerpo de la noticia 12cuerpo de la noticia 12cuerpo de la noticia 12', '12 horas', '2018-04-11 05:42:13', ''),
(13, 'lanoticia mas reciente', 'por fin pude montar lo de viancci', 'radio bemba sound system', '2018-04-11 05:42:13', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
