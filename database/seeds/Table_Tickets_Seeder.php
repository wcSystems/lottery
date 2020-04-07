<?php

use Illuminate\Database\Seeder;
use App\Ticket;

class Table_Tickets_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Ticket::class, 200)->create();
    }
}
