<?php

use Illuminate\Database\Seeder;
use App\Box;

class Table_Box_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $var = array(
            array('lottery_id' => '1','type_game_id' => '3','created_at' => now(),'updated_at' => now(),'deleted_at' => NULL),
            array('lottery_id' => '2','type_game_id' => '3','created_at' => now(),'updated_at' => now(),'deleted_at' => NULL),
            array('lottery_id' => '3','type_game_id' => '3','created_at' => now(),'updated_at' => now(),'deleted_at' => NULL)
          );
        Box::insert($var);
    }
}
