<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RelServicio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rel_servicios', function (Blueprint $table) {
            $table->id();
            $table->integer('idRelAreaServicio');
            $table->integer('idArea');
            $table->integer('idServicio');
            $table->string('fgServicioArea');
            $table->integer('idHabitacionesServicios');
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
        //
    }
}
