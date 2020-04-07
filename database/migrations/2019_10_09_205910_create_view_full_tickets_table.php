<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewFullTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       DB::statement( "CREATE VIEW `full_tickets` AS
                        SELECT
                            `plays_ticket`.`ticket_id` AS `ticket_id`,
                            `tickets`.`ticket_office_id` AS `ticket_office_id`,
                            ROUND(SUM(`plays`.`bet_value_id`),2) AS `subtotal`,
                            ROUND(((SUM(`plays`.`bet_value_id`) * 12) / 100),2) AS `vat`,
                            (ROUND(((SUM(`plays`.`bet_value_id`) * 12) / 100),2) + ROUND(SUM(`plays`.`bet_value_id`),2)) AS `total`
                        FROM
                            ((`plays_ticket`
                            JOIN `tickets` ON((`tickets`.`id` = `plays_ticket`.`ticket_id`)))
                            JOIN `plays` ON((`plays`.`id` = `plays_ticket`.`play_id`)))
                            GROUP BY `plays_ticket`.`ticket_id`;"
                    );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW full_tickets");
    }
}