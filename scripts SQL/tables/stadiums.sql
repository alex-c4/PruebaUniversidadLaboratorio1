SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `stadiums` (
  `id` int(11) NOT NULL,
  `name` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `stadiums`
--

INSERT INTO `stadiums` (`id`, `name`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'Estadio Santiago Bernabéu', '2021-01-08 15:48:04', 64, '2021-01-08 15:48:04'),
(2, 'Camp Nou', '2021-01-08 15:48:04', 54, '2021-01-08 15:48:04'),
(3, 'Estadio Universitario de Caracas', '2021-01-08 22:47:26', 64, '2021-01-08 22:47:26'),
(4, 'Estadio Giuseppe Meazza (San Siro) de Milán', '2021-01-08 23:05:10', 64, '2021-01-08 23:05:10'),
(5, 'La Bombonera', '2021-01-08 23:06:42', 64, '2021-01-08 23:06:42'),
(6, 'Juventus Stadium', '2021-01-08 23:12:41', 64, '2021-01-08 23:12:41'),
(7, 'Estadio de Mestalla', '2021-01-08 23:14:15', 64, '2021-01-08 23:14:15'),
(8, 'Allianz Arena', '2021-01-08 23:17:23', 64, '2021-01-08 23:17:23'),
(9, 'Estadio Antonio Vespucio Liberti', '2021-01-08 23:25:18', 64, '2021-01-08 23:25:18'),
(10, 'Wanda Metropolitano', '2021-01-08 23:26:50', 64, '2021-01-08 23:26:50'),
(11, 'Estadio Municipal de Anoeta', '2021-01-08 23:28:22', 64, '2021-01-08 23:28:22'),
(12, 'Estadio El Campín', '2021-01-10 23:07:32', 64, '2021-01-10 23:07:32'),
(13, 'Estadio Centenario', '2021-01-10 23:16:53', 64, '2021-01-10 23:16:53'),
(14, 'Estadio José Zorrilla', '2021-01-14 15:23:11', 64, '2021-01-14 15:23:11'),
(15, 'Estadio Ramón de Carranza', '2021-01-14 23:55:28', 64, '2021-01-14 23:55:28'),
(16, 'Estadio de Mendizorroza', '2021-01-15 00:19:18', 64, '2021-01-15 00:19:18'),
(17, 'Coliseum Alfonso Pérez', '2021-01-15 00:24:17', 64, '2021-01-15 00:24:17'),
(18, 'Estadio Benito Villamarín', '2021-01-15 00:27:57', 64, '2021-01-15 00:27:57'),
(19, 'Estadio de la Cerámica', '2021-01-15 00:29:52', 64, '2021-01-15 00:29:52'),
(20, 'Estadio Municipal de Ipurúa', '2021-01-19 22:45:21', 64, '2021-01-19 22:45:21'),
(21, 'Estadio Ciudad de Valencia', '2021-01-20 15:34:10', 64, '2021-01-20 15:34:10'),
(22, 'Estadio El Alcoraz', '2021-01-20 15:48:00', 64, '2021-01-20 15:48:00'),
(23, 'Estadio Ramón Sánchez-Pizjuán', '2021-01-20 16:22:57', 64, '2021-01-20 16:22:57'),
(25, 'Estadio El Sadar', '2021-01-20 19:05:37', 64, '2021-01-20 19:05:37'),
(26, 'Estadio Manuel Martínez Valero', '2021-01-20 19:07:38', 64, '2021-01-20 19:07:38'),
(27, 'Estadio de Balaídos', '2021-01-20 19:12:44', 64, '2021-01-20 19:12:44'),
(28, 'Estadio de San Mamés', '2021-01-20 19:16:46', 64, '2021-01-20 19:16:46'),
(29, 'Estadio Olímpico de la Universidad Central de Venezuela', '2021-02-02 20:05:06', 64, '2021-02-02 20:05:06'),
(30, 'Estadio Olímpico de Tokio', '2021-02-16 16:24:44', 64, '2021-02-16 16:24:44');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `stadiums`
--
ALTER TABLE `stadiums`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `stadiums`
--
ALTER TABLE `stadiums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
