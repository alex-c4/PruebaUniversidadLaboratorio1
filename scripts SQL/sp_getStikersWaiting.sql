DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getStikersWaiting`(IN `user_id` INT, IN `album_id` INT)
    READS SQL DATA
SELECT us.name, us.lastName, stk.number, stk.id, stk.quantity
FROM stickers AS stk 
INNER JOIN users AS us ON stk.user_id=us.id
INNER JOIN albums AS alb ON alb.id = stk.album_id
INNER JOIN cities AS cts ON cts.id = us.city_id
WHERE 
us.id <> user_id AND 
alb.id = album_id AND 
stk.quantity > 1 AND 
stk.number NOT IN (SELECT number FROM stickers AS st WHERE st.user_id = user_id)$$
DELIMITER ;