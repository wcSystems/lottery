<?php

use Illuminate\Database\Seeder;
use App\Ticket_office;

class Table_Ticket_offices_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $var = array(
            array('descripcion' => 'Taquilla 1','agency_id' => '1','status' => '1','created_at' => now(),'updated_at' => now(),'deleted_at' => NULL),
            array('descripcion' => 'Taquilla 2','agency_id' => '2','status' => '1','created_at' => now(),'updated_at' => now(),'deleted_at' => NULL),
            array('descripcion' => 'Taquilla 3','agency_id' => '1','status' => '1','created_at' => now(),'updated_at' => now(),'deleted_at' => NULL),
            array('descripcion' => 'Taquilla 1','agency_id' => '2','status' => '1','created_at' => now(),'updated_at' => now(),'deleted_at' => NULL),
            array('descripcion' => 'Taquilla 2','agency_id' => '2','status' => '1','created_at' => now(),'updated_at' => now(),'deleted_at' => NULL)
          );
          Ticket_office::insert($var);
    }
}
