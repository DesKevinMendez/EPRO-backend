<?php

use Illuminate\Database\Seeder;
use App\Mes;

class MesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mes = new Mes;
        $mes->mes = "Enero";
        $mes->save();

        $mes = new Mes;
        $mes->mes = "Febrero";
        $mes->save();

        $mes = new Mes;
        $mes->mes = "Marzo";
        $mes->save();
        $mes = new Mes;
        $mes->mes = "Abril";
        $mes->save();
        $mes = new Mes;
        $mes->mes = "Mayo";
        $mes->save();
        $mes = new Mes;
        $mes->mes = "Junio";
        $mes->save();
        $mes = new Mes;
        $mes->mes = "Julio";
        $mes->save();
        $mes = new Mes;
        $mes->mes = "Agosto";
        $mes->save();
        $mes = new Mes;
        $mes->mes = "Septiembre";
        $mes->save();
        $mes = new Mes;
        $mes->mes = "Octubre";
        $mes->save();
        $mes = new Mes;
        $mes->mes = "Noviembre";
        $mes->save();
        $mes = new Mes;
        $mes->mes = "Diciembre";
        $mes->save();
    }
}
