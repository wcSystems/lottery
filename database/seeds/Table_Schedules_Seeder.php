<?php

use Illuminate\Database\Seeder;
use App\Schedule;

class Table_Schedules_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('schedules')->delete();
        $var = [
            ['iniitial_schedule' => '01:00:00','created_at'=>now(),'updated_at'=>now()],
            ['iniitial_schedule' => '02:00:00','created_at'=>now(),'updated_at'=>now()],
            ['iniitial_schedule' => '03:00:00','created_at'=>now(),'updated_at'=>now()],
            ['iniitial_schedule' => '04:00:00','created_at'=>now(),'updated_at'=>now()],
            ['iniitial_schedule' => '05:00:00','created_at'=>now(),'updated_at'=>now()],
            ['iniitial_schedule' => '06:00:00','created_at'=>now(),'updated_at'=>now()],
            ['iniitial_schedule' => '07:00:00','created_at'=>now(),'updated_at'=>now()],
            ['iniitial_schedule' => '08:00:00','created_at'=>now(),'updated_at'=>now()],
            ['iniitial_schedule' => '09:00:00','created_at'=>now(),'updated_at'=>now()],
            ['iniitial_schedule' => '10:00:00','created_at'=>now(),'updated_at'=>now()],
            ['iniitial_schedule' => '11:00:00','created_at'=>now(),'updated_at'=>now()],
            ['iniitial_schedule' => '12:00:00','created_at'=>now(),'updated_at'=>now()],
            ['iniitial_schedule' => '13:00:00','created_at'=>now(),'updated_at'=>now()],
            ['iniitial_schedule' => '14:00:00','created_at'=>now(),'updated_at'=>now()],
            ['iniitial_schedule' => '15:00:00','created_at'=>now(),'updated_at'=>now()],
            ['iniitial_schedule' => '16:00:00','created_at'=>now(),'updated_at'=>now()],
            ['iniitial_schedule' => '17:00:00','created_at'=>now(),'updated_at'=>now()],
            ['iniitial_schedule' => '18:00:00','created_at'=>now(),'updated_at'=>now()],
            ['iniitial_schedule' => '19:00:00','created_at'=>now(),'updated_at'=>now()],
            ['iniitial_schedule' => '20:00:00','created_at'=>now(),'updated_at'=>now()],
            ['iniitial_schedule' => '21:00:00','created_at'=>now(),'updated_at'=>now()],
            ['iniitial_schedule' => '22:00:00','created_at'=>now(),'updated_at'=>now()],
            ['iniitial_schedule' => '23:00:00','created_at'=>now(),'updated_at'=>now()],
            ['iniitial_schedule' => '00:00:00','created_at'=>now(),'updated_at'=>now()]
        ];
        Schedule::insert($var);
    }
}
