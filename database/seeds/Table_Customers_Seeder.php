<?php

use Illuminate\Database\Seeder;
use App\Customer;

class Table_Customers_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Customer::class, 200)->create();
    }
}
