<?php

use Illuminate\Database\Seeder;
use App\Lottery;

class Table_Lotteries_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $var = array(
            array('name' => 'Zulia','image' => 'https://lorempixel.com/100/100/?79082','status' => '1','payment_x' => '30','percent' => '2','created_at' => now(),'updated_at' => now(),'deleted_at' => NULL),
            array('name' => 'Tachira','image' => 'https://lorempixel.com/100/100/?79082','status' => '1','payment_x' => '30','percent' => '1','created_at' => now(),'updated_at' => now(),'deleted_at' => NULL),
            array('name' => 'Oriente','image' => 'https://lorempixel.com/100/100/?79082','status' => '1','payment_x' => '20','percent' => '3','created_at' => now(),'updated_at' => now(),'deleted_at' => NULL)
          );
        Lottery::insert($var);
    }
}
