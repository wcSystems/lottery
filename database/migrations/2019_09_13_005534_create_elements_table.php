<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('type_game_id')->unsigned();
            $table->string('code')->nullable();
            $table->string('description');
            $table->string('image')->nullable();
            $table->timestamps();
            $table->softDeletes();

            //Fk
            $table->foreign('type_game_id')->references('id')->on('type_games');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('elements');
    }
}
