<?php

use Illuminate\Database\Seeder;
use App\Agency_lottery;

class Table_Agencies_lottery_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $var =  array(
            array('agency_id' => '1','lottery_id' => '1','created_at' => now(),'updated_at' => now(),'deleted_at' => NULL),
            array('agency_id' => '2','lottery_id' => '1','created_at' => now(),'updated_at' => now(),'deleted_at' => NULL),
            array('agency_id' => '1','lottery_id' => '2','created_at' => now(),'updated_at' => now(),'deleted_at' => NULL),
            array('agency_id' => '2','lottery_id' => '2','created_at' => now(),'updated_at' => now(),'deleted_at' => NULL),
            array('agency_id' => '1','lottery_id' => '3','created_at' => now(),'updated_at' => now(),'deleted_at' => NULL),
            array('agency_id' => '2','lottery_id' => '3','created_at' => now(),'updated_at' => now(),'deleted_at' => NULL)
          );
        Agency_lottery::insert($var);
    }
}
