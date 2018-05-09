DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getUserStickersWaiting`(IN `user_id` INT, IN `album_id` INT, IN `city_id` INT, IN `number` INT)
    READS SQL DATA
BEGIN   
    SET @userstateid = (SELECT state_id FROM users where id = user_id);

	SELECT us.id as userId, us.name, us.lastName, cts.name as 			cityName, stk.id as stickerId, stk.number, stk.quantity
	FROM stickers AS stk 
	INNER JOIN users AS us ON stk.user_id=us.id
	INNER JOIN albums AS alb ON alb.id = stk.album_id
	INNER JOIN cities AS cts ON cts.id = us.city_id
	WHERE 
	us.state_id = @userstateid AND
	us.id <> user_id AND 
	alb.id = album_id AND 
	stk.quantity > 1 AND 
	stk.number = number
	GROUP BY us.name;
END$$
DELIMITER ;