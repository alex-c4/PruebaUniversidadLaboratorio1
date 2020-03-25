DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getPronosticsByPhaseToWrite`(IN `bet_id` INT, IN `phaseId` VARCHAR(50))
    NO SQL
BEGIN
	SELECT 
        p.bet_id,
        p.id_quiniela,
        p.id AS pronostic_id,
        g.id AS game_id,
        p.pronostic_club_1,
        p.pronostic_club_2,
        p.pronostic_score,
        g.nombre_club_1,
        g.nombre_club_2,
        g.estadium,
        g.date,
        g.grupo,
        (SELECT imagen_bandera FROM clubs AS c WHERE c.id_club = g.id_club_1) AS img_club_1,
        (SELECT imagen_bandera FROM clubs AS c WHERE c.id_club = g.id_club_2) AS img_club_2
    FROM 
        pronostics AS p INNER JOIN games AS g ON p.id_game=g.id
    WHERE
        g.fase = CONVERT(phaseId USING utf8);
END$$
DELIMITER ;