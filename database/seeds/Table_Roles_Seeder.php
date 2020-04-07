<?php

use Illuminate\Database\Seeder;
use App\Role;

class Table_Roles_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $var = [
            ['name' => 'Master','created_at'=>now(),'updated_at'=>now()],
            ['name' => 'Afiliado','created_at'=>now(),'updated_at'=>now()],
            ['name' => 'Taquilla','created_at'=>now(),'updated_at'=>now()],
            ['name' => 'Sistemas','created_at'=>now(),'updated_at'=>now()]
        ];
        Role::insert($var);
    }
}
