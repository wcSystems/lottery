<?php

use Illuminate\Database\Seeder;
use App\Type_game;

class Table_Type_games_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('type_games')->delete();
        $var = [
            ['description' => 'Numeros','created_at'=>now(),'updated_at'=>now()],
            ['description' => 'Zodiaco','created_at'=>now(),'updated_at'=>now()],
            ['description' => 'Animales','created_at'=>now(),'updated_at'=>now()],
            ['description' => 'Colores','created_at'=>now(),'updated_at'=>now()],
        ];
        Type_game::insert($var);
    }
}
