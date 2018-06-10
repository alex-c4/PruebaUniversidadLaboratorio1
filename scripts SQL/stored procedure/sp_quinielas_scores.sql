DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_quinielas_scores`(IN `quiniela_id` INT)
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
((((`xportgoldbd`.`pronostics` `pro`
 join `xportgoldbd`.`bets` `be` on((`pro`.`bet_id` = `be`.`id`)))
 join `xportgoldbd`.`users` `us` on((`be`.`id_user` = `us`.`id`)))
 join `xportgoldbd`.`quinielas` `q` on((`q`.`id_quiniela` = `be`.`id_quiniela`))) 
join `xportgoldbd`.`games` `ga` on((`ga`.`id` = `pro`.`id_game`))) 

WHERE 
(`be`.`verification` = '1')
AND
(`q`.`id_quiniela` =quiniela_id)

 GROUP BY `pro`.`bet_id`,`be`.`id_user`,`us`.`name`,`us`.`lastName`,`q`.`id_quiniela`

ORDER BY `q`.`id_quiniela`,sum(`pro`.`pronostic_score`) DESC; 


END$$
DELIMITER ;
