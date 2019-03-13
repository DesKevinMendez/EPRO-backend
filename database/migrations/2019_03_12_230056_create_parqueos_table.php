<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParqueosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parqueos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('estado')->default('disponible');
            $table->unsignedInteger('edificio_id');
            $table->unsignedInteger('cantidad_estacionamiento');
            $table->boolean('disponibilidad_parqueo');
            //$table->foreign('edificio_id')->references('id')->on('edificios');
            $table->timestamps();
            $table->foreign('edificio_id')
                ->references('id')->on('ingreso_parqueos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parqueos');
    }
}
