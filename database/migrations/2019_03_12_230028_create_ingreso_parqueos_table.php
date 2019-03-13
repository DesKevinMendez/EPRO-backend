<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngresoParqueosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingreso_parqueos', function (Blueprint $table) {
            $table->increments('id_ingreso_parqueo');
            $table->unsignedInteger('id_usuario');
            $table->time('hora_entrada');
            $table->time('hora_salida');
            $table->date('fecha_registro');
            $table->unsignedInteger('id_parqueo');
            $table->timestamps();
            $table->foreign('id_usuario')
                ->references('id')->on('users')
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
        Schema::dropIfExists('ingreso_parqueos');
    }
}
