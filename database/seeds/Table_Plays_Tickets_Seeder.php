<?php

use Illuminate\Database\Seeder;
use App\Plays_ticket;

class Table_Plays_Tickets_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Plays_ticket::class, 2000)->create();
    }
}
