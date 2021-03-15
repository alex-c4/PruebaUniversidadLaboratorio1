DROP procedure IF EXISTS `sp_getMyGames_PronosticsDetails`;

DELIMITER $$
CREATE PROCEDURE `sp_getMyGames_PronosticsDetails`(IN `betID` INT)
    NO SQL
SELECT 
        g.id AS game_id,
        g.date,
        st.name AS stadium,
        g.grupo,
        g.estatus As game_estatus,
        g.resultado_club_1,
        g.resultado_club_2,
        (SELECT imagen_logo FROM clubs AS c WHERE c.id = g.id_club_1) AS img_club_1,
    (SELECT imagen_logo FROM clubs AS c WHERE c.id = g.id_club_2) AS img_club_2,
        p.bet_id,
        p.pronostic_club_1,
        (SELECT nombre FROM clubs WHERE id = g.id_club_1) AS nombre_club_1_long,
        (SELECT nombre FROM clubs WHERE id = g.id_club_2) AS nombre_club_2_long,
        (SELECT short_name FROM clubs AS c WHERE c.id = g.id_club_1) AS nombre_club_1,
    	(SELECT short_name FROM clubs AS c WHERE c.id = g.id_club_2) AS nombre_club_2,
        p.pronostic_club_2,
        p.pronostic_score,
        p.id AS pronostic_id,
		q.id_quiniela
    FROM pronostics AS p
        INNER JOIN games AS g ON g.id=p.id_game 
        INNER JOIN stadiums AS st ON st.id = g.stadium_id
        INNER JOIN quinielas AS q ON q.id_quiniela=p.id_quiniela
    WHERE p.bet_id = betID
    ORDER BY g.date ASC$$

DELIMITER ;


DROP procedure IF EXISTS `sp_getQuinielasCreatedByMe`;

DELIMITER $$

CREATE PROCEDURE `sp_getQuinielasCreatedByMe`(IN `userID` INT)
    NO SQL
BEGIN
	SELECT
    	q.id_quiniela AS ID,
    	q.nombre AS nombre,
        q.code AS codigo,
        c.name AS championship,
        c.start_datetime,
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


DROP procedure IF EXISTS `sp_getMyQuinielasPublic`;

DELIMITER $$
CREATE PROCEDURE `sp_getMyQuinielasPublic`()
    NO SQL
BEGIN
	SET @golpot = 95;
    SELECT 
        q.id_quiniela AS idQuiniela, 
        q.nombre AS nombreQuiniela,
        q.created_at AS fechaCreacionQuiniela,
        q.amount as amount,
        q.goldpot AS goldpot_public,
        q.id_type,
        u.name AS user_creador_name,
        u.lastName AS user_creador_lastname,
        ch.name AS nombreCampeonato,
        ch.start_datetime,
        qt.name AS tipoQuiniela,
        func_getGoldpot_amount(id_quiniela) AS golpot
    FROM
        quinielas AS q
        INNER JOIN championships AS ch ON ch.id=q.id_championship
        INNER JOIN quinielatipo qt ON qt.id=q.id_type
        INNER JOIN users u ON u.id = q.id_user_creador
    WHERE 
        (q.id_type = 1 OR q.id_type = 3) AND
        q.isActive = true;
END$$

DELIMITER ;


DROP procedure IF EXISTS `sp_getMyPronotics`;

DELIMITER $$
CREATE PROCEDURE `sp_getMyPronotics`(IN `userID` INT)
    NO SQL
BEGIN
	SET time_zone = '+00:00';
	SELECT 
        b.id AS betId,
        b.verification AS verification,
        q.nombre AS quiniela,
        q.id_quiniela,
        ch.name AS championshipName,
        (now() > ch.start_datetime) AS isStartChampionship,
        ch.start_datetime AS start,
        b.ref_pago AS refPago,
        b.verification,
        q.isActive,
        q.id_type AS quinielaTipo,
        qt.name AS quinielaTipoName,
        q.amount,
        q.id_type,
        q.goldpot AS golpot_public,
        func_getGoldpot_amount(q.id_quiniela) AS golpot
    FROM bets AS b
        INNER JOIN quinielas AS q ON q.id_quiniela = b.id_quiniela
        INNER JOIN championships AS ch ON ch.id = q.id_championship
        INNER JOIN quinielatipo AS qt ON qt.id=q.id_type
    WHERE b.id_user = userID
    ORDER BY q.id_quiniela;
END$$

DELIMITER ;



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

ALTER TABLE `quinielas` ADD `goldpot` INT NULL DEFAULT '0' COMMENT 'Aqui se define el goldpot para las quinielas Publicas Gratis' AFTER `amount`;
