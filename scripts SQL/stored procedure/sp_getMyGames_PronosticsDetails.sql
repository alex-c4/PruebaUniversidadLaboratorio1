DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getMyGames_PronosticsDetails`(IN `betID` INT)
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
        p.id AS pronostic_id

    FROM pronostics AS p
        INNER JOIN games AS g ON g.id=p.id_game
    WHERE p.bet_id = betID
    ORDER BY g.date ASC;
END$$
DELIMITER ;