<?php

use Illuminate\Database\Seeder;
use App\Edificio;

class EdificioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $edificio = new Edificio;
        $edificio->edificio = "Simón Bolivar";
        $edificio->save();

        $edificio = new Edificio;
        $edificio->edificio = "Francisco Morazán";
        $edificio->save();

        $edificio = new Edificio;
        $edificio->edificio = "Benito Juárez";
        $edificio->save();
    }
}
