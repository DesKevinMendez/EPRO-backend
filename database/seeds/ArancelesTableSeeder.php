<?php

use Illuminate\Database\Seeder;
use App\Aranceles;
use Carbon\Carbon;

class ArancelesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aranceles = new Aranceles;
        $aranceles->id_usuario = 1;
        $aranceles->pago = "20";
        $aranceles->fecha_pago = Carbon::now();
        $aranceles->save();

        $aranceles = new Aranceles;
        $aranceles->id_usuario = 1;
        $aranceles->pago = "25";
        $aranceles->fecha_pago = Carbon::now();
        $aranceles->save();
    }
}
