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
        //DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $this->call(UsersTableSeeder::class);
        $this->call(EdificioTableSeeder::class);
        $this->call(ParqueoTableSeeder::class);
        $this->call(IngresoParqueoTableSeeder::class);
        $this->call(MesTableSeeder::class);
        $this->call(ArancelesTableSeeder::class);
        //DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
