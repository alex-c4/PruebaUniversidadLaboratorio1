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
		u.name ASC, p.id_game ASC;
END$$
