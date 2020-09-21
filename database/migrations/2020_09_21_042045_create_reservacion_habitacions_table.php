<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservacionHabitacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservacion_habitacions', function (Blueprint $table) {
            $table->id();
            $table->string('cv');
            $table->dateTime('fecha_inicio');
            $table->dateTime('fecha_fin');
            $table->integer('idEstatus');
            $table->integer('idHabitacion');
            $table->integer('numCantidadPersonas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservacion_habitacions');
    }
}
