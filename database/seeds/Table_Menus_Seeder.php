<?php

use Illuminate\Database\Seeder;
use App\Menu;

class Table_Menus_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('menus')->delete();
        $var = [
            ['nombre' => 'Afiliados','icon' => 'fal fa-address-card','created_at'=>now(),'updated_at'=>now()],
            ['nombre' => 'Modelos de apuesta','icon' => 'fal fa-dollar-sign','created_at'=>now(),'updated_at'=>now()],
            ['nombre' => 'Taquilla','icon' => 'fal fa-flag','created_at'=>now(),'updated_at'=>now()],
            ['nombre' => 'Gestion de tickets','icon' => 'fal fa-id-badge','created_at'=>now(),'updated_at'=>now()],
            ['nombre' => 'Reportes','icon' => 'fal fa-chart-line','created_at'=>now(),'updated_at'=>now()],
            ['nombre' => 'Configuracion','icon' => 'fal fa-cog','created_at'=>now(),'updated_at'=>now()]
           
        ];
        Menu::insert($var);
    }
}
