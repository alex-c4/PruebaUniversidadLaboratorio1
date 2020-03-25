DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getQuinielasCreatedByMe`(IN `userID` INT)
    NO SQL
BEGIN
	SELECT
    	q.id_quiniela AS ID,
    	q.nombre AS nombre,
        q.code AS codigo,
        c.name AS championship,
        qt.name AS tipo
    FROM quinielas AS q
    	INNER JOIN championships AS c ON q.id_championship=c.id
        INNER JOIN quinielatipo AS qt ON q.id_type=qt.id
    WHERE
    	q.id_user_creador = userID
    ORDER BY
    	q.id_quiniela DESC;
END$$
DELIMITER ;