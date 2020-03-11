DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getStickersWaiting`(IN `user_id` INT, IN `album_id` INT)
    READS SQL DATA
BEGIN
	SET @usercityid = (SELECT city_id FROM users WHERE id = user_id);
    
    SELECT us.name, us.lastName, stk.number, stk.id, stk.quantity
    FROM stickers AS stk 
    INNER JOIN users AS us ON stk.user_id=us.id
    INNER JOIN albums AS alb ON alb.id = stk.album_id
    INNER JOIN cities AS cts ON cts.id = us.city_id
    WHERE 
    us.city_id = @usercityid AND
    us.id <> user_id AND 
    stk.album_id = album_id AND 
    stk.quantity > 1 AND 
    stk.number NOT IN (SELECT number FROM stickers AS st WHERE st.user_id = user_id);

END$$
DELIMITER ;