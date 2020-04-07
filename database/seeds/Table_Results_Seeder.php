<?php

use Illuminate\Database\Seeder;
use App\Result;

class Table_Results_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Result::class, 15)->create();
    }
}
