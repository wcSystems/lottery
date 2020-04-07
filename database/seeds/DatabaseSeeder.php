<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateTables([
            'roles',
            'agencies',
            'ticket_offices',
            'users',
            'lotteries',
            'customers',
            'schedules',
            'type_games',
            'menus',
            'sub_menus',
            'role_sub_menu',
            'tickets',
            'plays',
            'plays_ticket',
            'box',
            'elements',
            'schedules_setting',
            'agency_lottery',
            'results',
            'winners'
        ]);

        $this->call(Table_Roles_Seeder::class);
        $this->call(Table_Agencies_Seeder::class);
        $this->call(Table_Ticket_offices_Seeder::class);
        $this->call(Table_Users_Seeder::class);
        $this->call(Table_Lotteries_Seeder::class);
        $this->call(Table_Customers_Seeder::class);
        $this->call(Table_Schedules_Seeder::class);
        $this->call(Table_Type_games_Seeder::class);
        $this->call(Table_Menus_Seeder::class);
        $this->call(Table_Sub_menus_Seeder::class);
        $this->call(Table_Role_sub_menu_Seeder::class);
        $this->call(Table_Tickets_Seeder::class);
        $this->call(Table_Plays_Seeder::class);
        $this->call(Table_Plays_Tickets_Seeder::class);
        $this->call(Table_Box_Seeder::class);
        $this->call(Table_Elements_Seeder::class);
        $this->call(Table_Schedules_setting_Seeder::class);
        $this->call(Table_Agencies_lottery_Seeder::class);
        $this->call(Table_Results_Seeder::class);
        $this->call(Table_Winners_Seeder::class);
    }

    protected function truncateTables(array $tablas)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        foreach ($tablas as $table) {
            DB::table($table)->truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
