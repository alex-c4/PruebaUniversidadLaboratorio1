DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getLastResult`()
    NO SQL
BEGIN

    SELECT 
        estadium, 
        date, 
        grupo,
        g.nombre_club_1,
        g.resultado_club_1,
        g.nombre_club_2,
        g.resultado_club_2,
        (SELECT imagen_bandera FROM clubs WHERE id_club = g.id_club_1) AS img_club_1,
        (SELECT imagen_bandera FROM clubs WHERE id_club = g.id_club_2) AS img_club_2,
        g.estatus
    FROM 
        games as g INNER JOIN clubs as c on g.id_club_1=c.id_club
    WHERE 
        g.estatus = 'FINALIZADO'
    ORDER BY g.id DESC
    LIMIT 0, 6;

END$$
DELIMITER ;