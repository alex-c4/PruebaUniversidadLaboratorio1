DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getGamesByQuiniela`(IN `id_quiniela` INT)
    NO SQL
    COMMENT 'Devuelve todos los juegos asociados a una quiniela en particular'
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
    INNER JOIN quinielas AS qu ON qu.id_championship = ch.id
WHERE 
	qu.id_quiniela = id_quiniela
ORDER BY gm.date ASC;

END$$
DELIMITER ;