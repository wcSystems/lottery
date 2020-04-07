<?php

use Illuminate\Database\Seeder;
use App\Element;

class Table_Elements_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('elements')->delete();
        $var = [
            ['type_game_id' => '2','code' => '01','description' => 'Acuario','created_at'=>now(),'updated_at'=>now()],
            ['type_game_id' => '2','code' => '02','description' => 'Picis','created_at'=>now(),'updated_at'=>now()],
            ['type_game_id' => '2','code' => '03','description' => 'Aries','created_at'=>now(),'updated_at'=>now()],
            ['type_game_id' => '2','code' => '04','description' => 'Tauro','created_at'=>now(),'updated_at'=>now()],
            ['type_game_id' => '2','code' => '05','description' => 'Geminis','created_at'=>now(),'updated_at'=>now()],
            ['type_game_id' => '2','code' => '06','description' => 'Cancer','created_at'=>now(),'updated_at'=>now()],
            ['type_game_id' => '2','code' => '07','description' => 'Leo','created_at'=>now(),'updated_at'=>now()],
            ['type_game_id' => '2','code' => '08','description' => 'Virgo','created_at'=>now(),'updated_at'=>now()],
            ['type_game_id' => '2','code' => '09','description' => 'Libra','created_at'=>now(),'updated_at'=>now()],
            ['type_game_id' => '2','code' => '10','description' => 'Escorpio','created_at'=>now(),'updated_at'=>now()],
            ['type_game_id' => '2','code' => '11','description' => 'Sagitario','created_at'=>now(),'updated_at'=>now()],
            ['type_game_id' => '2','code' => '12','description' => 'Capricornio','created_at'=>now(),'updated_at'=>now()],

            ['type_game_id' => '3','code' => '0','description' => 'Delfin','created_at'=>now(),'updated_at'=>now()],
            ['type_game_id' => '3','code' => '00','description' => 'Ballena','created_at'=>now(),'updated_at'=>now()],
            ['type_game_id' => '3','code' => '1','description' => 'Carnero','created_at'=>now(),'updated_at'=>now()],
            ['type_game_id' => '3','code' => '2','description' => 'Toro','created_at'=>now(),'updated_at'=>now()],
            ['type_game_id' => '3','code' => '3','description' => 'Ciempies','created_at'=>now(),'updated_at'=>now()],
            ['type_game_id' => '3','code' => '4','description' => 'Alacran','created_at'=>now(),'updated_at'=>now()],
            ['type_game_id' => '3','code' => '5','description' => 'Leon','created_at'=>now(),'updated_at'=>now()],
            ['type_game_id' => '3','code' => '6','description' => 'Rana','created_at'=>now(),'updated_at'=>now()],
            ['type_game_id' => '3','code' => '7','description' => 'Perico','created_at'=>now(),'updated_at'=>now()],
            ['type_game_id' => '3','code' => '8','description' => 'Raton','created_at'=>now(),'updated_at'=>now()],
            ['type_game_id' => '3','code' => '9','description' => 'Aguila','created_at'=>now(),'updated_at'=>now()],
            ['type_game_id' => '3','code' => '10','description' => 'Tigre','created_at'=>now(),'updated_at'=>now()],
            ['type_game_id' => '3','code' => '11','description' => 'Gato','created_at'=>now(),'updated_at'=>now()],
            ['type_game_id' => '3','code' => '12','description' => 'Caballo','created_at'=>now(),'updated_at'=>now()],
            ['type_game_id' => '3','code' => '13','description' => 'Mono','created_at'=>now(),'updated_at'=>now()],
            ['type_game_id' => '3','code' => '14','description' => 'Paloma','created_at'=>now(),'updated_at'=>now()],
            ['type_game_id' => '3','code' => '15','description' => 'Zorro','created_at'=>now(),'updated_at'=>now()],
            ['type_game_id' => '3','code' => '16','description' => 'Oso','created_at'=>now(),'updated_at'=>now()],
            ['type_game_id' => '3','code' => '17','description' => 'Pavo','created_at'=>now(),'updated_at'=>now()],
            ['type_game_id' => '3','code' => '18','description' => 'Burro','created_at'=>now(),'updated_at'=>now()],
            ['type_game_id' => '3','code' => '19','description' => 'Chivo','created_at'=>now(),'updated_at'=>now()],
            ['type_game_id' => '3','code' => '20','description' => 'Cochino','created_at'=>now(),'updated_at'=>now()],
            ['type_game_id' => '3','code' => '21','description' => 'Gallo','created_at'=>now(),'updated_at'=>now()],
            ['type_game_id' => '3','code' => '22','description' => 'Camello','created_at'=>now(),'updated_at'=>now()],
            ['type_game_id' => '3','code' => '23','description' => 'Zebra','created_at'=>now(),'updated_at'=>now()],
            ['type_game_id' => '3','code' => '24','description' => 'Iguana','created_at'=>now(),'updated_at'=>now()],
            ['type_game_id' => '3','code' => '25','description' => 'Gallina','created_at'=>now(),'updated_at'=>now()],
            ['type_game_id' => '3','code' => '26','description' => 'Vaca','created_at'=>now(),'updated_at'=>now()],
            ['type_game_id' => '3','code' => '27','description' => 'Perro','created_at'=>now(),'updated_at'=>now()],
            ['type_game_id' => '3','code' => '28','description' => 'Zamuro','created_at'=>now(),'updated_at'=>now()],
            ['type_game_id' => '3','code' => '29','description' => 'Elefante','created_at'=>now(),'updated_at'=>now()],
            ['type_game_id' => '3','code' => '30','description' => 'Caiman','created_at'=>now(),'updated_at'=>now()],
            ['type_game_id' => '3','code' => '31','description' => 'Lapa','created_at'=>now(),'updated_at'=>now()],
            ['type_game_id' => '3','code' => '32','description' => 'Ardilla','created_at'=>now(),'updated_at'=>now()],
            ['type_game_id' => '3','code' => '33','description' => 'Pescado','created_at'=>now(),'updated_at'=>now()],
            ['type_game_id' => '3','code' => '34','description' => 'Venado','created_at'=>now(),'updated_at'=>now()],
            ['type_game_id' => '3','code' => '35','description' => 'Jirafa','created_at'=>now(),'updated_at'=>now()],
            ['type_game_id' => '3','code' => '36','description' => 'Culebra','created_at'=>now(),'updated_at'=>now()]
        ];
        Element::insert($var);
    }
}
