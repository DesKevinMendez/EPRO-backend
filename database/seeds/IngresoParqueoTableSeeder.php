<?php

use Illuminate\Database\Seeder;
use App\IngresoParqueo;
use Carbon\Carbon;

class IngresoParqueoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ingreso = new IngresoParqueo;
        $ingreso->id_usuario = 1;
        $ingreso->hora_entrada = Carbon::now();
        $ingreso->hora_salida = Carbon::now()->addHour(5);
        $ingreso->fecha_registro = Carbon::now();
        $ingreso->id_parqueo = 1;
        $ingreso->save();

        $ingreso = new IngresoParqueo;
        $ingreso->id_usuario = 1;
        $ingreso->hora_entrada = Carbon::now();
        $ingreso->hora_salida = Carbon::now()->addHour(10);
        $ingreso->fecha_registro = Carbon::now();
        $ingreso->id_parqueo = 3;
        $ingreso->save();

        $ingreso = new IngresoParqueo;
        $ingreso->id_usuario = 1;
        $ingreso->hora_entrada = Carbon::now();
        $ingreso->hora_salida = Carbon::now()->addHour(10);
        $ingreso->fecha_registro = Carbon::now();
        $ingreso->id_parqueo = 3;
        $ingreso->save();



        $ingreso = new IngresoParqueo;
        $ingreso->id_usuario = 2;
        $ingreso->hora_entrada = Carbon::now();
        $ingreso->hora_salida = Carbon::now()->addHour(5);
        $ingreso->fecha_registro = Carbon::now();
        $ingreso->id_parqueo = 1;
        $ingreso->save();

        $ingreso = new IngresoParqueo;
        $ingreso->id_usuario = 2;
        $ingreso->hora_entrada = Carbon::now();
        $ingreso->hora_salida = Carbon::now()->addHour(1);
        $ingreso->fecha_registro = Carbon::now();
        $ingreso->id_parqueo = 1;
        $ingreso->save();

        $ingreso = new IngresoParqueo;
        $ingreso->id_usuario = 2;
        $ingreso->hora_entrada = Carbon::now();
        $ingreso->hora_salida = Carbon::now()->addHour(1);
        $ingreso->fecha_registro = Carbon::now();
        $ingreso->id_parqueo = 1;
        $ingreso->save();
    }
}
