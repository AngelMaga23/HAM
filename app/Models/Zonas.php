<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Zonas extends Model
{
    protected $table = "zonas";

    protected $primaryKey = "id";

    protected $fillable = [
        'nbZona',
	'pathArchivo',
	'DesZonas',
	'patimgZona',
	'idEstatus',
	'numPersonasPermitidasMax'
    ];

    public $timestamps = false;

    //relaciones del el modelo

    /**
     * 
     * Relacion
     * Canal de le pertence a EmpresaSucursal
     * 
     */
   
}
