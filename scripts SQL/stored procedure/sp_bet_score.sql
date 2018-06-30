DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_bet_score`(IN `quiniela_id` INT, IN `betID` INT)
    NO SQL
BEGIN

SELECT 
`pro`.`bet_id` AS `bet_id`,
`be`.`id_user` AS `id_user`,
`us`.`name` AS `name`,
`us`.`lastName` AS `lastName`,
sum(`pro`.`pronostic_score`) AS `puntos`,
`q`.`id_quiniela` AS `id_quiniela` 

FROM 
((((`xportgoldbd_pruebas`.`pronostics` `pro`
 join `xportgoldbd_pruebas`.`bets` `be` on((`pro`.`bet_id` = `be`.`id`)))
 join `xportgoldbd_pruebas`.`users` `us` on((`be`.`id_user` = `us`.`id`)))
 join `xportgoldbd_pruebas`.`quinielas` `q` on((`q`.`id_quiniela` = `be`.`id_quiniela`))) 
join `xportgoldbd_pruebas`.`games` `ga` on((`ga`.`id` = `pro`.`id_game`))) 

WHERE
(`q`.`id_quiniela` =quiniela_id)
AND
(`pro`.`bet_id` =betID)

 GROUP BY `pro`.`bet_id`,`be`.`id_user`,`us`.`name`,`us`.`lastName`,`q`.`id_quiniela`

ORDER BY `q`.`id_quiniela`,sum(`pro`.`pronostic_score`) DESC; 


END$$
DELIMITER ;