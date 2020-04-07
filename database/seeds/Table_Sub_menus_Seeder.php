<?php

use Illuminate\Database\Seeder;
use App\Sub_menu;

class Table_Sub_menus_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('sub_menus')->delete();
        $var = [
            ['name' => 'Agencias','url' => '/agencies','menu_id' => '1','created_at'=>now(),'updated_at'=>now()],
            ['name' => 'Modelos de loteria','url' => '/lotteries','menu_id' => '2','created_at'=>now(),'updated_at'=>now()],
            ['name' => 'Venta de tickets','url' => '/tickets','menu_id' => '4','created_at'=>now(),'updated_at'=>now()],
            ['name' => 'Reportes','url' => '/reportes','menu_id' => '5','created_at'=>now(),'updated_at'=>now()],
            ['name' => 'Usuarios','url' => '/users','menu_id' => '1','created_at'=>now(),'updated_at'=>now()],
            ['name' => 'Mi taquilla','url' => '/taquillas/office','menu_id' => '3','created_at'=>now(),'updated_at'=>now()],
            ['name' => 'Juegos','url' => '/games','menu_id' => '2','created_at'=>now(),'updated_at'=>now()],
            ['name' => 'Ganadores','url' => '/ganadores','menu_id' => '4','created_at'=>now(),'updated_at'=>now()]
        ];
        Sub_menu::insert($var);
    }
}
