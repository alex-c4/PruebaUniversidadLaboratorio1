DROP procedure IF EXISTS `sp_getAllPronosticByQuiniela`;
DELIMITER $$

CREATE PROCEDURE `sp_getAllPronosticByQuiniela`(IN `id_quiniela` INT)
BEGIN
	SELECT 
		q.nombre AS quinielaName,
        u.id AS id_user,
		u.name AS userName,
		u.lastName AS userLastName,
		p.id_game,
        (SELECT short_name FROM clubs AS c WHERE c.id = g.id_club_1) AS nombre_club_1,
		(SELECT short_name FROM clubs AS c WHERE c.id = g.id_club_2) AS nombre_club_2,
		(SELECT nombre FROM clubs AS c WHERE c.id = g.id_club_1) AS nombre_club_1_long,
		(SELECT nombre FROM clubs AS c WHERE c.id = g.id_club_2) AS nombre_club_2_long,
		p.pronostic_club_1, 
		p.pronostic_club_2
	FROM quinielas AS q INNER JOIN
		pronostics AS p ON p.id_quiniela = q.id_quiniela INNER JOIN
		users AS u ON u.id = p.id_user INNER JOIN
		games AS g ON g.id = p.id_game
	WHERE 
		q.id_quiniela = id_quiniela
	ORDER BY
		g.date ASC;
END$$

DELIMITER ;



DROP procedure IF EXISTS `sp_getQuinielasCreatedByMe`;

DELIMITER $$
CREATE  PROCEDURE `sp_getQuinielasCreatedByMe`(IN `userID` INT)
    NO SQL
BEGIN
	SELECT
    	q.id_quiniela AS ID,
    	q.nombre AS nombre,
        q.code AS codigo,
        c.name AS championship,
        c.start_datetime,
        qt.name AS tipo,
        qt.id AS tipoId
    FROM quinielas AS q
    	INNER JOIN championships AS c ON q.id_championship=c.id
        INNER JOIN quinielatipo AS qt ON q.id_type=qt.id
    WHERE
    	q.id_user_creador = userID
    ORDER BY
    	q.id_quiniela DESC;
END$$

DELIMITER ;


DROP procedure IF EXISTS `sp_getMyQuinielasPrivate`;

DELIMITER $$
CREATE PROCEDURE `sp_getMyQuinielasPrivate`(IN `userID` INT)
    READS SQL DATA
    COMMENT 'Devuelve todas las quiniela creadas por un usuario'
BEGIN
    SELECT 
        q.id_quiniela AS idQuiniela, 
        q.nombre AS nombreQuiniela,
        q.created_at AS fechaCreacionQuiniela,
        q.amount AS amount,
        func_getGoldpot_amount(q.id_quiniela) AS golpot,
        ch.name AS nombreCampeonato,
        qt.name AS tipoQuiniela,
        u.name AS user_creador_name,
        u.lastName AS user_creador_lastname,
        ch.start_datetime
    FROM
        quinielas AS q
        INNER JOIN championships AS ch ON ch.id=q.id_championship
        INNER JOIN quinielatipo AS qt ON qt.id=q.id_type
        INNER JOIN quiniela_privada AS qp ON qp.id_quiniela=q.id_quiniela
        INNER JOIN users u ON u.id = q.id_user_creador
    WHERE 
        qp.id_user = userID AND
        q.isActive = 1 AND
        q.id_type = 2;
END$$

DELIMITER ;


