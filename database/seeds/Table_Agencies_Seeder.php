<?php

use Illuminate\Database\Seeder;
use App\Agency;

class Table_Agencies_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $var = [
            ['name' => 'Facilito','phone' => '024184563252', 'rif' => 'J-14525236-1','address' => 'Av. Bolivar','percentage_profit'=>'20','created_at' => now(),'updated_at' => now(),'deleted_at' =>null],
            ['name' => 'Esperanza','phone' => '024183456789', 'rif' => 'J-76534567-1','address' => 'Av. Lara','percentage_profit'=>'20','created_at' => now(),'updated_at' => now(),'deleted_at' =>null],
            ['name' => 'Master','phone' => '02418764598', 'rif' => 'J-23456789-1','address' => 'Urb. Prebo','percentage_profit'=>'0','created_at' => now(),'updated_at' => now(),'deleted_at' =>null]
        ];
        Agency::insert($var);
    }
}