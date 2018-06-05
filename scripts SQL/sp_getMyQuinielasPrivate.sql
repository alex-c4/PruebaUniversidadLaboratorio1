DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getMyQuinielasPrivate`(IN `userID` INT)
    READS SQL DATA
    COMMENT 'Devuelve todas las quiniela creadas por un usuario'
BEGIN
    SELECT 
        q.id_quiniela AS idQuiniela, 
        q.nombre AS nombreQuiniela,
        q.created_at AS fechaCreacionQuiniela,
        ch.name AS nombreCampeonato,
        qt.name AS tipoQuiniela
    FROM
        quinielas AS q
        INNER JOIN joinquiniela AS jq ON jq.id_quiniela=q.id_quiniela
        INNER JOIN championships AS ch ON ch.id=q.id_championship
        INNER JOIN quinielatipo qt ON qt.id=q.id_type
    WHERE 
        jq.id_user = userID;
	    
END$$
DELIMITER ;