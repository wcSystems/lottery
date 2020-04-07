<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewAgenciesTicketofficesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE VIEW `agencies_ticketoffices` AS
                        SELECT
                            `agencies`.`id` AS `id`,
                            `agencies`.`name` AS `name`,
                            `ticket_offices`.`id` AS `ticket_offices_id`,
                            `ticket_offices`.`descripcion` AS `descripcion`,
                            ROUND(SUM(`full_tickets`.`total`),2) AS `values_total`
                        FROM
                            ((`agencies`
                            JOIN `ticket_offices` ON ((`ticket_offices`.`agency_id` = `agencies`.`id`)))
                            JOIN `full_tickets` ON ((`full_tickets`.`ticket_office_id` = `ticket_offices`.`id`)))
                        GROUP BY `ticket_offices`.`id`;"
                    );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW agencies_ticketoffices");
    }
}
