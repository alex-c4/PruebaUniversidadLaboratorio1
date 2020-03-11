DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getMyQuinielasPublic`()
    NO SQL
BEGIN
    SELECT 
        q.id_quiniela AS idQuiniela, 
        q.nombre AS nombreQuiniela,
        q.created_at AS fechaCreacionQuiniela,
        ch.name AS nombreCampeonato,
        qt.name AS tipoQuiniela,
        ap.phase
    FROM
        quinielas AS q
        INNER JOIN championships AS ch ON ch.id=q.id_championship
        INNER JOIN quinielatipo qt ON qt.id=q.id_type
        INNER JOIN activephases AS ap on ap.championship_id=q.id_championship
    WHERE 
        q.id_type = 1 AND
        q.isActive = true;
END$$
DELIMITER ;