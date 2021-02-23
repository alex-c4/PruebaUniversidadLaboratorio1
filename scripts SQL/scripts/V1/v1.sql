ALTER TABLE `clubs` ADD `country_id` INT NOT NULL AFTER `nombre`;

ALTER TABLE `clubs` ADD `league_id` INT NOT NULL AFTER `country_id`;

ALTER TABLE `games` CHANGE `estadium` `stadium_id` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL;


ALTER TABLE `users` ADD `timezone` VARCHAR(40) NOT NULL DEFAULT 'UTC' AFTER `birthday`;

ALTER TABLE `clubs` ADD `short_name` VARCHAR(20) NOT NULL AFTER `nombre`;

ALTER TABLE `clubs` CHANGE `imagen_bandera` `imagen_bandera` VARCHAR(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL;

ALTER TABLE `games` CHANGE `date` `date` DATETIME NOT NULL;


DROP procedure IF EXISTS `sp_getGamesByChampionship`;
DELIMITER $$
CREATE PROCEDURE `sp_getGamesByChampionship`(IN `championship_id` INT)
    NO SQL
BEGIN

	SELECT 
    	gm.id,    	
        gm.id AS idx,
        gm.grupo,
        ph.name AS fase,
    	gm.nombre_club_1, 
        gm.nombre_club_2, 
        gm.date, 
        st.name AS stadium
    FROM games AS gm 
    INNER JOIN stadiums AS st ON gm.stadium_id=st.id 
    INNER JOIN phases AS ph ON gm.fase=ph.id
    WHERE
    	gm.id_champ = championship_id
    ORDER BY gm.date ASC;

END$$

DELIMITER ;


DROP PROCEDURE  IF EXISTS `sp_getMyGames_PronosticsDetails`;
DELIMITER $$
CREATE PROCEDURE `sp_getMyGames_PronosticsDetails`(IN `betID` INT)
NO SQL
BEGIN
    SELECT 
        g.id AS game_id,
        g.date,
        st.name AS stadium,
        g.grupo,
        g.estatus As game_estatus,
        g.resultado_club_1,
        g.resultado_club_2,
        (SELECT imagen_bandera FROM clubs WHERE id = g.id_club_1) AS img_club_1,
        (SELECT imagen_bandera FROM clubs WHERE id = g.id_club_2) AS img_club_2,
        p.bet_id,
        (SELECT nombre FROM clubs WHERE id = g.id_club_1) AS nombre_club_1,
        p.pronostic_club_1,
        (SELECT nombre FROM clubs WHERE id = g.id_club_2) AS nombre_club_2,
        p.pronostic_club_2,
        p.pronostic_score,
        p.id AS pronostic_id

    FROM pronostics AS p
        INNER JOIN games AS g ON g.id=p.id_game 
        INNER JOIN stadiums AS st ON st.id = g.stadium_id
    WHERE p.bet_id = betID
    ORDER BY g.date ASC;
 END$$
DELIMITER ;

DROP PROCEDURE IF EXISTS `sp_getGamesByQuiniela`;
DELIMITER $$
CREATE PROCEDURE `sp_getGamesByQuiniela`(IN `id_quiniela` INT) COMMENT 'Devuelve todos los juegos asociados a una quiniela en particular' 
NO SQL

BEGIN

SELECT 
	gm.id,
    (SELECT short_name FROM clubs AS c WHERE c.id = gm.id_club_1) AS nombre_club_1,
    (SELECT short_name FROM clubs AS c WHERE c.id = gm.id_club_2) AS nombre_club_2,
    (SELECT nombre FROM clubs AS c WHERE c.id = gm.id_club_1) AS nombre_club_1_long,
    (SELECT nombre FROM clubs AS c WHERE c.id = gm.id_club_2) AS nombre_club_2_long,
    gm.grupo,
    gm.date,
    st.name as stadium,
    gm.location,
    (SELECT imagen_logo FROM clubs AS c WHERE c.id = gm.id_club_1) AS img_club_1,
    (SELECT imagen_logo FROM clubs AS c WHERE c.id = gm.id_club_2) AS img_club_2
FROM games AS gm 
	INNER JOIN championships AS ch ON gm.id_champ = ch.id
    INNER JOIN quinielas AS qu ON qu.id_championship = ch.id 
    INNER JOIN stadiums AS st ON gm.stadium_id = st.id
WHERE 
	qu.id_quiniela = id_quiniela
ORDER BY gm.date ASC;

END$$
DELIMITER ;


DROP PROCEDURE IF EXISTS `sp_getMyQuinielasPublic`;
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

DROP PROCEDURE IF EXISTS `sp_getMyQuinielasPrivate`;
DELIMITER $$
CREATE PROCEDURE `sp_getMyQuinielasPrivate`(IN `userID` INT) COMMENT 'Devuelve todas las quiniela creadas por un usuario' NOT DETERMINISTIC READS SQL DATA SQL SECURITY DEFINER BEGIN
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
        INNER JOIN users u ON u.id = qp.id_user
    WHERE 
        qp.id_user = userID AND
        q.isActive = 1 AND
        q.id_type = 2;
END$$
DELIMITER ;



DROP PROCEDURE IF EXISTS `sp_getMyGames_PronosticsDetails`;
DELIMITER $$
CREATE PROCEDURE `sp_getMyGames_PronosticsDetails`(IN `betID` INT) NOT DETERMINISTIC NO SQL SQL SECURITY DEFINER 
BEGIN
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
        p.id AS pronostic_id

    FROM pronostics AS p
        INNER JOIN games AS g ON g.id=p.id_game 
        INNER JOIN stadiums AS st ON st.id = g.stadium_id
    WHERE p.bet_id = betID
    ORDER BY g.date ASC;
 END$$
DELIMITER ;


DROP PROCEDURE IF EXISTS `sp_getLastResult`;
DELIMITER $$
CREATE PROCEDURE `sp_getLastResult`() NOT DETERMINISTIC NO SQL SQL SECURITY DEFINER BEGIN

    SELECT 
        s.name, 
        date, 
        grupo,
        g.nombre_club_1,
        g.resultado_club_1,
        g.nombre_club_2,
        g.resultado_club_2,
        g.resultado_club_1_penalty,
        g.resultado_club_2_penalty,
        g.penalty,
        (SELECT imagen_bandera FROM clubs WHERE id = g.id_club_1) AS img_club_1,
        (SELECT imagen_bandera FROM clubs WHERE id = g.id_club_2) AS img_club_2,
        g.estatus
    FROM 
        games as g INNER JOIN clubs as c on g.id_club_1=c.id
        INNER JOIN stadiums AS s ON s.id = g.stadium_id
    WHERE 
        g.estatus = 'FINALIZADO'
    ORDER BY g.id DESC
    LIMIT 0, 6;

END$$
DELIMITER ;


DROP PROCEDURE IF EXISTS `sp_getMyPronotics`;
DELIMITER $$
CREATE PROCEDURE `sp_getMyPronotics`(IN `userID` INT) NOT DETERMINISTIC NO SQL SQL SECURITY DEFINER BEGIN
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
        func_getGoldpot_amount(q.id_quiniela) AS golpot
    FROM bets AS b
        INNER JOIN quinielas AS q ON q.id_quiniela = b.id_quiniela
        INNER JOIN championships AS ch ON ch.id = q.id_championship
        INNER JOIN quinielatipo AS qt ON qt.id=q.id_type
    WHERE b.id_user = userID
    ORDER BY q.id_quiniela;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE `sp_getPronosticsDetails`(IN `betID` INT) NOT DETERMINISTIC NO SQL SQL SECURITY DEFINER BEGIN
	SELECT 
        g.id AS game_id,
        g.date,
        st.name AS stadium,
        g.grupo,
        (SELECT imagen_logo FROM clubs WHERE id = g.id_club_1) AS imagen_logo_1,
        (SELECT imagen_logo FROM clubs WHERE id = g.id_club_2) AS imagen_logo_2,
        p.bet_id,
        (SELECT nombre FROM clubs WHERE id = g.id_club_1) AS nombre_club_1_long,
        p.pronostic_club_1,
        (SELECT nombre FROM clubs WHERE id = g.id_club_2) AS nombre_club_2_long,
        (SELECT short_name FROM clubs WHERE id = g.id_club_1) AS nombre_club_1,
        p.pronostic_club_1,
        (SELECT short_name FROM clubs WHERE id = g.id_club_2) AS nombre_club_2,
        p.pronostic_club_2,
        p.id AS pronostic_id,
        c.start_datetime AS start
    FROM pronostics AS p
        INNER JOIN games AS g ON g.id=p.id_game
        INNER JOIN quinielas AS q ON q.id_quiniela=p.id_quiniela
        INNER JOIN championships AS c ON c.id=q.id_championship
        INNER JOIN stadiums AS st ON st.id = g.stadium_id
    WHERE 
    	p.bet_id = betID AND
        q.isActive = true
        
    ORDER BY g.date ASC;
END$$
DELIMITER $$



DELIMITER $$
CREATE PROCEDURE `sp_getComparePronosctic`(IN `id_quiniela` INT, IN `id_game` INT) NOT DETERMINISTIC NO SQL SQL SECURITY DEFINER BEGIN
	SELECT 
    	u.name AS userName,
        u.lastName AS userLastName,
        p.pronostic_club_1,
        p.pronostic_club_2
    FROM quinielas AS q INNER JOIN
    	pronostics AS p ON p.id_quiniela = q.id_quiniela INNER JOIN
    	users AS u ON u.id = P.id_user
    WHERE 
    	p.id_quiniela = id_quiniela AND
        p.id_game = id_game
    ORDER BY u.name;
END$$
DELIMITER ;



DROP PROCEDURE IF EXISTS `sp_getMyPronosticsDetails`;
DELIMITER $$
CREATE PROCEDURE `sp_getMyPronosticsDetails`(IN `betID` INT, IN `id_user` INT) NOT DETERMINISTIC NO SQL SQL SECURITY DEFINER BEGIN
    SELECT 
        g.id AS game_id,
        g.date,
        st.name AS stadium,
        g.grupo,
        (SELECT imagen_logo FROM clubs WHERE id = g.id_club_1) AS imagen_logo_1,
        (SELECT imagen_logo FROM clubs WHERE id = g.id_club_2) AS imagen_logo_2,
        p.bet_id,
        (SELECT nombre FROM clubs WHERE id = g.id_club_1) AS nombre_club_1_long,
        p.pronostic_club_1,
        (SELECT nombre FROM clubs WHERE id = g.id_club_2) AS nombre_club_2_long,
        (SELECT short_name FROM clubs WHERE id = g.id_club_1) AS nombre_club_1,
        p.pronostic_club_1,
        (SELECT short_name FROM clubs WHERE id = g.id_club_2) AS nombre_club_2,
        p.pronostic_club_2,
        p.id AS pronostic_id,
        c.start_datetime AS start,
        q.id_quiniela
    FROM pronostics AS p
        INNER JOIN games AS g ON g.id=p.id_game
        INNER JOIN quinielas AS q ON q.id_quiniela=p.id_quiniela
        INNER JOIN championships AS c ON c.id=q.id_championship
        INNER JOIN stadiums AS st ON st.id = g.stadium_id
    WHERE 
    	p.bet_id = betID AND
        q.isActive = true AND
        p.id_user = id_user
        
    ORDER BY g.date ASC;
END$$
DELIMITER ;



