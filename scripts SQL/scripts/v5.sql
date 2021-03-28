DROP procedure IF EXISTS `sp_getMyPaymentsList`;

DELIMITER $$
CREATE PROCEDURE `sp_getMyPaymentsList`(IN `idUser` INT)
    NO SQL
BEGIN
	SELECT 
    	id, 
        id_user,
        amount,
        `status` AS estado1,
        `status` AS estado2,
        id_paypal,
        created_at
    FROM payments_paypal
    WHERE  
    	id_user = idUser
    ORDER BY created_at DESC;
END$$

DELIMITER ;



DROP procedure IF EXISTS `sp_getPaymentsListByStatus`;

DELIMITER $$
CREATE PROCEDURE `sp_getPaymentsListByStatus`(IN `estado` INT, IN `orden` VARCHAR(5))
    NO SQL
BEGIN
	IF orden = 'DESC' THEN
        SELECT 
            pp.id, 
            pp.id_user,
            pp.amount,
            pp.`status` AS estado1,
            pp.`status` AS estado2,
            pp.id_paypal,
            pp.created_at,
            u.name,
            u.lastName
        FROM 
            payments_paypal AS pp INNER JOIN
            users AS u ON pp.id_user = u.id

        WHERE 
            `status` = estado
        ORDER BY created_at DESC;
    ELSE
    	SELECT 
            pp.id, 
            pp.id_user,
            pp.amount,
            pp.`status` AS estado1,
            pp.`status` AS estado2,
            pp.id_paypal,
            pp.created_at,
            u.name,
            u.lastName
        FROM 
            payments_paypal AS pp INNER JOIN
            users AS u ON pp.id_user = u.id

        WHERE 
            `status` = estado
        ORDER BY created_at ASC;
    END IF;
END$$

DELIMITER ;


DROP function IF EXISTS `func_add_balance`;

DELIMITER $$
CREATE FUNCTION `func_add_balance` (idUser INT, updatedBy INT, sendAmount DECIMAL(11,2))
RETURNS BOOLEAN
BEGIN
	DECLARE RESULT BOOLEAN;
    DECLARE SALDO DECIMAL(11,2);
    
	SET time_zone = '+00:00';
    
    SET @CANT = 0;
    
    -- busco registro del usuario en la tabla balances
    SELECT COUNT(id_user) INTO @CANT FROM balances WHERE id_user = idUser;
    
    -- Se valida si ya existe un registro en la tabla 
    IF @CANT > 0 THEN
		SELECT amount INTO @SALDO FROM balances WHERE id_user = idUser;
        UPDATE balances 
        SET 
			amount = (sendAmount + @SALDO), 
            updated_at = CURRENT_TIMESTAMP, 
            updated_by = updatedBy 
		WHERE id_user = idUser;
		
        SET RESULT = true;
	ELSE
		INSERT INTO balances (
			id_user, 
            amount, 
            updated_at, 
            updated_by) 
		VALUES (
			idUser, 
            sendAmount, 
            CURRENT_TIMESTAMP, 
            updatedBy);
            
        SET RESULT = true;
    END IF;

	RETURN RESULT;
END$$

DELIMITER ;









DROP procedure IF EXISTS `sp_updatePaymentStatus`;

DELIMITER $$
CREATE PROCEDURE `sp_updatePaymentStatus`(IN `idPayment` INT, IN `estado` INT, IN `idUserAdmin` INT, IN `sendAmount` DECIMAL(11,2), IN `idPaymentOperationType` INT)
BEGIN
 	DECLARE errno INT;
    DECLARE EXIT HANDLER FOR SQLEXCEPTION 
    BEGIN
        GET CURRENT DIAGNOSTICS CONDITION 1 errno = MYSQL_ERRNO;
        SELECT errno AS MYSQL_ERROR;
        ROLLBACK;
    END;
    
    START TRANSACTION;
    
    -- suma si el pago fue validado se suma el pago al balance del usuario
    IF estado = 2 THEN
    	-- obtiene informacion para sumar el pago al cliente
    	SELECT 
        	@idUser:=pp.id_user
        FROM payments_paypal AS pp WHERE pp.id_paypal = idPayment;
        
        -- suma el balance a la cuenta del usuario
        SELECT func_add_balance(@idUser, idUserAdmin, sendAmount);
        
        -- registro en la tabla de auditoria
        SELECT func_add_balance_auditing(@idUser, idUserAdmin, sendAmount, idPaymentOperationType);
	
    END IF;
    
    
	-- actualiza estado en la tabla payment_paypal
    UPDATE payments_paypal AS pp SET 
		pp.status=estado,
        pp.updated_at=CURRENT_TIMESTAMP, 
        pp.updated_by=idUserAdmin
    WHERE pp.id=idPayment;
    
    COMMIT;
END$$

DELIMITER ;




DROP function IF EXISTS `func_add_balance_auditing`;

DELIMITER $$
CREATE FUNCTION `func_add_balance_auditing`(`idUser` INT, `idUserAdmin` INT, `sendAmount` DECIMAL(11,2), `idPaymentOperationType` INT) RETURNS tinyint(1)
BEGIN

	SET time_zone = '+00:00';
	
    INSERT INTO 
		balance_auditing (id_user, amount, id_payment_operation_type, updated_by, created_at)
    VALUES
		(idUser, sendAmount, idPaymentOperationType, idUserAdmin, CURRENT_TIMESTAMP);
    
RETURN TRUE;
END$$

DELIMITER ;



