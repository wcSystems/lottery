SET GLOBAL event_scheduler="ON"
DROP EVENT `lanzar_sorteos`; 
CREATE EVENT `lanzar_sorteos` ON SCHEDULE EVERY 1 HOUR STARTS '2019-10-08 00:00:00' ON COMPLETION PRESERVE ENABLE DO CALL CargaApuestas();

DELIMITER $$
CREATE PROCEDURE `CargaApuestas`()
BEGIN
	DECLARE finished INTEGER DEFAULT 0;
	DECLARE hora_actual INT;
    DECLARE fecha_actual DATE;
    DECLARE loteria INT;
    DECLARE utilidad INT;
    DECLARE limite_utilidad FLOAT;
    DECLARE criterio_premio INT;
    DECLARE total_carga_apuesta DECIMAL(19,4);
    DECLARE resultado_dia_anterior INT;
    DECLARE limite_max_perdida FLOAT;
    DECLARE escenario_real_min FLOAT;
    DECLARE escenario_real_max FLOAT;
    DECLARE element_win INT;
    
    DEClARE curLoteria 
	CURSOR FOR 
		SELECT lotteries.id, percent, payment_x
		FROM schedules_setting
		INNER JOIN lotteries ON lotteries.id = schedules_setting.lottery_id
		INNER JOIN schedules ON schedules.id = schedules_setting.schedule_id
		where schedules.id = EXTRACT(HOUR FROM NOW())
			AND lotteries.status = 1
			AND lotteries.deleted_at IS NULL;
        
	DECLARE CONTINUE HANDLER 
		FOR NOT FOUND SET finished = 1;
 
    OPEN curLoteria;

	getLoteria: LOOP
		FETCH curLoteria INTO loteria, utilidad, criterio_premio;
		IF finished = 1 THEN 
			LEAVE getLoteria;
		END IF;

		SET time_zone = '-4:00';
		SET hora_actual = EXTRACT(HOUR FROM NOW());
        SET time_zone = '-4:00';
		SET fecha_actual = DATE(now());
		SET limite_max_perdida = (1/criterio_premio)*100;
		SET total_carga_apuesta = cal_total_carga_apuesta(loteria);
        IF total_carga_apuesta > 0 THEN
			SET resultado_dia_anterior = buscar_resultado_dia_anterior(loteria);
			
			CALL buscar_min_max(loteria,criterio_premio,total_carga_apuesta, @mini, @maxi); -- VERIFICAR SI @MINI ES MAYOR A 3.33

			SET escenario_real_min = @mini;
			SET escenario_real_max = @maxi;
			SET limite_utilidad = escenario_real_min + (escenario_real_max-escenario_real_min)*(utilidad/3);
			
            -- Para generar un número aleatorio en el rango a <= n <= b
			-- FLOOR(a + RAND() * (b - a + 1))
			SET @ran=0;
			SELECT FLOOR(1 + RAND() * (5 - 1 + 1)) INTO @ran;

			SET element_win = elemento_ganador(
				total_carga_apuesta, criterio_premio,
				loteria, limite_utilidad, resultado_dia_anterior, @ran
			); -- VERIFICAR SI ES NULL
		ELSE
			SELECT FLOOR(13 + RAND() * (50 - 13 + 1)) INTO element_win;
        END IF;

START TRANSACTION;
SET time_zone = '-4:00';
INSERT INTO results (
	lottery_id,
    schedules_id,
    element_win_id,
    fecha,
    created_at,
    updated_at
)
VALUES (
	loteria,
    EXTRACT(HOUR FROM NOW()),
    element_win,
    DATE(now()),
    now(),
    now()
);
SET time_zone = '-4:00';
SELECT LAST_INSERT_ID() into @id;

IF limite_utilidad > 0 AND total_carga_apuesta > 0 THEN
	SET time_zone = '-4:00';
	INSERT INTO winners (
		result_id, 
		ticket_id, 
		created_at,
		updated_at
	)
	SELECT 
		@id,
		ticket_id,
		now(),
		now()
	FROM 
		plays_ticket, plays
	WHERE 
		plays_ticket.play_id = plays.id
		AND plays.lottery_id = loteria
		AND plays_ticket.bet_element_id = element_win
		AND plays_ticket.bet_schedule_id = hora_actual
		AND plays.date = fecha_actual;
END IF;
COMMIT;
	SET limite_utilidad = 0;
    SET total_carga_apuesta = 0;
    SET resultado_dia_anterior = 0;
    SET limite_max_perdida = 0;
    SET escenario_real_min = 0;
    SET escenario_real_max = 0;
    SET element_win = 0;
    SET @ran = 0;
    SET @mini = 0;
    SET @maxi = 0;

END LOOP getLoteria;
    CLOSE curLoteria;
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE `buscar_min_max`(
    IN `lot` INT, 
    IN `premio` INT, 
    IN `carga` DECIMAL(19,4), 
    OUT `cal_min` FLOAT, 
    OUT `cal_max` FLOAT)
