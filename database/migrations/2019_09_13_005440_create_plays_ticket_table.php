<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlaysTicketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plays_ticket', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('play_id')->unsigned();
            $table->bigInteger('ticket_id')->unsigned();
            $table->bigInteger('bet_element_id')->unsigned();
            $table->bigInteger('bet_schedule_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            //Fk
            $table->foreign('play_id')->references('id')->on('plays');
            $table->foreign('ticket_id')->references('id')->on('tickets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plays_ticket');
    }
}
