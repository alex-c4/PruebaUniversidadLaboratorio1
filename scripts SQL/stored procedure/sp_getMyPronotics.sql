DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getMyPronotics`(IN `userID` INT)
    NO SQL
BEGIN
    SELECT 
        bet.id AS betId,
        q.nombre AS quiniela,
        ch.name AS championshipName
    FROM bets AS bet
        INNER JOIN quinielas AS q ON q.id_quiniela = bet.id_quiniela
        INNER JOIN championships AS ch ON ch.id = q.id_championship
    WHERE bet.id_user = userID;
END$$
DELIMITER ;