<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->varchar('cvEmpresa');
            $table->string('nbEmpresa');
            $table->integer('idTipoPersona');
            $table->string('desRFC');
            $table->integer('idTipoHotel');
            $table->integer('idDireccionFiscal');
            $table->integer('idUbicacion');
            $table->integer('idConfiguracion');
            $table->string('pathLogo');
            $table->integer('idDirectorGeneral');
            $table->integer('idTipoEmpresa');
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
        Schema::dropIfExists('empresas');
    }
}
