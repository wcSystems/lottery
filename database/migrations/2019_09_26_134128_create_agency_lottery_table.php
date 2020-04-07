<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgencyLotteryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agency_lottery', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('agency_id')->unsigned();
            $table->bigInteger('lottery_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            //Fk
            $table->foreign('agency_id')->references('id')->on('agencies');
            $table->foreign('lottery_id')->references('id')->on('lotteries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agency_lottery');
    }
}
