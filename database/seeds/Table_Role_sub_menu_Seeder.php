<?php

use Illuminate\Database\Seeder;
use App\Role_sub_menu;

class Table_Role_sub_menu_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $var = [
            ['sub_menu_id' => '1','role_id' => '1','created_at'=>now(),'updated_at'=>now()],
            ['sub_menu_id' => '2','role_id' => '1','created_at'=>now(),'updated_at'=>now()],
            ['sub_menu_id' => '3','role_id' => '1','created_at'=>now(),'updated_at'=>now()],
            ['sub_menu_id' => '4','role_id' => '1','created_at'=>now(),'updated_at'=>now()],
            ['sub_menu_id' => '5','role_id' => '1','created_at'=>now(),'updated_at'=>now()],
            ['sub_menu_id' => '6','role_id' => '1','created_at'=>now(),'updated_at'=>now()],
            ['sub_menu_id' => '7','role_id' => '1','created_at'=>now(),'updated_at'=>now()],
            ['sub_menu_id' => '8','role_id' => '1','created_at'=>now(),'updated_at'=>now()],

            ['sub_menu_id' => '1','role_id' => '2','created_at'=>now(),'updated_at'=>now()],
            ['sub_menu_id' => '3','role_id' => '2','created_at'=>now(),'updated_at'=>now()],
            ['sub_menu_id' => '4','role_id' => '2','created_at'=>now(),'updated_at'=>now()],
            ['sub_menu_id' => '5','role_id' => '2','created_at'=>now(),'updated_at'=>now()],
            ['sub_menu_id' => '6','role_id' => '2','created_at'=>now(),'updated_at'=>now()],

            ['sub_menu_id' => '3','role_id' => '3','created_at'=>now(),'updated_at'=>now()],
            ['sub_menu_id' => '4','role_id' => '3','created_at'=>now(),'updated_at'=>now()],
            ['sub_menu_id' => '5','role_id' => '3','created_at'=>now(),'updated_at'=>now()],

            ['sub_menu_id' => '1','role_id' => '4','created_at'=>now(),'updated_at'=>now()],
            ['sub_menu_id' => '2','role_id' => '4','created_at'=>now(),'updated_at'=>now()],
            ['sub_menu_id' => '3','role_id' => '4','created_at'=>now(),'updated_at'=>now()],
            ['sub_menu_id' => '4','role_id' => '4','created_at'=>now(),'updated_at'=>now()],
            ['sub_menu_id' => '5','role_id' => '4','created_at'=>now(),'updated_at'=>now()],
            ['sub_menu_id' => '6','role_id' => '4','created_at'=>now(),'updated_at'=>now()],
            ['sub_menu_id' => '7','role_id' => '4','created_at'=>now(),'updated_at'=>now()],
            ['sub_menu_id' => '8','role_id' => '4','created_at'=>now(),'updated_at'=>now()],

        ];
        Role_sub_menu::insert($var);
    }
}

