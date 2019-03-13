<?php

use Illuminate\Database\Seeder;
use App\Parqueo;

class ParqueoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $parqueo = new Parqueo;
        $parqueo->cantidad_estacionamiento = 25;
        $parqueo->disponibilidad_parqueo = 1;
        $parqueo->edificio_id = 1;
        $parqueo->save();

        $parqueo = new Parqueo;
        $parqueo->cantidad_estacionamiento = 15;
        $parqueo->disponibilidad_parqueo = 1;
        $parqueo->edificio_id = 3;
        $parqueo->save();

        $parqueo = new Parqueo;
        $parqueo->cantidad_estacionamiento = 40;
        $parqueo->disponibilidad_parqueo = 1;
        $parqueo->edificio_id = 2;
        $parqueo->save();
    }
}
