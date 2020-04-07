<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code')->unique()->nullable();
            $table->date('datetime')->nullable();
            $table->string('description');
            $table->bigInteger('ticket_office_id')->unsigned();
            $table->bigInteger('customer_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            //Fk
            $table->foreign('ticket_office_id')->references('id')->on('ticket_offices');
            $table->foreign('customer_id')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
