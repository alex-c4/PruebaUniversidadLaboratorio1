DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getMyPronotics`(IN `userID` INT)
    NO SQL
BEGIN
	SET time_zone = '+00:00';
	SELECT 
        b.id AS betId,
        q.nombre AS quiniela,
        q.id_quiniela,
        ch.name AS championshipName,
        (now() > ch.start_datetime) AS isStartChampionship,
        ch.start_datetime AS start,
        b.ref_pago AS refPago,
        b.verification,
        q.isActive,
        q.id_type AS quinielaTipo,
        q.amount,
        func_getGoldpot_amount(q.id_quiniela) AS golpot
    FROM bets AS b
        INNER JOIN quinielas AS q ON q.id_quiniela = b.id_quiniela
        INNER JOIN championships AS ch ON ch.id = q.id_championship
    WHERE b.id_user = userID
    ORDER BY q.id_quiniela;
END$$
DELIMITER ;