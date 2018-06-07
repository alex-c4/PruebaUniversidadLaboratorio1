-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-06-2018 a las 12:08:11
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
-- Estructura para la vista `v_quinielas_scores`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_quinielas_scores`  AS  select `pro`.`bet_id` AS `bet_id`,`be`.`id_user` AS `id_user`,`us`.`name` AS `name`,`us`.`lastName` AS `lastName`,sum(`pro`.`pronostic_score`) AS `puntos`,`q`.`id_quiniela` AS `id_quiniela` from ((((`pronostics` `pro` join `bets` `be` on((`pro`.`bet_id` = `be`.`id`))) join `users` `us` on((`be`.`id_user` = `us`.`id`))) join `quinielas` `q` on((`q`.`id_quiniela` = `be`.`id_quiniela`))) join `games` `ga` on((`ga`.`id` = `pro`.`id_game`))) where (`be`.`verification` = '1') group by `pro`.`bet_id`,`be`.`id_user`,`us`.`name`,`us`.`lastName`,`q`.`id_quiniela` order by `q`.`id_quiniela`,sum(`pro`.`pronostic_score`) desc ;

--
-- VIEW  `v_quinielas_scores`
-- Datos: Ninguna
--

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
