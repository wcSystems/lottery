<?php

use Illuminate\Database\Seeder;
use App\Play;

class Table_Plays_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Play::class, 200)->create();
    }
}
