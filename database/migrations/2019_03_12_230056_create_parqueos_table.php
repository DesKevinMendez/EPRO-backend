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
            $table->unsignedInteger('id_ingreso_parqueo');
            $table->time('estado');
            $table->unsignedInteger('cantidad_estacionamiento');
            $table->boolean('disponibilidad_parqueo');
            $table->timestamps();
            $table->foreign('id_ingreso_parqueo')
                ->references('id_parqueo')->on('ingreso_parqueos')
                ->onDelete('cascade');
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