BEGIN
	
    SET time_zone = '-4:00';
	SELECT
		min(total),
		max(total) INTO cal_min, cal_max
	FROM
		(SELECT
		   t2.bet_element_id,
		   sum(bet_value_id)/carga*100 as total
		FROM plays t1
		INNER JOIN plays_ticket t2
		ON t1.id = t2.play_id
		INNER JOIN lotteries t3
		ON t1.lottery_id = t3.id
		WHERE date = DATE(now())
			AND bet_schedule_id = EXTRACT(HOUR FROM NOW())
			AND lottery_id = lot
			AND status = 1
			AND t3.deleted_at IS NULL
		GROUP BY t2.bet_element_id) tmp;
    IF cal_max>(1/premio)*100 THEN
		SET cal_max = (1/premio)*100;
	END IF;
    IF cal_min>(1/premio)*100 THEN
		SET cal_min = 0;
		SET cal_max = 0;
	END IF;
END$$
DELIMITER ;

DELIMITER $$
CREATE FUNCTION `buscar_resultado_dia_anterior`(
    loteria INT
) RETURNS int(11)
BEGIN
	DECLARE elemento INT;
    SET time_zone = '-4:00';
    
    SELECT element_win_id INTO elemento FROM results
	WHERE lottery_id = loteria 
    AND schedules_id = EXTRACT(HOUR FROM NOW())
    AND fecha = DATE(DATE(now())-1);
    
    IF elemento IS NULL THEN
		SET elemento = 0;
	END IF;

RETURN elemento;
END$$
DELIMITER ;

DELIMITER $$
CREATE FUNCTION `cal_total_carga_apuesta`(
    loteria INT
) RETURNS decimal(19,4)
BEGIN
	DECLARE total DECIMAL(19,4);
    SET time_zone = '-4:00';
    
	SELECT
	   sum(bet_value_id) INTO total
	FROM plays t1
	INNER JOIN plays_ticket t2
	ON t1.id = t2.play_id
	INNER JOIN lotteries t3
	ON t1.lottery_id = t3.id
	where t1.date = DATE(now())
		AND t2.bet_schedule_id = EXTRACT(HOUR FROM NOW())
		AND t1.lottery_id = loteria
		AND status = 1
		AND t3.deleted_at IS NULL;
RETURN total;
END$$
DELIMITER ;

DELIMITER $$
CREATE FUNCTION `elemento_ganador`(
    total_carga_apuesta DECIMAL(19,4),
    criterio_premio INT,
    loteria INT,
    limite_utilidad FLOAT,
    resultado_dia_anterior INT,
    ran INT
) RETURNS int(11)
BEGIN
	DECLARE element_win INT;
    SET @numero=0;
    
    IF limite_utilidad > 0 THEN
		SET time_zone = '-4:00';
		SELECT 
			@numero:=@numero+1 AS posicion,
			elemento 
			into @num, element_win
		FROM
		(SELECT
		   t2.bet_element_id as elemento,
		   count(ticket_id) as cant_jugadas,
		   sum(bet_value_id)/total_carga_apuesta*100 as total
		FROM plays t1
		INNER JOIN plays_ticket t2
		ON t1.id = t2.play_id
		INNER JOIN lotteries t3
		ON t1.lottery_id = t3.id
		WHERE date = DATE(now())
			AND bet_schedule_id = EXTRACT(HOUR FROM NOW())
			AND lottery_id = loteria
			AND status = 1
			AND t3.deleted_at IS NULL
			AND t2.bet_element_id <> resultado_dia_anterior
		GROUP BY t2.bet_element_id
		HAVING total < limite_utilidad
		ORDER BY cant_jugadas DESC LIMIT 5) tmp
        order by rand() LIMIT 1;
		-- HAVING posicion = ran;
	ELSE
		REPEAT
			SELECT FLOOR(13 + RAND() * (50 - 13 + 1)) INTO ran;
		UNTIL ran <> resultado_dia_anterior
		END REPEAT;
        SET time_zone = '-4:00';
        SELECT 
			id,
			IFNULL(b.total, 0) AS total
            INTO element_win, @tot
		FROM elements as a
		LEFT JOIN
		(SELECT
				bet_element_id,
				sum(bet_value_id)/total_carga_apuesta*100 as total
			FROM plays t1
			INNER JOIN plays_ticket t2
			ON t1.id = t2.play_id
			INNER JOIN lotteries t3
			ON t1.lottery_id = t3.id
			WHERE date = date(now())
				AND bet_schedule_id = EXTRACT(HOUR FROM NOW())
				AND lottery_id = loteria
				AND bet_element_id <> resultado_dia_anterior
				AND status = 1
				AND t3.deleted_at IS NULL
			GROUP BY bet_element_id) as b
			ON a.id = b.bet_element_id
			WHERE type_game_id = 3 
			HAVING total < (1/criterio_premio) -- AND a.id = ran
			order by rand() LIMIT 1;
            -- ORDER BY a.id;
    END IF;
RETURN element_win;
END$$
DELIMITER ;
