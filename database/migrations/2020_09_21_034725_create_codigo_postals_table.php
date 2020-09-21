<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCodigoPostalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('codigo_postals', function (Blueprint $table) {
            $table->id();
            $table->string('Cp_Asentamiento');
            $table->string('Cp_TipoAsentamiento');
            $table->string('Cp_Municipio');
            $table->string('Cp_Estado');
            $table->string('Cp_Ciudad');
            $table->string('Cp_CodigoPostal');
            $table->string('Cp_ClaveEstado');
            $table->string('Cp_ClaveTipoAsentamiento');
            $table->string('Cp_ClaveMunicipio');
            $table->string('Cp_ClaveCiudad');
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
        Schema::dropIfExists('codigo_postals');
    }
}
