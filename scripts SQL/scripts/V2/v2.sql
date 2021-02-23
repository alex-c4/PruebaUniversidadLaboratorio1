DROP procedure IF EXISTS `sp_getAllPronosticByQuiniela`;

DELIMITER $$

CREATE PROCEDURE `sp_getAllPronosticByQuiniela`(IN `id_quiniela` INT)
BEGIN
	SELECT 
		q.nombre AS quinielaName,
		u.name AS userName,
		u.id AS id_user,
		u.lastName AS userLastName,
		p.id_game,
		g.nombre_club_1,
		p.pronostic_club_1,
		g.nombre_club_2,
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

DELIMITER ;
