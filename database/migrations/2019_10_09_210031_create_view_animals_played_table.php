<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewAnimalsPlayedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE VIEW `animals_played` AS
                        SELECT
                            `plays`.`lottery_id` AS `lottery_id`,
                            `plays_ticket`.`play_id` AS `play_id`,
                            `plays_ticket`.`ticket_id` AS `ticket_id`,
                            `plays_ticket`.`bet_element_id` AS `bet_element_id`,
                            `plays`.`bet_value_id` AS `bet_value_id`,
                            `box`.`type_game_id` AS `type_game_id`,
                            `plays`.`created_at` AS `created_at`
                        FROM
                            ((`plays`
                            JOIN `plays_ticket` ON ((`plays_ticket`.`play_id` = `plays`.`id`)))
                            JOIN `box` ON ((`box`.`lottery_id` = `plays`.`lottery_id`)))
                        ORDER BY `box`.`type_game_id`;"
                    );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW animals_played");
    }
}
