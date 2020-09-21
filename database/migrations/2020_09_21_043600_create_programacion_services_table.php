<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramacionServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programacion_services', function (Blueprint $table) {
            $table->id();
            $table->integer('idRelServicio');
            $table->integer('idRelReservacionesHabitacionesClientes');
            $table->dateTime('feProgramada');
            $table->dateTime('feInicio');
            $table->dateTime('feFin');
            $table->integer('idEstatus');
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
        Schema::dropIfExists('programacion_services');
    }
}
