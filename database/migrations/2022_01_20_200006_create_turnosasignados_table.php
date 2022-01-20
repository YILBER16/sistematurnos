<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTurnosasignadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turnosasignados', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_turno')->unsigned();
            $table->bigInteger('id_modulo')->unsigned();
            $table->timestamps();
            $table->foreign('id_turno')->references('id')->on('turnos')->unsigned();
            $table->foreign('id_modulo')->references('id')->on('modulos');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('turnosasignados');
    }
}
