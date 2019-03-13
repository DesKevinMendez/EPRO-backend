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
        $this->call(UsersTableSeeder::class);
        $this->call(EdificioTableSeeder::class);
        $this->call(ParqueoTableSeeder::class);
        $this->call(IngresoParqueoTableSeeder::class);
    }
}
