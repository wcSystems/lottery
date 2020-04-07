<?php

use Illuminate\Database\Seeder;
use App\Schedules_setting;

class Table_Schedules_setting_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $var = array(
            array('schedule_id' => '13','lottery_id' => '1','created_at' => now(),'updated_at' => now(),'deleted_at' => NULL),
            array('schedule_id' => '18','lottery_id' => '1','created_at' => now(),'updated_at' => now(),'deleted_at' => NULL),
            array('schedule_id' => '12','lottery_id' => '2','created_at' => now(),'updated_at' => now(),'deleted_at' => NULL),
            array('schedule_id' => '17','lottery_id' => '2','created_at' => now(),'updated_at' => now(),'deleted_at' => NULL),
            array('schedule_id' => '11','lottery_id' => '3','created_at' => now(),'updated_at' => now(),'deleted_at' => NULL),
            array('schedule_id' => '20','lottery_id' => '3','created_at' => now(),'updated_at' => now(),'deleted_at' => NULL)

          );
        Schedules_setting::insert($var);
    }
}
