DELIMITER $$
CREATE PROCEDURE `sp_getMyQuinielasPublic`()
    NO SQL
BEGIN
    SELECT 
        q.id_quiniela AS idQuiniela, 
        q.nombre AS nombreQuiniela,
        q.created_at AS fechaCreacionQuiniela,
        ch.name AS nombreCampeonato,
        qt.name AS tipoQuiniela
    FROM
        quinielas AS q
        INNER JOIN championships AS ch ON ch.id=q.id_championship
        INNER JOIN quinielatipo qt ON qt.id=q.id_type
    WHERE 
        q.id_type = 1;
END$$
DELIMITER ;