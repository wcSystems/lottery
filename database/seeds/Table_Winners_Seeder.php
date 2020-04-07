<?php

use Illuminate\Database\Seeder;
use App\Winner;

class Table_Winners_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Winner::class, 15)->create();
    }
}
