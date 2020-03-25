DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getGamesByQuinielaPhase`(IN `quiniela_id` INT, IN `phaseId` VARCHAR(15) CHARSET utf8)
    NO SQL
BEGIN
	SELECT 
        gm.id,
        gm.nombre_club_1,
        gm.nombre_club_2,
        gm.grupo,
        gm.date,
        gm.estadium,
        gm.location,
    (SELECT imagen_bandera FROM clubs AS c WHERE c.id_club = gm.id_club_1) AS img_club_1,
    (SELECT imagen_bandera FROM clubs AS c WHERE c.id_club = gm.id_club_2) AS img_club_2
	FROM games AS gm 
        INNER JOIN championships AS ch ON gm.id_champ = ch.id
	WHERE 
        gm.fase like CONVERT(phaseId USING utf8)
	ORDER BY gm.date, gm.time ASC;
END$$
DELIMITER ;