<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewMasterUtilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE VIEW `master_utilities` AS
                        SELECT
                            `agencies_ticketoffices`.`id` AS `id`,`agencies_ticketoffices`.`name` AS `name`,ROUND(SUM(`agencies_ticketoffices`.`values_total`),2) AS `recaudo_agencia`,
                            `agencies`.`percentage_profit` AS `percentage_profit`,ROUND(((SUM(`agencies_ticketoffices`.`values_total`) * `agencies`.`percentage_profit`) / 100),2) AS `ganancia_afiliado`,
                            ROUND((SUM(`agencies_ticketoffices`.`values_total`) - ROUND(((SUM(`agencies_ticketoffices`.`values_total`) * `agencies`.`percentage_profit`) / 100),2)),2) AS `subtotal_master`,
                            ROUND(SUM(`money_tickets`.`Pago_por_ticket`),2) AS `pago_premios`,(ROUND((SUM(`agencies_ticketoffices`.`values_total`) - ((SUM(`agencies_ticketoffices`.`values_total`) * `agencies`.`percentage_profit`) / 100)),2) - ROUND(SUM(`money_tickets`.`Pago_por_ticket`),2)) AS `total_master`
                        FROM
                            ((`agencies_ticketoffices`
                            JOIN `money_tickets` ON((`money_tickets`.`ticket_office_id` = `agencies_ticketoffices`.`ticket_offices_id`)))
                            JOIN `agencies` ON((`agencies`.`id` = `agencies_ticketoffices`.`id`)))
                        GROUP BY `agencies_ticketoffices`.`id`;"
                    );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW master_utilities');
    }
}
