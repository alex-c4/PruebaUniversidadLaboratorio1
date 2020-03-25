DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getMyPronosticsDetails`(IN `betID` INT)
    NO SQL
BEGIN
    SELECT 
        g.id AS game_id,
        g.date,
        g.estadium,
        g.grupo,
        (SELECT imagen_bandera FROM clubs WHERE id_club = g.id_club_1) AS img_club_1,
        (SELECT imagen_bandera FROM clubs WHERE id_club = g.id_club_2) AS img_club_2,
        p.bet_id,
        (SELECT nombre FROM clubs WHERE id_club = g.id_club_1) AS nombre_club_1,
        p.pronostic_club_1,
        (SELECT nombre FROM clubs WHERE id_club = g.id_club_2) AS nombre_club_2,
        p.pronostic_club_2,
        p.id AS pronostic_id,
		ap.phase
    FROM pronostics AS p
        INNER JOIN games AS g ON g.id=p.id_game
        INNER JOIN quinielas AS q ON q.id_quiniela=p.id_quiniela
        INNER JOIN activephases AS ap ON ap.championship_id = g.id_champ
    WHERE 
    	p.bet_id = betID AND
        q.isActive = true AND
        ap.phase = g.fase
        
    ORDER BY g.date ASC;
END$$
DELIMITER ;