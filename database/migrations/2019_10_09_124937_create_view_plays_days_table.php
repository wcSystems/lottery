<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewPlaysDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE VIEW `plays_days` AS
                        SELECT
                            `plays`.`id` AS `id`,
                            `plays`.`bet_value_id` AS `bet_value_id`,
                            `plays`.`date` AS `created_at`
                        FROM
                            `plays`;"
                    );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW plays_days");
    }
}
