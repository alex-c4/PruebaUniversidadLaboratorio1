DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getMyPronotics`(IN `userID` INT)
    NO SQL
BEGIN
    SELECT 
        b.id AS betId,
        q.nombre AS quiniela,
        q.id_quiniela,
        ch.name AS championshipName,
        b.ref_pago AS refPago,
        b.verification,
        q.isActive,
        ap.phase
    FROM bets AS b
        INNER JOIN quinielas AS q ON q.id_quiniela = b.id_quiniela
        INNER JOIN championships AS ch ON ch.id = q.id_championship
        INNER JOIN activephases ap ON ap.id=ch.id
    WHERE b.id_user = userID;
END$$
DELIMITER ;