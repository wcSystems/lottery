//vista 01
CREATE VIEW `agencies_ticketoffices` AS
SELECT
    `agencies
`.`id` AS `id`,
        `agencies`.`name` AS `name`,
        `ticket_offices`.`id` AS `ticket_offices_id`,
        `ticket_offices`.`descripcion` AS `descripcion`,
        SUM
(`tickets`.`total`) AS `values_total`
    FROM
((`agencies`
        JOIN `ticket_offices` ON
((`ticket_offices`.`agency_id` = `agencies`.`id`)))
        JOIN `tickets` ON
((`tickets`.`ticket_office_id` = `ticket_offices`.`id`)))
    GROUP BY `ticket_offices`.`id`

//vista 02
CREATE VIEW `animals_played` AS
SELECT
    `plays
`.`lottery_id` AS `lottery_id`,
        `plays_ticket`.`play_id` AS `play_id`,
        `plays_ticket`.`ticket_id` AS `ticket_id`,
        `plays_ticket`.`bet_element_id` AS `bet_element_id`,
        `plays`.`bet_value_id` AS `bet_value_id`,
        `box`.`type_game_id` AS `type_game_id`,
        `plays`.`created_at` AS `created_at`
    FROM
((`plays`
        JOIN `plays_ticket` ON
((`plays_ticket`.`play_id` = `plays`.`id`)))
        JOIN `box` ON
((`box`.`lottery_id` = `plays`.`lottery_id`)))
    ORDER BY `box`.`type_game_id`

//vista 03
CREATE VIEW `plays_days` AS
SELECT
    `plays
`.`id` AS `id`,
        `plays`.`bet_value_id` AS `bet_value_id`,
        `plays`.`created_at` AS `created_at`
    FROM
        `plays`
