<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewMoneyTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE VIEW `money_tickets` AS
                        SELECT
                            `results`.`id`,`results`.`lottery_id`, `lotteries`.`name`, `results`.`element_win_id`,
                            `elements`.`description`, `results`.`schedules_id`,`schedules`.`iniitial_schedule`,`plays_ticket`.`ticket_id`,
                            `tickets`.`ticket_office_id`,`tickets`.`customer_id`,`plays`.`bet_value_id`,
                            `lotteries`.`payment_x`, `plays`.`bet_value_id`*`lotteries`.`payment_x` as `Pago_por_ticket`, 
                            `winners`.`status`,`results`.`fecha`
                        FROM
                            (((((((`results`
                            JOIN `plays` ON ((`plays`.`lottery_id` = `results`.`lottery_id`)))
                            JOIN `plays_ticket` ON ((`plays_ticket`.`bet_schedule_id` = `results`.`schedules_id` AND `plays_ticket`.`play_id` = `plays`.`id` AND `plays_ticket`.`bet_element_id` = `results`.`element_win_id`)))
                            JOIN `lotteries` ON ((`lotteries`.`id` = `results`.`lottery_id`)))
                            JOIN `tickets` ON ((`tickets`.`id` = `plays_ticket`.`ticket_id`)))
                            JOIN `elements` ON ((`elements`.`id` = `results`.`element_win_id`)))
                            JOIN `schedules` ON((`schedules`.`id` = `results`.`schedules_id`)))
                            JOIN `winners` on((`winners`.`ticket_id` = `plays_ticket`.`ticket_id` AND `winners`.`result_id` = `results`.`id`)))
                        WHERE to_days(`results`.`fecha`) = to_days(`plays`.`date`)
                        ORDER BY `results`.`fecha`, `results`.`schedules_id`;"

                    );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW money_tickets");
    }
}
